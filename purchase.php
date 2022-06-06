<?php 
include("includes/header.php");
include("includes/classes/User.php");
include("includes/classes/Post.php");
include("includes/form_handlers/purchase_handler.php");


?>
<script src="https://www.paypal.com/sdk/js?client-id=AbEmCwD9QHmYla4olQWwCIMseSGpNun89OR16fScLmV9-6OtP_N-opvrMxMsYbilO-q9mFZPX9AfmrtS&currency=USD&disable-funding=credit,card"></script>
<div class="container-fluid">
<h1>Social Media Advertisement Inquiry </h1>

<div class="main_column column">



<form action="purchase.php" method="POST">

<div class="user_details column">
    
		 <img style="margin-bottom: 10px;" src="<?php echo $user['profile_pic']; ?>"> 
<div>
<label for="flname">Name:</label>
<input type="text" name="flname"  value="<?php 
			echo $user['first_name'] . " " . $user['last_name'];

			 ?>"><br>
</div>

<div>
<label for="instagram">Instagram Name:</label>
<input type="text" name="instagram"  value="<?php 
			echo $user['instagram_name'];

			 ?>"><br>
</div>

<div>
<label for="reg_email">Email:</label>
<input type="email" name="reg_email"  value="<?php 
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
             <h4>Payment Options | How would you like to pay?</h4>
             <input type="radio" id="cashapp" value="Cash App" name="reg_purchase" onClick="im('a1');" checked>
             <label for="cashapp">Cash App</label><br> <br>

            <input type="radio" id="paypal" name="reg_purchase" value="Pay Pal" onClick="im('a2');">
            <label for="paypal">Pay Pal</label><br> <br>
  <!--
             <a href="index.php" class="cashappbutton">Cash App  <img src="assets/images/icons/cashapp.png" width="50" height="50"></a><br><br>
             <div class="paypalbutton" id="paypal-button-container"> </div> 
             </div> <br> -->
            <img id="a" src="assets/images/icons/cashapp.png" width="50" height="50" alt=""> <br><br>
            <input type="submit" name="purchase_button" value="Submit Inquiry" style="padding: 5px;"> <br>
             


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


<!-- <script>
$elment_payment = '40.00';

      paypal.Buttons({
        // Sets up the transaction when a payment button is clicked
        createOrder: (data, actions) => {
          return actions.order.create({
            purchase_units: [{
              amount: {
                value: $elment_payment // Can also reference a variable or function
              }
            }]
          });
        },
        style:{
shape: 'pill'

        },
        // Finalize the transaction after payer approval
        onApprove: (data, actions) => {
          return actions.order.capture().then(function(orderData) {
              console.log(orderData);
            // Successful capture! For dev/demo purposes:
            //console.log('Capture result', orderData, JSON.stringify(orderData, null, 2));
            //const transaction = orderData.purchase_units[0].payments.captures[0];
            //alert(`Transaction ${transaction.status}: ${transaction.id}\n\nSee console for all available details`);
            // When ready to go live, remove the alert and show a success message within this page. For example:
            // const element = document.getElementById('paypal-button-container');
            // element.innerHTML = '<h3>Thank you for your payment!</h3>';
           // actions.redirect('success.php');
          // window.location.replace("http://localhost/netberrysite/success.php");
          window.location.href ="success.php"
          });
        } //indow.location.href =
      }).render('#paypal-button-container');
    </script> -->
</body>
</html>