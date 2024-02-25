<!DOCTYPE html>
<html>
  <head>
    <title>Week 4 - Exercise 1c</title>
  </head>
  <body>
    <h1>Playing with arrays again</h1>

    <h3>Regular array</h3>

      <?php

        // set up a basic array
        $pocket = array(
          "brown leather",
          "twenty pence",
          "cheap biro"
          );

        // use the print_r() funciton to see the contents of the array
        echo "<pre>";
        print_r($pocket);
        echo "</pre>";

        // manually reference an item within the array
        echo "Directly access array: \" \$pocket[0]\" ";
        echo "<li>".$pocket[0]."</li>";

        // use a foreach loop to display every item within the array
        echo "<p>";
        foreach($pocket as $item)
        {
          echo "<li>".$item."</li>";
        }
        echo "</p>";
      ?>

    <h3>Associative array</h3>

      <?php
        // set up an associative array
        $pocket_advanced = array(
          "wallet" => "brown leather",
          "coins" => "twenty pence",
          "pen" => "cheap biro"
          );

        // use the print_r() funciton to see the contents of the array
        echo "<pre>";
        print_r($pocket_advanced);
        echo "</pre>";

        // manually reference an item within the array
        echo "Directly access array: \" \$pocket_advanced['wallet']\" ";
        echo "<li>".$pocket_advanced['wallet']."</li>";

        // use a foreach loop to display every item within the array
        echo "<p>";
        foreach($pocket_advanced as $pocket_item => $value)
        {
          echo "<li>".$pocket_item.": ".$value."</li>";
        }
            echo "</p>";            
      ?>

    <h3>Multi-diminesional array</h3>

      <?php
        // set up a multidimensional array
        $pocket_multi = array(
          "wallet" => array(
            "material" => "brown leather",
            "type" => "money clip with card holder"
            
            ),
          "money" => array(
            "coins" => "twenty pence",
            "notes" => "twenty pounds"
            ),
          "other" => array(
            "pen" => "cheap biro",
            "chewing gum" => "spearmint flavor"
            ),
          );

        // use the print_r() funciton to see the contents of the array
        echo "Using 'print_r'<pre>";
        print_r($pocket_multi);
        echo "</pre>";

        // manually reference an item within the array
        echo "Directly access array: \" \$pocket_multi['wallet']['material']\" <br />";
        echo "<li>".$pocket_multi['wallet']['material']."</li>";

        // use a foreach loop to display every item within the array
        echo "<p>";
        foreach($pocket_multi as $pocket_item => $item_type)
        {
          echo $pocket_item."<ul>";
          foreach($item_type as $item => $value)
          {
            echo "<li>".$item.": ".$value."</li>";
          }
          echo "</ul>";
        }
        echo "</p>";

      ?>

    <p>
      <a href="index.php">Back to list of exercises</a>
    </p>
     
  </body>
</html>