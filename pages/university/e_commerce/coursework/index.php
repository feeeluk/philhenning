<?php
	// set the root folder (site root not server root) in relation to this page
	$path = "./";

	// every page can have a different title
	$page_title = "Home";

	// connect to php_header
	include($path."assets/includes/php_header.php");	

	//header include
	include($path."assets/includes/header.php");						
?>

<h2>Welcome</h2>

<p>
Welcome to Snow Compare Shop!<br />
The home of all snow related products and equipment. We are a new business so have a limited catalogue of products at the moment, but we do offer outstandingly good prices, and a customer service experience that will not be beaten by any other!
Please let us know if you have any comments, suggestions or other feedback.</p>
<p>
If you have time, why not register as a member, which then gives you access to a growing list of exclusive features. Otherwise, please enjoy your visit.</p>

<p>
Happy browsing!
</p>

<link rel="stylesheet" type="text/css" href="<?php echo $path; ?>assets/css/catalogue.css" />
<div class="catalogue_container">

<?php
	$query = "SELECT * FROM ecom_type ORDER BY name ASC";
	$result = mysqli_query($connection, $query);

	if(mysqli_num_rows($result) > 0)
	{
		while($row = mysqli_fetch_array($result, MYSQLI_ASSOC))
		{
			echo "<div class='catalogue'>
					<div class='sub_heading'>
						<a href='".$path."pages/search/type.php?type=".$row['name']."'>
							<h4>".$row['name']."</h4>
						</a>
					</div>
					<div class='item'>
						<a href='".$path."pages/search/type.php?type=".$row['name']."'>
							<img class='calalogue_item' id='".$row['name']."' alt='Product category' src='".$path."assets/".$row['product_type_image']."' />
						</a>
					</div>
				</div>";
		}
	}
?>

<div class="clear"></div>

</div>

<br />
<br />

<div id="slider_container">
	<div id="slider_top">
		<img class="slider" src="<?php echo $path; ?>/assets/images/slider_images/blank.jpg" id="slide" alt="slider-images"/>
		<p id="slider_imageNumber"></p>
	</div>

	<div id="slider_bottom" class="slider_nav">
		<a href="#non"><img class="slider" src="<?php echo $path; ?>assets/images/slider_navigation/back.png" alt="back" onclick="back()" /></a>
		<a href="#non"><img class="slider" src="<?php echo $path; ?>assets/images/slider_navigation/pause.png" alt="pause" onclick="stop()"></a>
		<a href="#non"><img class="slider" src="<?php echo $path; ?>assets/images/slider_navigation/play.png" alt="play" onclick="start()"></a>
		<a href="#non"><img class="slider" src="<?php echo $path; ?>assets/images/slider_navigation/forward.png" alt="forward" onclick="forward()"></a>
	</div>
</div>

<p>
Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse in pretium arcu. Nulla euismod placerat urna, et auctor odio congue eu. Morbi et condimentum ipsum, eget lacinia tortor. Nam consectetur dapibus felis, a pretium leo aliquam sit amet. Integer convallis nunc eu risus dictum imperdiet. Curabitur dignissim bibendum libero vitae ornare. Aliquam erat volutpat. Phasellus vel enim eros. Aenean luctus ante sapien, vitae mattis sapien mattis ac. Aenean quis eros varius erat adipiscing suscipit. Sed tincidunt at ligula nec dapibus. Proin ac nisi tortor. Praesent ornare blandit sem.
</p>

<p>
best wishes,<br />
Phil (creator)
</p>

<?php
	//login include
	include($path."assets/includes/login.php");

	//footer include
	include($path."assets/includes/footer.php");
?>
