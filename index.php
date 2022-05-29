<?php 
include("includes/header.php");
include("includes/classes/User.php");
include("includes/classes/Post.php");


if(isset($_POST['post'])){
	$post = new Post($con, $userLoggedIn);
	$post->submitPost($_POST['post_text'], 'none');
}


 ?>
 <div class="container-fluid2">
	<div class="user_details column">
		<a href="<?php echo $userLoggedIn; ?>">  <img src="<?php echo $user['profile_pic']; ?>"> </a>

		<div class="user_details_left_right">
			<a href="<?php echo $userLoggedIn; ?>">
			<?php 
			echo $user['first_name'] . " " . $user['last_name'];

			 ?>
			</a>
			<br>
			<p> <span style="font-weight:bold;">Artist Bio  </span>(editable): </p>
			<p> <span style="font-weight:bold;"> Instagram: </span> <?php 
			echo $user['instagram_name'];

			 ?> </p>

<p> <span style="font-weight:bold;"> School: </span> <?php 
			echo $user['school_name'];

			 ?> </p>
			 <input type="submit" name="updateprofile" id="update_button" value="Update Profile">
		</div>

	</div>
 </div>

	<div class="main_column column">
		<form class="post_form" action="index.php" method="POST">
			<h3> Send Us News ! Let Us Hear About It!</h3>
			<textarea name="post_text" id="post_text" placeholder="Are you performing somewhere? Did you win an award? Campus involvement? Events we should know about? etc.."></textarea>
			<input type="submit" name="post" id="post_button" value="Submit News">
			<hr>

		</form>

		


	</div>




	</div>
</body>
</html>