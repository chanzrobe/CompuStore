<?php
	include_once("config.php");
	session_start();
	$total = $_GET['total'];
	$custid = $_SESSION["user_id"];
	$orderid = $_SESSION["orderid"];
	$custfirst = $_SESSION["userfname"];
	$custlast = $_SESSION["userlname"];
	$can_buy = false;


	if(isset($_SESSION["orderid"])){
		$query = "SELECT * FROM orderdetails WHERE custid = '$custid' AND orderid = '$orderid'"; //check out items
		$results2 = mysqli_query($connection4, $query);

		$count = mysqli_num_rows($results2);

	    if($count==0){
	        ?>
	            <script type="text/javascript"> 
	            alert("You have no items in your cart.");
	            window.location="index.php";</script>
	        <?php
	    }
	    else{
        	$query1 = "SELECT creditcardnum FROM customer WHERE custid = '$custid'";
        	$results = mysqli_query($connection4, $query1);

        	while ($row2 = mysqli_fetch_assoc($results)){
        		$creditcardnum = $row2['creditcardnum'];
        		$query2 = "SELECT * FROM banker WHERE creditcardnum = '$creditcardnum'";
        		$results1 = mysqli_query($connection5, $query2);
        		$count = mysqli_num_rows($results2);

    			if($count>0){

	        		while ($row3 = mysqli_fetch_assoc($results1)){
	        			if(($row3['custfname']==$custfirst)&&($row3['custlname']==$custlast)){
	        				if($row3['account_amt']>=$total){
	        					$can_buy = true;
	        				}
	        				else{ //don't have enough money in your account
	        					?>
						            <script type="text/javascript"> 
						            alert("You do not have enough money in your account to pay for the items.");
						            window.location="index.php";</script>
						        <?php
	        				}
	        			}
	        			else{ //invalid name on the credit card
	        				?>
					            <script type="text/javascript"> 
					            alert("The name on your credit card doesn't match the name you signed up with.");
					            window.location="index.php";</script>
					        <?php
	        			}
	        		}
	        	}
	        	else{  //the credit card numbers do not match
	        		?>
		            <script type="text/javascript"> 
		            alert("The credit card number you signed up with is invalid.");
		            window.location="index.php";</script>
		        <?php
	        	}
	        }
	        if($can_buy==true){
	        	$query5 = "SELECT laptopid, branchid, quantity FROM orderdetails WHERE custid = '$custid' AND orderid = '$orderid'"; //check out items
				$results3 = mysqli_query($connection4, $query);
				while ($row5 = mysqli_fetch_assoc($results3)){
					$quantity = $row5['quantity'];
					$laptopid = $row5['laptopid'];
					if($row5['branchid'] == 1){
						$results7 = mysqli_query($connection1, "CALL laptopUpdate($quantity, $laptopid);");
					}
					else if($row5['branchid'] == 2){
						$results = mysqli_query($connection2, "CALL laptopUpdate($quantity, $laptopid);");
					}
					else{
						$results = mysqli_query($connection3, "CALL laptopUpdate($quantity, $laptopid);");
					}
				}
			    ?>
			        <script type="text/javascript"> 
			        alert("Thank you for shopping with us. Here is a copy of your receipt.");
			        window.location="receipt.php";</script>
		    	<?php
	        }
	    }
	}
?>