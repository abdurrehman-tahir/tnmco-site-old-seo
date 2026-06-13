<?php
/**
 * Shared <head> partial for all multi-page templates.
 * Expects the following variables to be set before inclusion:
 *   $pageTitle        (string)  — <title> + og/twitter title
 *   $metaDescription  (string)  — meta description + og/twitter description
 *   $canonicalUrl     (string)  — absolute canonical URL
 *   $jsonLd           (string)  — optional, one or more <script type="application/ld+json"> blocks
 *   $ogImage          (string)  — optional, defaults to the T&M logo
 */
if (!isset($ogImage))   { $ogImage = 'https://tnmco.uk/assets/img/tnmLogo.png'; }
if (!isset($jsonLd))    { $jsonLd = ''; }

/* Lightweight, decorative per-page hero motif (CSS-animated, reduced-motion safe). */
if (!function_exists('tnm_motif')) {
    function tnm_motif($key = 'shared') {
        switch ($key) {
            case 'dots': // ai-agents — "listening" equaliser
                echo '<div class="hero-motif motif-dots" aria-hidden="true"><span></span><span></span><span></span><span></span><span></span></div>';
                break;
            case 'flow': // ai-automation — flowing pipeline
                echo '<svg class="hero-motif motif-flow" viewBox="0 0 168 50" fill="none" aria-hidden="true">'
                   . '<line class="flowline" x1="8" y1="25" x2="160" y2="25"/>'
                   . '<circle cx="8" cy="25" r="5" fill="#1bb1dc"/><circle cx="84" cy="25" r="5" fill="#2282ff"/><circle cx="160" cy="25" r="5" fill="#6f42c1"/></svg>';
                break;
            case 'code': // software-delivery — code caret
                echo '<div class="hero-motif motif-code" aria-hidden="true"><span class="br">&lt;/&gt;</span><span class="caret">|</span></div>';
                break;
            case 'brain': // fractional-cto — human judgement + bot execution
                echo '<svg class="hero-motif motif-brain" viewBox="0 0 300 170" fill="none" aria-hidden="true">'
                   // left lobe: organic "human" brain curve (violet)
                   . '<path class="lobe human" d="M118 132 C84 138 56 122 52 96 C48 74 60 58 76 52 C74 36 88 22 106 24 C112 12 130 8 140 18 L140 130 C134 136 126 134 118 132 Z"/>'
                   // right lobe: circuit "bot" half (cyan, rectilinear)
                   . '<path class="lobe bot" d="M160 18 L196 18 L196 40 L228 40 L228 64 L248 64 L248 96 L228 96 L228 122 L196 122 L196 144 L160 144 Z"/>'
                   // circuit pins
                   . '<line class="spark" x1="248" y1="80" x2="288" y2="80"/>'
                   . '<line class="spark" x1="212" y1="144" x2="212" y2="166"/>'
                   // synapses (violet side) + circuit nodes (cyan side)
                   . '<circle class="synapse" cx="84" cy="84" r="6" fill="#6f42c1"/>'
                   . '<circle class="synapse" cx="112" cy="56" r="5" fill="#9a6ff0"/>'
                   . '<circle class="synapse" cx="104" cy="108" r="5" fill="#6f42c1"/>'
                   . '<circle class="synapse" cx="196" cy="80" r="6" fill="#1bb1dc"/>'
                   . '<circle class="synapse" cx="228" cy="52" r="5" fill="#1bb1dc"/>'
                   . '<circle class="synapse" cx="222" cy="110" r="5" fill="#2282ff"/>'
                   // spine connecting the halves
                   . '<line class="spark" x1="140" y1="74" x2="160" y2="74" stroke-width="3"/>'
                   . '<line class="spark" x1="140" y1="96" x2="160" y2="96" stroke-width="3"/>'
                   . '</svg>';
                break;
            case 'nodes':
            case 'shared': // case studies + other inner pages
            default:
                echo '<svg class="hero-motif motif-nodes" viewBox="0 0 168 64" fill="none" aria-hidden="true">'
                   . '<line class="edge" x1="22" y1="50" x2="84" y2="14"/><line class="edge" x1="84" y1="14" x2="146" y2="50"/><line class="edge" x1="22" y1="50" x2="146" y2="50"/>'
                   . '<circle class="node" cx="22" cy="50" r="6" fill="#1bb1dc"/><circle class="node" cx="84" cy="14" r="6" fill="#2282ff"/><circle class="node" cx="146" cy="50" r="6" fill="#6f42c1"/></svg>';
                break;
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title><?php echo htmlspecialchars($pageTitle, ENT_QUOTES); ?></title>
    <link rel="canonical" href="<?php echo htmlspecialchars($canonicalUrl, ENT_QUOTES); ?>">

    <!-- Favicons -->
    <link href="/assets/img/cropped-Logo.6.3-gradient-shadow.1-1024x957.png" rel="icon" alt="T&M logo">
    <link href="/assets/img/apple-touch-icon.png" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,600;0,700;1,300;1,400;1,600;1,700&family=Montserrat:wght@300;400;500;600;700&display=swap" rel="stylesheet" media="print" onload="this.media='all'">

    <!-- Vendor CSS Files -->
    <link href="/assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="/assets/vendor/fontawesome6/css/all.min.css" rel="stylesheet">
    <link href="/assets/vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <link href="/assets/vendor/ionicons/css/ionicons.min.css" rel="stylesheet" media="print" onload="this.media='all'">
    <link href="/assets/vendor/venobox/venobox.css" rel="stylesheet" media="print" onload="this.media='all'">
    <link href="/assets/vendor/owl.carousel/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="/assets/vendor/aos/aos.css" rel="stylesheet" media="print" onload="this.media='all'">

    <!-- Template Main CSS File -->
    <link href="/assets/css/style.css" rel="stylesheet">
    <link href="/assets/css/site-enhancements.css" rel="stylesheet">
    <script src="/assets/vendor/jquery/jquery.min.js" defer></script>

    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-MRYVE7QMBL"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('consent', 'default', { 'analytics_storage': 'denied', 'ad_storage': 'denied', 'ad_user_data': 'denied', 'ad_personalization': 'denied' });
        if (localStorage.getItem('tnm-consent') === 'granted') {
            gtag('consent', 'update', { 'analytics_storage': 'granted' });
        }
        gtag('js', new Date());
        gtag('config', 'G-MRYVE7QMBL');
    </script>

    <!-- ===== SEO Meta Tags ===== -->
    <meta name="description" content="<?php echo htmlspecialchars($metaDescription, ENT_QUOTES); ?>">
    <meta name="robots" content="index, follow">
    <meta name="author" content="T&M Consultants">
    <meta name="language" content="English">

    <!-- ===== Open Graph / Facebook ===== -->
    <meta property="og:type" content="website">
    <meta property="og:url" content="<?php echo htmlspecialchars($canonicalUrl, ENT_QUOTES); ?>">
    <meta property="og:title" content="<?php echo htmlspecialchars($pageTitle, ENT_QUOTES); ?>">
    <meta property="og:description" content="<?php echo htmlspecialchars($metaDescription, ENT_QUOTES); ?>">
    <meta property="og:image" content="<?php echo htmlspecialchars($ogImage, ENT_QUOTES); ?>">
    <meta property="og:site_name" content="T&M Consultants">
    <meta property="og:locale" content="en_GB">

    <!-- ===== Twitter / X Card ===== -->
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:url" content="<?php echo htmlspecialchars($canonicalUrl, ENT_QUOTES); ?>">
    <meta name="twitter:title" content="<?php echo htmlspecialchars($pageTitle, ENT_QUOTES); ?>">
    <meta name="twitter:description" content="<?php echo htmlspecialchars($metaDescription, ENT_QUOTES); ?>">
    <meta name="twitter:image" content="<?php echo htmlspecialchars($ogImage, ENT_QUOTES); ?>">

<?php echo $jsonLd; ?>
</head>

<body class="inner-page">
