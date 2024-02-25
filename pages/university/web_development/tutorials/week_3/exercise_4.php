<!DOCTYPE html>
<html>
  <head>
    <title>Week 3 - Exercise 4</title>
  </head>
  <body>
    <h1>Playing with arrays</h1>
    <?php

      $planets = array(
          "Mercury",
          "Venus",
          "Earth",
          "Mars",
          "Jupiter",
          "Saturn",
          "Uranus",
          "Neptune"
          );

      foreach($planets as $list)
      {
        echo "$list<br />";
      }

?>
<h3>Regular array</h3>

<?php

      $pocket = array(
        "brown leather",
        "twenty pence",
        "cheap biro"
        );

        echo "<pre>";
        print_r($pocket);
        echo "</pre>";
?>
<h3>Associative array</h3>
<?php
      $pocket_advanced = array(
        "wallet" => "brown leather",
        "coins" => "twenty pence",
        "pen" => "cheap biro"
        );

        echo "<pre>";
        print_r($pocket_advanced);
        echo "</p>";

    ?>
  </body>
</html>