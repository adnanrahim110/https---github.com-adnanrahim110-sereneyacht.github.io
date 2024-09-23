<?php
// Database connection
include 'dbcon.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\SMTP;

require '../vendor/phpmailer/phpmailer/src/Exception.php';
require '../vendor/phpmailer/phpmailer/src/PHPMailer.php';
require '../vendor/phpmailer/phpmailer/src/SMTP.php';
require '../vendor/autoload.php';

function redirect($url, $message)
{
    $_SESSION['message'] = $message;
    header('location: ' . $url);
    exit(); // It's good practice to stop script execution after a header redirection
}

function getUserIP()
{
    if (array_key_exists('HTTP_X_FORWARDED_FOR', $_SERVER) && !empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
        if (strpos($_SERVER['HTTP_X_FORWARDED_FOR'], ',') !== false) {
            $ip_addresses = explode(',', $_SERVER['HTTP_X_FORWARDED_FOR']);
            return trim($ip_addresses[0]);
        } else {
            return $_SERVER['HTTP_X_FORWARDED_FOR'];
        }
    } else {
        return $_SERVER['REMOTE_ADDR'];
    }
}

function getIPInfo($ip)
{
    $ch = curl_init();

    curl_setopt($ch, CURLOPT_URL, "https://ipinfo.io/$ip/json");
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false); // Skip SSL certificate verification if necessary

    $output = curl_exec($ch);

    if ($output === false) {
        return [
            'ip' => $ip,
            'city' => 'Unknown',
            'country' => 'Unknown',
        ];
    }

    curl_close($ch);

    // Decode the JSON response
    $ip_info = json_decode($output, true);

    // Return IP information
    return $ip_info;
}

$user_ip = getUserIP();
$ip_info = getIPInfo($user_ip);

$ip = $ip_info['ip'];
$city = $ip_info['city'];
$country = $ip_info['country'];

$referrer = $_SERVER['HTTP_REFERER'];

