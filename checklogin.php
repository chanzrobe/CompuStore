<?php
	session_start();
	$laptopid = filter_var($_POST["laptop_code"], FILTER_SANITIZE_STRING); //product code
	$_SESSION["laptopid"] = $laptopid;

	if(isset($_SESSION["user_id"]) == FALSE){
		?>
            <script type="text/javascript"> 
            alert("Please login or signup to continue.");
            window.location="personlogin.php";</script>
        <?php
	}
	else{
		header('Location: http://localhost/CompuStore/preview.php');
	}
?>