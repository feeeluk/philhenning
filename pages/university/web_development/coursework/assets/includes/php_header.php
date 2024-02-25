<?php
// start php session
session_start();

// set the default time to avoid stupid error on local machine - I should probably figure out how to change the setting on my Apache server
date_default_timezone_set('Europe/London');


//detect the server name - if it matches the local testing environment then set variables to local paths
if($_SERVER['SERVER_NAME']==="university.dev")
	{
		// set server access variables 
		$hostname = "localhost"; 
		$username = "root"; 
		$password = "ccyh68"; 
		$databaseName = "abpy140";
	}
//if it matches the uni live environment then set variables to server paths	
elseif($_SERVER['SERVER_NAME']==="lamp.soi.city.ac.uk")
	{
		// set server access variables 
		$hostname = "lamp.soi.city.ac.uk"; 
		$username = "abpy140"; 
		$password = "130044928"; 
		$databaseName = "abpy140";
	}

// create a variable that stores the mysql_connection details, and connects to the database
$connection = mysqli_connect($hostname, $username, $password, $databaseName) or die ("Unable to connect".mysqli_connect_error());

?>