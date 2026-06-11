/* AJAX contact form: stays on the page, blocks the button with a spinner
   while sending, and shows the design-system toast on success/failure.
   Falls back to a normal POST (mail.php redirect) if JS is disabled. */
(function () {
    "use strict";

    function showToast(ok) {
        var existing = document.getElementById("tnmToast");
        if (existing) existing.remove();

        var toast = document.createElement("div");
        toast.className = "tnm-toast " + (ok ? "is-success" : "is-error");
        toast.id = "tnmToast";
        toast.setAttribute("role", "status");
        toast.setAttribute("aria-live", "polite");
        toast.innerHTML =
            '<i class="fas ' + (ok ? "fa-check-circle" : "fa-exclamation-circle") + '"></i>' +
            '<div class="toast-copy"><strong>' + (ok ? "Message sent!" : "Message not sent") + "</strong>" +
            "<p>" + (ok
                ? "Thank you for contacting T&amp;M. We have received your query and will be in touch shortly."
                : "Something went wrong on our end. Please email us directly at info@tnmco.uk.") + "</p></div>" +
            '<button type="button" class="toast-close" aria-label="Close">&times;</button>';
        document.body.appendChild(toast);

        toast.querySelector(".toast-close").addEventListener("click", function () { toast.classList.add("hide"); });
        setTimeout(function () { toast.classList.add("hide"); }, 8000);
    }

    document.querySelectorAll("form.php-email-form").forEach(function (form) {
        form.addEventListener("submit", function (e) {
            e.preventDefault();
            var btn = form.querySelector('button[type="submit"]');
            if (!btn || btn.disabled) return;

            var original = btn.innerHTML;
            btn.disabled = true;
            btn.innerHTML = '<i class="fas fa-spinner fa-spin" style="margin-right:8px;"></i> Sending…';

            fetch(form.getAttribute("action"), {
                method: "POST",
                body: new FormData(form),
                headers: { "X-Requested-With": "fetch" }
            })
                .then(function (r) { return r.json(); })
                .then(function (data) {
                    showToast(!!data.ok);
                    if (data.ok) form.reset();
                })
                .catch(function () { showToast(false); })
                .finally(function () {
                    btn.disabled = false;
                    btn.innerHTML = original;
                });
        });
    });
})();
