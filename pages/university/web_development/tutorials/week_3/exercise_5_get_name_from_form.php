	<!DOCTYPE html>
	<html>
	<head>
	</head>
	<body>

	<?php
		
		$name = $_GET['name'];
		$company = $_GET['company'];
	
		if (isset($name) == true)
		{
			echo "<p>$name</p>";
		}
		if (isset($company) == true)
		{
			echo "<p>$company</p>";
		}
		else
		{
			echo "<p>No details entered</p>";
		}

	?>

</body>
</html>