<?php
/**
 * Reusable case-study page template.
 * Each /case-studies/<slug>/index.php sets $slug, requires ../data.php, then this file.
 */
if (!isset($slug) || !isset($CASE_STUDIES[$slug])) {
    http_response_code(404);
    echo 'Case study not found.';
    return;
}
$cs      = $CASE_STUDIES[$slug];
$pageUrl = 'https://tnmco.uk/case-studies/' . $slug . '/';

/* ---- Build JSON-LD (Article + BreadcrumbList) via json_encode = always valid JSON ---- */
$about = ['@type' => 'SoftwareApplication', 'name' => $cs['name']];
if (!empty($cs['schema_about_url'])) {            // omitted for private-IP projects
    $about['url'] = $cs['schema_about_url'];
}
$about['applicationCategory'] = $cs['schema_app_category'];

$graph = [
    '@context' => 'https://schema.org',
    '@graph'   => [
        [
            '@type'       => 'Article',
            'headline'    => $cs['schema_headline'],
            'url'         => $pageUrl,
            'image'       => 'https://tnmco.uk' . $cs['image'],
            'author'      => ['@id' => 'https://tnmco.uk/#org'],
            'publisher'   => ['@id' => 'https://tnmco.uk/#org'],
            // datePublished intentionally omitted — no real date available (see MISSING INPUT)
            'about'       => $about,
            'description' => $cs['schema_description'],
        ],
        [
            '@type'           => 'BreadcrumbList',
            'itemListElement' => [
                ['@type' => 'ListItem', 'position' => 1, 'name' => 'Home',         'item' => 'https://tnmco.uk/'],
                ['@type' => 'ListItem', 'position' => 2, 'name' => 'Case Studies', 'item' => 'https://tnmco.uk/case-studies/'],
                ['@type' => 'ListItem', 'position' => 3, 'name' => $cs['name'],    'item' => $pageUrl],
            ],
        ],
    ],
];
$jsonLd = '<script type="application/ld+json">' . "\n"
        . json_encode($graph, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE) . "\n"
        . '    </script>';

/* ---- Head variables ---- */
$pageTitle       = $cs['title'];
$metaDescription = $cs['meta'];
$canonicalUrl    = $pageUrl;
$ogImage         = 'https://tnmco.uk' . $cs['image'];

