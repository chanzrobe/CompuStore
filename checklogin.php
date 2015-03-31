<?php
	session_start();

	if(isset($_SESSION["user_id"]) == FALSE){
		?>
            <script type="text/javascript"> 
            alert("Please login or signup to continue.");
            window.location="personlogin.php";</script>
        <?php
	}
	else{
		?>
            <script type="text/javascript"> 
            window.location="preview.html";</script>
        <?php
	}
?>