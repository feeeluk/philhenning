<!DOCTYPE html>
<html>
<head>
<title>Week 3 - Exercise 2</title>
<meta charset="utf-8" />
</head>
<body><h1>What day is it?</h1>
	<p>
		<?php
			ini_set('date.timezone', 'Europe/London');
			echo date("l");
		?>
	</p>

	<p>
		<?php
			echo date("j");
		?>
	</p>

	<p>
		<?php
			echo date("o");
		?>
	</p>

	<p>
		<?php
		
			echo date("G:i:sa");
		?>
	</p>

	<p>
		<?php
			echo date("j/m/o");
		?>
	</p>

	<p>
		<?php
			echo "Today is " .  date("l") . " the " . date("jS") . " of " .date("F o") ;
		?>
	</p>


</body>
</html>