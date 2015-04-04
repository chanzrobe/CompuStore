<?php
	$user = 'root';
	$pass = '';
	$db_name1 = 'kingston';
	$db_name2 = 'manchester';
	$db_name3 = 'portland';
	$db_name4 = 'customerinfo';
	$db_name5 = 'bank';
	$host = 'localhost';

	$connection1 = mysqli_connect($host, $user, $pass, $db_name1)or die(mysql_error());
	$connection2 = mysqli_connect($host, $user, $pass, $db_name2)or die(mysql_error());
	$connection3 = mysqli_connect($host, $user, $pass, $db_name3)or die(mysql_error());
	$connection4 = mysqli_connect($host, $user, $pass, $db_name4)or die(mysql_error());
	$connection5 = mysqli_connect($host, $user, $pass, $db_name5)or die(mysql_error());
?>