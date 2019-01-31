<?php 
	ob_start(); //incia el output buffering

	session_start();

	$timezone = date_default_timezone_set("America/Argentina/Buenos_Aires");
	$con = mysqli_connect("localhost", "root", "", "slotify"); // servername username password y nombre de la database

	if(mysqli_connect_errno()){
		echo "Failed to connect: " . mysqli_connect_errno();
	}


?>