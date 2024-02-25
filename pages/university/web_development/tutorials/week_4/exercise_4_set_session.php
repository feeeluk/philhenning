<?php
session_start();

if(isset($_POST['name']) and isset($_POST['colour']))
	{
	  $_SESSION['username'] = $_POST['name'];
	  $_SESSION['colour'] = $_POST['colour'];
	  header("location: exercise_4_show_session.php");
	}

if (empty($_POST['name']) or empty($_POST['colour']))
	{
	  $_SESSION['username'] = "empty";
	  $_SESSION['colour'] = "empty";
	  header("location: exercise_4.php");
	}

if (isset($_POST['unset']))
	{
		unset($_SESSION['username']);
		unset($_SESSION['colour']);
		header("location: exercise_4.php");
	}

?>