<!DOCTYPE html>
<html lang="en">
	<head>
		<title>Exercise 7</title>

		<script type="text/javascript">
		var array_val = 0;
		var colours = new Array("red", "green", "blue", "orange","purple");
		function background(choose_colour)
		{
			document.bgColor=choose_colour;
		}

		</script>
	</head>
	<body>

		<h1>Exercise 7 - using arrays with functions</h1>

		<script type="text/javascript">

		while(array_val < colours.length)
		{
			
			document.writeln("<a href='#' onmouseover=\"background('",colours[array_val],"')\">",colours[array_val],"</a><br />");
			array_val++;
		}

		</script>
		<br />
		<a href="index.php">back to tutorial contents</a>
	</body>

</html>