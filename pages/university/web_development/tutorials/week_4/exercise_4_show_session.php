<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
<title>Week 4 - Show session</title>
<meta charset="utf-8" />
</head>
<body>
    <h1>$_SESSION</h1>
<?php

echo "<p>".$_SESSION['username']."</p>";
echo "<p>".$_SESSION['colour']."</p>";

?>

<form method="POST" action="exercise_4_set_session.php">
	<input type="submit" name="unset" id="unset" value="unset session"></input>
</form>

<a href="exercise_4">set session</a>

</html>