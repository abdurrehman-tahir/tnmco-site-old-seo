/* Minimal GA4 cookie consent (Google Consent Mode v2).
   Default is denied (set inline before gtag config). This banner records the
   visitor's choice in localStorage and updates consent on accept/decline.
   Any element with class "cookie-settings-link" re-opens the banner so the
   choice can be changed at any time (promised in the privacy policy). */
(function () {
    "use strict";
    var KEY = "tnm-consent";
    var banner = document.getElementById("consentBanner");
    if (!banner) return;

    function show() { banner.classList.add("show"); }

    function choose(value) {
        localStorage.setItem(KEY, value);
        banner.classList.remove("show");
        if (typeof gtag === "function") {
            gtag("consent", "update", { analytics_storage: value === "granted" ? "granted" : "denied" });
        }
    }

    document.getElementById("consentAccept").addEventListener("click", function () { choose("granted"); });
    document.getElementById("consentDecline").addEventListener("click", function () { choose("denied"); });

    // First visit (no stored choice): show the banner
    if (!localStorage.getItem(KEY)) show();

    // "Cookie settings" links re-open the banner to change the choice
    document.querySelectorAll(".cookie-settings-link").forEach(function (el) {
        el.addEventListener("click", function (e) { e.preventDefault(); show(); });
    });
})();
