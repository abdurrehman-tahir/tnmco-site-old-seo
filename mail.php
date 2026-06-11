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
require_once 'db_config.php';
require_once './assets/vendor/mailer/autoload.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

// Only accept POST submissions
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header('Location: ./index.php');
    exit();
}

// Honeypot: real visitors never see/fill this field — silently drop bot submissions
if (!empty($_POST['company_website'])) {
    session_start();
    $_SESSION['message'] = "show";
    header('Location: ./index.php');
    exit();
}

$name    = trim($_POST['name'] ?? '');
$email   = trim($_POST['email'] ?? '');
$subject = trim($_POST['subject'] ?? '');
$message = trim($_POST['message'] ?? '');

// Validate + sanitise: reject invalid emails and header-injection attempts
if ($name === '' || $subject === '' || $message === '' || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
    header('Location: ./index.php');
    exit();
}
$name    = str_replace(["\r", "\n"], ' ', $name);
$subject = str_replace(["\r", "\n"], ' ', $subject);
$message = mb_substr($message, 0, 2000);

session_start();

try {
    $mail = new PHPMailer(true);   // throw exceptions so failures are not silent

    $mail->isSMTP();
    $mail->Host = SMTP_HOST;
    $mail->SMTPAuth = true;
    $mail->Username = SMTP_USERNAME;   //username
    $mail->Password = SMTP_PASSWORD;   //password
    $mail->SMTPSecure = 'ssl';
    $mail->Port = SMTP_PORT; //SMTP port

    // Send from our own authenticated address (SPF/DMARC-safe); visitor goes in Reply-To
    $mail->setFrom(SMTP_USERNAME, 'T&M Website Contact Form');
    $mail->addReplyTo($email, $name);
    $mail->addAddress('contact@tnmco.uk');

    $mail->isHTML(false);
    $mail->Subject = $subject;
    $mail->Body    = "From: {$name} <{$email}>\n\n" . $message;

    $mail->send();
    $_SESSION['message'] = "show";
} catch (Exception $e) {
    // Don't claim success when the send failed — the toast shows an error state
    error_log('Contact form mail failure: ' . $e->getMessage());
    $_SESSION['message'] = "error";
}

header("Location:./index.php");
exit();

?>
