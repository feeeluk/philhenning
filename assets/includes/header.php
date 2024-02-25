<?php

    // include - site details
    include($path."assets/includes/site_details.php"); 

?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="author" content="Philip Henning">
        <meta name="description" content="Philip Henning wannabe junior developer">     
        <meta name="keywords" content="programming, learning to program, junior developoer, software, software development, junior software developer">
             
            <title><?php echo $siteTitle; ?> | <?php echo $subTitle; ?></title>

        <link rel="stylesheet" type="text/css" href="<?php echo $path; ?>assets/css/general.css" >
        <link rel="icon" type="image/x-icon" href="<?php echo $path; ?>assets/images/favicon.png">

    </head>

    <body>

        <div class="container">
            
            <!-- logo -->
            <header class="logo">
                <img alt="logo" src="<?php echo $path; ?>assets/images/logo.png" />
            </header>

            <!-- navigation -->
            <nav class="navigation">
                <a href="<?php echo $site; ?>">Home</a>
                &nbsp/&nbsp

                <a href="<?php echo $site; ?>/assets/documents/Developer CV - version 2 - 2024.01.pdf" target="blank">CV</a>
                &nbsp/&nbsp

                <a href="<?php echo $site; ?>pages/blog.php">Blog</a>
                &nbsp/&nbsp

                <a href="<?php echo $site; ?>pages/projects.php">Projects</a>
                &nbsp/&nbsp

                <a href="https://github.com/feeeluk" target="_blank">GIT</a>
                &nbsp/&nbsp

                <a href="https://1drv.ms/o/s!Ag9ZukAL9sZOog6eqf_5CXVrdJhz?e=QhPtT8" target="_blank">Notes</a>
                &nbsp/&nbsp                
                
                <a href="https://trello.com/invite/b/zOxhDZ5X/ATTI97c5c7803294bddb4c108eec0778f299ED97D35C/philhenningcouk" target="_blank">Backlog</a>
                &nbsp/&nbsp

                <a href="https://miro.com/app/board/uXjVN3VQIhM=/?share_link_id=621933742306" target="_blank">Ideas</a>
                &nbsp/&nbsp

                <a href="https://phillearnstodev.slack.com" target="_blank">Slack</a>
                                
            </nav>

            <!-- main page -->
            <section>

