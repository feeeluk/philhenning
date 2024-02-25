<?php
	
	// specifically set the root folder from the html server root, because the 404 redirects from the current location of the missing page, it doesn't redirect the url to the location of the 404 page, therefore the CSS files, images etc are not correctly identified as they use relative urls
	$path = "/e_commerce/coursework/";

	// php path needs to be reamin relative because for some reason the php can tell the location of the 404 file, and needs the relative link in order to be able to access the includes folder
	$include_path = "./";

	// every page can have a different title
	$page_title = "404 - page missing";	

	// connect to php_header
	include($include_path."assets/includes/php_header.php");

	//header include
	include($include_path."assets/includes/header.php");
						
?>

<h2>404</h2>
<p>
Sorry, this page doesn't exist.
</p>

<?php
	//login include
	include($include_path."assets/includes/login.php");

	//footer include
	include($include_path."assets/includes/footer.php");
?>
