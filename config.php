<?php
$currency = '$'; //Currency sumbol or code

$db_username = 'root';
$db_password = '';
$db_name1 = 'kingston';
$db_name2 = 'manchester';
$db_name3 = 'portland';
$db_host = 'localhost';

$mysqli1 = new mysqli($db_host, $db_username, $db_password,$db_name1);
$mysqli2 = new mysqli($db_host, $db_username, $db_password,$db_name2);
$mysqli3 = new mysqli($db_host, $db_username, $db_password,$db_name3);
?>