<?php
	// set the root folder (site root not server root) in relation to this page
	$path = "../../";

	// every page can have a different title
	$page_title = "View Order - ".$_GET['order'];

	// connect to php_header
	include($path."assets/includes/php_header.php");	

	//header include
	include($path."assets/includes/header.php");						

	// if session is set
	if(isset($_SESSION['e_commerce_username']))
	{
		$username = $_SESSION['e_commerce_username'];

		// store value from url
		$order_id = mysqli_real_escape_string($connection, strip_tags($_GET['order']));

		$query = "SELECT *
					FROM ecom_order, ecom_order_item
					WHERE ecom_order.id = $order_id";

		// run post query
		$result = mysqli_query($connection, $query);

		$row = mysqli_fetch_array($result, MYSQL_ASSOC);
			
		echo "<p>
			<span class='xs'>Date / time: </span>".$row['date_time']."<br />
			<span class='xs'>Total amount: </span>&#163;".$row['total_amount']."<br />
			<span class='xs'>Delivery name:</span>".$row['ship_fname']."<br />
			<span class='xs'>Delivery last name: </span>".$row['ship_lname']."<br />
			<span class='xs top'>Delivery address: </span>".$row['ship_address']."<br />
			<span class='xs top'>Delivery address: </span>".$row['ship_postcode']."<br />";

		$query_item = "SELECT product, quantity
			FROM ecom_order_item, ecom_order
			WHERE ecom_order.id = ecom_order_item.main_order
			AND ecom_order.id = $order_id";

		// run post query
		$result_item = mysqli_query($connection, $query_item);

			if(mysqli_num_rows($result) > 0)
			{
				while($row_item = mysqli_fetch_array($result_item, MYSQL_ASSOC))
				{
					echo "<p>
						<span class='xxs'>&nbsp;</span><span class='xs'>Product: </span>".$row_item['product']."<br />
						<span class='xxs'>&nbsp;</span><span class='xs'>Quantity: </span>".$row_item['quantity']."<br />";
				}
			}
		
		echo "<a href='".$path."pages/login/my_orders.php'>Cancel</a>";

		}
	
	else
	{
		echo "<p>You must be logged in to be able so view this page</p>";
	}
	//login include
	include($path."assets/includes/login.php");

	//footer include
	include($path."assets/includes/footer.php");
?>
