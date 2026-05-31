<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <title>T&M Consultant : Join Us</title>
    <link href="./assets/img/cropped-Logo.6.3-gradient-shadow.1-1024x957.png" rel="icon">
    <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">
</head>

<body>
</body>


</html>
<?php

require_once './assets/vendor/mailer/autoload.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

$mail = new PHPMailer();

$name = $_POST['name'];
$email = $_POST['email'];
$subject = $_POST['subject'];
$message = $_POST['message'];

$mail->isSMTP();
$mail->Host = 'tnmco.uk';
$mail->SMTPAuth = true;
$mail->Username = 'test@tnmco.uk';   //username
$mail->Password = "1qa2ws3ed";   //password
$mail->SMTPSecure = 'ssl';
$mail->Port = 465; //SMTP port

$mail->setFrom($email, $name);
$mail->addAddress('contact@tnmco.uk');

$mail->isHTML(true);
$mail->Subject = $subject;
$mail->Body    = $message;

$mail->send();
session_start();
$_SESSION['message'] = "show";
header("Location:./index.php");
exit();

?>