<?php
session_start();
require_once '../db_config.php';
$sql = "SELECT a.*,c.* FROM applicants a inner join career c on a.job_id=c.id";
$result = $conn->query($sql);
$conn->close();
    function time_elapsed_string($datetime, $full = false) {
        $now = new DateTime;
        $ago = new DateTime($datetime);
        $diff = $now->diff($ago);
        $diff->w = floor($diff->d / 7);
        $diff->d -= $diff->w * 7;
        $string = array(
            'y' => 'year',
            'm' => 'month',
            'w' => 'week',
            'd' => 'day',
            'h' => 'hour',
            'i' => 'minute',
            's' => 'second',
        );
        foreach ($string as $k => &$v) {
            if ($diff->$k) {
                $v = $diff->$k . ' ' . $v . ($diff->$k > 1 ? 's' : '');
            } else {
                unset($string[$k]);
            }
        }
        if (!$full) $string = array_slice($string, 0, 1);
        return $string ? implode(', ', $string) . ' ago' : 'just now';
    }
?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="utf-8">
        <meta content="width=device-width, initial-scale=1.0" name="viewport">
        <title>T&M Consultant : Join Us</title>
        <link href="../assets/img/cropped-Logo.6.3-gradient-shadow.1-1024x957.png" rel="icon">
        <link href="../assets/img/apple-touch-icon.png" rel="apple-touch-icon">

        <!-- Google Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Montserrat:300,400,500,600,700" rel="stylesheet">

        <!-- Vendor CSS Files -->
        <link href="../assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
        <!-- <link href="assets/vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet"> -->
        <link href="../assets/css/style.css" rel="stylesheet">
        <script src="https://kit.fontawesome.com/3e825e83d5.js" crossorigin="anonymous"></script>

        <script src="../assets/vendor/jquery/jquery.min.js"></script>
        <script>
            $(window).on('load', function() {
                if ($('#preloader').length) {
                    $('#preloader').delay(100).fadeOut('slow', function() {
                        $(this).remove();
                    });
                }
            });
            $(document).ready(function() {
                $(document).click(function(event) {
                    var click = $(event.target);
                    var _open = $(".navbar-collapse").hasClass("show");
                    if (_open === true && !click.hasClass("navbar-toggler")) {
                        $(".navbar-toggler").click();
                    }
                });
            });
        </script>
        <style>
            #r_border{
                border-right:1px solid black;
            }
            @media (max-width: 767px) {
                    #r_border{
                    border-right:0;
                    }
                }
        </style>
    </head>
    <!-- ======= Header ======= -->

    <body>
        <header id="header" class="fixed-top header-transparent header-scrolled">
            <div class="container">
                <nav class="navbar navbar-expand-md bg-transparent navbar-light p-0 m-0">
                    <!-- Site Logo Here -->
                    <a class="logo mr-auto" href="../index.php"><img src="../assets/img/tnmLogo.png" alt="TNM Logo"></a>
                    <!-- Collapsibe Button -->
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#mobilemenu" onclick='
        if($("#my-bars").hasClass("fa-bars")){
            document.getElementById("my-bars").classList.remove("fa-bars");
            document.getElementById("my-bars").classList.add("fa-times");
        }
        else
        {
            document.getElementById("my-bars").classList.remove("fa-times");
            document.getElementById("my-bars").classList.add("fa-bars");
        }
        '>
                    <i class="fas fa-bars" id="my-bars"></i>
                </button>
                    <!-- Header links -->
                    <div class="collapse navbar-collapse" id="mobilemenu">
                        <ul class="navbar-nav ml-auto" id="myul">
                            <li class="nav-item">
                                <a class="nav-link" onclick='if($("#my-bars").hasClass("fa-times")){$(".navbar-toggler").click();}' href="../index.php#hero">Home</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="contact1" onclick='if($("#my-bars").hasClass("fa-times")){$(".navbar-toggler").click();}' href="../index.php#contact">Contact</a>
                            </li>
                            <li class="nav-item ">
                                <a class="nav-link" onclick='if($("#my-bars").hasClass("fa-times")){$(".navbar-toggler").click();}' href="../Career.php">Career</a>
                            </li>
                        </ul>
                    </div>
                </nav>
            </div>
        </header>
        <!-- End Header -->

        <!-- Start Form -->
        <section class="mt-5 pt-5">
            <div class="section-title">
                <span>View All Applicants</span>
                <h2>View All Applicants</h2>
            </div>
            <!-- ======= Breadcrumbs ======= -->
            <section id="breadcrumbs" class="breadcrumbs  mb-5" style="margin-top: 0%;">
                <div class="container">
                    <ol>
                        <li><a href="./index.php">Dashboard</a></li>
                        <li>View All Applicants</li>
                    </ol>
                </div>
            </section>
            <!-- End Breadcrumbs -->
            <div class="container" id="job_panel">
                <?php  
                while($rows=$result->fetch_assoc())
                {
            ?>
                <div style="border: 1px solid rgb(100, 100, 100); padding: 3%; margin-top: 20px; margin-bottom: 20px; border-radius: 20px;">
                    <div class="row">
                        <div id="r_border" class="col-md-6" >
                            <ol class="fa-ul mt-5" style="margin-left: 80px;">
                                <h1 style="font-weight:600;">Applicant Info:</h1>
                                <li style="margin:  5px 0 5px 0;"><span class="fa-li"><i class="fas fa-check"></i></span> Name :
                                    <?php echo $rows['name'];?> </li>
                                <li style="margin:  5px 0 5px 0;"><span class="fa-li"><i class="fas fa-check"></i></span> Email :
                                    <?php echo $rows['email'];?>
                                </li>
                                <li style="margin:  5px 0 5px 0;"><span class="fa-li"><i class="fas fa-check"></i></span> Contact Number :
                                    <?php echo $rows['phone'];?>
                                </li>
                                <li style="margin:  5px 0 5px 0;"><span class="fa-li"><i class="fas fa-check"></i></span> Applied At :
                                    <?php echo $rows['created_at'];?>
                                </li>
                                <li style="margin:  5px 0 5px 0;"><span class="fa-li"><i class="fas fa-check"></i></span> Cover Letter :
                                    <p>
                                        <?php echo $rows['cover_letter'];?>
                                    </p>
                                </li>
                                <li>
                                    <a href="../assets/files/<?php echo $rows['cv'] ?>" download target="_blank" type="button" style="width: 130px;" class="btn btn-primary btn-sm my-btn ml-auto mr-3">Download CV</a>
                                </li>
                            </ol>
                        </div>

                        <div class="col-md-6">
                            <ol class="fa-ul mt-5" style="margin-left: 80px;">
                                <h1 style="font-weight:600;">Job Info:</h1>
                                <li style="margin:  5px 0 5px 0;"><span class="fa-li"><i class="fas fa-check"></i></span> Job Title :
                                    <?php echo $rows['job_title'];?> </li>
                                <li style="margin:  5px 0 5px 0;"><span class="fa-li"><i class="fas fa-check"></i></span> Job Type :
                                    <?php echo $rows['job_type'];?>
                                </li>
                                <li style="margin:  5px 0 5px 0;"><span class="fa-li"><i class="fas fa-check"></i></span> Status :
                                    <?php echo $rows['status'];?>
                                </li>
                                <li style="margin:  5px 0 5px 0;"><span class="fa-li"><i class="fas fa-check"></i></span> Location :
                                    <?php echo $rows['location'];?>
                                </li>
                                <li style="margin:  5px 0 5px 0;"><span class="fa-li"><i class="fas fa-check"></i></span> Working :
                                        <?php echo $rows['working_days'];?>
                                </li>
                                <li>
                                    <a href="../JobDetail.php?id=<?php echo $rows['id'];?>" type="button" style="width: 130px;" class="mt-5 btn btn-primary btn-sm my-btn ml-auto mr-3">Job Detail</a>
                                </li>
                            </ol>
                        </div>
                    </div>


                </div>
                <hr>
                <?php
                }
            ?>
            </div>
        </section>


        <!-- ======= Footer ======= -->
        <footer id="footer">

            <div class="footer-top">
                <div class="container">
                    <div class="row">

                        <div class="col-lg-6 col-md-12 footer-contact">
                            <h3>TnM Consultant</h3>
                            <p>
                                Technology and Management (T&M) consultants is a social enterprise building capacity for start-ups and SMEs.T&M offers 360° solutions to start-ups and SMEs including but not limited to product development, deployment and after sales services. Here at
                                T&M We try to provide our clients and customers best services.
                            </p>
                            <div class="social-links  pt-3 pt-md-0 mt-3">
                                <a href="https://www.facebook.com/TnMConsultants" target="_blank" class="facebook"><i class="fa fa-facebook"></i></a>
                                <a href="https://www.linkedin.com/company/tnmconsultants" target="_blank" class="linkedin"><i class="fa fa-linkedin"></i></a>
                            </div>
                        </div>



                        <div class="col-lg-3 col-md-6 footer-links">
                            <h4>Our Services</h4>
                            <ul>
                                <li><i class="bx bx-chevron-right"></i> <a href="./index.php#services">BLOCKCHAIN LEDGER</a></li>
                                <li><i class="bx bx-chevron-right"></i> <a href="./index.php#services">FULL STACK WEB DEVELOPMENT</a></li>
                                <li><i class="bx bx-chevron-right"></i> <a href="./index.php#services">MOBILE APPLICATION DEVELOPMENT</a></li>
                                <li><i class="bx bx-chevron-right"></i> <a href="./index.php#services">Machine Learning</a></li>
                                <li><i class="bx bx-chevron-right"></i> <a href="./index.php#services">Project Management</a></li>
                                <li><i class="bx bx-chevron-right"></i> <a href="./index.php#services">E-COMMERCE</a></li>
                            </ul>
                        </div>


                        <div class="col-lg-3 col-md-6 footer-links">
                            <h4>Useful Links</h4>
                            <ul>
                                <li><i class="bx bx-chevron-right"></i> <a href="./index.php#hero">Home</a></li>
                                <li><i class="bx bx-chevron-right"></i> <a href="./index.php#about">About us</a></li>
                                <li><i class="bx bx-chevron-right"></i> <a href="./index.php#services">Services</a></li>
                                <li><i class="bx bx-chevron-right"></i> <a href="./Career.php">Career</a></li>
                            </ul>
                        </div>




                    </div>
                </div>
            </div>

            <div class="container py-2">

                <div class="text-center">
                    <div class="copyright">
                        &copy; Copyright, All rights reserved <strong><span>T&M</span></strong> 2020.
                    </div>
                    <div class="credits">

                        T&M consultants registered in England and Wales, Company Number 12621485.
                    </div>
                </div>

            </div>
        </footer>

        <a href="#" class="back-to-top"><i class="fa fa-chevron-up"></i></a>
        <div id="preloader"></div>
        <!-- End Form -->
    </body>
    <script src="../assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="../assets/vendor/jquery.easing/jquery.easing.min.js"></script>

    <!-- Template Main JS File -->
    <script>
        $(window).scroll(function() {
            if ($(this).scrollTop() > 100) {
                $('.back-to-top').fadeIn('slow');
            } else {
                $('.back-to-top').fadeOut('slow');
            }
        });
        $('.back-to-top').click(function() {
            $('html, body').animate({
                scrollTop: 0
            }, 1500, 'easeInOutExpo');
            return false;
        });
    </script>
    <!-- <script src="assets/js/main.js"></script> -->

    </html>