require dirname(__DIR__) . '/includes/head.php';
require dirname(__DIR__) . '/includes/header.php';
?>

        <main id="main">
            <section class="portfolio inner-hero" style="padding-top: 140px; padding-bottom: 50px;">
                <div class="container page-hero cs-hero">
                    <?php tnm_motif('shared'); ?>

                    <!-- Breadcrumb -->
                    <nav aria-label="breadcrumb" class="breadcrumb-nav" style="margin-bottom: 22px;">
                        <a href="/">Home</a>
                        <span style="color:#adb5bd;"> / </span>
                        <a href="/case-studies/">Case Studies</a>
                        <span style="color:#adb5bd;"> / </span>
                        <span style="color:#6c757d;"><?php echo $cs['name']; ?></span>
                    </nav>

                    <?php if (!empty($cs['logo'])): ?>
                    <div class="cs-logo-chip">
                        <img src="<?php echo $cs['logo']; ?>" alt="<?php echo $cs['name']; ?> logo" loading="lazy">
                    </div>
                    <?php endif; ?>

                    <h1><?php echo $cs['h1']; ?></h1>

                    <!-- Role + Timeline -->
                    <div class="d-flex flex-wrap align-items-center" style="gap: 8px;">
                        <span class="badge badge-pill badge-primary" style="background-color: #1bb1dc; font-size: 13px; padding: 6px 12px; border: none; font-weight: 500;">Role: <?php echo $cs['role']; ?></span>
                        <span class="badge badge-pill badge-secondary" style="background-color: #6c757d; font-size: 13px; padding: 6px 12px; border: none; font-weight: 500;">Timeline: <?php echo $cs['timeline']; ?></span>
                    </div>
                </div>
            </section>

            <section class="portfolio" style="padding: 45px 0 60px;">
                <div class="container">
                    <!-- Tech Stack -->
                    <div class="mb-4">
                        <h6 style="font-weight: 700; color: #282646; margin-bottom: 8px;">Tech Stack:</h6>
                        <div class="d-flex flex-wrap" style="gap: 6px;">
                            <?php foreach ($cs['tech'] as $tech): ?>
                            <span class="badge badge-light" style="background-color: #f1f3f5; color: #495057; font-size: 12px; padding: 5px 10px; border-radius: 4px;"><?php echo $tech; ?></span>
                            <?php endforeach; ?>
                        </div>
                    </div>

                    <!-- Challenge / Solution + Impact -->
                    <div class="row">
                        <div class="col-md-7 mb-4 mb-md-0">
                            <h5 style="color: #1bb1dc; font-weight: 700; font-size: 18px; margin-bottom: 12px;"><i class="fas fa-lightbulb mr-2"></i> The Challenge</h5>
                            <p style="text-align: justify; color: #495057; line-height: 1.6;"><?php echo $cs['challenge']; ?></p>
                            <h5 style="color: #1bb1dc; font-weight: 700; font-size: 18px; margin-top: 20px; margin-bottom: 12px;"><i class="fas fa-cogs mr-2"></i> T&M's Solution</h5>
                            <p style="text-align: justify; color: #495057; line-height: 1.6;"><?php echo $cs['solution']; ?></p>
                        </div>
                        <div class="col-md-5">
                            <div style="background-color: #f8f9fa; border-radius: 8px; padding: 20px; border-top: 4px solid #1bb1dc; box-shadow: 0 2px 10px rgba(0,0,0,0.02);">
                                <h5 style="color: #282646; font-weight: 700; font-size: 16px; margin-bottom: 15px;"><i class="fas fa-chart-line mr-2" style="color: #1bb1dc;"></i> Impact &amp; Metrics</h5>
                                <ul class="list-unstyled" style="padding-left: 0; margin-bottom: 0; color: #495057; line-height: 1.5;">
                                    <?php foreach ($cs['impact'] as $item): ?>
                                    <li style="margin-bottom: 12px; display: flex; align-items: flex-start;">
                                        <i class="fas fa-check-circle text-success mr-2" style="margin-top: 4px;"></i>
                                        <span><?php echo $item; ?></span>
                                    </li>
                                    <?php endforeach; ?>
                                </ul>
                            </div>
                            <?php if (!empty($cs['private'])): ?>
                            <div class="text-muted small mt-3" style="text-align: left;"><i class="fas fa-lock mr-1 text-warning"></i> Enterprise IP: Source code &amp; live backend are private.</div>
                            <?php endif; ?>
                        </div>
                    </div>

                    <?php if (!empty($cs['testimonial'])): $t = $cs['testimonial']; ?>
                    <!-- Testimonial (visible content only — no Review/AggregateRating schema by design) -->
                    <div class="row justify-content-center mt-5">
                        <div class="col-lg-10">
                            <div style="background-color:#f8f9fa; border-radius:8px; padding:30px; text-align:center;">
                                <p style="text-align: justify; text-justify: inter-word; color:#495057; line-height:1.7;">
                                    <span style="margin-bottom: 10px;"><i class="fas fa-quote-left" style="color:rgb(180, 178, 178);margin-right:7px"></i></span>
                                    <?php echo $t['quote']; ?>
                                    <i class="fas fa-quote-right" style="color:rgb(180, 178, 178);margin-left:7px"></i>
                                </p>
                                <img src="<?php echo $t['img']; ?>" style="width:90px;height:90px;border-radius:50%;object-fit:cover;margin-top:10px;" alt="<?php echo $cs['name']; ?> Client Testimonial Logo" loading="lazy">
                                <h3 style="font-size:18px;margin-top:12px;"><?php echo $t['name']; ?></h3>
                                <h4 style="font-size:15px;"><a href="<?php echo $t['url']; ?>" target="_blank" rel="noopener noreferrer"><?php echo $t['source']; ?></a></h4>
                            </div>
                        </div>
                    </div>
                    <?php endif; ?>

                </div>
            </section>

            <!-- Platform screenshots (moved to end; logo leads the page) -->
            <section class="cs-screens">
                <div class="container">
                    <h2><i class="fas fa-desktop mr-2" style="color:#1bb1dc;"></i> Platform Screenshots</h2>
                    <div class="text-center">
                        <img src="<?php echo $cs['image']; ?>" class="img-fluid" alt="<?php echo $cs['image_alt']; ?>" loading="lazy">
                    </div>
                </div>
            </section>

            <section style="padding: 40px 0 60px;">
                <div class="container">
                    <!-- CTA -->
                    <div class="text-center">
                        <a href="/contact/" class="btn-tnm"><i class="fas fa-calendar-check mr-2"></i> Book a Call</a>
                        <?php if (empty($cs['private']) && !empty($cs['live_url'])): ?>
                        <a href="<?php echo $cs['live_url']; ?>" target="_blank" rel="noopener noreferrer" class="btn-tnm-ghost"><i class="fas fa-external-link-alt mr-2"></i> <?php echo $cs['live_label']; ?></a>
                        <?php endif; ?>
                        <a href="/case-studies/" class="btn btn-link" style="color:#6c757d; font-weight:600;">← All Case Studies</a>
                    </div>
                </div>
            </section>
        </main>

<?php require dirname(__DIR__) . '/includes/footer.php'; ?>
