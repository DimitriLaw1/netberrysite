<?php

//Import PHPMailer classes into the global namespace
//These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';

//Declaring variables to prevent errors
$flname = ""; //First and last name
$instagram = ""; //instagram
$em = ""; //email

$promo_option = ""; // promo options to purchase 
$music_link = ""; //music link
$promo_date = ""; // promo date
$promo_time = ""; //promo time
$payment_options = ""; // payment options

$school_from = $user['school_name'];
$user_names = $user['username'];
$payment_status = "pending";

$subjectLine= "NetBerry Inquiry Confirmation ";
$bodyLineHtml = "<p> This is a confirmation 
that we recieved your inquiry of social media promotion. </p> <p> Please give us 48 hours to email you with the next steps! </p>";
$bodyLine = "This is a confirmation 
that we recieved your inquiry of social media promotion. Please give us 48 hours to email you with the next steps!";


if(isset($_POST['purchase_button'])){

    //full name
	$flname = $_POST['flname']; //Remove html tags

    //instagram 
	$instagram = $_POST['instagram']; //Remove html tags

    //email
	$em = $_POST['reg_email']; //Remove html tags

    //promo options to purchase 
	$promo_option = $_POST['reg_promo']; //Remove html tags

     //music link
	$music_link = $_POST['reg_links']; //Remove html tags

     //promo date
	$promo_date = $_POST['reg_date']; //Remove html tags

     //promo time
	$promo_time = $_POST['reg_time']; //Remove html tags

     //payment options
	$payment_options = $_POST['reg_purchase']; //Remove html tags

    $query = mysqli_query($con, "INSERT INTO inquiry VALUES (null, '$flname', '$instagram', '$em', '$promo_option', '$music_link','$promo_date','$promo_time', '$payment_options','$school_from','$user_names', '$payment_status')");

    //PHPMailer

    //Create an instance; passing `true` enables exceptions
$mail = new PHPMailer(true);

try {
    //Server settings
    $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
    $mail->isSMTP();                                            //Send using SMTP
    $mail->Host       = 'mail.thenetberry.com';                     //Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
    $mail->Username   = 'ads@thenetberry.com';                     //SMTP username
    $mail->Password   = 'Bryanda01@';                               //SMTP password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
    $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`                                   //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

    //Recipients
    $mail->setFrom('ads@thenetberry.com', 'The NetBerry Team');
    $mail->addAddress($em);     //Add a recipient
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



    
    header("Location: success.php");
}


?>