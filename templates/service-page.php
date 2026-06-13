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

/* ---- Service + FAQPage JSON-LD via json_encode = always valid JSON.
        FAQ schema text equals the visible on-page answer text (Google requirement). ---- */
$faqSchema = [
    '@type'      => 'FAQPage',
    'mainEntity' => array_map(function ($f) {
        return [
            '@type'          => 'Question',
            'name'           => $f['q'],
            'acceptedAnswer' => ['@type' => 'Answer', 'text' => $f['a']],
        ];
    }, $sv['faq']),
];
$graph = [
    '@context' => 'https://schema.org',
    '@graph'   => [
        [
            '@type'       => 'Service',
            'name'        => $sv['schema_name'],
            'serviceType' => $sv['schema_service_type'],
            'url'         => $pageUrl,
            'provider'    => ['@id' => 'https://tnmco.uk/#org'],
            'areaServed'  => ['GB', 'US', 'PK', 'AE'],
            'description' => $sv['schema_description'],
        ],
        $faqSchema,
    ],
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

            <!-- Authority: intro -->
            <section style="padding: 50px 0 30px;">
                <div class="container" data-aos="fade-up">
                    <h2 class="auth-h2"><?php echo $sv['intro_h2']; ?></h2>
                    <?php foreach ($sv['intro'] as $p): ?>
                    <p class="auth-p"><?php echo $p; ?></p>
                    <?php endforeach; ?>
                </div>
            </section>

            <!-- Authority: proof cards -->
            <section class="section-bg" style="padding: 45px 0;">
                <div class="container" data-aos="fade-up">
                    <h2 class="auth-h2"><?php echo $sv['proof_h2']; ?></h2>
                    <div class="row">
                        <?php foreach ($sv['proof_cards'] as $card): ?>
                        <div class="col-md-6 col-lg-4 mb-4 d-flex">
                            <a href="<?php echo $card['url']; ?>" class="auth-card">
                                <?php if ($card['title'] !== ''): ?>
                                <h3><?php echo $card['title']; ?></h3>
                                <?php endif; ?>
                                <p><?php echo $card['text']; ?></p>
                                <span class="view-cs">Read more <span class="arw">&rarr;</span></span>
                            </a>
                        </div>
                        <?php endforeach; ?>
                    </div>
                    <a href="/case-studies/" class="service-proof proof-chip-link">See all case studies <span class="arw">&rarr;</span></a>
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
                                <div class="demo-media violet">
                                    <img src="/assets/img/demos/violet.webp" alt="VIOLET clinic AI assistant — live demo launch screen" loading="lazy" width="916" height="754">
                                    <div class="demo-media-overlay">
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
                                <div class="demo-media bitebot">
                                    <img src="/assets/img/demos/bitebot.webp" alt="BiteBot restaurant AI assistant — live demo launch screen" loading="lazy" width="916" height="754">
                                    <div class="demo-media-overlay">
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

            <!-- Authority: how we work -->
            <section style="padding: 50px 0 30px;">
                <div class="container" data-aos="fade-up">
                    <h2 class="auth-h2"><?php echo $sv['how_h2']; ?></h2>
                    <?php foreach ($sv['how'] as $p): ?>
                    <p class="auth-p"><?php echo $p; ?></p>
                    <?php endforeach; ?>
                </div>
            </section>

            <!-- Authority: opinion -->
            <section style="padding: 20px 0 40px;">
                <div class="container" data-aos="fade-up">
                    <div class="auth-opinion">
                        <h2 class="auth-h2"><?php echo $sv['opinion_h2']; ?></h2>
                        <?php foreach ($sv['opinion'] as $p): ?>
                        <p class="auth-p" style="margin-bottom:0;"><?php echo $p; ?></p>
                        <?php endforeach; ?>
                    </div>
                </div>
            </section>

            <!-- Authority: FAQ (schema mirrors this text exactly) -->
            <section class="section-bg" style="padding: 45px 0 50px;">
                <div class="container" data-aos="fade-up">
                    <h2 class="auth-h2">Straight answers</h2>
                    <?php foreach ($sv['faq'] as $f): ?>
                    <div class="auth-faq-item">
                        <h3><?php echo $f['q']; ?></h3>
                        <p><?php echo $f['a']; ?></p>
                    </div>
                    <?php endforeach; ?>
                </div>
            </section>

            <!-- Authority: CTA -->
            <section style="padding: 45px 0 55px;">
                <div class="container text-center" data-aos="fade-up">
                    <div class="btn-row" style="justify-content:center;">
                        <?php foreach ($sv['cta'] as $i => $c):
                            $ext = strpos($c['url'], 'http') === 0;
                            $cls = (count($sv['cta']) > 1 && $i === 0) ? 'btn-tnm-ghost' : 'btn-tnm';
                        ?>
                        <a href="<?php echo $c['url']; ?>"<?php echo $ext ? ' target="_blank" rel="noopener noreferrer"' : ''; ?> class="<?php echo $cls; ?>"><?php echo $c['label']; ?> <i class="fas fa-arrow-right ml-1"></i></a>
                        <?php endforeach; ?>
                    </div>
                </div>
            </section>
        </main>

<?php require dirname(__DIR__) . '/includes/footer.php'; ?>
