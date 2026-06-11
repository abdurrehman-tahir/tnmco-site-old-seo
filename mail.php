<?php
/**
 * Contact form endpoint.
 * - AJAX (fetch with X-Requested-With: fetch): returns JSON {ok: bool}, page never navigates.
 * - No-JS fallback: redirects back to the homepage with a session toast.
 * NOTE: no HTML output before the header() calls — output before headers broke redirects.
 */
require_once 'db_config.php';
require_once './assets/vendor/mailer/autoload.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

session_start();

$isAjax = (($_SERVER['HTTP_X_REQUESTED_WITH'] ?? '') === 'fetch');

function respond(bool $ok, bool $isAjax): void
{
    if ($isAjax) {
        header('Content-Type: application/json');
        echo json_encode(['ok' => $ok]);
    } else {
        $_SESSION['message'] = $ok ? 'show' : 'error';
        header('Location: ./index.php');
    }
    exit();
}

// Only accept POST submissions
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header('Location: ./index.php');
    exit();
}

// Honeypot: real visitors never see/fill this field — pretend success so bots learn nothing
if (!empty($_POST['company_website'])) {
    respond(true, $isAjax);
}

$name    = trim($_POST['name'] ?? '');
$email   = trim($_POST['email'] ?? '');
$subject = trim($_POST['subject'] ?? '');
$message = trim($_POST['message'] ?? '');

// Validate + sanitise: reject invalid emails and header-injection attempts
if ($name === '' || $subject === '' || $message === '' || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
    respond(false, $isAjax);
}
$name    = str_replace(["\r", "\n"], ' ', $name);
$subject = str_replace(["\r", "\n"], ' ', $subject);
$message = mb_substr($message, 0, 2000);

try {
    $mail = new PHPMailer(true);   // throw exceptions so failures are not silent

    $mail->isSMTP();
    $mail->Timeout = 15;   // don't leave the visitor's button spinning on a slow SMTP server
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
    respond(true, $isAjax);
} catch (Exception $e) {
    error_log('Contact form mail failure: ' . $e->getMessage());
    respond(false, $isAjax);
}
