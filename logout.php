<?php
    session_start();
    include_once("config.php");

	if((!isset($_SESSION["user_id"])) && (!isset($_SESSION["orderid"]))){
    	$previous = $_SERVER["HTTP_REFERER"];
    	?>
	        <script type="text/javascript">
	        	alert("You must be logged in in order to log out.");
         	</script>
	    <?php
	    header('Location: '.$previous);
	}
    else{
    	$custid = $_SESSION["user_id"];
		$orderid = $_SESSION["orderid"];
    	$query = "SELECT * FROM orderdetails WHERE custid = '$custid' AND orderid = '$orderid'"; //check out items
		$results2 = mysqli_query($connection4, $query);
		$count = mysqli_num_rows($results2);

	    if($count==0){
	    	$query1 = "SELECT * FROM orders WHERE custid = '$custid' AND orderid = '$orderid'"; //check out items
			$results = mysqli_query($connection4, $query1);
			$count2 = mysqli_num_rows($results);

	    	if($count2>0){
	    		if(isset($_SESSION["orderid"])){
					$query2 = "DELETE FROM orders WHERE custid = '$custid' AND orderid = '$orderid'";
					$results = mysqli_query($connection4, $query2);
				}
	    	}
	    }
	    unset($_SESSION["user_id"]);
	    unset($_SESSION["username"]);
	    unset($_SESSION["laptopid"]);
	    unset($_SESSION["orderid"]);
	    unset($_SESSION["branch"]);
	    unset($_SESSION["itemid"]);
	    ?>
			<script type="text/javascript"> window.location="index.php"; </script>
		<?php
	}
?>