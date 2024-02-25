<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Week 3 - Exercise 1</title>
  </head>
  <body>
    <h1>What day is it today?</h1>
    <p>
    <?php
      ini_set('date.timezone', 'Europe/London');
      echo date("l");
    ?>
    </p>
  </body>
</html>