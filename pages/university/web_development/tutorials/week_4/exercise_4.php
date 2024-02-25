<?php
session_start();
?>

<!doctype html>
<html>
  <head>
    <title>PHP Sessions</title>
  </head>
  <body>

    <h1>$_SESSION</h1>

    <form method="post" action="exercise_4_set_session.php">
      <label for="name">
        What is your name?
         <input type="text" name="name" id="name">
       </label>
       <label for="colour">
        What is your favourite colour?
         <input type="text" name="colour" id="colour">
       </label>
       <button type="submit">GO</button>
    </form>


    <?php
      if(isset($_SESSION['username']) AND isset($_SESSION['colour']))
      {
        echo "Username: ".$_SESSION['username']."<br />Colour: ".$_SESSION['colour'];
      }
    ?>

    <p>
      <a href="index.php">Back to list of exercises</a>
    </p>
    
  </body>
</html>