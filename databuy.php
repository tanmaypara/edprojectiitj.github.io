<?php


$username ="root";
$password ="";
$server ="localhost";
$db ="tanmay";

$con = mysqli_connect($server,$username,$password,$db);

if (!$con) {
	echo "Connection failed!";
	exit();
}

?>