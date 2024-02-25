<?php
    // SET PAGE SPECIFIC VARIABLES

        // set the root folder (site root not server root) in relation to this page
        $path = "../../";       
            // ./ = this page is located in the root directory
            // ../ = this page is located one folder up
            // ../../ = this page is located two folders up, etc.
    
        // every page can have a different title
        $subTitle = "Login";

    // include - site details
    include($path."assets/includes/site_details.php");

    // include - connect to db
    include($path."assets/includes/db_connection.php");    

    // include - header
    include($path."assets/includes/header.php");                        
?>
                <!-- page content goes here &&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&& -->
                <article class="login_table_container">
                
                <table class="standard login">                       
                    <form name="login" id="login" method="post" action="<?php echo $path; ?>pages/login/set_session.php">
                        <tr>
                            <td>Username:</td>
                            <td><input type="text" name="username" id="username" /></td>
                        </tr>

                        <tr>
                            <td>Password:</td>
                            <td><input type="password" name="password" id="password" /></td>
                        </tr>

                        <tr>
                            <td></td>
                            <td><input type="submit" value="login" name="submit" id="submit" /></td>
                        </tr>
                    </form>
                </table>
                                       
                </article>
                <!-- end of content &&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&& -->

<?php
    //footer include
    include($path."assets/includes/footer.php");
?>
