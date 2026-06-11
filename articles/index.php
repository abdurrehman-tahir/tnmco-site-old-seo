<?php
$pageTitle       = 'Articles | T&M Consultants';
$metaDescription = 'Articles and insights from T&M Consultants on AI agents, automation, RAG and product delivery — coming soon.';
$canonicalUrl    = 'https://tnmco.uk/articles/';

$graph = [
    '@context' => 'https://schema.org',
    '@type'    => 'BreadcrumbList',
    'itemListElement' => [
        ['@type' => 'ListItem', 'position' => 1, 'name' => 'Home',     'item' => 'https://tnmco.uk/'],
        ['@type' => 'ListItem', 'position' => 2, 'name' => 'Articles', 'item' => 'https://tnmco.uk/articles/'],
    ],
];
$jsonLd = '<script type="application/ld+json">' . "\n"
        . json_encode($graph, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE) . "\n"
        . '    </script>';

require dirname(__DIR__) . '/includes/head.php';
require dirname(__DIR__) . '/includes/header.php';
?>

        <main id="main">
            <section class="services" style="padding-top: 160px; padding-bottom: 100px;">
                <div class="container text-center" data-aos="fade-up">
                    <h1 style="color:#282646; font-weight:700; margin-bottom:14px;">Articles</h1>
                    <p style="color:#6c757d; font-size:18px;">Articles are coming soon.</p>
                    <a href="/contact/" class="btn btn-primary mt-3" style="background-color: #1bb1dc; border-color: #1bb1dc; font-weight: 600; padding: 10px 24px;"><i class="fas fa-calendar-check mr-2"></i> Book a Call</a>
                </div>
            </section>
        </main>

<?php require dirname(__DIR__) . '/includes/footer.php'; ?>
