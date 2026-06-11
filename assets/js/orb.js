/* T&M living orb — dependency-free canvas particle sphere.
   - Lazy: only animates while the orb is in the viewport (IntersectionObserver).
   - Stops the RAF loop when scrolled past, so it never burns CPU off-screen.
   - Respects prefers-reduced-motion (skips entirely; CSS gradient shows instead).
   Self-guards: does nothing if no .orb-canvas exists on the page. */
(function () {
    "use strict";
    if (window.matchMedia && window.matchMedia("(prefers-reduced-motion: reduce)").matches) return;

    var canvases = document.querySelectorAll(".about-orb .orb-canvas");
    if (!canvases.length) return;

    function initOrb(canvas) {
        var ctx = canvas.getContext("2d");
        var dpr = Math.min(window.devicePixelRatio || 1, 2);
        var W = 0, H = 0, R = 0, cx = 0, cy = 0;
        var mouse = { x: 0, y: 0, active: false };
        var raf = null, running = false, angle = 0;

        // particle count scales down on small screens
        var N = window.innerWidth < 576 ? 380 : (window.innerWidth < 992 ? 600 : 820);
        var pts = [];
        for (var i = 0; i < N; i++) {
            // even distribution on a sphere (fibonacci)
            var phi = Math.acos(1 - 2 * (i + 0.5) / N);
            var theta = Math.PI * (1 + Math.sqrt(5)) * i;
            pts.push({
                x: Math.sin(phi) * Math.cos(theta),
                y: Math.sin(phi) * Math.sin(theta),
                z: Math.cos(phi)
            });
        }

        function resize() {
            var rect = canvas.getBoundingClientRect();
            W = Math.max(1, rect.width); H = Math.max(1, rect.height);
            canvas.width = W * dpr; canvas.height = H * dpr;
            ctx.setTransform(dpr, 0, 0, dpr, 0, 0);
            R = Math.min(W, H) * 0.42; cx = W / 2; cy = H / 2;
        }

        function lerp(a, b, t) { return a + (b - a) * t; }

        function draw() {
            ctx.clearRect(0, 0, W, H);
            angle += 0.0024;
            var sin = Math.sin(angle), cos = Math.cos(angle);
            for (var i = 0; i < N; i++) {
                var p = pts[i];
                // rotate around Y axis
                var x = p.x * cos - p.z * sin;
                var z = p.x * sin + p.z * cos;
                var y = p.y;
                var depth = (z + 1) / 2;                 // 0 back .. 1 front
                var scale = lerp(0.55, 1.25, depth);
                var px = cx + x * R, py = cy + y * R;

                // gentle cursor repulsion
                if (mouse.active) {
                    var dx = px - mouse.x, dy = py - mouse.y;
                    var d2 = dx * dx + dy * dy;
                    if (d2 < 9000) {
                        var f = (9000 - d2) / 9000 * 14;
                        var d = Math.sqrt(d2) || 1;
                        px += dx / d * f; py += dy / d * f;
                    }
                }

                var size = scale * 2.6;
                var alpha = 0.30 + depth * 0.62;
                // violet (back) -> cyan (front), deeper tones for light backgrounds
                var r = Math.round(lerp(111, 21, depth));
                var g = Math.round(lerp(66, 160, depth));
                var b = Math.round(lerp(193, 210, depth));
                ctx.fillStyle = "rgba(" + r + "," + g + "," + b + "," + alpha + ")";
                ctx.fillRect(px - size / 2, py - size / 2, size, size);
            }
            if (running) raf = requestAnimationFrame(draw);
        }

        function start() { if (!running) { running = true; raf = requestAnimationFrame(draw); } }
        function stop() { running = false; if (raf) cancelAnimationFrame(raf); raf = null; }

        canvas.addEventListener("mousemove", function (e) {
            var rect = canvas.getBoundingClientRect();
            mouse.x = e.clientX - rect.left; mouse.y = e.clientY - rect.top; mouse.active = true;
        });
        canvas.addEventListener("mouseleave", function () { mouse.active = false; });
        window.addEventListener("resize", resize);
        resize();

        // only run while visible
        if ("IntersectionObserver" in window) {
            var io = new IntersectionObserver(function (entries) {
                entries.forEach(function (en) { en.isIntersecting ? start() : stop(); });
            }, { threshold: 0.05 });
            io.observe(canvas);
        } else {
            start();
        }
        document.addEventListener("visibilitychange", function () {
            document.hidden ? stop() : start();
        });
    }

    canvases.forEach(initOrb);
})();
