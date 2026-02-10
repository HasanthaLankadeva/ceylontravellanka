<?php

$host = $_SERVER['HTTP_HOST'];

if ($host === 'localhost' || str_contains($host, '127.0.0.1')) {
    $config = require __DIR__ . '/config/config.local.php';
} elseif (str_contains($host, 'dev.ceylontravellanka.com')) {
    $config = require __DIR__ . '/config/config.dev.php';
} else {
    $config = require __DIR__ . '/config/config.prod.php';
}

require_once($config['base_url'] . 'PHPMailer/src/PHPMailer.php');
require_once($config['base_url'] . 'PHPMailer/src/SMTP.php');
require_once($config['base_url'] . 'PHPMailer/src/Exception.php');

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

$adminEmailAddress = $config['admin_email'];
$name = $_POST['first_name'];
$email = 'kadhlankadeva@gmail.com';
$phone = '';
$message = '';

//Create a new PHPMailer instance
$mail = new PHPMailer(true);

try {
    // Set PHPMailer to use the SMTP transport
    $mail->isSMTP();
    $mail->Host       = $config['smtp_host'];
    $mail->SMTPAuth   = true;
    $mail->Username   = $config['smtp_user'];
    $mail->Password   = $config['smtp_pass'];
    $mail->SMTPSecure = $config['SMTPSecure'];
    $mail->Port       = $config['smtp_port'];

    // Email settings
    $mail->setFrom($adminEmailAddress, 'Ceylon Travel Lanka');
    $mail->addAddress($email); //receiver

    $mail->isHTML(true);

    $mail->Subject = 'Enquiry';
    //$mail->Body    = 'Test email';
    

    //Read an HTML message body from an external file, convert referenced images to embedded,
    //convert HTML into a basic plain-text alternative body
    $mail->msgHTML('<!DOCTYPE html>
    <html>
    <head>
        <title>Email</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>
    <body style="width:100% !important;margin:0;padding:0;background-color:#eee;">
        <table border="0" style="width:100% !important;margin:0;padding:0;background-color:#eee;" width="100%">
            <tbody>
                <tr>
                    <td>
                        <table border="0" style="background-color: #ffffff;margin: 50px auto;width: 600px; border: 2px solid #dadada" align="center">
                            <tbody style="border-collapse:collapse;mso-table-lspace:0;mso-table-rspace:0;color:#875f34;font-family:Helvetica Neue, Arial;font-size:14px;line-height:130%;text-align:left;padding-top:9px;padding-bottom:9px;padding-left:18px;padding-right:18px;">
                                <tr>
                                    <td style="padding-bottom: 20px;padding-left: 20px;padding-right: 20px;padding-top: 20px; text-align: center;">
                                        <a href="https://ceylontravellanka.com" target="_blank" style="word-wrap:break-word;color:#15C;font-weight:normal;text-decoration:underline"><img align="center" alt="logo" src="https://dev.ceylontravellanka.com/images/logo.svg" width="100" style="border:0;height:auto;line-height:100%;outline:none;text-decoration:none;padding-bottom:0;display:inline;vertical-align:bottom;margin-right:0;max-width:232px;float: none;" /></a>
                                    </td>
                                </tr>
                                <tr>
                                    <td style="padding-bottom: 20px;padding-left: 20px;padding-right: 20px;padding-top: 30px;color: #111111">
                                        <div class="kmParagraph" style="padding-bottom:9px">
                                            <p style="margin:0;padding-bottom:1em;margin-bottom: 1em;">
                                                Thank you for contacting us.
                                            </p>
                                            <p style="margin:0;padding-bottom:1em;margin-bottom: 1em;">
                                                We have received your message and appreciate you reaching out. A member of our team will review your inquiry and get back to you as soon as possible.</p>
                                                <p style="margin:0;padding-bottom:1em;margin-bottom: 1em;">
                                                In the meantime, no further action is required. We look forward to assisting you.</p>
                                                <p style="margin:0;padding-bottom:1em;margin-bottom: 1em;">
                                                Kind regards,</p>
                                                <p style="margin:0;padding-bottom:0;margin-bottom:0.4em;">
                                                The Ceylon Travel Lanka Team</p>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td style="padding-bottom: 20px;padding-left: 20px;padding-right: 20px;padding-top: 20px;text-align: center; color:#ffffff;background-color: #016076;">
                                        <div class="kmParagraph" style="padding-bottom:9px;padding-top: 9px;">
                                            <b>Ceylon Travel Lanka</b><br />No: 83/D, Waliya north<br />Minuwangoda<br />Sri Lanka<br /><a href="tel:+94759800348" title="Call us" style="text-decoration: none; color:#ffffff;">+94 75 980 0348</a>
                                            <br /><a href="mailto:contact@ceylontravellanka.com" title="Send E-mail" style="color:#ffffff;">contact@ceylontravellanka.com</a>
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </td>
                </tr>
            </tbody>
        </table>
    </body>
    </html>');

    if ($mail->send()) {
        echo 'SUCCESS';
    } else {
        echo 'FAILED';
    }
   
} catch (Exception $e) {
    echo "Mail error: {$mail->ErrorInfo}";
}

//echo json_encode($data);
?>