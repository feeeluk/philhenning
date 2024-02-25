<?php

  $users = array(
  	array("u" => "Dave", "p" => "password"),
  	array("u" => "Jane", "p" => "doe"),
  	array("u" => "Phil", "p" => "test")
  );

  if(isset($_POST['submit']))
  {
  	$username = $_POST['username'];
  	$password = $_POST['password'];

  	foreach($users as $user => $userdetails)
  	{	
  		if($userdetails['u'] === $username && $userdetails['p'] === $password)
  		{
				$_SESSION['username'] = $username;
  		}
  	}
  }

?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Exercise 5</title>
    <meta charset="utf-8" />
  </head>
<body>
  <form action="" method="post">
    <fieldset>
    	<label for="name-name">Your name</label>
    	<input id="username" name="username" type="text" />
    	<br />
    	<label for="password-password">Password</label>
    	<input id="password" name="password" type="text" />
    	<br />
    	<input type="submit" name="submit" id="submit" value="submit"/>
    </fieldset>
  </form>

  <?php

    if(isset($_POST['submit']))
    {
      if(isset($_SESSION['username']))
      {
        echo $_SESSION['username'];
      }

      else
      {
       echo "Login details not found";
      }
    }

  ?>

  <p>
    <a href="index.php">Back to list of exercises</a>
  </p> 
  
  </body>
</html>