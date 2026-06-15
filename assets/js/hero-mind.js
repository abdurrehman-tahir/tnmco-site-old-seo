/* T&M hero sphere — a slowly tumbling 3D globe of large particles: dots,
   hexagons, and some particles bearing the company glyphs (T & M C O + marks).
   Each particle pulses on its own; the whole globe rotates in 3D (front bright,
   back dim); the quarter behind the heading is dimmed. One blue hue throughout.
   Dependency-free canvas. Runs only while visible; reduced-motion = static. */
(function () {
    "use strict";
    var canvas = document.querySelector(".hero-sphere-canvas");
    if (!canvas) return;
    // Mobile uses the lightweight CSS bot instead — skip the heavy canvas entirely.
    if (window.matchMedia && window.matchMedia("(max-width: 767px)").matches) return;

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
        R = Math.min(W * 0.92, H) * (mobile ? 0.378 : 0.414);   // 10% smaller sphere
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


    /* Faded robotic AI "brain core" glowing inside the sphere (desktop only):
       radial glow + counter-rotating circuit rings + two brain lobes with
       folds + orbiting electrons + a pulsing nucleus. */
    function drawCore() {
        var cr = R * 0.27;
        var beat = 0.5 + 0.5 * Math.sin(t * 0.0022);
        var spin = t * 0.0006;
        ctx.save();
        ctx.translate(CX, CY);

        // inner glow
        var g = ctx.createRadialGradient(0, 0, 0, 0, 0, cr * 1.7);
        g.addColorStop(0, "rgba(130,205,255," + (0.20 + beat * 0.16) + ")");
        g.addColorStop(0.5, "rgba(40,140,255,0.09)");
        g.addColorStop(1, "rgba(40,140,255,0)");
        ctx.fillStyle = g;
        ctx.beginPath(); ctx.arc(0, 0, cr * 1.7, 0, 6.2832); ctx.fill();

        // counter-rotating circuit rings
        ctx.strokeStyle = "rgba(95,200,255,0.42)"; ctx.lineWidth = 1.3;
        ctx.setLineDash([4, 7]); ctx.lineDashOffset = -t * 0.02;
        ctx.beginPath(); ctx.arc(0, 0, cr, 0, 6.2832); ctx.stroke();
        ctx.lineDashOffset = t * 0.028;
        ctx.beginPath(); ctx.arc(0, 0, cr * 0.66, 0, 6.2832); ctx.stroke();
        ctx.setLineDash([]);

        // robotic brain: two lobes + folds, slowly breathing
        ctx.save();
        ctx.rotate(Math.sin(spin) * 0.08);
        ctx.strokeStyle = "rgba(160,220,255,0.5)"; ctx.lineWidth = 1.5;
        for (var lobe = -1; lobe <= 1; lobe += 2) {
            ctx.beginPath();
            ctx.ellipse(lobe * cr * 0.2, 0, cr * 0.34, cr * 0.52, 0, 0, 6.2832);
            ctx.stroke();
            for (var fold = 0; fold < 3; fold++) {        // gyri/circuit folds
                var fy = (-0.5 + fold * 0.5) * cr * 0.5;
                ctx.beginPath();
                ctx.moveTo(lobe * cr * 0.04, fy);
                ctx.quadraticCurveTo(lobe * cr * 0.32, fy + cr * 0.12, lobe * cr * 0.06, fy + cr * 0.28);
                ctx.strokeStyle = "rgba(150,215,255,0.32)";
                ctx.stroke();
            }
        }
        ctx.restore();

        // orbiting electrons (data packets) on an elliptical path
        for (var e = 0; e < 3; e++) {
            var ea = spin * 2.4 + e * 2.094;
            var ex = Math.cos(ea) * cr, ey = Math.sin(ea) * cr * 0.5;
            ctx.fillStyle = "rgba(175,230,255,0.85)";
            ctx.beginPath(); ctx.arc(ex, ey, 2.1, 0, 6.2832); ctx.fill();
        }

        // pulsing nucleus
        ctx.shadowColor = "rgba(95,205,255,0.95)"; ctx.shadowBlur = 16 + beat * 16;
        ctx.fillStyle = "rgba(215,242,255," + (0.6 + beat * 0.3) + ")";
        ctx.beginPath(); ctx.arc(0, 0, 3.4 + beat * 2, 0, 6.2832); ctx.fill();
        ctx.shadowBlur = 0;

        ctx.restore();
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
        if (!mobile) drawCore();

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
