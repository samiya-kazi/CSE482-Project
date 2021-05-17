<?php 
	/* For online hosting
	$servername = "remotemysql.com";
	$username = "XiZ5yVokR0";
	$password = "zJ0xVyup7t";
	$dbname = "XiZ5yVokR0";
	*/

	//For development
	$servername = "localhost";
	$username = "root";
	$password = "";
	$dbname = "nutri-diary";


	// Create connection
	$conn = mysqli_connect($servername, $username, $password, $dbname);


	// Check connection
	if(!$conn) {
		die("Connection failed: " . mysqli_connect_error());
	}
?>