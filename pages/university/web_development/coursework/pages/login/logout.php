<?php
	session_start();

	// unset the username session
	unset($_SESSION['web_development_username']);
	
	// redirect back to the hompage
	header("location: ../../index.php");

?>