<?php
require_once("solar-system-data.php");
?>

<html>
	<head>
	</head>
	<body>

		<?php
	
			// has a planet been selected?
			// !empty means 'is not empty'
			if(!empty($_GET['planet_name']))
			{ 
				$planet_name = $_GET['planet_name'];

			// the if statement isn't closed yet, so if the statement is true, then all of the following HTML is displayed!	
		?>

		<p>
			<a href="exercise_2.php">Go back to planet list</a>
		</p>

		<h1>
			You have selected planet: <?php echo $planet_name; ?>
		</h1>

		<?php
				// nested if (still inside the if that checks that a planet name has been sent)
				// the planet name has been passed as an argument to the planets array, this returns only that array! Much quicker than doing it the manual way of adding another 'foreach' loop.
				if(isset($planets[$planet_name]))
				{
					foreach($planets[$planet_name] as $attribute => $value)
					{
						// there are a couple of nested arrays and I don't know how to retrieve / display those at the moment. In the meantime, the function gettype() returns the type of variable that $value is. In this case we are ignoring any value that is an "array" - if an array is referenced directly without any argument e.g. by "echo", the value "array" is returned
						if(gettype($value) != "array")
							{	
								echo "<pre>".$attribute.": ".$value."</pre>";
							}
					}
				}
				else
				{
					echo "Planet not recognised";
				}

			} // this closes the if check that a planet has been selected

			else
			{
				echo "Please choose from the following:";

				// displays a list of all of the planets and sends the relevant planet name to the page via the url
				foreach ($planets as $planet_name => $planet_data)
				{
					echo "<ul><a href='exercise_2.php?planet_name=".$planet_name."''>".$planet_name."</a></ul>";
				}
			}
		?>

		<p>
			<a href="index.php">Back to list of exercises</a>
		</p>

	</body>
</html>