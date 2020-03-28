<?php
	
$conn=mysqli_connect("localhost","Ashraful Islam","noprivacy")or die("Connection to Server failed");

	$db=mysqli_select_db($conn,"ctms")or die("Failed to connect database");
?>