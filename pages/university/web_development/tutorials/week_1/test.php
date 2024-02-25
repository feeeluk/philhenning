<?php

	echo 'Hello World';
	
?>

<?php
    $db = new mysqli('localhost','root','ccyh68','portal');
    if ($db->connect_errno) {
      printf("Connect failed: %s\n", $db->connect_error);
      exit();
    } else {
      echo "DB connected!";
    }
?>