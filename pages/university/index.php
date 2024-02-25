<?php
	
	//detect the server name - if it matches the local testing environment then set variables to local paths
	if($_SERVER['SERVER_NAME']==="university.dev")
		{
			$server_name = $_SERVER['SERVER_NAME'];
		}
	//if it matches the live environment then set variables to server paths	
	elseif($_SERVER['SERVER_NAME']==="philhenning.atwebpages.com")
		{
			$server_name = $_SERVER['SERVER_NAME'];
		}
	//if it is niether of these things (which should never be the case) do some arbitrary action
	else
		{
			echo "the website is not configured to run on this server";
		}
	//end of php header code
?>

<!DOCTYPE html>
<html lang="en">
	<head>	
		<title>University</title>
		<link rel="stylesheet" href="general.css">
		<meta charset="UTF-8">
		<meta name="author" content="Philip Henning">
		<meta name="description" content="list of tutorials in Web Development (INM316)">			
	</head>

	<body id="page">

		<div id="main-body" class="">

<!-- 			<header>
				<h1 class="inline">Server root</h1>
				<?php
					if($server_name=="university.dev")
						{
							echo "<br />server: ".$server_name;
							echo "<p class='inline no_link'><a href='https://lamp.soi.city.ac.uk/~abpy140/'> / change</a></p>";
						}

					elseif($server_name==="lamp.soi.city.ac.uk")
						{
							echo "<br />server: ".$server_name;
							echo "<p class='inline no_link'><a href='http://university.dev/'> / change</a></p>";
						}
				?>
			</header> -->

			<article>

					<h2>Web Development</h2>

					<ul>
							<li><a href="web_development/tutorials/">Tutorials</a></li>
							<li><a href="web_development/javascript_tutorial/">JavaScript Tutorial</a></li>
					</ul>

			</article>
		</div>
		<!-- end of main-body -->
			
</body>
</html>