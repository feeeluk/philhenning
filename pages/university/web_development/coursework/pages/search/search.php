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
	$query = "SELECT wd_product.id AS product_id, wd_product.name AS product_name, wd_product.name AS product_name, wd_product.manufacturer_id AS manufacturer_id, year, price,  manufacturer, image, wd_type.name AS type_name, wd_product.description AS product_description
			FROM wd_product, wd_manufacturer, wd_type
			WHERE wd_product.type_id = wd_type.id
			AND wd_product.manufacturer_id = wd_manufacturer.id
			AND (wd_product.name LIKE '%".$search_string."%' OR wd_manufacturer.manufacturer LIKE '%".$search_string."%' OR wd_product.id LIKE '%".$search_string."%')";

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
									FROM wd_product, wd_product_image
									WHERE wd_product.id = wd_product_image.product_id
									AND wd_product.id = '".$row['product_id']."'
									LIMIT 1";

					$image_result = mysqli_query($connection, $image_query);

					if(mysqli_num_rows($image_result) > 0)
						{ 
							while($image_row = mysqli_fetch_array($image_result, MYSQLI_ASSOC))
							{
								echo "<a href='product.php?product_id=".$row['product_id']."&amp;manufacturer_id=".$row['manufacturer_id']."'><img src='".$path."/assets/".$image_row['location']."' alt='Product image'/></a>";
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
