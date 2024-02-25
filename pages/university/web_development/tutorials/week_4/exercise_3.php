<!doctype html>
<html>
  <head>
    <title>PHP Cookies</title>
  </head>
  <body>

    <h1>$_COOKIE</h1>

    <form method="post" action="exercise_3_set_cookie.php">
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

      if(isset($_COOKIE['username']) AND isset($_COOKIE['colour']))
        {
          echo "Userame: ".$_COOKIE['username']."<br />Colour: ".$_COOKIE['colour'];
        }
    ?>
    <p>
      <a href="index.php">Back to list of exercises</a>
    </p>
    
  </body>
</html>