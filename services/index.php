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
            <section class="services" style="padding-top: 140px; padding-bottom: 60px;">
                <div class="container" data-aos="fade-up">
                    <header class="section-header">
                        <div class="section-title">
                            <span>Services</span>
                            <h2>Services</h2>
                        </div>
                    </header>
                    <div class="row">
                        <?php foreach ($SERVICES as $slug => $sv): ?>
                        <div class="col-md-6 mb-4">
                            <div class="box" style="height:100%;">
                                <h4 class="title"><a href="/services/<?php echo $slug; ?>/" style="color:#282646;"><?php echo $sv['schema_name']; ?></a></h4>
                                <p class="description" style="text-align:justify;"><?php echo $sv['meta']; ?></p>
                                <a href="/services/<?php echo $slug; ?>/" style="color:#1bb1dc; font-weight:600;">Learn more →</a>
                            </div>
                        </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            </section>
        </main>

<?php require dirname(__DIR__) . '/includes/footer.php'; ?>
