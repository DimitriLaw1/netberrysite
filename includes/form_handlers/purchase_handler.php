<?php
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
    header("Location: success.php");
}


?>