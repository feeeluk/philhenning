<?php
	// set the root folder (site root not server root) in relation to this page
	$path = "../../";
	
	//connect to php_header
	include($path."assets/includes/php_header.php");

	//assign the form values to variables
	$usern = strip_tags(ucfirst(trim($_POST['username'])));
	$usern = mysqli_real_escape_string($connection, $usern);
	$passw = strip_tags($_POST['password']);
	$passw = mysqli_real_escape_string($connection, $passw);
    
    //store the sql query as a variable
	$query =  "SELECT username, password FROM wd_user WHERE username = '$usern' AND password = sha1('$passw')";

	// run the query
	$result = mysqli_query($connection, $query);                     

	//if $row is greater than 0, the username / password combination has been found, so login
    if (mysqli_num_rows($result) > 0)
        {
    		$_SESSION['web_development_username'] = $usern;
    		$_SESSION['web_development_message'] = "";
			header("location: ./my_profile.php");
    	}

    // if $row is 0 then the username / password wasn't found in the database, so do not login and instead return the user to the hompage with an error message
	else
		{
			$_SESSION['web_development_message'] = "Incorrect login details";
			header("location: ".$path."index.php");
		}			
?>