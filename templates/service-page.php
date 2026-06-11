<?php
/**
 * Reusable service page template.
 * Each /services/<slug>/index.php sets $slug, requires ../data.php, then this file.
 * Pulls "proof" case studies from /case-studies/data.php (no DB).
 */
if (!isset($slug) || !isset($SERVICES[$slug])) {
    http_response_code(404);
    echo 'Service not found.';
    return;
}
$sv      = $SERVICES[$slug];
$pageUrl = 'https://tnmco.uk/services/' . $slug . '/';

require dirname(__DIR__) . '/case-studies/data.php';   // provides $CASE_STUDIES for proof cards

/* ---- Service JSON-LD (section 3.2) via json_encode = always valid JSON ---- */
$graph = [
    '@context'    => 'https://schema.org',
    '@type'       => 'Service',
    'name'        => $sv['schema_name'],
    'serviceType' => $sv['schema_service_type'],
    'url'         => $pageUrl,
    'provider'    => ['@id' => 'https://tnmco.uk/#org'],
    'areaServed'  => ['GB', 'US', 'PK', 'AE'],
    'description' => $sv['schema_description'],
];
$jsonLd = '<script type="application/ld+json">' . "\n"
        . json_encode($graph, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE) . "\n"
        . '    </script>';

/* ---- Head variables ---- */
$pageTitle       = $sv['title'];
$metaDescription = $sv['meta'];
$canonicalUrl    = $pageUrl;

require dirname(__DIR__) . '/includes/head.php';
require dirname(__DIR__) . '/includes/header.php';
?>

        <main id="main">
            <section class="services inner-hero" style="padding-top: 140px; padding-bottom: 55px;">
                <div class="container page-hero" data-aos="fade-up">
                    <?php tnm_motif($sv['motif']); ?>

                    <!-- Breadcrumb -->
                    <nav aria-label="breadcrumb" class="breadcrumb-nav" style="margin-bottom: 20px;">
                        <a href="/">Home</a>
                        <span style="color:#adb5bd;"> / </span>
                        <a href="/services/">Services</a>
                        <span style="color:#adb5bd;"> / </span>
                        <span style="color:#6c757d;"><?php echo $sv['schema_name']; ?></span>
                    </nav>

                    <h1 style="color:#282646; font-weight:700; margin-bottom:16px;"><?php echo $sv['h1']; ?></h1>
                    <p class="lead-sub" style="max-width:700px;"><?php echo $sv['lead']; ?></p>

                    <ul class="service-hero-bullets">
                        <?php foreach ($sv['bullets'] as $b): ?>
                        <li><?php echo htmlspecialchars($b); ?></li>
                        <?php endforeach; ?>
                    </ul>

                    <div class="btn-row mt-4 mb-2">
                        <a href="https://cal.com/tnm-co" target="_blank" rel="noopener noreferrer" class="btn-tnm"><i class="fas fa-calendar-check mr-2"></i> Book a Call</a>
                        <?php if (!empty($sv['show_demos'])): ?>
                        <a href="/demos/" class="btn-tnm-ghost"><i class="fas fa-play-circle mr-2"></i> Try a Live Demo</a>
                        <?php else: ?>
                        <a href="<?php echo $sv['proof_url']; ?>" class="btn-tnm-ghost"><i class="fas fa-file-alt mr-2"></i> See the Proof</a>
                        <?php endif; ?>
                    </div>
                </div>
            </section>

            <?php if (!empty($sv['show_demos'])): ?>
            <!-- Live demos callout (same demo-card component as /demos/) -->
            <section class="section-bg" style="padding: 45px 0;">
                <div class="container" data-aos="fade-up">
                    <h2 style="color:#282646; font-weight:700; font-size:24px; margin-bottom:20px;">Live Demos</h2>
                    <div class="row">
                        <div class="col-md-6 mb-3">
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
                        <div class="col-md-6 mb-3">
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
            <?php endif; ?>

            <!-- Proof: the case studies named for this service -->
            <section class="portfolio" style="padding: 45px 0 60px;">
                <div class="container" data-aos="fade-up">
                    <h2 style="color:#282646; font-weight:700; font-size:24px; margin-bottom:22px;">Proof</h2>
                    <div class="row">
                        <?php foreach ($sv['proof'] as $csSlug):
                            if (!isset($CASE_STUDIES[$csSlug])) { continue; }
                            $cs = $CASE_STUDIES[$csSlug];
                        ?>
                        <div class="col-lg-4 col-md-6 mb-4">
                            <div class="portfolio-wrap" style="background-color: #ececec; text-align:center; padding:20px; height:100%;">
                                <a href="/case-studies/<?php echo $csSlug; ?>/">
                                    <img src="<?php echo $cs['image']; ?>" class="img-fluid" alt="<?php echo $cs['image_alt']; ?>" loading="lazy" style="max-height:180px; width:auto; margin:0 auto;">
                                </a>
                                <div class="portfolio-info">
                                    <h4 style="margin-top:12px;"><a href="/case-studies/<?php echo $csSlug; ?>/"><?php echo $cs['name']; ?></a></h4>
                                    <a href="/case-studies/<?php echo $csSlug; ?>/" class="link-details" title="View Case Study"><i class="fas fa-file-alt"></i></a>
                                </div>
                            </div>
                        </div>
                        <?php endforeach; ?>
                    </div>
                    <div class="mt-2">
                        <a href="/case-studies/" class="service-proof proof-chip-link">See all case studies <span class="arw">&rarr;</span></a>
                    </div>
                </div>
            </section>
        </main>

<?php require dirname(__DIR__) . '/includes/footer.php'; ?>
