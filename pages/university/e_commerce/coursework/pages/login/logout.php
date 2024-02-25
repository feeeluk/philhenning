<?php
	session_start();

	// unset the username session
	unset($_SESSION['e_commerce_username']);
	
	// redirect back to the hompage
	header("location: ../../index.php");

?>