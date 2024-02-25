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
		<title>List of Tutorials</title>
		<link rel="stylesheet" type="text/css" href="<?php echo $url; ?>/general.css">
		<meta charset="UTF-8">
		<meta name="author" content="Philip Henning">
		<meta name="description" content="list of tutorials in Web Development (INM316)">			
	</head>

	<body id="page">

		<div id="main-body" class="">

			<header>
				<h1 class="inline">Web Development (INM316)</h1>
			</header>

			<article>

				<h2>Tutorials</h2>

					<ul>

						<li><a href="week_1/">Week 1 - Introduction to HTML and CSS</a></li>
						<li><a href="week_2/">Week 2 - HTML and CSS again</a></li>
						<li><a href="week_3/">Week 3 - Introduction to PHP</a></li>
						<li><a href="week_4/">Week 4 - More Php</a></li>
						<li><a href="">Week 5 - </a></li>
						<li><a href="">Week 6 - </a></li>
						<li><a href="">Week 7 - </a></li>
						<li><a href="">Week 8 - </a></li>
						<li><a href="">Week 9 - </a></li>
						<li><a href="">Week 10 - </a></li>
					</ul>

					<p class="no_link"><a href="../../index.php">Home</a></p>
			</article>
		</div>
		<!-- end of main-body -->

	</body>
</html>