<?php
    // SET PAGE SPECIFIC VARIABLES

    // set the root folder (site root not server root) in relation to this page
    $path = "../../";       
            // ./ = this page is located in the root directory
            // ../ = this page is located one folder up
            // ../../ = this page is located two folders up, etc.
    

    // include - site details
    include($path."assets/includes/site_details.php");

    // include - connect to db
    include($path."assets/includes/db_connection.php");    

	//assign the form values to variables
	$username = mysqli_real_escape_string($connection, strip_tags($_POST['username']));
	$time = date("Y-m-d H:i:s");
	$topic = mysqli_real_escape_string($connection, strip_tags($_POST['topic']));
	$comment = mysqli_real_escape_string($connection, strip_tags(trim($_POST['comment'])));
	 
    //store the sql query as a variable
	$query =  "INSERT INTO philhenning_posts (username, post_time, topic_id, comment)
				VALUES 
				('$username', '$time','$topic', '$comment')";

	// run the query - if successful - go back to same page
    if (mysqli_query($connection, $query))
    {
		header("location: ".$path."pages/blog.php");
	}

	else
	{
		echo "There was an error submitting this comment<br />";
	}			
?>