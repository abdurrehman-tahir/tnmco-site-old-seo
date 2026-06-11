/* Minimal GA4 cookie consent (Google Consent Mode v2).
   Default is denied (set inline before gtag config). This banner records the
   visitor's choice in localStorage and updates consent on accept. */
(function () {
    "use strict";
    var KEY = "tnm-consent";
    var banner = document.getElementById("consentBanner");
    if (!banner || localStorage.getItem(KEY)) return;

    banner.classList.add("show");

    function choose(value) {
        localStorage.setItem(KEY, value);
        banner.classList.remove("show");
        if (value === "granted" && typeof gtag === "function") {
            gtag("consent", "update", { analytics_storage: "granted" });
        }
    }
    document.getElementById("consentAccept").addEventListener("click", function () { choose("granted"); });
    document.getElementById("consentDecline").addEventListener("click", function () { choose("denied"); });
})();
