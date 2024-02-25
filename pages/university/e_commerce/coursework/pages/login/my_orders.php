<?php
	// set the root folder (site root not server root) in relation to this page
	$path = "../../";	

	// every page can have a different title
	$page_title = "Orders";

	//connect to php_header
	include($path."assets/includes/php_header.php");	

	//header include
	include($path."assets/includes/header.php");						

	if(isset($_SESSION['e_commerce_username']))
	{
	//show all comments posted by the user
		$username = $_SESSION['e_commerce_username'];

		$order_query = "SELECT id, date_time, total_amount, ship_postcode
						FROM ecom_order
						WHERE username = '$username'
						ORDER BY date_time DESC";

		$order_result = mysqli_query($connection, $order_query);

		echo "<p><b>
			<span class='xxs'>Date / time</span>
			<span class='xs'>Order value</span>
			<span class='m'>Delivery postcode</span>
			</b></p>
			";

		while($order_row = mysqli_fetch_array($order_result, MYSQLI_ASSOC))
		{
			echo "<p>
				<span class='xxs'>".$order_row['date_time']."</span>
				<span class='xs'>&#163;".$order_row['total_amount']."</span>
				<span class='m'>\"".$order_row['ship_postcode']."\"</span>
				<span class='xxs'><a href='view_order.php?order=".$order_row['id']."'>view</a>
				</p>
				";
		}

	}
	else
	{
		echo "<p>You must be logged in and have admin privileges to be able so view this page</p>";
	}

	//login include
	include($path."assets/includes/login.php");

	//footer include
	include($path."assets/includes/footer.php");
?>
