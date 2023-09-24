<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php';
function send_password_reset($email, $token)
{
    $mail = new PHPMailer(true);

    $mail->isSMTP();
    $mail->SMTPAuth = true;

    $mail->Host = 'smtp.gmail.com';
    $mail->Username = 'gecblogs@gmail.com';
    $mail->Password = 'wjgxqffmewhllhtd';
    $mail->SMTPSecure = 'tls';
    $mail->Port = 587;
    $mail->setFrom('gecblogs@gmail.com', 'GEC Blogs');
    $mail->addAddress($email);
    $mail->isHTML(true);
    $mail->Subject = 'Email Verification';
    $email_template = "
            <h2>Hello, you are receiving this email because you requested a password reset.</h2>
            <p>Click the link below to reset your password</p>
            <a href= 'http://localhost/gecblogs/app/auth/password-change.php?token=$token&email=$email'>Reset Password</a>
            ";
    $mail->Body = $email_template;
    $mail->send();
}

function sendemailverify($username, $email, $token)
{
    $mail = new PHPMailer(true);

    $mail->isSMTP();
    $mail->SMTPAuth = true;

    $mail->Host = 'smtp.gmail.com';
    $mail->Username = 'gecblogs@gmail.com';
    $mail->Password = 'wjgxqffmewhllhtd';
    $mail->SMTPSecure = 'tls';
    $mail->Port = 587;
    $mail->setFrom('gecblogs@gmail.com', 'GEC Blogs');
    $mail->addAddress($email);
    $mail->isHTML(true);
    $mail->Subject = 'Email Verification';
    $email_template = "
        <h2>Thank you for registering with us</h2>
        <p>Click the link below to verify your email address</p>
        
        <a href=  'http://localhost/gecblogs/app/auth/verifyemail.php?token=$token'>Verify Email</a>
        ";
    $mail->Body = $email_template;
    $mail->send();
}

?>