<?php 
include("includes/header.php");
include("includes/classes/User.php");
include("includes/classes/Post.php");

?>

<div class="container-fluid">
<h1>Social Media Advertisement Inquiry </h1>

<div class="main_column column">



<form action="register.php" method="POST">

<div class="user_details column">
    
		 <img style="margin-bottom: 10px;" src="<?php echo $user['profile_pic']; ?>"> 
<div>
<label for="fname">Name:</label>
<input type="text" name="log_email"  value="<?php 
			echo $user['first_name'] . " " . $user['last_name'];

			 ?>"><br>
</div>

<div>
<label for="fname">Instagram Name:</label>
<input type="text" name="log_email"  value="<?php 
			echo $user['instagram_name'];

			 ?>"><br>
</div>

<div>
<label for="fname">Email:</label>
<input type="email" name="log_email"  value="<?php 
			echo $user['email'];

			 ?>"><br>
</div>
</div>
             <div style="margin-top: 30px;">
             <h4>Please select what you want promoted:</h4>
  <input type="radio" id="MusicVideo" name="reg_promo" value="Music Video ($30)">
  <label for="MusicVideo">Music Video ($30)</label><br>

  <input type="radio" id="Album" name="reg_promo" value="E.P / Album ($25)">
  <label for="Album">E.P / Album ($25)</label><br>

  <input type="radio" id="Single" name="reg_promo" value="Single ($20)">
  <label for="Single">Single ($20)</label><br>

  <input type="radio" id="Brand" name="reg_promo" value="Brand/Business ($20)">
  <label for="Brand">Brand/Business ($20)</label><br> <br>

<label for="reg_links">Link:</label>
<input style="width: 250px;" type="text" name="reg_links" placeholder="https://soundcloud.com/tiacorine/fyk-1"  value=""><br>

             </div>

             <div style="margin-top: 30px;">
             <h4>Enter a Date/Time you want this promoted:</h4><br>

             <label for="reg_date">Date</label>
<input type="text" id="reg_date" name="reg_date" placeholder="Ex. 06/21/2022">

<label for="reg_time">Time</label>
<input type="text" id="reg_time" name="reg_time" placeholder="Ex. Morning, Afternoon">
</div> <br> 

<div style="margin-top: 30px;">
             <h4>Payment Options | How would you like to pay?:</h4>
  <input type="radio" id="CashApp" name="fav_payment" value="Cash App" onClick="im('a1');" checked>
  <label for="CashApp">Cash App</label><br>

  <input type="radio" id="paypal" name="fav_payment" value="Pay Pal" onClick="im('a2');">
  <label for="paypal">Pay Pal</label><br>

             </div> <br>
             <img id="a" src="assets/images/icons/cashapp.png" width="50" height="50" alt="">
<input type="submit" value="Purchase">
</form>
</div>






</div>
<!--
<script>
$(document).ready(function() {
   $("ul.options-list li").on("click",function() {
   			if($(this).find('input[type="radio"]').is(':checked')) { 
          $('ul.options-list li').removeClass('sel_bk_color');
          $(this).addClass('sel_bk_color');
        }
    });
});
    </script>
-->

<script>
function preLoad() {
  a1 = new Image; a1.src = 'assets/images/icons/cashapp.png';  
  a2 = new Image; a2.src = 'assets/images/icons/PayPal.png'; 
  
}
function im(image) {
  document.getElementById(image[0]).src = eval(image + ".src")
}
</script>
</body>
</html>