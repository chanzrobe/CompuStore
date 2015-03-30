<?php
	session_start();

	$Fname = $_POST["FName"];
	$Lname = $_POST["LName"];
	$email = $_POST["Email"];
	$password = $_POST["password"];
	$address = $_POST["Address"];
	$city = $_POST["City"];
	$country = $_POST["Country"];
	$creditcard = $_POST["CCard"];

	//echo $_POST["password"];

	$host = 'localhost';   //host name
    $user = 'root';        //username
    $pass = '';            //password
    $db = 'customerinfo';  //Your database name you want to connect to


    $connection = mysqli_connect($host, $user, $pass, $db)or die(mysql_error());

    $query = "SELECT * FROM `customerinfo`.`customer` WHERE email = '$email' AND password = '$password'";
    $result1 = mysqli_query($connection, $query);

    $count = mysqli_num_rows($result1);
    if($count == 0){

		$query1 = "INSERT INTO `customerinfo`.`customer` (`custfname`, `custlname`, `email`, `password`, `address`, `city`, `country`, `creditcardnum`) VALUES ('$Fname', '$Lname', '$email', '$password', '$address', '$city', '$country', '$creditcard')";
		$result2 = mysqli_query($connection, $query1);

		if($result2){
		?>
			<script type="text/javascript"> window.location="personlogin.php";</script>
		<?php
		}
	}
	else{
		?>
			<script type="text/javascript"> 
			alert("Can't register with that email");
			window.location="register.php";</script>
		<?php
	}
?>
