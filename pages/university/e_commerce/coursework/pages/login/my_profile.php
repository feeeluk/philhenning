<?php
	// set the root folder (site root not server root) in relation to this page
	$path = "../../";

	// every page can have a different title
	$page_title = "My Profile";

	//connect to php_header
	include($path."assets/includes/php_header.php");

		// if the username session variable is set then show the user login home pages
		if(isset($_SESSION['e_commerce_username']))
			{
	
				//header include
				include($path."assets/includes/header.php");

			    //store the sql query as a variable
				$query =  "SELECT * FROM ecom_user WHERE username = '".$_SESSION['e_commerce_username']."'";

				// run the query
				$result = mysqli_query($connection, $query);                     

				//if $row is greater than 0, the username / password combination has been found, so login
			    if (mysqli_num_rows($result) > 0)
			        {
						while($row = mysqli_fetch_array($result, MYSQLI_ASSOC))
							{
								echo "<img class='main' src='".$path."assets/".$row['image']."' alt='profile picture' />
									<h4>Details</h4>
									<p>
									<span class='xxs'>Username:</span>".$row['username']."<br />
									<span class='xxs'>Title:</span>".$row['title']."<br />
									<span class='xxs'>First name:</span>".$row['first_name']."<br />
									<span class='xxs'>Last name:</span>".$row['last_name']."<br />
									<span class='xxs'>Gender:</span>".$row['gender']."<br />
									<span class='xxs'>DOB:</span>".date('l jS F Y',strtotime($row['dob']))."</p>";
							}			    		
			    	}
			    echo "<h4>Comments</h4>";

				//store the sql query as a variable
				$query =  "SELECT * FROM ecom_post
						WHERE username = '".$_SESSION['e_commerce_username']."'
						ORDER BY post_time DESC";

				// run the query
				$result = mysqli_query($connection, $query);                     

				//if $row is greater than 0, the username / password combination has been found, so login
			    if (mysqli_num_rows($result) > 0)
			        {
						while($row = mysqli_fetch_array($result, MYSQLI_ASSOC))
							{
								echo "<div>
													<p>\"".$row['comment']."\"</p>
													<p>
													<i>
													posted at ".
													date('g:m:sa',strtotime($row['post_time']))."
													on ".
													date('l jS F Y',strtotime($row['post_time']))."
													</i>
													<br />
													<br />
													</p></div>";
							}
					}				

				//login include
				include($path."assets/includes/login.php");

				//footer include
				include($path."assets/includes/footer.php");

			// end the logged in section 
			}
	
			// if the username session variable isn't set then redirect the user to the main page
			else
				{
					header("location: ".$path);
				}

?>
