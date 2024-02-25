<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<meta name="author" content="Philip Henning">
		<meta name="description" content="Snow sports product reviews and purchasing">		
		<meta name="keywords" content="snow, snow sports, snow sports products, snow sports product reviews, snowboard, snowboards, snowboarding, ski, skis, skiing, boots, bindings, reviews">		
			
			<title>Snow Compare Shop | <?php echo $page_title; ?></title>

		<link rel="stylesheet" type="text/css" href="<?php echo $path; ?>assets/css/general.css" />
		<link rel="stylesheet" type="text/css" href="<?php echo $path; ?>assets/css/slider.css" />	
		<script type="text/javascript" src="<?php echo $path; ?>assets/scripts/slider.js"></script>
		<script type="text/javascript">

			var image = new Array();
			image [0] = "assets/images/slider_images/<?php echo strval(rand (1 , 3 ))?>.jpg";
			image [1] = "assets/images/slider_images/<?php echo strval(rand (4 , 6 ))?>.jpg";
			image [2] = "assets/images/slider_images/<?php echo strval(rand (7, 9))?>.jpg";
			image [3] = "assets/images/slider_images/<?php echo strval(rand (10 , 12 ))?>.jpg";
			image [4] = "assets/images/slider_images/<?php echo strval(rand (13 , 15 ))?>.jpg";

		</script>
	</head>

	<body onload="start(); initial();">

		<header></header>

		<header>
			<div id="top_container">	
				<img width="1000" alt="mountains" src="<?php echo $path; ?>assets/images/page_images/mountain.png" />


				<div id="search">
					<form action="<?php echo $path; ?>pages/search/search.php" method="post">
						<input placeholder=" hit enter to search..." type="text" name="search_string" id="search_string"/>
						<input type="submit" value="search" />
					</form>
				</div>

			</div>

		</header>

		<nav>
			<div class="container">
				<ul>
					<li>
						<a href="<?php echo $path ?>index.php"><span class="spacer"></span>Home<span class="spacer"></span>
						</a>
					</li>
					
					<li>
						<a href="<?php echo $path ?>pages/search/type.php">Products <span class="arrow-down"></span></a>
							<ul>
								<?php
									$type_query = "SELECT name FROM ecom_type ORDER BY name";
									$type_result = mysqli_query($connection, $type_query);

									if (mysqli_num_rows($type_result) > 0)
								        {
											while($type_row = mysqli_fetch_array($type_result, MYSQLI_ASSOC))
												{
echo "
<li>
	<a href='".$path."pages/search/type.php?type=".str_replace(' ', '%20', $type_row['name'])."'>".$type_row['name']."</a>
</li>

";
												}
										}
								?>
							</ul>
					</li>
					
					<li>
						<a href="<?php echo $path ?>pages/search/manufacturer.php">Manufacturers <span class="arrow-down"></span></a>
							<ul>
								<?php
									$query = "SELECT manufacturer FROM ecom_manufacturer ORDER BY manufacturer";
									$result = mysqli_query($connection, $query);

								if (mysqli_num_rows($result) > 0)
							        {
										while($row = mysqli_fetch_array($result, MYSQLI_ASSOC))
											{
echo "
<li>
	<a href='".$path."pages/search/manufacturer.php?manufacturer=".str_replace(' ', '%20', $row['manufacturer'])."'>".$row['manufacturer']."</a>
</li>

";
											}
									}
								?>
							</ul>
					</li>	
				</ul>
			

				<a href="<?php echo $path; ?>pages/contact/contact.php">
					<div class="tab">
						contact
					</div>
				</a>

				<?php
					if(!isset($_SESSION['e_commerce_username']))
						{
				?>

					<a href="<?php echo $path; ?>pages/register/register.php">
						<div class="tab">
							register
						</div>
					</a>

				<?php
					}
				?>

				<div class="clear"></div>
			</div>
		</nav>

		<section class="container">
			<section id="left">
				<article>
					<div class="content">
						<h3>
							<?php echo $page_title; ?>
						</h3>
					</div>
				</article>		

				<!-- page content -->
				<article>
					<div class="content">

<!-- page content &&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&& -->
