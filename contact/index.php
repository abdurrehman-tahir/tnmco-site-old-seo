<?php
$pageTitle       = 'Contact T&M Consultants | Book a Call';
$metaDescription = 'Get in touch with T&M Consultants. Book a call, message us on WhatsApp, or use the contact form to discuss AI agents, automation and product delivery for your business.';
$canonicalUrl    = 'https://tnmco.uk/contact/';

$graph = [
    '@context' => 'https://schema.org',
    '@type'    => 'BreadcrumbList',
    'itemListElement' => [
        ['@type' => 'ListItem', 'position' => 1, 'name' => 'Home',    'item' => 'https://tnmco.uk/'],
        ['@type' => 'ListItem', 'position' => 2, 'name' => 'Contact', 'item' => 'https://tnmco.uk/contact/'],
    ],
];
$jsonLd = '<script type="application/ld+json">' . "\n"
        . json_encode($graph, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE) . "\n"
        . '    </script>';

require dirname(__DIR__) . '/includes/head.php';
require dirname(__DIR__) . '/includes/header.php';
?>

        <main id="main" style="padding-top: 140px;">
            <!-- ======= Contact Section ======= -->
            <section id="contact" class="contact" style="margin-bottom:60px">
                <div class="container page-hero" data-aos="fade-up">
                    <?php tnm_motif('shared'); ?>
                    <header class="section-header">
                        <div class="section-title">
                            <span>Contact Us</span>
                            <h1>Contact Us</h1>
                        </div>
                    </header>
                    <div class="section-title">
                        <p>For further inquiries, please fill the contact us form or e-mail us at info@tnmco.uk.</p>
                    </div>
                    <div class="text-center" style="margin-bottom:28px;">
                        <a href="https://cal.com/tnm-co" target="_blank" rel="noopener noreferrer" class="btn-tnm"><i class="fas fa-calendar-check mr-2"></i> Book a Call</a>
                    </div>

                    <div>
                        <iframe style="border:0; width: 100%; height: 270px;" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2484.8673554751695!2d0.061977215234076996!3d51.47894902060476!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x47d8a8e41d4dde1d%3A0xf1841cdf91d7d079!2s49%20Eglinton%20Rd%2C%20London%20SE18%203SL%2C%20UK!5e0!3m2!1sen!2s!4v1629702881294!5m2!1sen!2s"
                            frameborder="0" allowfullscreen=""></iframe>
                    </div>

                    <div class="row mt-5 align-items-center">
                        <div class="col-lg-4">
                            <div class="info">
                                <div class="address">
                                    <i class="fas fa-building"></i>
                                    <h4>Head Quarter:</h4>
                                    <p>49, Eglinton Rd London SE18 3SL UK</p>
                                </div>
                                <div class="email">
                                    <i class="fas fa-laptop-house"></i>
                                    <h4>Tech Office:</h4>
                                    <p>Sargodha Road, Faisalabad, Punjab Pakistan</p>
                                </div>
                                <div class="email">
                                    <i class="fas fa-envelope"></i>
                                    <h4>Email:</h4>
                                    <p>info@tnmco.uk</p>
                                </div>
                                <div class="email">
                                    <i class="fas fa-phone-alt"></i>
                                    <h4>WhatsApp / Calls:</h4>
                                    <p>+92 314 3000005</p>
                                </div>
                                <div class="email">
                                    <i class="fas fa-phone"></i>
                                    <h4>UK line:</h4>
                                    <p>+44 7990 013020</p>
                                </div>
                                <a href="https://wa.me/923143000005?text=Hi%2C%20I%27d%20like%20to%20ask%20about%20AI%20for%20my%20business" target="_blank" rel="noopener noreferrer" class="btn-whatsapp"><i class="fab fa-whatsapp"></i> Chat on WhatsApp</a>
                            </div>
                        </div>

                        <div class="col-lg-8 mt-5 mt-lg-0">
                            <form action="/mail.php" method="post" role="form" class="php-email-form">
                                <div class="form-row">
                                    <div class="col-md-6 form-group">
                                        <input type="text" autocomplete="name" name="name" class="form-control" id="name" placeholder="Your Name" required />
                                        <div class="validate"></div>
                                    </div>
                                    <div class="col-md-6 form-group">
                                        <input type="email" class="form-control" autocomplete="email" name="email" id="email" placeholder="Your Email" required/>
                                        <div class="validate"></div>
                                    </div>
                                </div>
                                <!-- Honeypot: hidden from humans; bots that fill it are rejected by mail.php -->
                                <div style="position:absolute; left:-9999px;" aria-hidden="true">
                                    <input type="text" name="company_website" tabindex="-1" autocomplete="off">
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control" name="subject" id="subject" placeholder="Subject" required/>
                                    <div class="validate"></div>
                                </div>
                                <div class="form-group">
                                    <textarea class="form-control" name="message" id="message" maxlength="500" rows="5" placeholder="Message Only 500 letters" required></textarea>
                                    <div class="validate"></div>
                                </div>
                                <div class="mb-3">
                                    <div class="loading">Loading</div>
                                    <div class="error-message"></div>
                                    <div class="sent-message">Your message has been sent. Thank you!</div>
                                </div>
                                <div class="text-center"><button type="submit">Send Message</button></div>
                                <div class="text-center mt-2"><small style="color:#6c757d;">We'll only use your details to reply to you. See our <a href="/privacy/" style="color:#1bb1dc;">privacy policy</a>.</small></div>
                            </form>
                        </div>
                    </div>
                </div>
            </section>
            <!-- End Contact Section -->
        </main>

<?php require dirname(__DIR__) . '/includes/footer.php'; ?>
