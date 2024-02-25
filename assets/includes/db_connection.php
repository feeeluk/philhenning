<?php
	// start php session
	session_start();

	// set the default time to avoid stupid error on local machine - I should probably figure out how to change the setting on my Apache server
	date_default_timezone_set('Europe/London');

	$hostname = "fdb1033.awardspace.net"; 
	$username = "4421836_feeel"; 
	$password = "Ccyh68@c3145327"; 
	$databaseName = "4421836_feeel";

	// create a variable that stores the mysql_connection details, and connects to the database
	$connection = mysqli_connect($hostname, $username, $password, $databaseName) or die ("Unable to connect.".mysqli_connect_error());

?>