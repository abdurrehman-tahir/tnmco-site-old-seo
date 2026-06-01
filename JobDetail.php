<?php
if(isset($_GET['id']) && is_numeric($_GET['id']))
{
require_once 'db_config.php';
$sql = "SELECT * FROM career where id = ?;";
$stmt = $conn->prepare($sql);
if (!$stmt) {
    die("Query Preparation Failed: " . $conn->error);
}
$stmt->bind_param("i", $_GET['id']);
$stmt->execute();
$result = $stmt->get_result();
$stmt->close();
$conn->close();
}
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
    <link href="./assets/img/cropped-Logo.6.3-gradient-shadow.1-1024x957.png" rel="icon">
    <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Montserrat:300,400,500,600,700" rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <link href="./assets/css/style.css" rel="stylesheet">
    <script src="https://kit.fontawesome.com/3e825e83d5.js" crossorigin="anonymous"></script>

    <script src="assets/vendor/jquery/jquery.min.js"></script>
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
/* Chrome, Safari, Edge, Opera */
input::-webkit-outer-spin-button,
input::-webkit-inner-spin-button {
  -webkit-appearance: none;
  margin: 0;
}

/* Firefox */
input[type=number] {
  -moz-appearance: textfield;
}
</style>
</head>
<!-- ======= Header ======= -->

<body>
    <header id="header" class="fixed-top header-transparent header-scrolled">
        <div class="container">
            <nav class="navbar navbar-expand-md bg-transparent navbar-light p-0 m-0">
                <!-- Site Logo Here -->
                <a class="logo mr-auto" href="./index.php"><img src="./assets/img/tnmLogo.png" alt="TNM Logo" width="400" height="374"></a>
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
                            <a class="nav-link" onclick='if($("#my-bars").hasClass("fa-times")){$(".navbar-toggler").click();}' href="./index.php#hero">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" onclick='if($("#my-bars").hasClass("fa-times")){$(".navbar-toggler").click();}' href="./index.php#about">About</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" onclick='if($("#my-bars").hasClass("fa-times")){$(".navbar-toggler").click();}' href="./index.php#services">Services</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" onclick='if($("#my-bars").hasClass("fa-times")){$(".navbar-toggler").click();}' href="./index.php#portfolio">Portfolio</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" onclick='if($("#my-bars").hasClass("fa-times")){$(".navbar-toggler").click();}' href="./index.php#testimonials">Testimonials</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" onclick='if($("#my-bars").hasClass("fa-times")){$(".navbar-toggler").click();}' href="./index.php#team">Team</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" onclick='if($("#my-bars").hasClass("fa-times")){$(".navbar-toggler").click();}' href="./index.php#contact">Contact</a>
                        </li>
                        <li class="nav-item ">
                            <a class="nav-link" onclick='if($("#my-bars").hasClass("fa-times")){$(".navbar-toggler").click();}' href="./Career.php">Career</a>
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
          <li><a href="./index.php">Home</a></li>
          <li><a href="./Career.php">Career</a></li>
          <li>Job Details</li>
        </ol>
        <h2>Add New Job</h2>

      </div>
    </section><!-- End Breadcrumbs -->

        <div class="container mt-5">
            <div style="border: 1px solid rgb(100, 100, 100); padding: 3%; margin-top: 20px; margin-bottom: 30px; border-radius: 20px;">
            <h1 style="font-weight:600;">
            <?php if(isset($_GET['id']) && is_numeric($_GET['id'])){
                    $rows=$result->fetch_assoc();
                    if(!is_null($rows))
                    {
                        echo $rows['job_title'];
                    ?> </li>
            </h1>
                    <i class="fas fa-clock mb-2 mr-2"></i> <?php echo time_elapsed_string($rows['created_at']); ?> </li> <br>
                    <i class="fas fa-map-marked-alt mb-2 mr-2"></i> <?php echo $rows['location'];?> <br>
                    <i class="fas fa-business-time mb-2 mr-2"></i> <?php echo $rows['job_type'];?> <br>
                    <i class="fas fa-laptop-code mb-2 mr-2"></i> <?php echo $rows['requirements'];?> <br>
                    <br><br>
                    <i class="fas fa-check mb-2 mr-2"></i> No. of Positions: <?php echo $rows['no_of_positions'];?> <br>
                    <i class="fas fa-check mb-2 mr-2"></i> Job Type: <?php echo $rows['job_type'];?> <br>
                    <i class="fas fa-check mb-2 mr-2"></i> Working Days: <?php echo $rows['working_days'];?> <br>

                    <br>
                    <b><i class="fas fa-map-marker-alt"></i> Job Location : <?php echo $rows['location'];?> </b>
                <?php
                    echo $rows['detail'];
                    }
                    else
                    {
                        ?>
                        No record found.
                        <?php  
                    }
                }else{
                    ?>
                    Job detail is missing.
                    <?php  
                }

                ?>
                
<div style="text-align: right; margin-right: 20px;">
    <button type="button" class="btn btn-primary my-btn" data-toggle="modal" data-target="#exampleModal" data-whatever="@mdo">Apply Now</button></div>
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Apply Now</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="./applicant_info.php" method="POST" enctype="multipart/form-data">
                <input type="number" class="d-none" name="id" value="<?php echo $_GET['id'] ?>" required >
                    <div class="form-group">
                        <label for="recipient-name" class="col-form-label">Name:</label>
                        <input type="text" class="form-control" name="a_name" id="recipient-name" placeholder="e.g. Rohan Farooq" required >
                    </div>
                    <div class="row">
                        <div class="col form-group">
                            <label for="phone-text" class="col-form-label">Phone:</label>
                            <input type="text" maxlenght="11"  name="a_phone" class="form-control" id="phone-text"  placeholder="03001234567" required >
                        </div>
                        <div class="col form-group">
                            <label for="Email-text" class="col-form-label">Email:</label>
                            <input type="email" class="form-control" id="Email-text" name="a_email" placeholder="e.g. info@gmail.com" required >
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="form-label" for="customFile">Resume</label>
                        <input style="border: none;" type="file" class="form-control" name="a_file"  id="customFile" accept=".doc,.pdf" required>
                    </div>
                    <div class="form-group">
                        <label for="Cover-text" class="col-form-label">Cover Letter:</label>
                        <textarea class="form-control" id="Cover-text" maxlength="200" name="a_cover" placeholder="Cover Letter (200 Letters) ..." required></textarea>
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Send message</button>
            </div>
        </form>
        </div>
    </div>
</div>
            </div>

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

    <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="assets/vendor/jquery.easing/jquery.easing.min.js"></script>

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