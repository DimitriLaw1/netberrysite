<?php
//$id = ""; //First name

if(isset($_POST['update_pending'])) {
    $id = $_POST['ids'];
   // $password = strip_tags($_POST['reg_password']); //Remove html tags
   // $instagram_name = $_POST['instagram_name'];
  // $person_name = $row['person_name'];
    $update_payment = 'approved';
    $instagram_query = mysqli_query($con, "UPDATE inquiry SET payment_status='$update_payment' WHERE id='$id'");
    $message = "Details updated!<br><br>";
}

?>