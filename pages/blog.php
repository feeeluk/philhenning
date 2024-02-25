<?php
    // SET PAGE SPECIFIC VARIABLES

    // set the root folder (site root not server root) in relation to this page
    $path = "../";       
            // ./ = this page is located in the root directory
            // ../ = this page is located one folder up
            // ../../ = this page is located two folders up, etc.
    
    // every page can have a different title
    $subTitle = "Blog";

    // include - connect to db
    include($path."assets/includes/db_connection.php");    

    // include - header
    include($path."assets/includes/header.php");                        
?>
                <!-- page content goes here &&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&& -->
                
                <article class="table_container"> 
                
                    <!-- HTML nested under 'article' on this indentation -->

                    <?php

                        // Declare & initialise some variables

                        // from include    
                        /* 
                        $connection
                        $hostname
                        $username
                        $password
                        $databaseName
                        */

                        // DEFAULT VALUES

                        $by = "post_time"; // same as the values found in the table philhenning_topics.name
                        $sort = "DESC"; // DESCending
                        $topic = "all"; // used to store the same as the values found in the table philhenning_topics.name
                        $imgSortDate ="<img src='".$site."assets/images/sort_down.png' height='10px' width='10px'/>";
                        $imgSortTopic = "";                   

                        // BY
                        if(isset($_GET['by']))
                        {
                            // update variables with corresponding $_GET values
                            $by = $_GET['by'];    
                        }

                        // SORT
                        if(isset($_GET['sort']))
                        {
                            // update variables with corresponding $_GET values
                            $sort = $_GET['sort'];

                            if($sort == "ASC")
                            {
                                $sort = "DESC";

                                if($by == "post_time")
                                {
                                    $imgSortDate = "<img src='".$site."assets/images/sort_down.png' height='9px'/>";
                                    $imgSortTopic ="";
                                }

                                else if($by == "name")
                                {
                                    $imgSortTopic ="<img src='".$site."assets/images/sort_down.png' height='9px'/>";
                                    $imgSortDate ="";
                                }
                            }

                            else if($sort == "DESC")
                            {
                                $sort = "ASC";

                                if($by == "post_time")
                                {
                                    $imgSortDate ="<img src='".$site."assets/images/sort_up.png' height='9px'/>";
                                    $imgSortTopic ="";
                                }

                                else if($by == "name")
                                {
                                    $imgSortTopic ="<img src='".$site."assets/images/sort_up.png' height='9px'/>";
                                    $imgSortDate ="";
                                }
                            }
                        }

                        // TOPIC
                        if(isset($_GET['select_Topic']))
                        {
                            // update variables with corresponding $_GET values
                            $topic = $_GET['select_Topic'];
                            $topic = urldecode($topic);
                        }

                        if($topic == "answered_questions")
                        {
                            $query_Posts = "SELECT philhenning_posts.post_time AS post_time, philhenning_posts.comment AS comment, philhenning_topics.name AS name
                                            FROM philhenning_posts
                                            JOIN philhenning_topics On philhenning_posts.topic_id=philhenning_topics.id
                                            WHERE philhenning_topics.name = 'Questions'
                                            AND
                                            philhenning_posts.comment LIKE '%answered%'
                                            ORDER BY $by $sort";
                        }

                        else if($topic == "unanswered_questions")
                        {
                            $query_Posts = "SELECT philhenning_posts.post_time AS post_time, philhenning_posts.comment AS comment, philhenning_topics.name AS name
                                            FROM philhenning_posts
                                            JOIN philhenning_topics On philhenning_posts.topic_id=philhenning_topics.id
                                            WHERE philhenning_topics.name = 'Questions'
                                            AND
                                            philhenning_posts.comment NOT LIKE '%answered%'
                                            ORDER BY $by $sort";
                        }

                        else if($topic == "all")
                        {
                            $query_Posts = "SELECT philhenning_posts.post_time, philhenning_posts.comment, philhenning_topics.name
                                            FROM philhenning_posts 
                                            INNER JOIN philhenning_topics ON philhenning_posts.topic_id=philhenning_topics.id
                                            ORDER BY $by $sort";
                        }
                        
                        else
                        {
                            $query_Posts = "SELECT philhenning_posts.post_time, philhenning_posts.comment, philhenning_topics.name
                                            FROM philhenning_posts 
                                            INNER JOIN philhenning_topics ON philhenning_posts.topic_id=philhenning_topics.id
                                            WHERE philhenning_topics.name='$topic' ORDER BY $by $sort"; 
                        }
                    ?>

                    <div class="right">
                        <form name="form_FilterByTopic" id="form_FilterByTopic" method="get" action="<?php echo $path; ?>pages/blog.php">
                            <?php
                                // this code creates the drop down menu of topics
                                /////////////////////////////////////////////////

                                echo "<input type='hidden' id='by' name='by' value=".$by.">";

                                $query_FilterByTopic = "SELECT DISTINCT name
                                                        FROM philhenning_topics
                                                        LEFT JOIN philhenning_posts ON philhenning_topics.id=philhenning_posts.topic_id
                                                        WHERE philhenning_posts.comment IS NOT NULL";

                                // store the result of the query as a variable
                                $result_FilterByTopic = mysqli_query($connection, $query_FilterByTopic);

                                //if $result_FilterByTopic is greater than 0 show results
                                if (mysqli_num_rows($result_FilterByTopic) > 0)
                                {
                                    echo "<select name='select_Topic' id='select_Topic' onchange='this.form.submit()'>";
                                    echo "<option value='' selected disabled hidden>Filter by topic</option>";
                                    echo "<option value='all'>All</option>";
                                    
                                    while ($row = $result_FilterByTopic->fetch_assoc())
                                    {
                                          $topicNameFromResults = $row['name'];
                                          $topicNameFromResultsEncoded = urlencode($topicNameFromResults);
                                          $isSelected ="";

                                          if($topicNameFromResults == $topic)
                                          {
                                            $isSelected = "selected";
                                          }

                                          echo '<option value="'.$topicNameFromResultsEncoded.'"'.$isSelected.'>'.$topicNameFromResults.'</option>';
                                    }

                                    echo "<option value='answered_questions'>Answered Questions</option>";
                                    echo "<option value='unanswered_questions'>Unanswered Questions</option>";
                                    echo "</select>";            
                                }
                            ?>
                        </form>
                    </div>

                    <table class="standard">

                        <!-- table header -->
                        <tr>
                            <th colspan="1" width="11%"><?php echo "<a href='".$path."pages/blog.php?by=post_time&sort=".$sort."&select_Topic=".urlencode($topic)."'>Date&nbsp".$imgSortDate; ?></th>
                            <th colspan="1" width="17%"><?php echo "<a href='".$path."pages/blog.php?by=name&sort=".$sort."&select_Topic=".urlencode($topic)."'>Topic&nbsp".$imgSortTopic; ?></th>
                            <th colspan="1" width="72%">Description</th>
                        </tr> 

                        <?php
                            
                            // this section of code pulls the comments out of the db and loads them into a table
                            ////////////////////////////////////////////////////////////////////////////////////                            
                            
                            // store the result of the query as a variable
                            $result = mysqli_query($connection, $query_Posts);

                            //if $row is greater than 0 show results
                            if (mysqli_num_rows($result) > 0)
                            {
                                while($row = mysqli_fetch_array($result, MYSQLI_ASSOC))
                                {           
                                    // Change 'post_time' from the full 
                                    $timeStamp = $row['post_time'];
                                    $timeStamp = date( "Y/m/d", strtotime($timeStamp));

                                    echo "<tr>
                                    <td>".$timeStamp."</td>
                                    <td>".$row['name']."</td>
                                    <td>".$row['comment']."</td>
                                    </tr>";
                                }
                            }                            
                        ?>

                    </table>

                        <?php
                            // NOT logged in
                            if(!isset($_SESSION['blog_username']))
                            {
                                // NOT logged in php actions here
                                
                                //Display session message if there is one
                                if(isset($_SESSION['message']))
                                {
                                    echo "<p>". $_SESSION['message']."</p>";
                                }

                                else
                                {
                                    echo "<p></p>";
                                }
                        ?>

                    <!-- NOT logged in HTML actions here -->
                    <a class="login" href="<?php echo $site ?>pages/login/login.php">log in here</a>

                        <?php

                            }

                            //logged in
                            else
                            {
                                // Logged in php actions here
                                $blog_username = $_SESSION['blog_username'];
                        ?>
                    
                    <!-- Logged in HTML actions here -->
                    
                    <table class="standard">
                        <form name="add_comment" id="" method="post" action="<?php echo $path; ?>pages/login/add_comment.php">    
                            <tr>
                                <th colspan="1" width="28%">Topic</th>
                                <th colspan="1" width="72%">Comment</th>
                            </tr>

                            <tr>    
                                <td class="">
                                    <input type="hidden" value="<?php echo $blog_username; ?>" name="username" id="username">
                                    
                                    <?php

                                        // this section of code fills out the drop down box with topic names from the db
                                        $result = $connection->query("SELECT id, name FROM philhenning_topics");
                                            
                                        echo "<select name='topic' id='topic'>";
                                        echo "<option value='' selected disabled hidden>choose a topic</option>";
                                        while ($row = $result->fetch_assoc()) {
                                          $id = $row['id'];
                                          $name = $row['name']; 
                                          echo '<option value="'.$id.'">'.$name.'</option>';
                                        }
                                        echo "</select>";
                                    ?> 
                                </td>

                                <td class="">
                                    <textarea rows="10" cols="70" name="comment" id="comment"></textarea>
                                </td>

                            </tr>

                            <tr>
                                <td></td>
                                <td>
                                    <input type="submit" value="post" name="submit" id="submit" />
                                </td>
                            </tr>

                        </form>

                    </table>

                    <a class="login" href="<?php echo $site ?>pages/login/logout.php">logout</a>
                    <br>
                    <br>
                    
                        <?php
                        
                            }
                        
                        ?>

                </article>
                <!-- end of content &&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&& -->

                <?php
                    //footer include
                    include($path."assets/includes/footer.php");
                ?>
