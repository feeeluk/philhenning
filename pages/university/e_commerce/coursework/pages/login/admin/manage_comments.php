<?php
	// set the root folder (site root not server root) in relation to this page
	$path = "../../../";

	// every page can have a different title
	$page_title = "Manage comments";

	//connect to php_header
	include($path."assets/includes/php_header.php");

	//header include
	include($path."assets/includes/header.php");

	// if session is set
	if(isset($_SESSION['e_commerce_username']))
	{
		$username = $_SESSION['e_commerce_username'];

		// check to see if the user is an admin
		$query =  "SELECT is_admin FROM ecom_user WHERE username = '$username'";

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

				$comment_query = "SELECT id, post_time, username, product_id
								FROM ecom_post
								ORDER BY id DESC";

				$comment_result = mysqli_query($connection, $comment_query);

				echo "<p><b>
					<span class='xxs'>Comment id</span>
					<span class='xs'>Date</span>
					<span class='xs'>Username</span>
					<span class='xs'>Product</span>
					</b></p>
					";

				while($comment_row = mysqli_fetch_array($comment_result, MYSQLI_ASSOC))
				{
					echo "<p>
						<span class='xxs'>".$comment_row['id']."</span>
						<span class='xs'>".$comment_row['post_time']."</span>
						<span class='xs'>".$comment_row['username']."</span>
						<span class='xs'>".$comment_row['product_id']."</span>
						<span class='xxs'><a href='edit_comment.php?comment=".$comment_row['id']."'>edit</a> | <a onclick=\"return confirm('Are you sure?')\" href='delete.php?comment=".$comment_row['id']."'>delete</a></span>
						</p>
						";
				}

				// end of the check is admin section
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