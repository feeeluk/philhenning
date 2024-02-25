<?php
	// set the root folder (site root not server root) in relation to this page
	$path = "../../";

	// every page can have a different title
	$page_title = "Product";

	//connect to php_header
	include($path."assets/includes/php_header.php");	

	//header include
	include($path."assets/includes/header.php");

	// -- %%%%%%%%%%%%%%%%%%%%%%%%%% page content %%%%%%%%%%%%%%%%%%%%%%%%%%%

	if (isset($_GET['product_id']) AND isset($_GET['manufacturer_id']))
		{
			$product_id = $_GET['product_id'];
			
			$manufacturer_id = $_GET['manufacturer_id'];
			
			// main query  - display product using the values sent to the page
			$query = "SELECT wd_product.id AS product_id, wd_product.name AS product_name, price, year, wd_product.description AS product_description, manufacturer, image AS manufacturer_image,  wd_type.name AS type_name
					FROM wd_product
					LEFT JOIN wd_manufacturer ON wd_product.manufacturer_id = wd_manufacturer.id
					LEFT JOIN wd_type ON wd_product.type_id = wd_type.id
					WHERE wd_product.id = '".$product_id."'";

			// main product query
			$result = mysqli_query($connection, $query);

			//if $row is greater than 0 show results
		    if (mysqli_num_rows($result) > 0)
		        {		        	
					while($row = mysqli_fetch_array($result, MYSQLI_ASSOC))
						{		
								// SUB QUERY IMAGES %%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%
								// sub query that gets the images for the product
								$image_query = "SELECT name, location FROM wd_product, wd_product_image
										WHERE wd_product.id = wd_product_image.product_id AND wd_product.id = '".$product_id."'";

								// store the result of the query 
								$image_result = mysqli_query($connection, $image_query." LIMIT 1");

								//if $row is greater than 0 show results
							    if (mysqli_num_rows($image_result) > 0)
							        {		        	
										while($image_row = mysqli_fetch_array($image_result, MYSQLI_ASSOC))
											{
												echo "<img class='main' id='main' src='".$path."assets/".$image_row['location']."' alt='product image'/>";
											}
									}

								else
									{
										echo "<p><b>No images found</b></p>";
									}

							echo "<h2>".$row['manufacturer']." ".$row['product_name']."</h2>
								<p>
								<span class='xxs'>Product id:</span>".$row['product_id']."<br />
								<span class='xxs'>Product name:</span>".$row['product_name']."<br />
								<span class='xxs'>Manufacturer:</span><a href='".$path."pages/search/manufacturer.php?manufacturer=".$row['manufacturer']."'>".$row['manufacturer']."</a><br />
								<span class='xxs'>Price:</span>&#163;".$row['price']."<br />
								<span class='xxs'>Year:</span>".$row['year']."<br />
								<span class='xxs'>Type:</span><a href='".$path."pages/search/type.php?type=".$row['type_name']."'>".$row['type_name']."</a><br />								
								<span class='xxs'>Description:</span><br />
								".$row['product_description']."
								</p>";

							echo "<h4>Images</h4>";

								// store the result of the query
								$image_result = mysqli_query($connection, $image_query);

								//if $row is greater than 0 show results
							    if (mysqli_num_rows($image_result) > 0)
							        {		        	
										while($image_row = mysqli_fetch_array($image_result, MYSQLI_ASSOC))
											{
												echo "<p>
													<a href='#' onmouseover=\"document.getElementById('main').src='".$path."assets/".$image_row['location']."'\">".$image_row['location']."</a>
													</p>";
											}
									}

								else
									{
										echo "<p>No images found</p>";
									}

								echo "<h4>Comments</h4>";										

								// SUB QUERY COMMENTS %%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%
								// sub query that returns all comments for each product
								$comment_query = "SELECT wd_post.id AS post_id, username, product_id, comment, post_time, wd_product.name  
												FROM wd_post, wd_product
												WHERE wd_post.product_id = wd_product.id
												AND wd_product.name = '".$row['product_name']."'
												ORDER BY post_time DESC";

								$comment_result = mysqli_query($connection, $comment_query);
								
								if (mysqli_num_rows($comment_result) > 0)
									{
										while($comment_row = mysqli_fetch_array($comment_result, MYSQLI_ASSOC))
											{
												echo "<div>
													<p>\"".$comment_row['comment']."\"</p>
													<p>
													<i>
													posted by ".$comment_row['username']." at ".
													date('g:m:sa',strtotime($comment_row['post_time']))."
													on ".
													date('l jS F Y',strtotime($comment_row['post_time']))."
													</i>
													<br />
													<br />
													</p></div>";
											}
									}

								else
									{
										echo "<p>No comments yet</p>";
									}


								echo "<h4>Leave a comment</h4>";
								// user must be signed in
									// do not show form unless signed in
								if(isset($_SESSION['web_development_username']))
									{
										$username = $_SESSION['web_development_username'];
										
										echo "<form method='post' action='".$path."pages/login/add_comment.php'>
											<p>
											<input type='hidden' name='username' id='username' value='".$username."'></input>
											<input type='hidden' name='product_id' id='product_id' value='".$product_id."'></input>
											<input type='hidden' name='manufacturer_id' id='manufactuer_id' value='".$manufacturer_id."'></input>
											<textarea name='comment' id='comment' rows='10' cols='40'></textarea>
											<br />
											<input type='submit' value'submit' name='submit' id='submit'></input>
											</p>
											</form>";
									}
								else
									{
										echo "<p>You can only leave comments if you are logged in.</p>";
									}
		    			}
		    	}

		    else
		    	{
		    		echo "<h3>".$product_id." ".$manufacturer_id."</h3>";
		    		echo "Sorry, this product does not exist";
		    	}	
				
		}

	// %%%%%%%%%%%%%%%%%%%%%%%%%% page content end %%%%%%%%%%%%%%%%%%%%%%%%%%%

	//login include
	include($path."assets/includes/login.php");

	//footer include
	include($path."assets/includes/footer.php");
?>

