<?php
	include_once("config.php");
	session_start();

	$custid = $_SESSION["custid"];
	$orderid = $_SESSION["orderid"];


	if(isset($_SESSION["orderid"])){
			$query = "SELECT * FROM orderdetails WHERE custid = '$custid' AND orderid = '$orderid'"; //remove item from cart
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
		        while ($row = mysqli_fetch_assoc($results2)){
		        	$query1 = "SELECT * FROM customer WHERE custid = '$custid'";
		        	$results = mysqli_query($connection4, $query1);

		        	while ($row2 = mysqli_fetch_assoc($results)){
		        		$custfname = $row2['custfname'];
		        		$custlname = $row2['custlname'];
		        		$creditcardnum = $row2['creditcardnum'];
		        		?><script type="text/javascript"> 
		            		var ans = prompt("Enter your bank pin number.");
		            		
		           			</script>
		            		<?php
		        	}
		        }
		    }




			if($results2){
				$query1 = 
				header("Location: showcart.php");
			}
		}
	}
?>