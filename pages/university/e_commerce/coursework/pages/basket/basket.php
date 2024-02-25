<?php
	// set the root folder (site root not server root) in relation to this page
	$path = "../../";

	// every page can have a different title
	$page_title = "Shopping Basket";

	// connect to php_header
	include($path."assets/includes/php_header.php");	

	//header include
	include($path."assets/includes/header.php");						

	//function to check if a product exists
	function productExists($product_id)
	{
		global $connection;
			//use sprintf to make sure that $product_id is inserted into the query as a number - to prevent SQL injection
				$query = "SELECT * FROM ecom_product WHERE id = '".$product_id."'";
				$result = mysqli_query($connection, $query);
				
			return mysqli_num_rows($result) > 0;
	}

	if(isset($_SESSION['e_commerce_username']))
	{
					// check if there is a product
					if(isset($_GET['id']))
						{
							$product_id = $_GET['id'];
						}
					else
					{
						$product_id = "none";
					}

					// check if there is an action
					if(isset($_GET['action']))
						{
							$action = $_GET['action'];
						}
					else
					{
							$action = "none";

					}

					if($action == "empty")
					{
						unset($_SESSION['cart']);
					}

					if($product_id != "none" AND $action != "none")
						{
						//if there is an product_id and that product_id doesn't exist display an error message
							
						if($product_id && !productExists($product_id)) {
							die("Error. Product Doesn't Exist");
						}

						switch($action) {	//decide what to do	

							case "add":
								$_SESSION['cart'][$product_id]++;

							break;
							
							case "remove":
								$_SESSION['cart'][$product_id]--; //remove one from the quantity of the product with id $product_id 
								if($_SESSION['cart'][$product_id] == 0) unset($_SESSION['cart'][$product_id]); //if the quantity is zero, remove it completely (using the 'unset' function) - otherwise is will show zero, then -1, -2 etc when the user keeps removing items. 
							break;
								
						}
					}

					if($_SESSION['cart'])
					{	//if the cart isn't empty
						//show the cart
						
						echo "<table id='basket' class='basket'>
							<thead>
							<tr>
								<th>Type</th>
								<th>Manufacturer</th>
								<th>Product</th>
								<th>Price</th>
								<th>Qty</th>
								<th>Qty remaining</th>
								<th>Cost</th>
								</tr>
								</thead>";	//format the cart using a HTML table
						
							//iterate through the cart, the $product_id is the key and $quantity is the value
							foreach($_SESSION['cart'] as $product_id => $quantity)
							{	
								
								//get the name, description and price from the database - this will depend on your database implementation.
								$query = "SELECT ecom_type.name AS type, ecom_manufacturer.manufacturer AS manufacturer, ecom_product.name, ecom_product.description, ecom_product.price, ecom_product.qty
										FROM ecom_product, ecom_type, ecom_manufacturer
										WHERE ecom_product.manufacturer_id = ecom_manufacturer.id
										AND ecom_product.type_id = ecom_type.id
										AND ecom_product.id = '".$product_id."'";
								$result = mysqli_query($connection, $query);
									
								//Only display the row if there is a product (though there should always be as we have already checked)
								if(mysqli_num_rows($result) > 0)
								{
								
									list($type, $manufacturer, $name, $description, $price, $qty) = mysqli_fetch_row($result);
								
									$line_cost = $price * $quantity;		//work out the line cost
									$total = $total + $line_cost;			//add to the total cost
								
									echo "<tr>";
										//show this information in table cells
										echo "<td align='center'>$type</td>";
										echo "<td align='center'>$manufacturer</td>";
										echo "<td align='center'>$name</td>";
										echo "<td align='center'>&#163;$price</td>";
										//along with a 'remove' link next to the quantity - which links to this page, but with an action of remove, and the id of the current product
										echo "<td align='center'>$quantity 
											<a href='$_SERVER[PHP_SELF]?action=remove&id=$product_id'>&#45;</a>
											/
											<a href='$_SERVER[PHP_SELF]?action=add&id=$product_id'>&#43;</a>
											</td>";
										echo "<td align='center'>".($qty-$quantity)."</td>";
										echo "<td align='center'>&#163;$line_cost</td>";
									
									echo "</tr>";							
								}					
							}
							
							//show the total
							echo "<tr>
									<td colspan='6' align='right'>
										Order total
									</td>
									<td align='right'>
										&#163;$total
									</td>
								</tr>";
							
							//show the empty cart link - which links to this page, but with an action of empty. A simple bit of javascript in the onlick event of the link asks the user for confirmation
							echo "<tr>
									<td colspan='7' align='right'>
										<a href='$_SERVER[PHP_SELF]?action=empty' onclick='return confirm('Are you sure?');'>
											Empty basket
										</a>
									</td>
								</tr>
								<tr>
									<td colspan='7' align='right'>
										<a href='".$path."pages/basket/checkout.php'>
											<img id='checkout' class='basket' alt='checkout' src='".$path."assets/images/page_images/checkout.jpg' />
										</a>
									</td>					
								</tr>
							</table>";
						
						echo "<a href='".$path."index.php'>Continue Shopping</a>";						
					
					}

					else{
						//otherwise tell the user they have no items in their cart
						echo "<p>
								You have no items in your shopping cart.
							</p>
							<p>
								<a href='".$path."index.php'>Continue Shopping</a>
							</p>";					
					}
		}
		else
		{
			echo "<p>
					You must be signed in.
				</p>

				<p>
					<a href='".$_SERVER['HTTP_REFERER']."'>Back</a>
				</p>";
		}

	//login include
	include($path."assets/includes/login.php");

	//footer include
	include($path."assets/includes/footer.php");
?>
