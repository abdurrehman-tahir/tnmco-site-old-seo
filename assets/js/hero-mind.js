/* T&M hero "Mind" — a living generative particle entity (sibling of the
   VIOLET demo orb): dense 3D particle sphere with a heartbeat core, a tilted
   orbital ring, a comet tracing the orbit, slow breathing rotation and
   cursor-reactive tilt. Dependency-free canvas.
   - Runs only while visible (IntersectionObserver) and tab is active.
   - prefers-reduced-motion: renders a single static frame, no loop. */
(function () {
    "use strict";
    var canvas = document.querySelector(".hero-mind-canvas");
    if (!canvas) return;

    var reduced = window.matchMedia && window.matchMedia("(prefers-reduced-motion: reduce)").matches;
    var ctx = canvas.getContext("2d");
    var dpr = Math.min(window.devicePixelRatio || 1, 2);
    var W = 0, H = 0, CX = 0, CY = 0, R = 0;
    var raf = null, running = false, t = 0;
    var mouse = { x: 0.5, y: 0.5, tx: 0.5, ty: 0.5, inside: false };

    var mobile = window.innerWidth < 768;
    var N_SPHERE = mobile ? 1300 : 4200;
    var N_RING   = mobile ? 600 : 1900;
    var RING_TILT = -0.42;          // radians, like VIOLET's galaxy band

    // --- particles ---------------------------------------------------------
    var sphere = [];
    for (var i = 0; i < N_SPHERE; i++) {
        var phi = Math.acos(1 - 2 * (i + 0.5) / N_SPHERE);
        var theta = Math.PI * (1 + Math.sqrt(5)) * i;
        sphere.push({
            x: Math.sin(phi) * Math.cos(theta),
            y: Math.sin(phi) * Math.sin(theta),
            z: Math.cos(phi),
            j: Math.random() * 6.28,            // jitter phase
            s: 0.75 + Math.random() * 0.7       // size variance
        });
    }
    var ring = [];
    for (var k = 0; k < N_RING; k++) {
        ring.push({
            a: Math.random() * Math.PI * 2,                 // angle on ring
            r: 1.30 + Math.pow(Math.random(), 1.8) * 1.95,  // radius: dense inner, sweeps to ~3.2x
            y: (Math.random() - 0.5) * 0.05,                // tight, flat band
            sp: 0.0012 + Math.random() * 0.0011,            // angular speed
            s: 0.6 + Math.random() * 0.8
        });
    }

    function resize() {
        var rect = canvas.getBoundingClientRect();
        W = Math.max(1, rect.width); H = Math.max(1, rect.height);
        canvas.width = W * dpr; canvas.height = H * dpr;
        ctx.setTransform(dpr, 0, 0, dpr, 0, 0);
        CX = W / 2; CY = H / 2;
        R = Math.min(W, H) * 0.35;
    }

    function lerp(a, b, f) { return a + (b - a) * f; }

    // depth 0(back)..1(front) -> colour: soft violet -> deep cyan/navy
    function tint(depth, alpha) {
        var r = Math.round(lerp(99, 8, depth));
        var g = Math.round(lerp(58, 125, depth));
        var b = Math.round(lerp(183, 178, depth));
        return "rgba(" + r + "," + g + "," + b + "," + alpha + ")";
    }

    function draw() {
        ctx.clearRect(0, 0, W, H);
        t += 16;

        // cursor easing -> gentle tilt
        mouse.x = lerp(mouse.x, mouse.tx, 0.04);
        mouse.y = lerp(mouse.y, mouse.ty, 0.04);
        var tiltX = (mouse.y - 0.5) * 0.5;
        var rotY = t * 0.00012 + (mouse.x - 0.5) * 0.6;
        var breathe = 1 + 0.028 * Math.sin(t * 0.00078);
        var sinY = Math.sin(rotY), cosY = Math.cos(rotY);
        var sinX = Math.sin(tiltX + 0.18), cosX = Math.cos(tiltX + 0.18);

        // ---- heartbeat pulse rings (radar) ----
        var pulse = (t % 4200) / 4200;
        ctx.beginPath();
        ctx.arc(CX, CY, R * (0.18 + pulse * 1.05), 0, 6.2832);
        ctx.strokeStyle = "rgba(21,140,178," + (0.5 * (1 - pulse)) + ")";
        ctx.lineWidth = 1.3;
        ctx.stroke();

        // ---- orbital ring (behind-half first) ----
        var rs = Math.sin(RING_TILT), rc = Math.cos(RING_TILT);
        function ringPoint(p, move) {
            if (move) p.a += p.sp;
            // fixed, edge-on band (VIOLET-style): particles flow along it,
            // but the band plane itself never tumbles toward the camera
            var x = Math.cos(p.a) * p.r, z = Math.sin(p.a) * p.r, y = p.y;
            var ty = y * rc - z * rs * 0.32, tz = z * rc + y * rs;
            return { x: x, y: ty, z: tz };
        }
        var frontRing = [];
        for (var q = 0; q < N_RING; q++) {
            var rp = ringPoint(ring[q], !reduced);
            if (rp.z > 0) { frontRing.push([rp, ring[q]]); continue; }
            var d = (rp.z + 1.8) / 3.6;
            ctx.fillStyle = tint(d, 0.28 + d * 0.38);
            var sz = ring[q].s * lerp(1.1, 2.1, d);
            ctx.fillRect(CX + rp.x * R - sz / 2, CY + rp.y * R - sz / 2, sz, sz);
        }

        // ---- sphere ----
        for (var n = 0; n < N_SPHERE; n++) {
            var p = sphere[n];
            // slow rotation + micro jitter (alive, not mechanical)
            var jx = Math.sin(t * 0.0011 + p.j) * 0.012;
            var x1 = p.x * cosY - p.z * sinY;
            var z1 = p.x * sinY + p.z * cosY;
            var y1 = p.y * cosX - z1 * sinX;
            var z2 = p.y * sinX + z1 * cosX;
            var depth = (z2 + 1) / 2;
            var px = CX + (x1 + jx) * R * breathe;
            var py = CY + y1 * R * breathe;

            // local cursor repulsion
            if (mouse.inside) {
                var mx = mouse.tx * W, my = mouse.ty * H;
                var dx = px - mx, dy = py - my, d2 = dx * dx + dy * dy;
                if (d2 < 5600) {
                    var f = (5600 - d2) / 5600 * 12, dd = Math.sqrt(d2) || 1;
                    px += dx / dd * f; py += dy / dd * f;
                }
            }
            var size = p.s * lerp(1.0, 3.1, depth);
            ctx.fillStyle = tint(depth, 0.30 + depth * 0.68);
            ctx.fillRect(px - size / 2, py - size / 2, size, size);
        }

        // ---- core: tight cluster + heart ----
        for (var c = 0; c < 26; c++) {
            var ca = (c / 26) * 6.2832 + t * 0.0004;
            var cr = R * 0.11 * (0.4 + 0.6 * Math.abs(Math.sin(c * 2.4 + t * 0.0009)));
            ctx.fillStyle = "rgba(40,38,70," + (0.5 + 0.3 * Math.sin(t * 0.002 + c)) + ")";
            ctx.fillRect(CX + Math.cos(ca) * cr - 1.4, CY + Math.sin(ca) * cr - 1.4, 2.8, 2.8);
        }
        var beat = Math.max(0, Math.sin(t * 0.0015));
        // glowing nucleus
        ctx.save();
        ctx.shadowColor = "rgba(27,177,220,.95)";
        ctx.shadowBlur = 22 + beat * 16;
        ctx.beginPath();
        ctx.arc(CX, CY, 10 + beat * 5, 0, 6.2832);
        ctx.fillStyle = "rgba(13,130,168," + (0.85 + beat * 0.15) + ")";
        ctx.fill();
        ctx.restore();
        // white-hot centre
        ctx.beginPath();
        ctx.arc(CX, CY, 4 + beat * 2, 0, 6.2832);
        ctx.fillStyle = "rgba(225,248,255," + (0.85 + beat * 0.15) + ")";
        ctx.fill();
        // beat-synced halo ring
        ctx.beginPath();
        ctx.arc(CX, CY, 19 + beat * 12, 0, 6.2832);
        ctx.strokeStyle = "rgba(27,177,220," + (0.55 * (1 - beat)) + ")";
        ctx.lineWidth = 1.6;
        ctx.stroke();

        // ---- ring front-half + comet ----
        for (var fq = 0; fq < frontRing.length; fq++) {
            var fr = frontRing[fq][0], rpart = frontRing[fq][1];
            var fd = (fr.z + 1.8) / 3.6;
            ctx.fillStyle = tint(fd, 0.34 + fd * 0.55);
            var fsz = rpart.s * lerp(1.1, 2.3, fd);
            ctx.fillRect(CX + fr.x * R - fsz / 2, CY + fr.y * R - fsz / 2, fsz, fsz);
        }
        // comet with trail
        for (var tr = 0; tr < 16; tr++) {
            var cp = ringPoint({ a: t * 0.00085 - tr * 0.030, r: 2.05, y: 0, sp: 0 }, false);
            var ta = (1 - tr / 16);
            var front = cp.z > 0 ? 1 : 0.45;
            ctx.beginPath();
            ctx.arc(CX + cp.x * R, CY + cp.y * R, (4.4 - tr * 0.22) * front, 0, 6.2832);
            ctx.fillStyle = "rgba(27,177,220," + (ta * 0.95 * front) + ")";
            ctx.fill();
        }

        if (running && !reduced) raf = requestAnimationFrame(draw);
    }

    function start() { if (!running) { running = true; raf = requestAnimationFrame(draw); } }
    function stop()  { running = false; if (raf) cancelAnimationFrame(raf); raf = null; }

    canvas.addEventListener("mousemove", function (e) {
        var rect = canvas.getBoundingClientRect();
        mouse.tx = (e.clientX - rect.left) / rect.width;
        mouse.ty = (e.clientY - rect.top) / rect.height;
        mouse.inside = true;
    });
    canvas.addEventListener("mouseleave", function () { mouse.inside = false; mouse.tx = 0.5; mouse.ty = 0.5; });
    window.addEventListener("resize", resize);
    resize();

    if (reduced) { draw(); return; }   // single static frame

    if ("IntersectionObserver" in window) {
        new IntersectionObserver(function (entries) {
            entries.forEach(function (en) { en.isIntersecting ? start() : stop(); });
        }, { threshold: 0.05 }).observe(canvas);
    } else { start(); }
    document.addEventListener("visibilitychange", function () { document.hidden ? stop() : start(); });
})();
