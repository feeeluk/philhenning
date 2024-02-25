<?php

	$products = array(
		array(
			"image" => "images/snowboards/soloman_gan_sb004.jpg",
			"description" => "this is the first snowboard.... hello Mum this is me tyoibng some textI will have all I IiiI"
		),

		array(
			"image" => "images/snowboards/burton_sun_sb001.jpg",
			"description" => "this is the second snowboard description"
		),

		array(
			"image" => "images/snowboards/ride_gho_sb003.jpg",
			"description" => "this is the third description"
		)
	);

?>

<!DOCTYPE html>
<html lang="en">
	<head>
		<title>Practice 3 - Using a multi dimensional array to display products
		</title>
		<link rel="stylesheet" type="text/css" href="css.css">
	</head>

	<body>

		<h1>
			Practice 3 - Using a multi dimensional array to display products
		</h1>

		<table>

		<?php

			
//			$oddeven = 1;
			foreach ($products as $product => $details)
			{
				
				echo "<tr>";
				echo "<td><img src='".$details['image']."' alt='image' /></td>";
				echo "<td>".$details['description']."</td>";
//				echo "<td>".$oddeven."</td>";
				echo "</tr>";
//				$oddeven = $oddeven+1;
			}
		?>
		</table>

	<p>
		<a href="index.php">Back to list of exercises</a>
	</p>

	</body>
</html>
