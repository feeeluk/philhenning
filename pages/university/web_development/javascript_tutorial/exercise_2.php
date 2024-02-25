<!DOCTYPE html>
<html lang="en">
	<head>
		<title>Using variables, prompts and strings</title>
		<script type="text/javascript">

		//it is a good idea to put as much code in the head as it gets read before the body
		var seconds_per_min = 60;
		var minutes_per_hour = 60;
		var hours_per_day = 24;
		var seconds_in_a_day = seconds_per_min * minutes_per_hour * hours_per_day;
		var example1 = "This is a prompt";
		var example2 = "This is another piece of text in the prompt";

		</script>
	</head>
	<body>
	<h1>Using variables, prompts and strings</h1>

	<script type="text/javascript">

		//document.writeln is similar to 'echo' in php
		//different variables or strings can be included in a statement by separating them with a comma
		document.writeln("Seconds in a minute: ", seconds_per_min, " Minutes in an hour: ", minutes_per_hour, " Hours in a day: ", hours_per_day);
		document.writeln("<br />Seconds in a day: ", seconds_in_a_day);

		//value1 = the instructions, value2 = the default text already in the box
		var input1 = prompt("value1", "value2");
		var input2 = prompt(example1, example2);
		var bold = input1.italics().fontcolor('red');
		var upper = input2.toUpperCase().fontcolor('red');

		document.writeln("<br />", input1,"<br />", input2);
		document.writeln("<br />", bold,"<br />", upper);

	</script>

		<br />
		<a href="index.php">back to tutorial contents</a>

	</body>
</html>