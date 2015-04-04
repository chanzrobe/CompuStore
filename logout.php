<?php
    session_start();
    if(!isset($_SERVER["HTTP_REFERER"])){
    	if(!isset($_SESSION["user_id"])){
	    	$previous = $_SERVER["HTTP_REFERER"];
	    	?>
		        <script type="text/javascript"> 
             window.location=""<?php echo $previous?>;</script>
		    <?php
		    ?>
	        <script type="text/javascript">alert("You need to be logged in in order to log out.");</script>
	    <?php
		}
    }
    else{
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