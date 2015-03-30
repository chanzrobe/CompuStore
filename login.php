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

    if($result){
        while ($row = mysqli_fetch_assoc($result)){
            //$id = $row['custid'];
            //echo $id;
            //$query1 = "INSERT INTO `customerinfo`.`customerpurchase`(`custid`, `laptopid`, `totalcost`) VALUES ('$id', 'NULL', 'NULL')";
            //$result2 = mysqli_query($connection, $query1);

            //if($result2){
                //echo $id;
                $_SESSION["user_id"] = $row['custid'];
                $_SESSION["username"] = $row['custfname'];
                ?>
                    <script type="text/javascript"> window.location="index.php";</script>
                <?php
            /*}
            else{
                ?>
                    <script type="text/javascript"> 
                    alert("Login failed. Please try again.");
                    window.location="personlogin.php";</script>
                <?php*/
            //}
        }
    }
    else{
        ?>
            <script type="text/javascript"> 
            alert("Invalid Email or Password.");
            window.location="personlogin.php";</script>
        <?php
    }
    

/*    $count = mysqli_num_rows($result);
    if($count > 0){
		while ($row = mysqli_fetch_assoc($result)){
            $id=$row['custid'];
            ?>
                        <script type="text/javascript"> alert($row['custid']);</script>
                    <?php
            $query1 = "INSERT INTO `customerinfo`.`customerpurchase` (`tracking_num`, `custid`, `laptopid`, `totalcost`) VALUES ('$id', 'NULL', 'NULL')";
            $result2 = mysqli_query($connection, $query1);

            if($result2){

                $query2 = "SELECT * FROM `customerinfo`.`customerpurchase` WHERE custid = '$id'";
                $result3 = mysqli_query($connection, $query); 

                while($row2 = mysqli_fetch_assoc($result3)){
                    $_SESSION["orderid"] = $row2['tracking_num'];
                    $_SESSION["custid"] = $row2['custid'];
            		?>
                        <script type="text/javascript"> window.location="index.php";</script>
                    <?php
                }
            }
		}
	}
    else{
        ?>
            <script type="text/javascript"> 
            alert("Invalid Email or Password.");
            window.location="personlogin.php";</script>
        <?php
    }
	
	//header( 'Location: http://localhost/capstone/dashboard.html' ) ;*/
?>