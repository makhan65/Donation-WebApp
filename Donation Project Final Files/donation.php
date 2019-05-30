<?php
include ('includes/session.php');
$page_title = 'Donations';

include ('includes/header.php');

include ('mysqli_connect.php'); 
?>

<form action="/action_page.php">
	<div class="page-header">
		<h2>Donations</h2>
	</div>	
		<div class="well">
			<form class="form-contact" role="form" action="contact.php" method="post">
				<h4>Personal Information</h4>
					
						<p>First name:<input type="normal" id="fname" required autofocus name="firstname" ></p>
						
						<p>Last name:<input type="normal" id="lname" required autofocus name="lastname" ></p>
						
						<p>Email:<input type="normal"  id="email" required autofocus name="email"></p>
						
						<p>Phone #:<input type="normal" id="email" required autofocus name="phone"></p>
						
						<p>Address:<input type="normal" id="adr" required autofocus class="form-control" name="address" ></p>
						
						<p>City:<input type="normal" id="city" required autofocus name="city" ></p>

						<p>State:<input type="normal" id="state" required autofocus name="state"></p>
						
						<p>Zip code:<input type="normal" id="zip" required autofocus name="zipcode" ></p>
						  
						
						<h4>Payment Method</h4>
						<p>All transactions are secure and encrypted</p>
						<div class="icon-container">
						  <i class="fa fa-cc-visa" style="color:navy;"></i>
						  <i class="fa fa-cc-amex" style="color:blue;"></i>
						  <i class="fa fa-cc-mastercard" style="color:red;"></i>
						  <i class="fa fa-cc-discover" style="color:orange;"></i>
						</div>
						
						<p>Credit card number:<input type="normal" id="ccnum" required autofocus name="cardnumber"></p>
						<p>Exp Month:<input type="normal" id="expmonth" required autofocus name="expmonth" ></p>
						<p>Exp Year:<input type="normal" id="expyear" required autofocus name="expyear" ></p>
						<p>CVV:<input type="normal" id="cvv" required autofocus name="cvv" placeholder="XXX"></p>
						  						
						<p>Reason for Donation:<textarea name="comments" class="form-control" rows="3" cols="30"></textarea></p>
						<button type="submit" name="submit" class="btn btn-primary btn-sm pull-right" id="submit_payment"><a href="C2h.html">Submit Payment</a></button>
						<input type="hidden" name="submitted" value="TRUE" />
			</form>
<?php
include ('includes/footer.html');
?>					
</div>