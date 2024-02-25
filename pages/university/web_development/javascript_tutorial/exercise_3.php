<!DOCTYPE html>
<html lang="en">
	<head>
		<title>Using if()</title>
		<script type="text/javascript">
		</script>
	</head>
	<body>
	<h1>Using if()</h1>
	<script type="text/javascript">
	var condition1 = true;
	var condition2 = true;

	//&& can be used in if() statements to check if both conditions are true
	//|| can be used in if() statements to check if either of the conditions are true
	if(condition1 == true && condition2 == true)
	{
		document.writeln("both conditions are true");
	}
	else if(condition1 == true || condition2 == true)
	{
		document.writeln("one of the conditions is true");
	}

	</script>
		<br />
		<a href="index.php">back to tutorial contents</a>
	</body>
</html>