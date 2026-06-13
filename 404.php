<?php
http_response_code(404);
$pageTitle       = 'Page Not Found | T&M Consultants';
$metaDescription = 'The page you are looking for could not be found. Explore T&M Consultants\' AI services, case studies and live demos.';
$canonicalUrl    = 'https://tnmco.uk/';

require __DIR__ . '/includes/head.php';
require __DIR__ . '/includes/header.php';
?>

        <main id="main">
            <section class="services inner-hero" style="padding-top: 160px; padding-bottom: 90px;">
                <div class="container text-center page-hero" data-aos="fade-up">
                    <h1 style="font-size:64px; margin-bottom:8px;">404</h1>
                    <p class="lead-sub" style="margin:0 auto 24px;">That page doesn't exist (or has moved in our site restructure).</p>
                    <div class="btn-row" style="justify-content:center;">
                        <a href="/" class="btn-tnm"><i class="fas fa-home mr-2"></i> Go to Homepage</a>
                        <a href="/case-studies/" class="btn-tnm-ghost"><i class="fas fa-file-alt mr-2"></i> Case Studies</a>
                        <a href="/contact/" class="btn-tnm-ghost"><i class="fas fa-envelope mr-2"></i> Contact</a>
                    </div>
                </div>
            </section>
        </main>

<?php require __DIR__ . '/includes/footer.php'; ?>
