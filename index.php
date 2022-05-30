<?php 
include("includes/header.php");
include("includes/classes/User.php");
include("includes/classes/Post.php");


if(isset($_POST['post'])){
	$post = new Post($con, $userLoggedIn);
	$post->submitPost($_POST['post_text'], 'none');
	header("Location: index.php");
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
			<p> <span style="font-weight:bold;">Artist Bio  </span><?php 
			echo $user['artist_bio'];

			 ?> </p></p>
			<p> <span style="font-weight:bold;"> Instagram: </span> <?php 
			echo $user['instagram_name'];

			 ?> </p>

<p> <span style="font-weight:bold; margin-bottom:20px;"> School: </span> <?php 
			echo $user['school_name'];

			 ?> </p>
			 <a href="settings.php" class="button1">Update Profile</a>
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
	<div class="main_column column">
		<form class="post_form" action="index.php" method="POST">
			<h3> Want to promote your new music on The NetBerry's Social Media?</h3>
			
			<a href="#" class="button1">Purchase Promotion</a>
			<hr>

		</form>

		


	</div>
<!-- Your Personal News Feed -->
	<div class="main_column column">
		<form class="post_form" action="index.php" method="POST">
			<h3> Your Personal News Feed</h3>
			<p style="font: weight 100px; color:grey">Any News You Submit Will Be Posted Here</p>
			
			
			<hr>

		</form>

		<div class="posts_area"></div>
		<img id="loading" src="assets/images/icons/loading.gif">


	</div>

	<script>
	var userLoggedIn = '<?php echo $userLoggedIn; ?>';

	$(document).ready(function() {

		$('#loading').show();

		//Original ajax request for loading first posts 
		$.ajax({
			url: "includes/handlers/ajax_load_posts.php",
			type: "POST",
			data: "page=1&userLoggedIn=" + userLoggedIn,
			cache:false,

			success: function(data) {
				$('#loading').hide();
				$('.posts_area').html(data);
			}
		});

		$(window).scroll(function() {
			var height = $('.posts_area').height(); //Div containing posts
			var scroll_top = $(this).scrollTop();
			var page = $('.posts_area').find('.nextPage').val();
			var noMorePosts = $('.posts_area').find('.noMorePosts').val();

			if ((document.body.scrollHeight == document.body.scrollTop + window.innerHeight) && noMorePosts == 'false') {
				$('#loading').show();

				var ajaxReq = $.ajax({
					url: "includes/handlers/ajax_load_posts.php",
					type: "POST",
					data: "page=" + page + "&userLoggedIn=" + userLoggedIn,
					cache:false,

					success: function(response) {
						$('.posts_area').find('.nextPage').remove(); //Removes current .nextpage 
						$('.posts_area').find('.noMorePosts').remove(); //Removes current .nextpage 

						$('#loading').hide();
						$('.posts_area').append(response);
					}
				});

			} //End if 

			return false;

		}); //End (window).scroll(function())


	});

	</script>


	</div>
</body>
</html>