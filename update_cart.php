<?php
	include_once("config.php");
	$quantity = filter_var($_POST["quantity"], FILTER_SANITIZE_STRING);
	echo $quantity;

	if((!isset($_SESSION["laptopid"])) == FALSE){?>
		<script type="text/javascript"> 
            window.location="preview2.php";</script>
    	<?php
	}
	else{
		session_start();
		$date = date("D M d, Y G:i a");
		$custid = $_SESSION["user_id"];
		$laptopid = $_SESSION["laptopid"];
		$branch = $_SESSION["branch"];
		$update = false;

		if($branch == 'kingston'){
			$_SESSION["branchid"] = 1;
		}
		else if($branch == 'manchester'){
			$_SESSION["branchid"] = 2;
		}
		else{
			$_SESSION["branchid"] = 3;
		}
		$branchid = $_SESSION["branchid"];
		

		if(!isset($_SESSION["orderid"])){ //if you do not have a cart
			$query1 = "SELECT max(orderid) AS maxorderid FROM orders WHERE custid = '$custid'"; //select the maximum number stored in order for customer
			$results = mysqli_query($connection4, $query1);

			while ($row = mysqli_fetch_assoc($results)){
				$row2 = $row['maxorderid']+1;
				$_SESSION["orderid"] = $row2;
				$_SESSION["itemnum"] = 1;
				$orderid = $_SESSION["orderid"];
			}
			$query2 = "INSERT INTO orders (`custid`, `orderid`, `date`) VALUES ('$custid', '$orderid', '$date')";
			$results = mysqli_query($connection4, $query2);
		}
		else{  //get all the rows in that cart for the customer that has that order number
			$orderid = $_SESSION["orderid"];
			$query4 = "SELECT itemnum, quantity FROM orderdetails WHERE custid = '$custid' AND orderid = '$orderid' AND laptopid = '$laptopid'";
			$results = mysqli_query($connection4, $query4);

			$count = mysqli_num_rows($results);
	   		if($count > 0){ //if such an item exists, then you are just updating the laptop order
	   			$update = true; //then you are just updating the cart
	   			while ($row = mysqli_fetch_assoc($results)){
	   				$_SESSION["itemnum"] = $row['itemnum']; //save the itemnum of the laptop you which to update
	   				//$_SESSION["itemnum"] = $itemnum;
	   			}
			}
			if($update == false){ //if you are adding a new item, find the last itemnum added for that customer
				$query3 = "SELECT max(itemnum) AS items_so_far FROM orderdetails WHERE custid = '$custid' AND orderid = '$orderid'";
				$results = mysqli_query($connection4, $query3);

				while ($row = mysqli_fetch_assoc($results)){
					$itemnum = $row['items_so_far']+1; //saving the item of the new item
					$_SESSION["itemnum"] = $itemnum;
				}
			}
		}

		if($update == false){ //inserting a new record
			$query5 = "SELECT amt_in_stock, price FROM laptop WHERE laptopid = '$laptopid'";
			if($branch == 'kingston'){
				$results = mysqli_query($connection1, $query5);
			}
			else if($branch == 'manchester'){
				$results = mysqli_query($connection2, $query5);
			}
			else{
				$results = mysqli_query($connection3, $query5);
			}
			while ($row = mysqli_fetch_assoc($results)){
				$_SESSION["price"] = $row['price'];
				$_SESSION["amt"] = $row['amt_in_stock'];
				$price = $_SESSION["price"];
				$amt_in_stock = $_SESSION["amt"];
				if(($amt_in_stock == 0) || ($amt_in_stock < $quantity)){
					?>
					<script type="text/javascript"> 
		            alert("Sorry! That laptop is not in stock.");
		            window.location="index.php";</script>
		    		<?php
				}
				else{
					$itemnum = $_SESSION["itemnum"];
					//$query7 = "INSERT INTO orderdetails(`itemnum`, `orderid`, `branchid`, `custid`, `laptopid`, `quantity`, `price`) VALUES ('$itemnum', '$orderid', '$branchid', '$custid', '$laptopid', '$quantity', '$price')";
					$results2 = mysqli_query($connection4, "CALL orderInsert('$itemnum', '$orderid', '$branchid', '$custid', '$laptopid', '$quantity', '$price');");
					if($results2){
						echo "success";
					}
					else{echo "failure";}
				}
			}
		}
		else{ //update the details about the laptop
			$itemnum = $_SESSION["itemnum"];
			$query6 = "UPDATE orderdetails SET quantity='$quantity', branchid='$branchid' WHERE custid = '$custid' AND orderid = '$orderid' AND itemnum = '$itemnum'";
			$results = mysqli_query($connection4, $query6);
		}
	}
	header("Location: showcart.php");
?>