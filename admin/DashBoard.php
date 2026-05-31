<?php
    session_start();
    if(!isset($_SESSION['username']))
    {
        header("Location:./index.php");
    }
    if(isset($_POST['submit']))
    {
        session_destroy();
        header("Location:./index.php");
    }
?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="utf-8">
        <meta content="width=device-width, initial-scale=1.0" name="viewport">
        <title>T&M Consultant : Dashboard</title>
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
            #b-container{
                border: 1px solid rgb(100, 100, 100); 
                padding: 3%; 
                border-radius: 20px; 
                width:70% ; 
                margin: 20px auto;
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
                                <a class="nav-link" onclick='if($("#my-bars").hasClass("fa-times")){$(".navbar-toggler").click();}' href="../index.php#contact">Contact</a>
                            </li>
                            <li class="nav-item">
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
                <span>Dashboard</span>
                <h2>Dashboard</h2>
            </div>
            <div class="container" id="job_panel">
                <div id="b-container">
                    <div class="row">
                        <div class="mb-3 col-12 col-md-6 d-flex justify-content-around ">
                            <a href="./Add-page.php" type="button" class="btn btn-primary btn-sm my-btn" style="width: 150px;"> Add Jobs</a>
                        </div>
                        <div class="mb-3 col-12 col-md-6 d-flex justify-content-around ">
                            <a href="../Career.php" type="button" class="btn btn-primary btn-sm my-btn" style="width: 150px;">View Jobs</a>
                        </div>
                    </div>
                    <div class="row ">
                        <div class="mb-3 col-12 col-md-6  d-flex justify-content-around ">
                            <a href="./applicants.php" type="button" class="btn btn-primary btn-sm my-btn" style="width: 150px;">View Applicants</a>
                        </div>
                        <div class="mb-3 col-12 col-md-6 d-flex justify-content-around  ">
                            <form action="./DashBoard.php" method="POST">
                                <button type="submit" class="btn btn-primary btn-sm my-btn" style="width: 150px;" name="submit">Log Out</button>
                            </form>
                    </div>

                    </div>
                </div>
            </div>
            </div>
        </section>
        <!-- ======= Footer ======= -->
        <footer id="footer" class="fixed-bottom">

            <div class="container py-2 ">
                <div class="text-center ">
                    <div class="copyright ">
                        &copy; Copyright, All rights reserved <strong><span>T&M</span></strong> 2020.
                    </div>
                    <div class="credits ">
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
    