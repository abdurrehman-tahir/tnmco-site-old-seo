<?php
$pageTitle       = 'Privacy & Cookies Policy | T&M Consultants';
$metaDescription = 'How T&M Consultants collects and uses personal data: contact form details, optional Google Analytics cookies, your rights, and how to reach us.';
$canonicalUrl    = 'https://tnmco.uk/privacy/';

$graph = [
    '@context' => 'https://schema.org',
    '@type'    => 'BreadcrumbList',
    'itemListElement' => [
        ['@type' => 'ListItem', 'position' => 1, 'name' => 'Home',                     'item' => 'https://tnmco.uk/'],
        ['@type' => 'ListItem', 'position' => 2, 'name' => 'Privacy & Cookies Policy', 'item' => 'https://tnmco.uk/privacy/'],
    ],
];
$jsonLd = '<script type="application/ld+json">' . "\n"
        . json_encode($graph, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE) . "\n"
        . '    </script>';

require dirname(__DIR__) . '/includes/head.php';
require dirname(__DIR__) . '/includes/header.php';
?>

        <main id="main">
            <section class="services inner-hero" style="padding-top: 140px; padding-bottom: 40px;">
                <div class="container page-hero" data-aos="fade-up">
                    <nav aria-label="breadcrumb" class="breadcrumb-nav" style="margin-bottom: 20px;">
                        <a href="/">Home</a>
                        <span style="color:#adb5bd;"> / </span>
                        <span style="color:#6c757d;">Privacy &amp; Cookies Policy</span>
                    </nav>
                    <h1 style="margin-bottom:6px;">Privacy &amp; Cookies Policy — T&amp;M Consultants</h1>
                    <p class="lead-sub" style="font-style:italic;">Last updated: June 2026</p>
                </div>
            </section>

            <section style="padding: 45px 0 60px;">
                <div class="container" style="max-width: 860px;">
                    <p style="color:#495057; line-height:1.75;">
                        T&amp;M Consultants ("we"), registered in England and Wales (Company No. 12621485), 49 Eglinton Rd, London SE18 3SL, operates tnmco.uk.
                    </p>

                    <h2 style="color:#282646; font-weight:700; font-size:20px; margin:28px 0 10px;">What we collect.</h2>
                    <p style="color:#495057; line-height:1.75;">
                        (1) Information you submit via our contact form or booking page: name, email address, and your message — used solely to respond to your inquiry. Lawful basis: legitimate interest. (2) Anonymous usage analytics via Google Analytics, only if you accept analytics cookies. Lawful basis: consent.
                    </p>

                    <h2 style="color:#282646; font-weight:700; font-size:20px; margin:28px 0 10px;">What we don't do.</h2>
                    <p style="color:#495057; line-height:1.75;">
                        We don't sell or share your data, run advertising cookies, or send marketing emails without your explicit consent.
                    </p>

                    <h2 style="color:#282646; font-weight:700; font-size:20px; margin:28px 0 10px;">Retention.</h2>
                    <p style="color:#495057; line-height:1.75;">
                        Contact inquiries are kept up to 24 months, then deleted. Analytics data follows Google Analytics' standard retention (14 months).
                    </p>

                    <h2 style="color:#282646; font-weight:700; font-size:20px; margin:28px 0 10px;">Processors.</h2>
                    <p style="color:#495057; line-height:1.75;">
                        Google (Analytics), our hosting provider, and Cal.com (if you book a call). Each processes data under their own GDPR terms.
                    </p>

                    <h2 style="color:#282646; font-weight:700; font-size:20px; margin:28px 0 10px;">Your rights.</h2>
                    <p style="color:#495057; line-height:1.75;">
                        You may request access, correction, or deletion of your personal data, or withdraw consent at any time: email info@tnmco.uk. You may also complain to the UK Information Commissioner's Office (ico.org.uk).
                    </p>

                    <h2 style="color:#282646; font-weight:700; font-size:20px; margin:28px 0 10px;">Cookies.</h2>
                    <p style="color:#495057; line-height:1.75;">
                        One optional cookie category (Google Analytics). Manage your choice via the cookie banner or the "Cookie settings" link in the footer.
                    </p>

                    <div class="mt-4">
                        <a href="#" class="service-proof proof-chip-link cookie-settings-link">Cookie settings <span class="arw">&rarr;</span></a>
                    </div>
                </div>
            </section>
        </main>

<?php require dirname(__DIR__) . '/includes/footer.php'; ?>
