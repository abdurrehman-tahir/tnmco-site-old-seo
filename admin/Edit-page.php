<?php

session_start();
if(!isset($_SESSION['username']) )
{
    header("Location:./index.php");
}
require_once '../db_config.php';
if(isset($_GET['id'])){
    if(is_numeric($_GET['id']) ){
        $sql = "SELECT * FROM career where id = ?;";
        $stmt = $conn->prepare($sql);
        if (!$stmt) {
            die("Query Preparation Failed: " . $conn->error);
        }
        $stmt->bind_param("i", $_GET['id']);
        $stmt->execute();
        $result = $stmt->get_result();
        $stmt->close();
    }
}
$conn->close();
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
                #b-container{
                    border: 1px solid rgb(100, 100, 100);
                    padding: 3%; 
                    margin-top: 20px;
                    margin-bottom: 40px;
                    margin: auto;
                    border-radius: 20px; 
                    width: 60%;
                }
                @media (max-width: 767px) {
                    #b-container{width:80%;}
                }

                @media (max-width: 480px) {
                    #b-container{width:95%;}
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
                        <li>Edit Job</li>
                    </ol>
                    <h2>Edit Job</h2>

                </div>
            </section>
            <!-- End Breadcrumbs -->

            <div class="container mt-5">
                <div id="b-container">
                    <h2 class="text-center"> <b>Edit Job Details</b> </h2>
                    <hr>
                    <?php
                if(isset($_GET['id'])){
                    if(is_numeric($_GET['id']) ){
                while($rows=$result->fetch_assoc())
                {
                ?>
                        <form action="./update_page.php?id=<?php echo $rows['id'];?>" method="POST">
                            <div class="row form-group">
                                <div class="col-12 col-md-4">
                                    <label for="job-t" style="margin-left: 20px;">Job Title :</label>
                                </div>
                                <div class="col-12 col-md-8">
                                    <input id="job-t" type="text" name="job" class="form-control" value="<?php echo $rows['job_title'];?>" required>
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col-12 col-md-4">
                                    <label for="job-l" style="margin-left: 20px;">Location :</label>
                                </div>
                                <div class="col-12 col-md-8">
                                    <input id="job-l" type="text" name="loc" class="form-control" value="<?php echo $rows['location'];?>" required>
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col-12 col-md-4">
                                    <label for="job-ty" style="margin-left: 20px;">Job Type :</label>
                                </div>
                                <div class="col-12 col-md-8">
                                    <input id="job-ty" type="text" name="j_t" class="form-control" value="<?php echo $rows['job_type'];?>" required>
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col-12 col-md-4">
                                    <label for="job-n" style="margin-left: 20px;">No of positions :</label>
                                </div>
                                <div class="col-12 col-md-8">
                                    <input id="job-n" type="number" name="n-o-p" min="1" class="form-control" value="<?php echo $rows['no_of_positions'];?>" required>
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col-12 col-md-4">
                                    <label for="job-w" style="margin-left: 20px;">Working days :</label>
                                </div>
                                <div class="col-12 col-md-8">
                                    <input id="job-w" type="text" name="w-days" class="form-control" value="<?php echo $rows['working_days']; ?>" required>
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col-12 col-md-4">
                                    <label for="job-ty" style="margin-left: 20px;">Status :</label>
                                </div>
                                <div class="col-12 col-md-8">
                                    <input id="job-ty" type="number" name="stat" class="form-control" min="0" max="1" value="<?php echo $rows['status'];?>" required>
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col-12">
                                    <label for="job-det" style="margin-left: 20px;">Details :</label>
                                </div>
                                <div class="col-12">
                                    <textarea id="job-det" type="text" name="det" class="form-control" required rows="30">
                            <?php echo $rows['detail'];}}}?>
                            </textarea>

                                </div>
                            </div>
                            <div style="margin-left: 30%;">
                                <button type="submit" class="btn my-btn mt-3 w-50">Edit
                        </button>
                            </div>
                            <hr>

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