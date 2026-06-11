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
            <section class="services inner-hero" style="padding-top: 140px; padding-bottom: 55px;">
                <div class="container page-hero" data-aos="fade-up">
                    <?php tnm_motif('dots'); ?>

                    <nav aria-label="breadcrumb" class="breadcrumb-nav" style="margin-bottom: 20px;">
                        <a href="/">Home</a>
                        <span style="color:#adb5bd;"> / </span>
                        <span style="color:#6c757d;">Demos</span>
                    </nav>

                    <h1 style="margin-bottom:16px;">Live AI Demos — VIOLET &amp; BiteBot</h1>
                    <p class="lead-sub">Try T&M's live AI assistants: VIOLET for clinics and BiteBot for restaurants — working demos, not mockups.</p>
                </div>
            </section>

            <section style="padding: 55px 0 30px;">
                <div class="container">
                    <div class="row">
                        <div class="col-md-6 mb-4" data-aos="fade-up" data-aos-delay="100">
                            <div class="demo-card">
                                <div class="demo-banner violet">
                                    <div class="demo-icon"><i class="fas fa-stethoscope"></i></div>
                                    <div>
                                        <h3>VIOLET</h3>
                                        <span class="demo-tag">Clinic AI Assistant</span>
                                    </div>
                                </div>
                                <div class="demo-body">
                                    <span class="demo-live-dot mb-3">Live Demo</span>
                                    <p>A working AI assistant for clinics — open it in your browser and try it for yourself.</p>
                                    <a href="https://ai.assistant.tnmco.uk/" target="_blank" rel="noopener noreferrer" class="btn-tnm">Open VIOLET <i class="fas fa-external-link-alt ml-1"></i></a>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 mb-4" data-aos="fade-up" data-aos-delay="150">
                            <div class="demo-card">
                                <div class="demo-banner bitebot">
                                    <div class="demo-icon"><i class="fas fa-utensils"></i></div>
                                    <div>
                                        <h3>BiteBot</h3>
                                        <span class="demo-tag">Restaurant AI Assistant</span>
                                    </div>
                                </div>
                                <div class="demo-body">
                                    <span class="demo-live-dot mb-3">Live Demo</span>
                                    <p>A working AI assistant for restaurants — open it in your browser and try it for yourself.</p>
                                    <a href="https://bitebot.tnmco.uk/" target="_blank" rel="noopener noreferrer" class="btn-tnm">Open BiteBot <i class="fas fa-external-link-alt ml-1"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <section class="section-bg" style="padding: 45px 0;">
                <div class="container text-center" data-aos="fade-up">
                    <h2 style="color:#282646; font-weight:700; font-size:24px; margin-bottom:8px;">Want one of these for your business?</h2>
                    <p style="color:#495057; margin-bottom:20px;">These demos are built, integrated and maintained by T&M — the same way we'd build yours.</p>
                    <div class="btn-row justify-content-center" style="justify-content:center;">
                        <a href="https://cal.com/tnm-co" target="_blank" rel="noopener noreferrer" class="btn-tnm"><i class="fas fa-calendar-check mr-2"></i> Book a build like this</a>
                        <a href="/services/ai-agents/" class="btn-tnm-ghost"><i class="fas fa-robot mr-2"></i> AI Agents Service</a>
                    </div>
                </div>
            </section>
        </main>

<?php require dirname(__DIR__) . '/includes/footer.php'; ?>
