<?php
    session_start();

    $username = $_POST["UserName"];
    $password = $_POST["password"];


    $host = 'localhost';   //host name
    $user = 'root';                     //username
    $pass = '';                                 //password
    $db = 'customerinfo';                          //Your database name you want to connect to

    $connection = mysqli_connect($host, $user, $pass, $db)or die(mysql_error());
	$username = mysql_real_escape_string($username);
	$password = mysql_real_escape_string($password);

    if($username =="Admin" && $password =="Admin123")
    {
        $_SESSION["user_id"] = '1234';
        $_SESSION["username"] = 'Admin';
        ?>
            <script type="text/javascript"> window.location="AdminPage.php";</script>
        <?php
    }

    $query = "SELECT * FROM `customerinfo`.`customer` WHERE email = '$username' AND password = '$password'";
    $result = mysqli_query($connection, $query); 

    $count = mysqli_num_rows($result);

    if($count==0){
        ?>
            <script type="text/javascript"> 
            alert("Invalid Email or Password.");
            window.location="personlogin.php";</script>
        <?php
    }
    else{
        while ($row = mysqli_fetch_assoc($result)){
            $_SESSION["user_id"] = $row['custid'];
            $_SESSION["userfname"] = $row['custfname'];
            $_SESSION["userlname"] = $row['custlname'];

            if(isset($_SESSION["laptopid"]) == TRUE){
                header('Location: http://localhost/CompuStore/preview.php');
            }
            else{
                header('Location: http://localhost/CompuStore/index.php');
            }
        }
    }
?>