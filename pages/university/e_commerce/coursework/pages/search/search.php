<?php
	// set the root folder (site root not server root) in relation to this page
	$path = "../../";

	// every page can have a different title
	$page_title = "Search";

	//connect to php_header
	include($path."assets/includes/php_header.php");	

	//header include
	include($path."assets/includes/header.php");

	if(isset($_POST['search_string']))//get search value from form
		{
			$search_string = mysqli_real_escape_string($connection, strip_tags($_POST['search_string']));
		}
	else
		{
			$search_string = "";
		}

	//main search query using the value from the search form to find matching products
	$query = "SELECT ecom_product.id AS product_id, ecom_product.name AS product_name, ecom_product.name AS product_name, ecom_product.manufacturer_id AS manufacturer_id, year, price,  manufacturer, image, ecom_type.name AS type_name, ecom_product.description AS product_description
			FROM ecom_product, ecom_manufacturer, ecom_type
			WHERE ecom_product.type_id = ecom_type.id
			AND ecom_product.manufacturer_id = ecom_manufacturer.id
			AND (ecom_product.name LIKE '%".$search_string."%' OR ecom_manufacturer.manufacturer LIKE '%".$search_string."%' OR ecom_product.id LIKE '%".$search_string."%')";

	// run the query and store the result as a variable (this will be an array)
	$result = mysqli_query($connection, $query); 

	// %%%%%%%%%%%%%%%%%%%%%%%%%% page content %%%%%%%%%%%%%%%%%%%%%%%%%%%

	//display results
	//if $row is greater than 0 show results
    if (mysqli_num_rows($result) > 0)
        {
        	$result_count = mysqli_num_rows($result);

        	if(mysqli_num_rows($result) == 1)
        		{$result_text = " result";}
        	else
        		{$result_text = " results";}

        	echo "<h4>Your search returned ".$result_count." ".$result_text."</h4>";

			while($row = mysqli_fetch_array($result, MYSQLI_ASSOC))
				{
					echo "<div class='results'>";

					// sub query that returns the first image for each product
					$image_query = "SELECT name, location
									FROM ecom_product, ecom_product_image
									WHERE ecom_product.id = ecom_product_image.product_id
									AND ecom_product.id = '".$row['product_id']."'
									LIMIT 1";

					$image_result = mysqli_query($connection, $image_query);

					if(mysqli_num_rows($image_result) > 0)
						{ 
							while($image_row = mysqli_fetch_array($image_result, MYSQLI_ASSOC))
							{
								echo "<a href='product.php?product_id=".$row['product_id']."&amp;manufacturer_id=".$row['manufacturer_id']."'><img src='".$path."/assets/".$image_row['location']."' alt='Product Image'/></a>";
							}
						}

					echo "<a href='manufacturer.php?manufacturer=".$row['manufacturer']."'>
						<img class='logo' src='".$path."/assets/".$row['image']."' alt='Manufacturer Logo' />
						</a>
						<h4>".$row['manufacturer']." - ".$row['product_name']."</h4>
						<span class='xxs'>Name: </span><a href='product.php?product_id=".$row['product_id']."&amp;manufacturer_id=".$row['manufacturer_id']."'>".$row['product_name']."</a><br />
						<span class='xxs'>Model: </span>".$row['product_id']."<br />
						<span class='xxs'>Year: </span>".$row['year']."<br />
						<span class='xxs'>Manufacturer: </span><a href='manufacturer.php?manufacturer=".$row['manufacturer']."'>".$row['manufacturer']."</a><br />
						<span class='xxs'>Type: </span><a href='type.php?type=".$row['type_name']."'>".$row['type_name']."</a><br />
						<span class='xxs'>Price: </span>&#163;".$row['price']."<br />
						<span class='xxs'>Description: </span><span class='ml'>".substr($row['product_description'],0,100)."... </span></div>";
				}
    	}
	else
		{
			echo "No results found";
		}	

	// %%%%%%%%%%%%%%%%%%%%%%%%%% page content end %%%%%%%%%%%%%%%%%%%%%%%%%%%

	//login include
	include($path."assets/includes/login.php");

	//footer include
	include($path."assets/includes/footer.php");
?>
