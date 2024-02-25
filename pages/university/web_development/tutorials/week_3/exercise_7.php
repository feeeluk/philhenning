<?php
$path;
$url;
$url_rel;
$path_rel = "web_development/tutorials/";

	if($_SERVER['SERVER_NAME']==="university.dev")
	{
		$path = "/Users/philhenning/Sites/university/".$path_rel;		
		$url = "http://university.dev/";
		$url_rel = "/web_development/tutorials/";

	}
	elseif($_SERVER['SERVER_NAME']==="lamp.soi.city.ac.uk")
	{
		$path = "/homes/2013/abpy140/html/".$path_rel;
		$url_root = "https://lamp.soi.city.ac.uk/~abpy140/";
		$url = "https://lamp.soi.city.ac.uk/~abpy140/web_development/tutorials/";
		$url_rel = "/~abpy140/web_development/tutorials/";
	}
	else
	{
		echo "the website is not configured to run on this server";
	}

?>

<!DOCTYPE html>
<html>
<head>
<title>Week 3 - Exercise 7</title>
<meta charset="utf-8" />
</head>
<body>

<?php

include('include.php');

?>

	<p>
		<?php
			echo "<p>".$_SERVER['DOCUMENT_ROOT']."</p>";
			echo "<p>".$_SERVER['HTTP_HOST']."</p>";
			echo "<p>".$_SERVER['PHP_SELF']."</p>";

			echo "<p><a href='".$url_root."'>link to server root</a></p>";
			echo "<p><a href='".$url."'>link to tutorials root</a></p>";
			echo "<p><a href='".$url_rel."week_3/'>link to week_3 index</a></p>";			
		?>
	</p>

</body>
</html>
