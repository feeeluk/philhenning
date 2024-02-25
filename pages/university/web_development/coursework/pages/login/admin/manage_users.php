<?php
	// set the root folder (site root not server root) in relation to this page
	$path = "../../../";

	// every page can have a different title
	$page_title = "Manage users";

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

				$user_query = "SELECT username, first_name, email, joined
								FROM wd_user
								ORDER BY username DESC";

				$user_result = mysqli_query($connection, $user_query);

				echo "<p><b>
					<span class='xxs'>Username</span>
					<span class='xs'>First name</span>
					<span class=s>Email</span>
					<span class='xxs'>Joined</span>
					</b></p>
					";

				while($user_row = mysqli_fetch_array($user_result, MYSQLI_ASSOC))
				{
					echo "<p>
						<span class='xxs'>".$user_row['username']."</span>
						<span class='xs'>".$user_row['first_name']."</span>
						<span class='s'>".$user_row['email']."</span>
						<span class='xxs'>".$user_row['joined']."</span>
						<span class='xxs'><a href='edit_user.php?user=".$user_row['username']."'>edit</a> | <a onclick=\"return confirm('Are you sure?')\" href='delete.php?user=".$user_row['username']."'>delete</a></span>
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