<?php
$servername = "mysql3.gear.host"; //ikut je
$username = "afiiqkacak"; //ikut je
$password = "#FadhliAfandi98"; //ikut je
$dbname = "akifcarwash"; //nama database


// Create connection
$connect = mysqli_connect($servername, $username, $password, $dbname);

// Check connection
if (!$connect) 
	{
		die("Connection failed: " . mysqli_connect_error());
	}
?> 
