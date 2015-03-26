<?php

mysql_connect("localhost", "root", "")or die("Cannot connect server"); 
mysql_select_db("customer")or die("Cannot select the desired database");

$fname = $_POST["inputFname"];
$lname = $_POST["inputLname"];
$username = $_POST["inputEmail"];
$creditcard = $_POST["creditcard"];
$password = $_POST["inputPassword"];


$sql= "INSERT INTO user(fname, lname, uname, pword)VALUES('$fname', '$lname', '$username', '$password')";
if($result=mysql_query($sql))
{
?>
	<body bgcolor="#DEB887" align="center">
	<font color="#A52A2A"><h1> User has been Created!</h1></font>
	<?php
		echo "<BR>";
		echo "";
		echo "";
		echo "<a href='AdminPage.php'>Create Another</a>";
	?>
	</body>
<?php
}
else 
{
	echo "Oh No! There was an error in storing your entry";
}
mysql_close();
?>
