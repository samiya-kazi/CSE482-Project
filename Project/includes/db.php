<?php  
	$servername = "remotemysql.com";
	$username = "XiZ5yVokR0";
	$password = "zJ0xVyup7t";
	$dbname = "XiZ5yVokR0";

	// Create connection
	$conn = mysqli_connect($servername, $username, $password, $dbname);


	// Check connection
	if(!$conn) {
		die("Connection failed: " . mysqli_connect_error());
	}
?>