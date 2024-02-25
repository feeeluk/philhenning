<?php
    session_start();

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

    // unset the sessions
    unset($_SESSION['blog_username']);
    unset($_SESSION['message']);
    
    // redirect back to the hompage
    header("location: ".$path."pages/blog.php");

?>
