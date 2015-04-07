<?php
	include_once("config.php");
	session_start();

	$custid = $_SESSION["user_id"];
	$orderid = $_SESSION["orderid"];

	if(isset($_SESSION["orderid"])){
		$query1 = "DELETE FROM orders WHERE custid = '$custid' AND orderid = '$orderid'";
		$results = mysqli_query($connection4, $query1);
		if($results){
			$query = "DELETE FROM orderdetails WHERE custid = '$custid' AND orderid = '$orderid'"; //remove item from cart
			$results2 = mysqli_query($connection4, $query);
			if($results2){
				unset($_SESSION["orderid"]);
				header("Location: showcart.php");
			}
		}
	}
?>