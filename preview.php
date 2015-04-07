<!--A Design by W3layouts
Author: W3layout
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->

<?php
session_start();
include_once("config.php");
?>

<!DOCTYPE HTML>
<head>
<title>Free Home Shoppe Website Template | Preview :: w3layouts</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<link href="css/style.css" rel="stylesheet" type="text/css" media="all"/>
<script type="text/javascript" src="js/jquery-1.7.2.min.js"></script> 
<script type="text/javascript" src="js/move-top.js"></script>
<script type="text/javascript" src="js/easing.js"></script>
<script src="js/easyResponsiveTabs.js" type="text/javascript"></script>
<link href="css/easy-responsive-tabs.css" rel="stylesheet" type="text/css" media="all"/>
<link rel="stylesheet" href="css/global.css">
<script src="js/slides.min.jquery.js"></script>
<script language="javascript" type="text/javascript">
	function validquantity(thisForm){
		var allValid;
		allValid = (quantity(thisForm));
		return allValid;
	}

	function quantity(thisForm){
		var quantityValue = document.getElementById('quantity').value;
		if (quantityValue=="" || quantityValue==null){
			alert("Please add a quantity for the item you want to buy.");
			return false;
		}
		else{
			return true;
		}
	}
</script>
<script>
		$(function(){
			$('#products').slides({
				preload: true,
				preloadImage: 'img/loading.gif',
				effect: 'slide, fade',
				crossfade: true,
				slideSpeed: 350,
				fadeSpeed: 500,
				generateNextPrev: true,
				generatePagination: false
			});
		});
	</script>
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
				<a href="index.php"><img src="images/logo.png" alt="" /></a>
			</div>
	 <div class="clear"></div>
  </div>
	<div class="header_bottom">
	     	<div class="menu">
	     		<ul>
					<li><a href="register.php">Register</a></li>
					<li><a href="personlogin.php">Login</a></li>
					<li><a href="logout.php">Logout</a></li>
					<li><a href="#">Checkout</a></li>
					<li><a href="#">My Account</a></li>
				</ul>
	     	</div>
	     	<div class="search_box">
	     		<form>
	     			<input type="text" value="Search" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Search';}"><input type="submit" value="">
	     		</form>
	     	</div>
	     	<div class="clear"></div>
	     </div>	     	
   </div>
 <div class="main">
    <div class="content">
    	<div class="content_top">
    		<div class="back-links">
    		<p><a href="index.html">Home</a> >>>> <a href="#">Products</a></p>
    	    </div>
    		<div class="clear"></div>
    	</div>
    	<div class="section group">
			<div class="cont-desc span_1_of_2">
				<div class="product-details">
					<div class="grid images_3_of_2">
						<div id="container">
							<form method="post" action="update_cart.php" onsubmit="return validquantity(this);">

						<?php
							$id=$_SESSION["laptopid"];

							$query = "SELECT * FROM laptop WHERE laptopid='$id'";
							$results = mysqli_query($connection1, $query);
							$results1 = mysqli_query($connection2, $query);
							$results2 = mysqli_query($connection3, $query);

							if ($results && $results1 && $results2 ){ 
								while ($obj = mysqli_fetch_assoc($results)){
									while ($obj2 = mysqli_fetch_assoc($results1)){
										while ($obj3 = mysqli_fetch_assoc($results2)){
											if(($obj['amt_in_stock'] > $obj2['amt_in_stock']) && ($obj['amt_in_stock'] > $obj3['amt_in_stock'])){
											$_SESSION['branch'] = 'kingston';
									?>	
									<img src= <?php echo $obj['image'] ?> alt="" /></a>
							</div>
					</div>
					<div class="desc span_3_of_2">
						<h2> <?php echo $obj['brand']. " " .$obj['model'] ?></h2>
						<p><?php echo $obj['description'] ?></p>					
						<div class="price">
							<p>Price: <span>$<?php echo $obj['price']?></span></p>
						</div>
						<div>
							<p>Amount in Stock: <span><?php echo $obj['amt_in_stock']?></span></p>
								<?php
								}
									else if(($obj2['amt_in_stock'] > $obj['amt_in_stock']) && ($obj2['amt_in_stock'] > $obj3['amt_in_stock'])){
										$_SESSION['branch'] = 'manchester';
									?>	
									<img src= <?php echo $obj2['image'] ?> alt="" /></a>
							</div>
					</div>
					<div class="desc span_3_of_2">
						<h2> <?php echo $obj2['brand']. " " .$obj2['model'] ?></h2>
						<p><?php echo $obj2['description'] ?></p>					
						<div class="price">
							<p>Price: <span>$<?php echo $obj2['price']?></span></p>
						</div>
						<div>
							<p>Amount in Stock: <span><?php echo $obj2['amt_in_stock']?></span></p>
								<?php
								}
								else{
									$_SESSION['branch'] = 'portland';
									?>	
									<img src= <?php echo $obj3['image'] ?> alt="" /></a>
							</div>
					</div>
					<div class="desc span_3_of_2">
						<h2> <?php echo $obj3['brand']. " " .$obj3['model'] ?></h2>
						<p><?php echo $obj3['description'] ?></p>					
						<div class="price">
							<p>Price: <span>$<?php echo $obj3['price']?></span></p>
						</div>
						<div>
							<p>Amount in Stock: <span><?php echo $obj3['amt_in_stock']?></span></p>
								<?php
								}
								}}}
							}
						?>
						</div>
						<div class="available">
							<p>Quantity :</p> <input type="text" name="quantity" id="quantity" placeholder="Quantity" tabindex="1">
						</div>
						<div class="share-desc">
							<div class="share">
								<p>Share Product :</p>
								<ul>
							    	<li><a href="#"><img src="images/facebook.png" alt="" /></a></li>
							    	<li><a href="#"><img src="images/twitter.png" alt="" /></a></li>					    
							    </ul>
							</div>
							<button class="button" type="submit">Add To Cart</button>
							<!-- <div class="button"><span><a href="updatecart.php">Add to Cart</a></span></div> -->
							<div class="button"><span><a href="index.php"></a></span>Cancel</div>						
							<div class="clear"></div>
						</div>
						<div class="wish-list">
						 	<ul>
						 		<li class="wish"><a href="#">Add to Wishlist</a></li>
						 	</ul>
						 </div>
					</div>
						<div class="clear"></div>
					</form>
				</div>
				<div class="rightsidebar span_3_of_1">
					<h2>SHOP BY BRAND</h2>
					<ul>
				      <li><a href="#">APPLE</a></li>
				      <li><a href="#">DELL</a></li>
				      <li><a href="#">ACER</a></li>
				      <li><a href="#">LENOVO</a></li>
				      <li><a href="#">TOSHIBA</a></li>
    				</ul>
 				</div>
 			</div>
 		</div>
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
</body>
</html>

