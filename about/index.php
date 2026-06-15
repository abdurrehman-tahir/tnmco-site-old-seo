<?php
$pageTitle       = 'About T&M Consultants | AI Agents & Automation';
$metaDescription = 'Meet T&M Consultants. We were researching AI before the current rush and now build AI agents and automation for founders and small businesses, with 10+ years and 29+ projects behind us.';
$canonicalUrl    = 'https://tnmco.uk/about/';

$graph = [
    '@context' => 'https://schema.org',
    '@type'    => 'BreadcrumbList',
    'itemListElement' => [
        ['@type' => 'ListItem', 'position' => 1, 'name' => 'Home',  'item' => 'https://tnmco.uk/'],
        ['@type' => 'ListItem', 'position' => 2, 'name' => 'About', 'item' => 'https://tnmco.uk/about/'],
    ],
];
$jsonLd = '<script type="application/ld+json">' . "\n"
        . json_encode($graph, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE) . "\n"
        . '    </script>';

require dirname(__DIR__) . '/includes/head.php';
require dirname(__DIR__) . '/includes/header.php';
?>

        <main id="main" style="padding-top: 140px;">

            <!-- ======= About Section ======= -->
            <section id="about" class="about">
                <div class="container page-hero" data-aos="fade-up">
                    <?php tnm_motif('shared'); ?>
                    <div class="section-title">
                        <span>About Us</span>
                        <h1>About Us</h1>
                    </div>
                    <div class="row align-items-center">
                        <div class="col-lg-5 col-md-6">
                            <div class="about-orb" data-aos="fade-right" data-aos-delay="100" aria-hidden="true">
                                <canvas class="orb-canvas"></canvas>
                            </div>
                        </div>
                        <div class="col-lg-7 col-md-6">
                            <div class="about-content" data-aos="fade-left" data-aos-delay="100">
                                <h2 class="about-lede">Technology and Management (T&M) Consultants</h2>
                                <p class="font-italic" style="text-align: justify; text-justify: inter-word;">
                                    AI is not new to us. We were publishing machine learning research and building intelligent systems years before the current rush, and we have spent the last decade turning that work into software that businesses rely on every day.
                                </p>
                                <p class="font-italic" style="text-align: justify; text-justify: inter-word;">
                                    Today T&M Consultants designs, builds, and runs AI agents, chatbots, and automation for founders and small businesses. We tell you straight what is worth building, ship it in weeks, and stay on to keep it working. That same research foundation still shapes how we work. We test what we build before it goes live, and we have put it into production for clients across education, healthcare, fintech, and analytics.
                                </p>
                                <ul>
                                    <li><i class="ion-android-checkmark-circle"></i> We're a social enterprise at heart: our e-Sehat telemedicine project helps transform healthcare access in emerging economies.
                                    </li>
                                    <li><i class="ion-android-checkmark-circle"></i> We recruit tech graduates from underprivileged backgrounds, accelerating social mobility by training young professionals on real client work.
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- End About Section -->

            <!-- ======= Team Section ======= -->
            <section id="team" class="team section-bg">
                <div class="container">
                    <div class="section-title">
                        <span>Team</span>
                        <h2>Team</h2>
                    </div>

                    <div class="row">
                        <div class="col-lg-4 col-6">
                            <div class="member">
                                <div data-toggle="modal" data-target="#exampleModalCenter" class="member-info-trigger" style="cursor: pointer;">
                                    <img src="/assets/img/team/abd.webp" alt="Abdurehman Bin Tahir - Technical Director & Co-Founder" loading="lazy" width="417" height="500">
                                    <h4>Abdurehman Bin Tahir</h4>
                                </div>
                                <span class="d-none d-md-block">Technical Director/ Co-Founder</span>
                                <p class="d-none d-md-block">
                                    Abdurehman is responsible for implementing technological strategies and ensuring that the technical resources... ( <a href="#/" data-toggle="modal" data-target="#exampleModalCenter">read more</a> )
                                </p>
                                <div class="social d-none d-md-block">
                                    <a href="mailto:abdurrehman@tnmco.uk"><i class="fas fa-envelope-square"></i></a>
                                    <a href="https://www.linkedin.com/in/abdtahir/" target="_blank" rel="noopener noreferrer" aria-label="Abdurehman Bin Tahir on LinkedIn"><i class="fab fa-linkedin"></i></a>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-6">
                            <div class="member">
                                <div data-toggle="modal" data-target="#exampleModalCenter1" class="member-info-trigger" style="cursor: pointer;">
                                    <img src="/assets/img/team/athar-mushtaq.webp" alt="Athar Mushtaq - Managing Director & Co-Founder" loading="lazy" width="417" height="500">
                                    <h4>Athar Mushtaq</h4>
                                </div>
                                <span class="d-none d-md-block">Managing Director/Co-Founder</span>
                                <p class="d-none d-md-block">
                                    Athar is responsible for formulating company strategies, reviewing financial, marketing and operations activities... ( <a href="#/" data-toggle="modal" data-target="#exampleModalCenter1">read more</a> )
                                </p>
                                <div class="social d-none d-md-block">
                                    <a href="mailto:md@tnmco.uk"><i class="fas fa-envelope-square"></i></a>
                                    <a href="https://www.linkedin.com/in/atharmushtaq/" target="_blank" rel="noopener noreferrer" aria-label="Athar Mushtaq on LinkedIn"><i class="fab fa-linkedin"></i></a>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-6">
                            <div class="member">
                                <div data-toggle="modal" data-target="#mubashir" class="member-info-trigger" style="cursor: pointer;">
                                    <img src="/assets/img/team/mubashir-farooq.webp" alt="Mubashir Farooq - Team Leader & Senior Software Developer" loading="lazy" width="417" height="500">
                                    <h4>Mubashir Farooq</h4>
                                </div>
                                <span class="d-none d-md-block">Team Leader / Sr. software Developer</span>
                                <p class="d-none d-md-block">
                                Mubashir is responsible for overseeing the operations of the technical development team. He's the one... ( <a href="#/" data-toggle="modal" data-target="#mubashir">read more</a> )
                                </p>
                                <div class="social d-none d-md-block">
                                    <a href="mailto:mubashir@tnmco.uk"><i class="fas fa-envelope-square"></i></a>
                                    <a href="https://www.linkedin.com/in/mubashir-farooq-b01064202/" target="_blank" rel="noopener noreferrer" aria-label="Mubashir Farooq on LinkedIn"><i class="fab fa-linkedin"></i></a>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-6">
                            <div class="member">
                                <div data-toggle="modal" data-target="#exampleModalCenter3" class="member-info-trigger" style="cursor: pointer;">
                                    <img src="/assets/img/team/team-member2.webp" alt="Dr. Tahir Mushtaq - Marketing Advisor" loading="lazy" width="417" height="500">
                                    <h4>Dr.Tahir Mushtaq</h4>
                                </div>
                                <span class="d-none d-md-block">Marketing Advisor</span>
                                <p class="d-none d-md-block">
                                    Dr Tahir is responsible for developing marketing strategy, gathering market intelligence, and providing... ( <a href="#/" data-toggle="modal" data-target="#exampleModalCenter3">read more</a> )
                                </p>
                                <div class="social d-none d-md-block">
                                    <a href="mailto:cmo@tnmco.uk"><i class="fas fa-envelope-square"></i></a>
                                    <a href="https://www.linkedin.com/in/muhammadtahirmushtaq/" target="_blank" rel="noopener noreferrer" aria-label="Dr. Tahir Mushtaq on LinkedIn"><i class="fab fa-linkedin"></i></a>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-6">
                            <div class="member">
                                <div data-toggle="modal" data-target="#exampleModalCenter4" class="member-info-trigger" style="cursor: pointer;">
                                    <img src="/assets/img/team/team-member3.webp" alt="Ola Badawi - Financial Advisor" loading="lazy" width="417" height="500">
                                    <h4>Ola Badawi</h4>
                                </div>
                                <span class="d-none d-md-block">Financial Advisor</span>
                                <p class="d-none d-md-block">
                                    Ola is responsible for managing the company’s finances, management of financial risks, record-keeping, ensuring... ( <a href="#/" data-toggle="modal" data-target="#exampleModalCenter4">read more</a> )
                                </p>
                                <div class="social d-none d-md-block">
                                    <a href="mailto:cfo@tnmco.uk"><i class="fas fa-envelope-square"></i></a>
                                    <a href="https://www.linkedin.com/in/ola-badawi-mba-923b79185/" target="_blank" rel="noopener noreferrer" aria-label="Ola Badawi on LinkedIn"><i class="fab fa-linkedin"></i></a>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-6">
                            <div class="member">
                                <div data-toggle="modal" data-target="#exampleModalCenter2" class="member-info-trigger" style="cursor: pointer;">
                                    <img src="/assets/img/team/team-member1.webp" alt="Haixia Li - Chief Operating Officer" loading="lazy" width="417" height="500">
                                    <h4>HAIXIA LI</h4>
                                </div>
                                <span class="d-none d-md-block">Chief Operating Officer (COO)</span>
                                <p class="d-none d-md-block">
                                    Haixia is responsible for overseeing operations of the company, engage key stakeholders, manage Human Resource, and... ( <a href="#/" data-toggle="modal" data-target="#exampleModalCenter2">read more</a> )
                                </p>
                                <div class="social d-none d-md-block">
                                    <a href="mailto:coo@tnmco.uk"><i class="fas fa-envelope-square"></i></a>
                                    <a href="https://www.linkedin.com/in/lynn-li-b88632100/" target="_blank" rel="noopener noreferrer" aria-label="Haixia Li on LinkedIn"><i class="fab fa-linkedin"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- End Team Section -->

            <!-- ======= Testimonials Section ======= -->

            <section id="testimonials" class="testimonials section-bg">
                <div class="container">

                    <div class="section-title">
                        <span>Testimonials</span>
                        <h2>Testimonials</h2>
                    </div>

                    <div class="owl-carousel testimonials-carousel">
                        <div class="testimonial-item">
                            <p style="text-align: justify; text-justify: inter-word;">
                                <span style="margin-bottom: 10px;"><i class="fas fa-quote-left"
                                    style="color:rgb(180, 178, 178);margin-right:7px"></i></span>
                                    T&M went above and beyond in development of my project. They not only assisted with the project development but also helped
                                    me refine my idea. I was thoroughly impressed with the speed of delivery as the project was time sensitive. I would strongly recommend working with them. Thanks again and looking forward to working with you in future.
                                <i class="fas fa-quote-right" style="color:rgb(180, 178, 178);margin-left:7px"></i>
                            </p>
                            <img src="/assets/img/doc-circle.png" class="testimonial-img" alt="Docushield Client Testimonial Logo" loading="lazy" width="1080" height="1080">
                            <h3>Jules Mancion (Project Manager)</h3>
                            <h4><a href="https://docushield.tnmco.uk/" target="_blank">docushield.com</a></h4>
                        </div>
                        <div class="testimonial-item">
                            <p style="text-align: justify; text-justify: inter-word;">
                                <span style="margin-bottom: 10px;"><i class="fas fa-quote-left"
                                    style="color:rgb(180, 178, 178);margin-right:7px"></i></span>I'm thrilled to share my experience working with T&M consultants on our real estate website project. Their expertise in creating a platform for property sale, purchase, and rental, along with detailed builder information, was exceptional.
                                    T&M consultants seamlessly integrated features like property search, virtual tours, and secure payments. Their innovation, including augmented reality tools, elevated our platform above the competition.
                                    Communication was excellent throughout, and T&M consultants tackled challenges with dedication, ensuring a flawless user experience by launch day.
                                    I wholeheartedly recommend T&M consultants for their technical skills, user-centric approach, and transformative contributions to our project. Thank you for shaping the future of real estate online!
                                <i class="fas fa-quote-right" style="color:rgb(180, 178, 178);margin-left:7px"></i>
                            </p>
                            <img src="/assets/img/tameer_circle.png" class="testimonial-img" alt="Tameer Estate UK Client Testimonial Logo" loading="lazy" width="400" height="400">
                            <h3>Hamza Bajwa (Project Manager)</h3>
                            <h4><a href="https://tameerestate.com/" target="_blank">tameerestate.com</a></h4>
                        </div>
                        <!-- <div class="testimonial-item">
                            <p style="text-align: justify; text-justify: inter-word;">
                                <span style="margin-bottom: 10px;"><i class="fas fa-quote-left"
                                    style="color:rgb(180, 178, 178);margin-right:7px"></i></span> T&M consultants took over website development from another company and finished this project in record time. Good value for
                                money and professional service by T&M consultants. I would recommend working with them.
                                <i class="fas fa-quote-right" style="color:rgb(180, 178, 178);margin-left:7px"></i>
                            </p>
                            <img src="/assets/img/tec_Circle copy.png" class="testimonial-img" alt="techstore img">
                            <h3>Zeeshan Ahmed (Owner)</h3>
                            <h4><a href="http://tecstore.pk/" target="_blank">techstore.pk</a></h4>
                        </div> -->
                        <div class="testimonial-item">
                            <p style="text-align: justify; text-justify: inter-word;">
                                <span style="margin-bottom: 10px;"><i class="fas fa-quote-left"
                                    style="color:rgb(180, 178, 178);margin-right:7px"></i></span>T&M co. team have exceptional technical skills as well as communication skills. 
                                    They made my project go smoothly. We were extremely pleased with the quality and speed of delivery. I would highly recommend them and would acquire their services again.
                                <i class="fas fa-quote-right" style="color:rgb(180, 178, 178);margin-left:7px"></i>
                            </p>
                            <img src="/assets/img/cominfo-logo.png" class="testimonial-img" alt="Cominfo Client Testimonial Logo" loading="lazy" width="400" height="400">
                            <h3>Imad Rehman (Exec Vice. President)</h3>
                            <h4><a href="https://www.cominfo.com/" target="_blank">cominfo.com</a></h4>
                        </div>
                        <!-- <div class="testimonial-item">
                            <p style="text-align: justify; text-justify: inter-word;">
                                <span style="margin-bottom: 10px;"><i class="fas fa-quote-left"
                                    style="color:rgb(180, 178, 178);margin-right:7px"></i></span> It has been an absolute pleasure working with T&M. I was really pleased with their professional attitude and exceptional
                                customer service.
                                <i class="fas fa-quote-right" style="color:rgb(180, 178, 178);margin-left:7px"></i>
                            </p>
                            <img src="/assets/img/CricInGig_Circle.png" class="testimonial-img" alt="circle img">
                            <h3>David Hussain (PM)</h3>
                            <h4><a href="https://www.cricingif.com/" target="_blank">cricingif.com</a></h4>
                        </div> -->
                        <div class="testimonial-item">
                            <p style="text-align: justify; text-justify: inter-word;">
                                <span style="margin-bottom: 10px;"><i class="fas fa-quote-left"
                                    style="color:rgb(180, 178, 178);margin-right:7px"></i></span>T&M consultants provided 360° services in refining and developing proof of concept. I am really pleased with their exceptional
                                services in developing prototype for my start-up.
                                <i class="fas fa-quote-right" style="color:rgb(180, 178, 178);margin-left:7px"></i>
                            </p>
                            <img src="/assets/img/TSG_Circle.png" class="testimonial-img" alt="TSG Client Testimonial Logo" loading="lazy" width="400" height="400">
                            <h3>Dr.Asif Mufti (Founder)</h3>
                            <h4><a href="http://tsgtech.us/" target="_blank">Tsgtech.us</a></h4>
                        </div>
                    </div>

                </div>
            </section>
        </main>

        <!-- ======= Team Member Modals ======= -->
        <div class="modal fade" id="mubashir" tabindex="-1" role="dialog" aria-labelledby="mubashirTitle" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document" style="top: 10%;">
                <div class="modal-content">
                    <div style="float:right;">
                        <div style=" text-align:center;">
                            <img style="margin-top:-70px;  " src="/assets/img/team/mubashir-farooq-c.webp" alt="team img" width="180px" height="auto">
                            <h2 style="font-weight:600; margin:20px 0 0 0">Mubashir Farooq</h2>
                            <h5 style="margin:10px 0 20px 0">Team Leader / Sr. software Developer</h5>
                            <hr style="width:60%; height:5px; margin:auto; background-color:blue; border-radius:8px;">
                        </div>
                    </div>
                    <div class="modal-body">
                        <p style="padding:0 30px; text-align: justify; text-justify: inter-word; ">
                        Mubashir is responsible for overseeing the operations of the technical development team. He's the one who leads the tech team
                        and makes sure everything tech-related goes smoothly. He is like a tech wizard: he helps come up with solutions, checks that the code is
                        really good, and keeps us up-to-date with all the cool new tech stuff.
                        Mubashir holds a bachelor's degree in Computer Sciences from GC University Faisalabad.
                        He is skilled and comes with a strong background in various development areas. As a seasoned full-stack developer, mobile app specialist,
                        and even blockchain enthusiast, he brings a wealth of expertise to the table. Guiding our team, his experience shows how good he is with different technologies, sparking
                        new ideas in our projects. He's not only a mentor and communicator but also a great leader who helps us aim for excellence.
                        </p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary my-btn" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>

        <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document" style="top: 10%;">
                <div class="modal-content">
                    <div style="float:right;">
                        <div style=" text-align:center;">
                            <img style="margin-top:-70px;  " src="/assets/img/team/abd-500x500-1.webp" alt="team img" width="180px" height="auto">
                            <h2 style="font-weight:600; margin:20px 0 0 0">Abdurehman Bin Tahir</h2>
                            <h5 style="margin:10px 0 20px 0">Technical Director/ Co-Founder</h5>
                            <hr style="width:60%; height:5px; margin:auto; background-color:blue; border-radius:8px;">
                        </div>
                    </div>
                    <div class="modal-body">
                        <p style="padding:0 30px; text-align: justify; text-justify: inter-word; ">Abdurehman is responsible for implementing technological strategies, and ensuring that the resources are aligned with the company’s business needs. He is also responsible to liaison with clients, ensuring that innovative and cost-effective
                            solutions are developed for their unique needs. AbdurRehman holds an undergraduate in computer sciences from NUST and an M.Sc. in Computer Sciences from Turkey. He is an established academic researcher specialising in Machine
                            Learning Algorithms with several journal and conference publications. His vast experience includes BlockChain powered solutions, Business Intelligence strategies, development of AI enabled systems and Full Stack development
                            for e-commerce platforms. He has led technical teams solving complex business problems for several years.</p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary my-btn" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>

        <div class="modal fade" id="exampleModalCenter1" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document" style="top: 10%;">
                <div class="modal-content">
                    <div style="float:right;">
                        <div style=" text-align:center;">
                            <img style="margin-top:-70px;  " src="/assets/img/team/md-500x500-1.webp" alt="team img" width="180px" height="auto">
                            <h2 style="font-weight:600; margin:20px 0 0 0">Athar Mushtaq</h2>
                            <h5 style="margin:10px 0 20px 0">Managing Director/Co-Founder</h5>
                            <hr style="width:60%; height:5px; margin:auto; background-color:blue; border-radius:8px;">
                        </div>
                    </div>
                    <div class="modal-body">
                        <p style="padding:0 30px; text-align: justify; text-justify: inter-word; ">
                            Athar is responsible for formulating company strategies, reviewing financial, marketing and operations activities. Athar’s leading the efforts to develop lasting relationship with existing customer ensuring consultants’s go above and beyond in their services.
                            He is also responsible to ensure; T&M own brand products and services revolve around social benefits with a direct positive impact in local communities. Athar hold an undergraduate in electronics engineering from NUST, MSc
                            in Strategic project management from Heriot-watt university Edinburgh and MBA (Distinction) from Cardiff university. He has accumulated valuable experience in different business functions in Pakistan and UK both in public and
                            private sector.
                        </p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary my-btn" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>

        <div class="modal fade" id="exampleModalCenter2" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document" style="top: 10%;">
                <div class="modal-content">
                    <div style="float:right;">
                        <div style=" text-align:center;">
                            <img style="margin-top:-70px;  " src="/assets/img/team/coo-500x500-1.webp" alt="team img" width="180px" height="auto">
                            <h2 style="font-weight:600; margin:20px 0 0 0">HAIXIA LI</h2>
                            <h5 style="margin:10px 0 20px 0">Chief Operating Officer(COO)</h5>
                            <hr style="width:60%; height:5px; margin:auto; background-color:blue; border-radius:8px;">
                        </div>
                    </div>
                    <div class="modal-body">
                        <p style="padding:0 30px; text-align: justify; text-justify: inter-word; ">
                            Haixia is responsible for overseeing operations of the company, engage key stakeholders, manage Human Resource, and day to day administration. She is also responsible for monitoring and evaluating business performance for operational efficiency. Haixia
                            holds an undergraduate degree in industrial engineering and has worked in general business administration in China for several years. She also holds an MBA Operations (Distinction) from Cardiff university. She is a team player
                            with outstanding work ethics and committed to whatever she does.
                        </p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary my-btn" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>

        <div class="modal fade" id="exampleModalCenter3" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document" style="top: 10%;">
                <div class="modal-content">
                    <div style="float:right;">
                        <div style=" text-align:center;">
                            <img style="margin-top:-70px;  " src="/assets/img/team/tahir-500x500-1.webp" alt="team img" width="180px" height="auto">
                            <h2 style="font-weight:600; margin:20px 0 0 0">Dr.Tahir Mushtaq</h2>
                            <h5 style="margin:10px 0 20px 0">Marketing Advisor</h5>
                            <hr style="width:60%; height:5px; margin:auto; background-color:blue; border-radius:8px;">
                        </div>
                    </div>
                    <div class="modal-body">
                        <p style="padding:0 30px; text-align: justify; text-justify: inter-word; ">
                            Dr Tahir is responsible for developing marketing strategy, gathering market intelligence, and providing consultation to small business on digital marketing. Dr Tahir holds an undergraduate in Business administration (BBA) and MBA (Distinction) from Swansea
                            University. He also holds a PHD in Neuro Marketing from Swansea University. He is currently working as program director (Digital Marketing) Cardiff Met Business School. Tahir is a natural marketer and highly creative. He has
                            transformed several small businesses through digital marketing consultancy.
                        </p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary my-btn" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>

        <div class="modal fade" id="exampleModalCenter4" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document" style="top: 10%;">
                <div class="modal-content">
                    <div style="float:right;">
                        <div style=" text-align:center;">
                            <img style="margin-top:-70px;  " src="/assets/img/team/ola-500x500-1.webp" alt="team img" width="180px" height="auto">
                            <h2 style="font-weight:600; margin:20px 0 0 0">Ola Badawi</h2>
                            <h5 style="margin:10px 0 20px 0">Financial Advisor</h5>
                            <hr style="width:60%; height:5px; margin:auto; background-color:blue; border-radius:8px;">
                        </div>
                    </div>
                    <div class="modal-body">
                        <p style="padding:0 30px; text-align: justify; text-justify: inter-word; ">
                            Ola is responsible for managing the company’s finances, management of financial risks, record-keeping, ensuring compliance, and financial reporting. Ola holds an undergraduate degree in accounting and finance from Jordan University. She also holds an
                            MBA in finance (Distinction) from Cardiff University. She has worked with Arab Bank and Jordan Ahli Bank for several years.
                        </p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary my-btn" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>

<?php require dirname(__DIR__) . '/includes/footer.php'; ?>
