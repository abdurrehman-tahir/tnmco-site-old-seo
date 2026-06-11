<?php
$pageTitle       = 'Live AI Demos — VIOLET & BiteBot | T&M Consultants';
$metaDescription = 'Try T&M\'s live AI assistants: VIOLET for clinics and BiteBot for restaurants — working demos, not mockups.';
$canonicalUrl    = 'https://tnmco.uk/demos/';

$graph = [
    '@context' => 'https://schema.org',
    '@type'    => 'BreadcrumbList',
    'itemListElement' => [
        ['@type' => 'ListItem', 'position' => 1, 'name' => 'Home',  'item' => 'https://tnmco.uk/'],
        ['@type' => 'ListItem', 'position' => 2, 'name' => 'Demos', 'item' => 'https://tnmco.uk/demos/'],
    ],
];
$jsonLd = '<script type="application/ld+json">' . "\n"
        . json_encode($graph, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE) . "\n"
        . '    </script>';

require dirname(__DIR__) . '/includes/head.php';
require dirname(__DIR__) . '/includes/header.php';
?>

        <main id="main">
            <section class="services" style="padding-top: 140px; padding-bottom: 60px;">
                <div class="container" data-aos="fade-up">
                    <h1 style="color:#282646; font-weight:700; margin-bottom:14px;">Live AI Demos — VIOLET &amp; BiteBot</h1>
                    <p style="color:#495057; line-height:1.7; font-size:18px; max-width:780px;">Try T&M's live AI assistants: VIOLET for clinics and BiteBot for restaurants — working demos, not mockups.</p>

                    <div class="row mt-4">
                        <div class="col-md-6 mb-4">
                            <div style="background:#fff; border-radius:8px; padding:26px; box-shadow:0 2px 12px rgba(0,0,0,0.06); height:100%;">
                                <h3 style="font-weight:700; color:#282646; font-size:22px;">VIOLET — Clinic AI Assistant</h3>
                                <a href="https://ai.assistant.tnmco.uk/" target="_blank" rel="noopener noreferrer" class="btn btn-primary mt-3" style="background-color:#1bb1dc; border-color:#1bb1dc; font-weight:600;">Open VIOLET <i class="fas fa-external-link-alt ml-1"></i></a>
                            </div>
                        </div>
                        <div class="col-md-6 mb-4">
                            <div style="background:#fff; border-radius:8px; padding:26px; box-shadow:0 2px 12px rgba(0,0,0,0.06); height:100%;">
                                <h3 style="font-weight:700; color:#282646; font-size:22px;">BiteBot — Restaurant AI Assistant</h3>
                                <a href="https://bitebot.tnmco.uk/" target="_blank" rel="noopener noreferrer" class="btn btn-primary mt-3" style="background-color:#1bb1dc; border-color:#1bb1dc; font-weight:600;">Open BiteBot <i class="fas fa-external-link-alt ml-1"></i></a>
                            </div>
                        </div>
                    </div>

                    <div class="text-center mt-3">
                        <a href="/contact/" class="btn btn-primary" style="background-color: #1bb1dc; border-color: #1bb1dc; font-weight: 600; padding: 10px 24px;"><i class="fas fa-calendar-check mr-2"></i> Book a build like this</a>
                    </div>
                </div>
            </section>
        </main>

<?php require dirname(__DIR__) . '/includes/footer.php'; ?>
