<?php 
include("includes/header.php");
include("includes/form_handlers/settings_handler.php");
?>

<div class="main_column column">

	<h4>Account Settings</h4>
	<?php
	echo "<img src='" . $user['profile_pic'] ."' id='small_profile_pics'>";
	?>
	<br>
	<a href="upload.php">Upload new profile picture</a> <br><br><br>

	Modify the values and click 'Update Details'

	<?php
	$user_data_query = mysqli_query($con, "SELECT first_name, last_name, email, instagram_name FROM users WHERE username='$userLoggedIn'");
	$row = mysqli_fetch_array($user_data_query);

	$first_name = $row['first_name'];
	$last_name = $row['last_name'];
	$email = $row['email'];
    $instagram_name = $row['instagram_name'];
	?>

	<form action="settings.php" method="POST">
		First Name: <input type="text" name="first_name" value="<?php echo $first_name; ?>"><br>
		Last Name: <input type="text" name="last_name" value="<?php echo $last_name; ?>"><br>
		Email: <input type="text" name="email" value="<?php echo $email; ?>"><br>

		<?php echo $message; ?>

		<input type="submit" name="update_details" id="save_details" value="Update Details"><br>
	</form>

	<h4>Change Password</h4>
	<form action="settings.php" method="POST">
		Old Password: <input type="password" name="old_password" ><br>
		New Password: <input type="password" name="new_password_1" ><br>
		New Password Again: <input type="password" name="new_password_2" ><br>

		<?php echo $password_message; ?>

		<input type="submit" name="update_password" id="save_details" value="Update Password"><br>
	</form>

    <h4>Change Instagram Name</h4>
	<form action="settings.php" method="POST">
    Instagram Name: <input type="text" name="instagram_name" value="<?php echo $instagram_name; ?>"><br>
		

    <?php echo $message; ?>

		<input type="submit" name="update_instagram" id="save_details" value="Update Instagram"><br>
        
	</form>

    <h4>Change School Name</h4>
	<form action="settings.php" method="POST">
          
    <?php
include("form.php");
    ?>
		

    <?php echo $message; ?>

		<input type="submit" name="update_school" id="save_details" value="Update School"><br>
        
	</form>

    <h4>Update Artist Biography</h4>
	<form action="settings.php" method="POST">
    <textarea name="artist_bio" id="artist_bio" placeholder="Dwayne Michael Carter Jr. (born September 27, 1982), known professionally as Lil Wayne, is an American rapper, songwriter, and record executive." style="width: 100%;
    height: 60px;
    border-radius: 3px;
    margin-right: 5px;
    border: 1px solid #D3D3D3;
    font-size: 12px;
    padding: 5px;
    margin-bottom: 20px;
    font-size: 14px;"></textarea>
   <br> <?php echo $message; ?>

		<input type="submit" name="update_bio" id="save_details" value="Update Biography"><br>
        
	</form>

	<h4>Close Account</h4>
	<form action="settings.php" method="POST">
		<input type="submit" name="close_account" id="close_account" value="Close Account">
        
	</form>


</div>