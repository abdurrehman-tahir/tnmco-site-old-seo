<?php
session_start();
if(isset($_SESSION['username']) )
{
    header("Location:./DashBoard.php");
}
?>
        <!DOCTYPE html>
        <html lang="en">

        <head>
            <meta charset="utf-8">
            <meta content="width=device-width, initial-scale=1.0" name="viewport">
            <title>Privacy Policy</title>
            <link href="../assets/img/tnmLogo.png" rel="icon">
            <link href="../assets/img/tnmLogo.png" rel="apple-touch-icon">
            <!-- Google Fonts -->
            <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Montserrat:300,400,500,600,700" rel="stylesheet">
            <!-- Vendor CSS Files -->
            <link href="../assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
            <link href="../assets/css/style.css" rel="stylesheet">
            <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.1/css/all.css" integrity="sha384-gfdkjb5BdAXd+lj+gudLWI+BXq4IuLW5IT+brZEZsLFm++aCMlF1V92rMkPaX4PP" crossorigin="anonymous">
            <script src="https://kit.fontawesome.com/3e825e83d5.js" crossorigin="anonymous"></script>
            <script src="../assets/vendor/jquery/jquery.min.js"></script>
            <style>
                #b-container{
                    border: 3px solid  #2e2eb8; padding: 5%; margin: auto;
                    margin-top: 30px; align-items: center; border-radius:20px; width:50%;
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
                                    <a class="nav-link" onclick='if($("#my-bars").hasClass("fa-times")){$(".navbar-toggler").click();}' href="../index.php#about">About</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" onclick='if($("#my-bars").hasClass("fa-times")){$(".navbar-toggler").click();}' href="../index.php#contact">Contact</a>
                                </li>
                            </ul>
                        </div>
                    </nav>
                </div>
            </header>

            <!-- Start Form -->
            <section class="mt-3">
                <div class="section-title" style="background-color: #F7F7F7FD;">
                    <span class="pt-5" style="color:  #e4e4e4b0;">Admin Login</span>
                    <h2 class="pt-5" style="color:rgb(36, 36, 36); ">Admin Login</h2>
                </div>
                <div class="container align-items-center">
                    <div id="b-container">
                        <form action="./login.php" method="POST">
                            <div class="input-group mb-3" style="width: 70%; margin: auto;">
                                <div class="input-group-append">
                                    <span class="input-group-text"><i class="fas fa-user"></i></span>
                                </div>
                                <input type="text" name="user-name" class="form-control input_user" value="" placeholder="username" required>
                            </div>
                            <div class="input-group mb-2" style="width: 70%; margin: auto;">
                                <div class="input-group-append">
                                    <span class="input-group-text"><i class="fas fa-key"></i></span>
                                </div>
                                <input type="password" id="myInput" name="password" class="form-control input_pass" value="" placeholder="password" required>
                            </div>
                            <p id="a_error" style="margin-left:27%; color:red"></p>
                            <div class="input-group mb-2" style="width: 70%; margin: auto;">

                                <label class="container">
                                <input type="checkbox" name="checkbox" onclick="myFunction()">  Show Password
                                </label>

                            </div>
                            <div class="d-flex justify-content-center mt-3 login_container" style="width: 50%; margin: auto; padding-top: 20px;">
                                <button type="submit" class="btn login_btn">
                        <i class="fas fa-door-open"></i> Login
                        </button>
                            </div>
                        </form>
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
            <!-- End Form -->

            <!-- Template Main JS File -->
        </body>
        <script>
            function myFunction() {
                var x = document.getElementById("myInput");
                if (x.type === "password") {
                    x.type = "text";
                } else {
                    x.type = "password";
                }
            }

            $(document).ready(function() {
                $('[data-toggle="popover"]').popover();
            });
        </script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

        </html>

<?php
if(isset($_SESSION['message']) && !empty($_SESSION['message']))
{
if($_SESSION['message']=="user_error")
{
?>
    <script>
        document.getElementById("a_error").innerHTML = "Invalid User Name !";
    </script>
<?php
unset($_SESSION['message']);
}
else if($_SESSION['message']=="pass_error")
{
?>
<script>
    document.getElementById("a_error").innerHTML = "Incorrect Password !";
</script>
<?php
unset($_SESSION['message']);
}
}
?>
