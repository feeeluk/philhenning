<?php

	$images = array(
		"images/snowboards/burton_moo_sb002.jpg",
		"images/snowboards/burton_sun_sb001.jpg",
		"images/snowboards/ride_gho_sb003.jpg",
		"images/snowboards/soloman_gan_sb004.jpg"
	);

?>

<!DOCTYPE html>
<html lang="en">
	<head>
		<title>Practice 2 - Using arrays to access images
		</title>
	</head>

	<body>

		<h1>Display an images from an array</h1>

		<?php

			foreach ($images as $image => $location)
			{
				echo "<img src='".$location."' alt='snowboard' width='300'/>";
			}
		?>


    <p>
      <a href="index.php">Back to list of exercises</a>
    </p>

	</body>

</html>
