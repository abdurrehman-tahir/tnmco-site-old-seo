<?php
session_start();
if(!isset($_SESSION['username']) )
{
    header("Location:./index.php");
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
        <link href="../assets/vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet">
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
            #b-container {
                border: 1px solid rgb(100, 100, 100);
                padding: 3%; 
                margin-top: 20px; 
                margin-bottom: 40px; 
                margin: auto; 
                border-radius: 20px; 
                width: 60%;
            }
            
            @media (max-width: 767px) {
                #b-container {
                    width: 80%;
                }
            }
            
            @media (max-width: 480px) {
                #b-container {
                    width: 95%;
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
                            <li class="nav-item ">
                                <a class="nav-link" onclick='if($("#my-bars").hasClass("fa-times")){$(".navbar-toggler").click();}' href="../index.php#hero">Home</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" onclick='if($("#my-bars").hasClass("fa-times")){$(".navbar-toggler").click();}' href="../index.php#contact">Contact</a>
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
        <section class="mt-1">
            <!-- ======= Breadcrumbs ======= -->
            <section id="breadcrumbs" class="breadcrumbs">
                <div class="container">

                    <ol>
                        <li><a href="./DashBoard.php">Dashboard</a></li>
                        <li>Add New Job</li>
                    </ol>
                    <h2>Add New Job</h2>

                </div>
            </section>
            <!-- End Breadcrumbs -->

            <div class="container mt-5">
                <div id="b-container">
                    <h2 class="text-center"> <b>Add New Job</b> </h2>
                    <hr>
                    <form action="./add-page.php" method="POST">
                        <div class="row form-group">
                            <div class="col-12 col-md-4">
                                <label for="job-t" style="margin-left: 20px;">Job Title :</label>
                            </div>
                            <div class="col-12 col-md-8">
                                <input id="job-t" type="text" name="job" class="form-control" placeholder=".eg JR. SOFTWARE ENGINEER/DEVELOPER" required>
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col-12 col-md-4">
                                <label for="job-l" style="margin-left: 20px;">Location :</label>
                            </div>
                            <div class="col-12 col-md-8">
                                <input id="job-l" type="text" name="loc" class="form-control" placeholder=".eg Faisalabad , Pakistan" required>
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col-12 col-md-4">
                                <label for="job-ty" style="margin-left: 20px;">Job Type :</label>
                            </div>
                            <div class="col-12 col-md-8">
                                <input id="job-ty" type="text" name="j_t" class="form-control" placeholder=".eg Full Time" required>
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col-12 col-md-4">
                                <label for="job-n" style="margin-left: 20px;">No of positions :</label>
                            </div>
                            <div class="col-12 col-md-8">
                                <input id="job-n" type="number" name="n-o-p" min="1" class="form-control" placeholder=".eg 2" required>
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col-12 col-md-4">
                                <label for="job-w" style="margin-left: 20px;">Working days :</label>
                            </div>
                            <div class="col-12 col-md-8">
                                <input id="job-w" type="text" name="w-days" class="form-control" placeholder=".eg Monday-Friday " required>
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col-12">
                                <label for="job-det" style="margin-left: 20px;">Details :</label>
                            </div>
                            <div class="col-12">
                                <textarea id="job-det" type="text" name="details" class="form-control" required rows="30">
    <br><br> Technology and Management (T&M) consultant is a social enterprise building capacity for start-ups and SMEs. We offer 360° services to start-ups and SMEs for product development, deployment and after sales services. <br><br> We are looking
    for highly motivated Jr. Software Engineers to join us immediately at our tech office in Faisalabad. You will report directly to the development manager and assist with all functions of software coding and design. Your primary focus will be to learn
    the codebase, gather user diagnostic data, identify and solve bugs and respond to requests from senior developers.<br><br> To ensure success as a junior software engineer, you should have a good working knowledge of basic programming languages, the
    ability to learn new technology quickly, and the ability to work in a team environment. Ultimately, a top-class Junior Software Engineer provides valuable support to the core team while continually improving their coding and design skills.<br><br>
    <b>Please only apply if you are from Faisalabad and can work on-site.</b><br><br>
    <ul>
        <hX><b>Junior Software Engineer Duties and Responsibilities:</b></hX>
        <li>Collaborate with other developers and engineers to design, build, and maintain applications</li>
        <li>Build applications for various platforms using common frameworks, including Laravel and Express</li>
        <li>Write and debug code</li>
        <li>Troubleshoot software issues</li>
        <li>Provide on-call support as necessary</li>
    </ul>
    <ul>
        <hX><b>Junior Software Engineer Requirements:</b></hX>
        <li> Proven knowledge of basic coding languages such as C++ and JavaScript.</li>
        <li> Knowledge of front-end & back-end software development for UNIX or LINUX.</li>
        <li> Knowledge of databases and operating systems & experience with database management and security is a plus.</li>
        <li> Experience with Laravel and Express frameworks is a plus.</li>
        <li> Good understanding of common third-party Web Services and APIs (Google, Salesforce, Mail chimp etc.)</li>
        <li> Distributed version control systems – Preferably Git.</li>
        <li> Understanding of agile methodologies project management would be a huge plus.</li>
        <li> Excellent communication skills.</li>
        <li> Ability to work effectively under pressure to meet tight deadlines.</li>
        <li> Ability to learn new software and technologies quickly.</li>
        <li> Ability to follow instructions and work in a team environment.</li>
        <li> Attention to detail and can-do attitude is a must!</li>
        <li> Bachelor’s degree in Computer Science, Information Technology, or related field</li>
    </ul>

    <br> The ideal candidate will be delivery focused, driven to understand what clients really value, and committed to building this value into the platform. You will work alongside a very small but talented team of developers and product owners to offer
    the best possible solutions available in the market.<br>
    <b>We are a friendly and social team, but as a start-up, we work very hard, and expectations are high. Please submit a CV and cover letter providing evidence for your suitability and links (URLs) to any web application you may have developed or worked on.</b><br><br>
                            </textarea>

                            </div>
                        </div>
                        <hr>
                        <div style="margin-left: 30%;">
                            <button type="submit" class="btn my-btn mt-3 w-50">Submit
                        </button>
                        </div>
                    </form>
                </div>

            </div>
        </section>

        <!-- ======= Footer ======= -->
        <footer id="footer">
            <div class="container py-2 mt-3">

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
        <!-- End Form -->
    </body>

    </html>

    <?php

if($_POST)
{
    require_once '../db_config.php';
    $sql = "insert into career (job_title,location,job_type,no_of_positions,working_days,detail) values (?,?,?,?,?,?);";
    $stmt = $conn->prepare($sql);
    if (!$stmt) {
        die("Query Preparation Failed: " . $conn->error);
    }
    $stmt->bind_param("sssiss", $_POST["job"], $_POST["loc"], $_POST["j_t"], $_POST["n-o-p"], $_POST["w-days"], $_POST["details"]);
    if ($stmt->execute()) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $stmt->error;
    }
    $stmt->close();
    $conn->close();
}

?>