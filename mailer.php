<?php
//Import PHPMailer classes into the global namespace
//These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';



$subjectLine= "NetBerry News Alert ";
$bodyLineHtml = "<p> This is an email alert that someone posted news. </p> ";
$bodyLine = "This is an email alert that someone posted news.";
		 //PHPMailer

    //Create an instance; passing `true` enables exceptions
$mail = new PHPMailer(true);

try {
    //Server settings
    $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
    $mail->isSMTP();                                            //Send using SMTP
    $mail->Host       = 'mail.thenetberry.com';                     //Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
    $mail->Username   = 'news@thenetberry.com';                     //SMTP username
    $mail->Password   = 'Bryanda01@';                               //SMTP password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
    $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`                                   //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

    //Recipients
    $mail->setFrom('news@thenetberry.com', 'The NetBerry News Team');
    $mail->addAddress('news@thenetberry.com');     //Add a recipient
    $mail->addBCC('thenetberry@gmail.com');
    $mail->addReplyTo('noreply@thenetberry.com', 'No Reply');
    


    //Content
    $mail->isHTML(true);                                  //Set email format to HTML
    $mail->Subject = $subjectLine;
    $mail->Body    = $bodyLineHtml;
    $mail->AltBody = $bodyLine;

    $mail->send();
    echo 'Message has been sent';
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}


?>