if (isset($_POST['enquire_btn'])) {


    $secretKey = '6LfgyEwqAAAAADhLtVIqf_OlG1VbTMkBfRTRmA0D'; // Replace with your Secret Key
    $recaptchaResponse = $_POST['g-recaptcha-response'];

    // Verify reCAPTCHA response with Google
    $verifyURL = 'https://www.google.com/recaptcha/api/siteverify';

    // Send POST request
    $response = file_get_contents($verifyURL . '?secret=' . $secretKey . '&response=' . $recaptchaResponse);
    $responseKeys = json_decode($response, true);
    if ($responseKeys['success']) {

        $mail = new PHPMailer(true);

        $name = $_POST['name'];
        $email = $_POST['email'];
        $phone = $_POST['phone'];
        $message = $_POST['message'];

        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'sereneyachtsuae@gmail.com';
        $mail->Password = 'gtsd caql lzuz avij';
        $mail->SMTPSecure = 'tls';
        $mail->Port = 587;

        // Send mail to admin (Serene Yachts)
        $mail->setFrom($email);
        $mail->addAddress('sereneyachtsuae@gmail.com', $name);

        $mail->isHTML(true);
        $mail->Subject = 'Booking Inquiry - Serene Yachts';

        // Admin email template
        $email_template = "
        <html>
            <head>
                <style>
                    :root {
                        --primary-color: #0abab5;
                        --dark-color: #020f0f;
                        --gray: #4d4d4d;
                        --light-bg-prime: #edf4f3;

                        --primary-font: 'Neo Latina', sans-serif;
                        --secondary-font: 'Nexa', sans-serif;
                        --rare-font: 'Cormorant Upright', serif;
                    }

                    body {
                        font-family: var(--secondary-font);
                        background-color: var(--light-bg-prime);
                        color: var(--dark-color);
                    }

                    .email-container {
                        max-width: 600px;
                        margin: 0 auto;
                        padding: 20px;
                        border: 1px solid var(--gray);
                        border-radius: 15px;
                        background-color: white;
                    }

                    .header {
                        background-color: var(--primary-color);
                        color: white;
                        padding: 20px;
                        text-align: center;
                        font-size: 28px;
                        font-family: var(--primary-font);
                        border-radius: 15px 15px 0 0;
                    }

                    .details {
                        margin: 20px 0;
                        padding: 0 10px;
                    }

                    .details p {
                        font-size: 16px;
                        line-height: 1.8;
                        color: var(--gray);
                    }

                    .details strong {
                        font-family: var(--rare-font);
                        color: var(--dark-color);
                    }

                    .footer {
                        text-align: center;
                        font-size: 14px;
                        color: var(--gray);
                        margin-top: 30px;
                        font-family: var(--rare-font);
                    }

                    .divider {
                        height: 2px;
                        background-color: var(--primary-color);
                        margin: 20px 0;
                        border: none;
                    }
                </style>
            </head>
            <body>
                <div class='email-container'>
                    <div class='header'>
                        Booking Information from {$name}
                    </div>
                    <hr class='divider'>
                    <div class='details'>
                        <p><strong>Name:</strong> {$name}</p>
                        <p><strong>Email:</strong> {$email}</p>
                        <p><strong>Phone:</strong> {$phone}</p>
                        <p><strong>Message:</strong> {$message}</p>
                        <p><strong>City:</strong> {$city}</p>
                        <p><strong>Country:</strong> {$country}</p>
                    </div>
                    <hr class='divider'>
                    <div class='footer'>
                        Received via Serene Yachts booking form.
                    </div>
                </div>
            </body>
        </html>
    ";

        $mail->Body = $email_template;
        $mail->AltBody = "Name: {$name}\nEmail: {$email}\nPhone: {$phone}\nMessage: {$message}\nCity: {$city}\nCountry: {$country}";

        if ($mail->send()) {
            // Send auto-reply to the user
            $autoReply = new PHPMailer(true);

            $autoReply->isSMTP();
            $autoReply->Host = 'smtp.gmail.com';
            $autoReply->SMTPAuth = true;
            $autoReply->Username = 'sereneyachtsuae@gmail.com';
            $autoReply->Password = 'gtsd caql lzuz avij';
            $autoReply->SMTPSecure = 'tls';
            $autoReply->Port = 587;

            $autoReply->setFrom('sereneyachtsuae@gmail.com', 'Serene Yachts');
            $autoReply->addAddress($email);

            $autoReply->isHTML(true);
            $autoReply->Subject = 'Thank You for Your Booking Inquiry';

            // Auto-reply email template
            $autoReply_template = "
            <html>
                <body>
                    <h2>Dear {$name},</h2>
                    <p>Thank you for reaching out to Serene Yachts! We have received your booking inquiry and will be in touch with you shortly.</p>
                    <p><strong>Your Submitted Details:</strong></p>
                    <p>Name: {$name}</p>
                    <p>Email: {$email}</p>
                    <p>Phone: {$phone}</p>
                    <p>Message: {$message}</p>
                    <p>City: {$city}</p>
                    <p>Country: {$country}</p>
                    <p>We appreciate your interest in our services and look forward to providing you with a great experience.</p>
                    <p>Best Regards,<br>Serene Yachts Team</p>
                </body>
            </html>
        ";

            $autoReply->Body = $autoReply_template;
            $autoReply->AltBody = "Dear {$name},\nThank you for reaching out to Serene Yachts. We have received your booking inquiry and will be in touch with you shortly.\n\nBest Regards,\nSerene Yachts Team";

            $autoReply->send();
            redirect("../index", "Thank you for submitting your booking inquiry with <span style=\"color: #0abab5;\">Serene Yachts</span>. We will contact you soon with further details.");
        } else {
            redirect("../index", "Something went wrong: " . $mail->ErrorInfo);
        }
    } else {
        // Failed reCAPTCHA check
        redirect("../index", "Please verify that you are a human.");
    }
} else {
    redirect("../index", "Please fill out all fields.");
}
