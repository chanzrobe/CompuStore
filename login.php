<?php
    session_start();

    $USER = $_POST["username"];
    $PASS = $_POST["password"];


    $host = 'localhost';   //host name
    $user = 'root';                     //username
    $pass = 'root';                                 //password
    $db = 'customer';                          //Your database name you want to connect to

    $connection = mysqli_connect($host, $user, $pass, $db)or die(mysql_error());
	$USER = mysql_real_escape_string($USER);
	$PASS = mysql_real_escape_string($PASS);


    //check for user
	
    $query = "SELECT * FROM customer WHERE email='$USER' AND password='$PASS'";
    $result = mysqli_query($connection, $query);

    if($result){
		while ($row = mysqli_fetch_assoc($result)) {
            $_SESSION["custid"] = $row['custid'];
            $_SESSION["custfname"] = $row['custfname'];
    		$_SESSION["custlname"] = $row['custlname'];
    		include 'dashboard.php';
		}
	}
	
	//header( 'Location: http://localhost/capstone/dashboard.html' ) ;
?>