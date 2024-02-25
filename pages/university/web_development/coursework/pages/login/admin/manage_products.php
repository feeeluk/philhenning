<?php
	// set the root folder (site root not server root) in relation to this page
	$path = "../../../";

	// every page can have a different title
	$page_title = "Manage products";

	//connect to php_header
	include($path."assets/includes/php_header.php");

	//header include
	include($path."assets/includes/header.php");

	// if session is set
	if(isset($_SESSION['web_development_username']))
	{
		$username = $_SESSION['web_development_username'];

		// check to see if the user is an admin
		$query =  "SELECT is_admin FROM wd_user WHERE username = '$username'";

		// run the query
		$result = mysqli_query($connection, $query); 

		if (mysqli_num_rows($result) > 0)
		{
			while($row = mysqli_fetch_array($result, MYSQL_ASSOC))
			{
				if($row['is_admin'] == 1)
				{

				//JavaScript confirm include
				include($path."assets/scripts/confirm.js");

				$product_query = "SELECT wd_product.id AS id, name, manufacturer, wd_manufacturer.id AS manufacturer_id
								FROM wd_product, wd_manufacturer
								WHERE wd_product.manufacturer_id = wd_manufacturer.id
								ORDER BY id DESC";

				$product_result = mysqli_query($connection, $product_query);

				echo "<p><b>
					<span class='xs'>Product id</span>
					<span class='xs'>Product name</span>
					<span class='xs'>Manufacturer</span>
					</b></p>";

					while($product_row = mysqli_fetch_array($product_result, MYSQLI_ASSOC))
					{
						echo "<p>
							<span class='xs'><a href='".$path."pages/search/product.php?product_id=".$product_row['id']."&manufacturer_id=".$product_row['manufacturer_id']."'>".$product_row['id']."</a></span>
							<span class='xs'>".$product_row['name']."</span>
							<span class='xs'>".$product_row['manufacturer']."</span>
							<span class='s'><a href='edit_product.php?product=".$product_row['id']."'>edit</a> | <a onclick=\"return confirm('Are you sure?')\" href='delete.php?product=".$product_row['id']."'>delete</a></span>
							</p>
							";
					}

				}

				else
				{
					echo "You must have administration rights to be able to add new products";	
				}
			}
		}

	}

	else
	{
		echo "You must be logged in and have administration rights to be able to add new products";
	}


	//login include
	include($path."assets/includes/login.php");

	//footer include
	include($path."assets/includes/footer.php");

?>