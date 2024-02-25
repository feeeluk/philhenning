<?php

if(isset($_POST['name']) AND isset($_POST['colour']))
	{
	  setcookie('username', $_POST['name']);
	  setcookie('colour', $_POST['colour']);
	  header("location: exercise_3_show_cookie.php");
	}

if (empty($_POST['name']) or empty($_POST['colour']))
	{
	  setcookie('username', "empty");
	  setcookie('colour', "empty");
	  header("location: exercise_3.php");
	}

if (isset($_POST['unset']))
	{
		setcookie('username', null, -1);
		setcookie('colour', null, -1);
		header("location: exercise_3.php");
	}

?>