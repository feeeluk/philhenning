<!DOCTYPE html>
<html>
<head>
<title>Week 3 - Exercise 5</title>
<meta charset="utf-8" />
</head>
<body>
<h1>Name? Advanced</h1>

<form action="" method="get">
<fieldset>
	<label for="type-name">Choose where you want your name</label>	
	<select name="type">
		<option value="" selected></option>
		<option value="current">Current window</option>
		<option value="new">New window</option>
	</select>
	<br />
	<label for="name-name">Your name</label>
	<input id="name" name="name" type="text" />
	<br />
	<label for="company">Your company</label>
	<input id="company" name="company" type="text" />
	<br />
	<input type="submit" value="submit"/>
</fieldset>
</form>
	<?php

	if(isset($_GET['type']))
		{
			
			$window_type = $_GET['type'];
			$name = $_GET['name'];
			$company = $_GET['company'];
			
			if($window_type === "current")
		{
			echo "<p>$name</p>";
			echo "<p>$company</p>";
		}
		else if($window_type==="new")
		{
			// the backslash (\) allows you to use quotation marks ("") inside echo without cocking up the code
			// the JavaScript code changes the page location
			// 'get' takes information from the URL so we just have to emulate that by including the variable name and value in the URL
		echo "<script type=\"text/javascript\">document.location.href=\"exercise_5_get_name_from_form.php?name=".$name."&company=".$company."\";</script>";
		}
	}

	?>

</body>
</html>