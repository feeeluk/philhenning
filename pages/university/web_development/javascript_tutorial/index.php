<?php
	
	//detect the server name - if it matches the local testing environment then set variables to local paths
	if($_SERVER['SERVER_NAME']==="university.dev")
		{
			$server_name = $_SERVER['SERVER_NAME'];
		}
	//if it matches the live environment then set variables to server paths	
	elseif($_SERVER['SERVER_NAME']==="philhenning.atwebpages.com")
		{
			$server_name = $_SERVER['SERVER_NAME'];
		}
	//if it is niether of these things (which should never be the case) do some arbitrary action
	else
		{
			echo "the website is not configured to run on this server";
		}
	//end of php header code
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<title>Web Development (INM316) - JavaScript tutorial</title>
		<link rel="stylesheet" type="text/css" href="<?php echo $url; ?>/general.css">
		<meta charset="utf-8" />
	</head>
	<body id="page">

		<div id="main-body" class="">

			<header>
				<h1 class="inline">Web Development (INM316)</h1>
			</header>

			<article>

			<h2 class="inline">JavaScript Tutorial</h2>			
			<ul>
					<li><a href="exercise_1.php">Exercise 1 - Alert</a></li>
					<li><a href="exercise_2.php">Exercise 2 - Variables, strings, prompts</a></li>
					<li><a href="exercise_3.php">Exercise 3 - If()</a></li>
					<li><a href="exercise_4.php">Exercise 4 - Link events and image swapping</a></li>
					<li><a href="first_homework.php">First homework</a></li>
					<li><a href="second_homework.php">Second homework</a></li>
					<li><a href="exercise_5.php">Exercise 5 - While loops</a></li>
					<li><a href="exercise_6.php">Exercise 6 - For loops</a></li>
					<li><a href="exercise_7.php">Exercise 7 - Using arrays with functions</a></li>
					<li><a href="exercise_8.php">Exercise 8 - Second loop</a></li>
					<li><a href="exercise_9.php">Exercise 9 - Image swap stop/start</a></li>
					<li><a href="exercise_10.php">Exercise 10 - Image swap with arrays</a></li>

					
				</ul>

				<p class="no_link"><a href="../../index.php">Home</a></p>

			</article>

		</div>

	</body>
</html>