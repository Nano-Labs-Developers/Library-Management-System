<?php
	// for header redirect error solution
	ob_start();

	// Start the session for every page [easy use]
	session_start();

	// Login Database (phpmyadmin) [servername,username,password,dbname]
	$db = mysqli_connect("localhost","root","","library");

	// This is for check database connection
	if(!$db)
	{
		die("Connection faild:" . mysqli_connect_error());
	}

?>