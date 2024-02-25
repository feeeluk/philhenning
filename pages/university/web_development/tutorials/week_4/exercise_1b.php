<?php
require_once("solar-system-data.php");
?>

<!DOCTYPE html>
<html lang="en">
	<head>
	</head>
	<body>
		
		<?php
			foreach ($planets as $planet => $data)
			{
				echo "<p>".$planet."</p>";
			}
		?>

		<p>
			<a href="index.php">Back to list of exercises</a>
		</p>

	</body>
</html>