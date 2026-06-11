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
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title><?php echo $pageTitle; ?></title>
    <link rel="canonical" href="<?php echo $canonicalUrl; ?>">

    <!-- Favicons -->
    <link href="/assets/img/cropped-Logo.6.3-gradient-shadow.1-1024x957.png" rel="icon" alt="T&M logo">
    <link href="/assets/img/apple-touch-icon.png" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,600;0,700;1,300;1,400;1,600;1,700&family=Montserrat:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="/assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="/assets/vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <link href="/assets/vendor/ionicons/css/ionicons.min.css" rel="stylesheet">
    <link href="/assets/vendor/venobox/venobox.css" rel="stylesheet">
    <link href="/assets/vendor/owl.carousel/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="/assets/vendor/aos/aos.css" rel="stylesheet">

    <!-- Template Main CSS File -->
    <link href="/assets/css/style.css" rel="stylesheet">
    <script src="https://kit.fontawesome.com/3e825e83d5.js" crossorigin="anonymous" defer></script>
    <script src="/assets/vendor/jquery/jquery.min.js" defer></script>

    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-MRYVE7QMBL"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());
        gtag('config', 'G-MRYVE7QMBL');
    </script>

    <!-- ===== SEO Meta Tags ===== -->
    <meta name="description" content="<?php echo $metaDescription; ?>">
    <meta name="robots" content="index, follow">
    <meta name="author" content="T&M Consultants">
    <meta name="language" content="English">

    <!-- ===== Open Graph / Facebook ===== -->
    <meta property="og:type" content="website">
    <meta property="og:url" content="<?php echo $canonicalUrl; ?>">
    <meta property="og:title" content="<?php echo $pageTitle; ?>">
    <meta property="og:description" content="<?php echo $metaDescription; ?>">
    <meta property="og:image" content="<?php echo $ogImage; ?>">
    <meta property="og:site_name" content="T&M Consultants">
    <meta property="og:locale" content="en_GB">

    <!-- ===== Twitter / X Card ===== -->
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:url" content="<?php echo $canonicalUrl; ?>">
    <meta name="twitter:title" content="<?php echo $pageTitle; ?>">
    <meta name="twitter:description" content="<?php echo $metaDescription; ?>">
    <meta name="twitter:image" content="<?php echo $ogImage; ?>">

<?php echo $jsonLd; ?>
</head>

<body>
