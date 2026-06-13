<?php
require __DIR__ . '/data.php';

$pageTitle       = 'Case Studies — AI, Web & Product Delivery | T&M Consultants';
$metaDescription = 'Real projects with real metrics: AI education platforms, medical CV models, voice agents, fintech and Web3 — see how T&M delivers.';
$canonicalUrl    = 'https://tnmco.uk/case-studies/';

$graph = [
    '@context' => 'https://schema.org',
    '@type'    => 'BreadcrumbList',
    'itemListElement' => [
        ['@type' => 'ListItem', 'position' => 1, 'name' => 'Home',         'item' => 'https://tnmco.uk/'],
        ['@type' => 'ListItem', 'position' => 2, 'name' => 'Case Studies', 'item' => 'https://tnmco.uk/case-studies/'],
    ],
];
$jsonLd = '<script type="application/ld+json">' . "\n"
        . json_encode($graph, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE) . "\n"
        . '    </script>';

require dirname(__DIR__) . '/includes/head.php';
require dirname(__DIR__) . '/includes/header.php';
?>

        <main id="main">
            <section id="portfolio" class="portfolio" style="padding-top: 140px; padding-bottom: 60px;">
                <div class="container page-hero" data-aos="fade-up">
                    <?php tnm_motif('shared'); ?>
                    <header class="section-header">
                        <div class="section-title">
                            <span>Case Studies</span>
                            <h1>Proof, Not Promises</h1>
                        </div>
                    </header>

                    <div class="row" data-aos="fade-up" data-aos-delay="100">
                        <div class="col-lg-12">
                            <ul id="portfolio-flters">
                                <li data-filter="*" class="filter-active">All</li>
                                <li data-filter=".filter-AI">AI</li>
                                <li data-filter=".filter-Web">Web</li>
                                <li data-filter=".filter-App">App</li>
                                <li data-filter=".filter-Web3">Web3</li>
                                <li data-filter=".filter-E-commerce">E-commerce</li>
                            </ul>
                        </div>
                    </div>

                    <div class="row portfolio-container" data-aos="fade-up" data-aos-delay="200">
                        <?php foreach ($CASE_STUDIES as $slug => $cs):
                            $filterClasses = implode(' ', array_map(function ($t) { return 'filter-' . $t; }, $cs['tags']));
                            $primaryTag = $cs['tags'][0];
                        ?>
                        <div class="col-lg-4 col-md-6 portfolio-item <?php echo $filterClasses; ?>">
                            <div class="portfolio-wrap" style="background-color: #ececec; text-align:center; padding:20px;">
                                <a href="/case-studies/<?php echo $slug; ?>/">
                                    <img src="<?php echo $cs['image']; ?>" class="img-fluid" alt="<?php echo $cs['image_alt']; ?>" loading="lazy" style="max-height:220px; width:auto; margin:0 auto;">
                                </a>
                                <div class="portfolio-info">
                                    <h4><a href="/case-studies/<?php echo $slug; ?>/"><?php echo $cs['name']; ?></a></h4>
                                    <p><?php echo $primaryTag; ?></p>
                                    <div>
                                        <a href="/case-studies/<?php echo $slug; ?>/" class="link-details" title="View Case Study"><i class="fas fa-file-alt"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php endforeach; ?>
                    </div>

                    <div class="text-center mt-4">
                        <a href="https://cal.com/tnm-co" target="_blank" rel="noopener noreferrer" class="btn-tnm"><i class="fas fa-calendar-check mr-2"></i> Book a Call</a>
                    </div>
                </div>
            </section>
        </main>

<?php require dirname(__DIR__) . '/includes/footer.php'; ?>
