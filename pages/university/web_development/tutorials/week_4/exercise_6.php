<?php

	session_start();

	//check if the logout has been clicked
	//$logout = $_GET["logout"]
	if(isset($_GET["logout"]) && $_GET["logout"] == "true")
	{
		unset($_SESSION['username']);
	}


	//define different username and password combinations in the absence of a database
	$users = array(
		array("u" => "Dave", "p" => "password"),
		array("u" => "Jane", "p" => "doe"),
		array("u" => "Phil", "p" => "test")
	);
	//initialise the variable that will be needed if the login details don't match
	$found ="";
	
	//check if the form has been submitted
	if(isset($_POST['submit']))
	{
		//assign the form values to variables
		$username = $_POST['username'];
		$password = $_POST['password'];

		//loop through the array and..
		foreach($users as $user => $userdetails)
		{
			//start a session if a matching pair is found
			if($userdetails['u'] === $username && $userdetails['p'] === $password)
			{
				$_SESSION['username'] = $username;
			}

			//change variable $found if no matches are found
			else
			{
				$found = "Login details not found";
			}
		}
	}

?>

<!DOCTYPE html>
<html lang="en">
	<head>
		<title>Exercise 6 - Session login (using arrays)</title>
		<meta charset="utf-8" />
	</head>
	<body>
		<?php
			if(!isset($_SESSION['username']))
			{
		?>

	<h1>Exercise 6 - Session login (using arrays)</h1>	
	<form action="" method="post">
		<fieldset>
			<label for="name-name">Your name</label>
			<input id="username" name="username" type="text" />
			<br />

			<label for="password-password">Password</label>
			<input id="password" name="password" type="password" />
			<br />

			<input type="submit" name="submit" id="submit" value="submit"/>
		</fieldset>
	</form>

		<?php

				echo "$found";
				echo "<br /><a href='index.php'>Back to list of exercises</a>";
				
			}
	
			else
			{
				echo "<h1>Exercise 6 - Session login (using arrays)</h1>";
				echo "Hello ".$_SESSION['username']."<br />";
				echo "<a href='exercise_6.php?logout=true'>Logout</a><br />";
				echo "<a href='index.php'>Back to list of exercises</a>";
			}
		?>

	</body>
</html>