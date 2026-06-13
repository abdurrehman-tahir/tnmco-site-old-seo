/* T&M hero sphere — a slowly tumbling 3D globe of large particles: dots,
   hexagons, and some particles bearing the company glyphs (T & M C O + marks).
   Each particle pulses on its own; the whole globe rotates in 3D (front bright,
   back dim); the quarter behind the heading is dimmed. One blue hue throughout.
   Dependency-free canvas. Runs only while visible; reduced-motion = static. */
(function () {
    "use strict";
    var canvas = document.querySelector(".hero-sphere-canvas");
    if (!canvas) return;

    var reduced = window.matchMedia && window.matchMedia("(prefers-reduced-motion: reduce)").matches;
    var ctx = canvas.getContext("2d");
    var dpr = Math.min(window.devicePixelRatio || 1, 2);
    var W = 0, H = 0, CX = 0, CY = 0, R = 0, t = 0, raf = null, running = false;
    var mouse = { tx: 0.5, ty: 0.5, mx: 0.5, my: 0.5, inside: false };
    var mobile = window.innerWidth < 768;

    var BLUE = "64,158,255";                      // single particle hue
    var GLYPHS = ["T", "&", "M", "C", "O", "=", "≡", "·", "✕"];

    var N = mobile ? 560 : 940;
    var pts = [];
    for (var i = 0; i < N; i++) {
        var phi = Math.acos(1 - 2 * (i + 0.5) / N);
        var th = Math.PI * (1 + Math.sqrt(5)) * i;
        var isGlyph = Math.random() < 0.17;
        pts.push({
            x: Math.sin(phi) * Math.cos(th),
            y: Math.sin(phi) * Math.sin(th),
            z: Math.cos(phi),
            glyph: isGlyph ? GLYPHS[(Math.random() * GLYPHS.length) | 0] : null,
            hex: !isGlyph && Math.random() < 0.45,
            pulse: Math.random() * 6.2832,
            base: 0.85 + Math.random() * 0.4
        });
    }

    function resize() {
        var r = canvas.getBoundingClientRect();
        W = Math.max(1, r.width); H = Math.max(1, r.height);
        canvas.width = W * dpr; canvas.height = H * dpr;
        ctx.setTransform(dpr, 0, 0, dpr, 0, 0);
        R = Math.min(W * 0.92, H) * (mobile ? 0.42 : 0.46);
        CX = mobile ? W * 0.5 : W * 0.66;
        CY = mobile ? H * 0.42 : H * 0.5;
    }

    function hex(x, y, rad, fill) {
        ctx.beginPath();
        for (var k = 0; k < 6; k++) {
            var a = Math.PI / 6 + k * Math.PI / 3;
            var px = x + Math.cos(a) * rad, py = y + Math.sin(a) * rad;
            k ? ctx.lineTo(px, py) : ctx.moveTo(px, py);
        }
        ctx.closePath(); ctx.fillStyle = fill; ctx.fill();
    }

    var proj = new Array(N);
    for (var pj = 0; pj < N; pj++) proj[pj] = { p: null, x: 0, y: 0, z: 0 };
    function draw() {
        ctx.clearRect(0, 0, W, H);
        t += 16;

        mouse.mx += (mouse.tx - mouse.mx) * 0.055;          // ease cursor -> no jump/stutter
        mouse.my += (mouse.ty - mouse.my) * 0.055;
        var ry = t * 0.00017 + (mouse.mx - 0.5) * 0.5;      // slow Y spin + eased cursor
        var rx = -0.10 + (mouse.my - 0.5) * 0.3;            // gentle tilt
        var sy = Math.sin(ry), cy = Math.cos(ry), sx = Math.sin(rx), cx = Math.cos(rx);

        for (var i = 0; i < N; i++) {
            var p = pts[i];
            var x1 = p.x * cy - p.z * sy, z1 = p.x * sy + p.z * cy;
            var y1 = p.y * cx - z1 * sx, z2 = p.y * sx + z1 * cx;
            var pr = proj[i]; pr.p = p; pr.x = x1; pr.y = y1; pr.z = z2;
        }
        proj.sort(function (a, b) { return a.z - b.z; });   // back to front

        for (var j = 0; j < N; j++) {
            var o = proj[j], pt = o.p;
            var depth = (o.z + 1) / 2;                       // 0 back .. 1 front
            var px = CX + o.x * R, py = CY + o.y * R;
            var pulse = 0.5 + 0.5 * Math.sin(t * 0.0038 + pt.pulse);  // own small pulse
            var a = (0.10 + depth * 0.9) * (0.82 + 0.18 * pulse);

            // dim the quarter that sits behind the heading text (left)
            if (!mobile && px < W * 0.44) a *= Math.max(0.22, px / (W * 0.44));
            if (mobile && py > H * 0.60) a *= Math.max(0.25, 1 - (py - H * 0.60) / (H * 0.4));

            var sz = (mobile ? 3.0 : 4.0) * (0.55 + depth) * pt.base * (0.92 + 0.12 * pulse);

            if (pt.glyph) {
                ctx.fillStyle = "rgba(" + BLUE + "," + Math.min(1, a * 1.1) + ")";
                ctx.font = "700 " + (sz * 2.5).toFixed(1) + "px 'Courier New', ui-monospace, monospace";
                ctx.textAlign = "center"; ctx.textBaseline = "middle";
                ctx.fillText(pt.glyph, px, py);
            } else if (pt.hex) {
                hex(px, py, sz * 0.95, "rgba(" + BLUE + "," + a + ")");
            } else {
                ctx.beginPath(); ctx.arc(px, py, sz * 0.72, 0, 6.2832);
                ctx.fillStyle = "rgba(" + BLUE + "," + a + ")"; ctx.fill();
            }
        }
        if (running && !reduced) raf = requestAnimationFrame(draw);
    }

    function start() { if (!running) { running = true; raf = requestAnimationFrame(draw); } }
    function stop() { running = false; if (raf) cancelAnimationFrame(raf); raf = null; }

    canvas.addEventListener("mousemove", function (e) {
        var r = canvas.getBoundingClientRect();
        mouse.tx = (e.clientX - r.left) / r.width;
        mouse.ty = (e.clientY - r.top) / r.height;
        mouse.inside = true;
    });
    canvas.addEventListener("mouseleave", function () { mouse.tx = 0.5; mouse.ty = 0.5; mouse.inside = false; });
    window.addEventListener("resize", function () { mobile = window.innerWidth < 768; resize(); });
    resize();

    if (reduced) { draw(); return; }
    if ("IntersectionObserver" in window) {
        new IntersectionObserver(function (en) { en.forEach(function (e) { e.isIntersecting ? start() : stop(); }); }, { threshold: 0.02 }).observe(canvas);
    } else { start(); }
    document.addEventListener("visibilitychange", function () { document.hidden ? stop() : start(); });
})();
