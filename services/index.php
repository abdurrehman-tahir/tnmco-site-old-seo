<?php
require __DIR__ . '/data.php';

$pageTitle       = 'Services — AI Agents, Automation, Fractional CTO & Delivery | T&M Consultants';
$metaDescription = 'UK-registered AI consultancy building voice agents, RAG systems and automation — with Fractional CTO and full product delivery. 10+ years, 29+ projects shipped.';
$canonicalUrl    = 'https://tnmco.uk/services/';

$graph = [
    '@context' => 'https://schema.org',
    '@type'    => 'BreadcrumbList',
    'itemListElement' => [
        ['@type' => 'ListItem', 'position' => 1, 'name' => 'Home',     'item' => 'https://tnmco.uk/'],
        ['@type' => 'ListItem', 'position' => 2, 'name' => 'Services', 'item' => 'https://tnmco.uk/services/'],
    ],
];
$jsonLd = '<script type="application/ld+json">' . "\n"
        . json_encode($graph, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE) . "\n"
        . '    </script>';

require dirname(__DIR__) . '/includes/head.php';
require dirname(__DIR__) . '/includes/header.php';
?>

        <main id="main">
            <section class="services inner-hero" style="padding-top: 140px; padding-bottom: 60px;">
                <div class="container page-hero" data-aos="fade-up">
                    <?php tnm_motif('nodes'); ?>
                    <header class="section-header">
                        <div class="section-title">
                            <span>Services</span>
                            <h1>Services</h1>
                        </div>
                        <p class="services-subline">AI-first consulting and delivery — proven on production systems, not slideware.</p>
                    </header>

                    <div class="row services-grid">
                        <?php foreach ($SERVICES as $slug => $sv): ?>
                        <div class="col-lg-6 mb-4" data-aos="fade-up" data-aos-delay="100">
                            <div class="service-card-wrap">
                                <a href="/services/<?php echo $slug; ?>/" class="box service-card">
                                    <div class="icon" style="background:<?php echo $sv['icon_bg']; ?>;"><i class="<?php echo $sv['icon']; ?>" style="color:<?php echo $sv['icon_color']; ?>;"></i></div>
                                    <h4 class="title"><?php echo $sv['schema_name']; ?></h4>
                                    <p class="service-lead"><?php echo $sv['lead']; ?></p>
                                    <ul class="service-bullets">
                                        <?php foreach ($sv['bullets'] as $b): ?>
                                        <li><?php echo htmlspecialchars($b); ?></li>
                                        <?php endforeach; ?>
                                    </ul>
                                </a>
                                <a href="<?php echo $sv['proof_url']; ?>" class="service-proof"><?php echo $sv['proof_text']; ?> <span class="arw">&rarr;</span></a>
                            </div>
                        </div>
                        <?php endforeach; ?>
                    </div>

                    <div class="text-center mt-3">
                        <a href="https://cal.com/tnm-co" target="_blank" rel="noopener noreferrer" class="btn-tnm"><i class="fas fa-calendar-check mr-2"></i> Book a Call</a>
                    </div>
                </div>
            </section>
        </main>

<?php require dirname(__DIR__) . '/includes/footer.php'; ?>
