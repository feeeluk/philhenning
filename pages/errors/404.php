<?php
    
    // SET PAGE SPECIFIC VARIABLES

    // set the root folder (site root not server root) in relation to this page
    $path = "../../";
    
    // every page can have a different title
    $subTitle = "404";

    // include - header
    include($path."assets/includes/header.php");                        
?>
                <!-- page content goes here &&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&& -->
                <article>
                    
                    <div class="home">
                        404
                    </div>

                </article>
                <!-- end of content &&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&& -->

<?php
    //footer include
    include($path."assets/includes/footer.php");
?>
