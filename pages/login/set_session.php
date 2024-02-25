<?php
    // SET PAGE SPECIFIC VARIABLES

        // set the root folder (site root not server root) in relation to this page
        $path = "../../";       
            // ./ = this page is located in the root directory
            // ../ = this page is located one folder up
            // ../../ = this page is located two folders up, etc.
    
        // every page can have a different title
        $page_title = "Home";

    // include - site details
    include($path."assets/includes/site_details.php");

    // include - connect to db
    include($path."assets/includes/db_connection.php");    

	//assign the form values to variables
	$username = strip_tags(ucfirst(trim($_POST['username'])));
	$username = mysqli_real_escape_string($connection, $username);
	$password = strip_tags($_POST['password']);
	$password = mysqli_real_escape_string($connection, $password);
    
    //store the sql query as a variable
	$query =  "SELECT userName, passWord FROM philhenning_users WHERE userName = '$username' AND passWord = '$password'";

	// run the query
	$result = mysqli_query($connection, $query);                     

	//if $row is greater than 0, the username / password combination has been found, so login
    if (mysqli_num_rows($result) > 0)
        {
    		$_SESSION['blog_username'] = $username;
    		$_SESSION['message'] = $username;
			header("location: ".$path."pages/blog.php");
    	}

    // if $row is 0 then the username / password wasn't found in the database, so do not login and instead return the user to the hompage with an error message
	else
		{
			$_SESSION['message'] = "Incorrect login details";
			header("location: ".$path."pages/blog.php");
		}			
?>