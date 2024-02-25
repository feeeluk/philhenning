<!DOCTYPE html>
<html>
<head>
<title>Week 3 - Show cookies</title>
<meta charset="utf-8" />
</head>
<body>
    <h1>$_COOKIE</h1>
<?php

echo "<p>".$_COOKIE['username']."</p>";
echo "<p>".$_COOKIE['colour']."</p>";

?>

<form method="POST" action="exercise_3_set_cookie.php">
	<input type="submit" name="unset" id="unset" value="unset cookie"></input>
</form>

<a href="exercise_3">set cookie</a>

</html>