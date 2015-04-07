<!DOCTYPE html>
<?php
	session_start();
	include('config.php');
	$custfirst = $_SESSION["userfname"];
	$custlast = $_SESSION["userlname"];
?>
<html>
	<head>
		<title>Shopping Cart</title>
		<!-- <meta charset="UTF-8"> -->
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
		<link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css'>
		<link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css"/>
		<link rel="stylesheet" type="text/css" href="assets/css/custom.css"/>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
		<link href="css/style.css" rel="stylesheet" type="text/css" media="all"/>
		<link href="css/slider.css" rel="stylesheet" type="text/css" media="all"/>
		<script type="text/javascript" src="js/jquery-1.7.2.min.js"></script> 
		<script type="text/javascript" src="js/move-top.js"></script>
		<script type="text/javascript" src="js/easing.js"></script>
		<script type="text/javascript" src="js/startstop-slider.js"></script>	
	</head>

	<body>
		<div class="wrap">
	<div class="header">
		<div class="headertop_desc">
			<div class="call">
				 <p><span>Need help?</span> call us <span class="number">1-22-3456789</span></span></p>
			</div>
			<div class="account_desc">
				<ul>
					<li><a href="register.php">Register</a></li>
					<li><a href="personlogin.php">Login</a></li>
					<li><a href="logout.php">Logout</a></li>
					<li><a href="showcart.php">Checkout</a></li>
					<li><a href="#">My Account</a></li>
				</ul>
			</div>
			<div class="clear"></div>
		</div>
		<div class="header_top">
			<div class="logo">
				<a href="index.php"><img src="images/logoo.png" alt="" /></a>
			</div>
	 <div class="clear"></div>
  </div>
	<div class="header_bottom">
	     	<div class="menu">
	     		<ul>
			    	<li class="active"><a href="index.php">Home</a></li>
			    	<li><a href="about.html">About</a></li>
			    	<li><a href="delivery.html">Delivery</a></li>
			    	<li><a href="news.html">News</a></li>
			    	<li><a href="contact.html">Contact</a></li>
			    	<div class="clear"></div>
     			</ul>
	     	</div>
	     	<div class="search_box">
	     		<form>
	     			<input type="text" value="Search" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Search';}"><input type="submit" value="">
	     		</form>
	     	</div>
	     	<div class="clear"></div>
	     </div>	
		</br>
		</br>

		<div class="container text-center">

			<div class="col-md-5 col-sm-12">
				<div class="bigcart"></div>
				<h1><?php echo $custfirst. " ".$custlast. ":"; ?> </br>Your shopping cart</h1>
			</div>

			<div class="col-md-7 col-sm-12 text-left">
				<ul>
					<li class="row list-inline columnCaptions">
						<span>QTY</span>
						<span>ITEM</span>
						<span>Price</span>
					</li>

					<?php
						if(isset($_SESSION["orderid"])){
							$custid = $_SESSION["user_id"];
							$orderid = $_SESSION["orderid"];
							$total=0;

			  				$query = "SELECT * FROM orderdetails WHERE custid='$custid' AND orderid='$orderid' ORDER BY itemnum ASC";
			    			$results = mysqli_query($connection4, $query);
			    			$count = mysqli_num_rows($results);
			    			if($count>0){
			    				while ($obj = mysqli_fetch_assoc($results)) //fetch results set as object and output HTML
			        			{
			        				$subtotal = ($obj["price"]*$obj["quantity"]);
			        				$total = ($total + $subtotal);
			    				?>
			    					<li class="row">
										<span class="quantity"><?php echo $obj['quantity'] ?></span>
										<?php
											$laptopid = $obj['laptopid'];
											$branchid = $obj['branchid'];
											$query1 = "SELECT brand, model FROM laptop WHERE laptopid='$laptopid'";
											if($branchid == 1){
												$results2 = mysqli_query($connection1, $query1);
											}
											else if($branchid == 2){
												$results2 = mysqli_query($connection2, $query1);
											}
											else{
												$results2 = mysqli_query($connection3, $query1);
											}
											while ($row = mysqli_fetch_assoc($results2)){
										?>
												<span class="itemName"><?php echo $row['brand']. " " .$row['model'] ?></span>
												<?php
											}
										echo '<span class="popbtn"><a href="removeitem.php?laptopid='.$laptopid.'" class="text-center">Remove</a></span>'
										?>
										<span class="price">$<?php echo $subtotal?></span>
									</li>
									<?php
								}
									?>
									<li class="row totals">
										<span class="itemName">Total:</span>
										<span class="price">$<?php echo $total?></span>
										<?php
										echo '<span class="order"> <a class="text-center" href="processcart.php?total='.$total.'"">ORDER</a></span>'
										?>
										<span class="order"> <a class="text-center" href="removecart.php">CANCEL</a></span>
									</li>
									<?php
			    				}
			    				else{
		    						echo "Your cart is empty.";
		    					}
			    			}
		    			else{
		    				echo "Your cart is empty.";
		    			}
					?>

				</ul>
			</div>
		</div>

		<div class="footer">
   	  <div class="wrap">	
	     <div class="section group">
				<div class="col_1_of_4 span_1_of_4">
						<h4>Information</h4>
						<ul>
						<li><a href="about.html">About Us</a></li>
						<li><a href="contact.html">Customer Service</a></li>
						<li><a href="#">Advanced Search</a></li>
						<li><a href="delivery.html">Orders and Returns</a></li>
						<li><a href="contact.html">Contact Us</a></li>
						</ul>
					</div>
				<div class="col_1_of_4 span_1_of_4">
					<h4>Why buy from us</h4>
						<ul>
						<li><a href="about.html">About Us</a></li>
						<li><a href="contact.html">Customer Service</a></li>
						<li><a href="#">Privacy Policy</a></li>
						<li><a href="contact.html">Site Map</a></li>
						<li><a href="#">Search Terms</a></li>
						</ul>
				</div>
				<div class="col_1_of_4 span_1_of_4">
					<h4>My account</h4>
						<ul>
							<li><a href="contact.html">Sign In</a></li>
							<li><a href="logout.php">Logout</a></li>
							<li><a href="showcart.php">View Cart</a></li>
							<li><a href="#">Track My Order</a></li>
							<li><a href="contact.html">Help</a></li>
						</ul>
				</div>
				<div class="col_1_of_4 span_1_of_4">
					<h4>Contact</h4>
						<ul>
							<li><span>+91-123-456789</span></li>
							<li><span>+00-123-000000</span></li>
						</ul>
						<div class="social-icons">
							<h4>Follow Us</h4>
					   		  <ul>
							      <li><a href="#" target="_blank"><img src="images/facebook.png" alt="" /></a></li>
							      <li><a href="#" target="_blank"><img src="images/twitter.png" alt="" /></a></li>
							      <li><a href="#" target="_blank"><img src="images/skype.png" alt="" /> </a></li>
							      <li><a href="#" target="_blank"> <img src="images/dribbble.png" alt="" /></a></li>
							      <li><a href="#" target="_blank"> <img src="images/linkedin.png" alt="" /></a></li>
							      <div class="clear"></div>
						     </ul>
   	 					</div>
				</div>
			</div>			
        </div>
        <div class="copy_right">
				<p>Company Name © All rights Reseverd | Design by  <a href="http://w3layouts.com">W3Layouts</a> </p>
		   </div>
    </div>
    <script type="text/javascript">
		$(document).ready(function() {			
			$().UItoTop({ easingType: 'easeOutQuart' });
			
		});
	</script>
    <a href="#" id="toTop"><span id="toTopHover"> </span></a>
		
		<!-- JavaScript includes -->

		<script src="http://code.jquery.com/jquery-1.11.0.min.js"></script> 
		<script src="assets/js/bootstrap.min.js"></script>
		<script src="assets/js/customjs.js"></script>
	</body>
</html>