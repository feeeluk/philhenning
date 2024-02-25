<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<link rel="stylesheet" href="general.css">
		<title>Week 2</title>
	</head>

	<body>	

		<h1>Week 2</h1>
		<h2>HTML and CSS again</h2>		

		<p>
			$_SERVER['DOCUMENT_ROOT']
		
			<?php echo $_SERVER['DOCUMENT_ROOT']; ?>
			<br />
			<?php echo "<a href='".$_SERVER['DOCUMENT_ROOT']."/index.html'>home<a/>"; ?>
		</p>

		<p>
			$_SERVER['HTTP_HOST']
		
			<?php echo $_SERVER['HTTP_HOST']; ?>
			<br />
			<?php echo "<a href='https://".$_SERVER['HTTP_HOST']."/~abpy140/web_development/tutorials/'>home</a>"; ?>
		</p>

		<p>
			$_SERVER['SERVER_NAME']
		
			<?php echo $_SERVER['SERVER_NAME']; ?>
			<br />
			<?php echo "<a href='https://".$_SERVER['SERVER_NAME']."/~abpy140/web_development/tutorials/'>home</a>"; ?>
		</p>		

		<p>
			$_SERVER['php_self']
				
			<?php echo $_SERVER['php_self']; ?>
		</p>

		<p>
			getcwd()
		
			<?php echo getcwd(); ?> 
		</p>
		<header>Test</header>

		<form class="blueform">
			<fieldset>
			<legend>Log in</legend>

			<div class="input-container">
			<label for="username">Username</label>
			<input id="username" name="username" type="text"/>
			</div>

			<div class="input-container">
			<label for="password">Password</label>
			<input id="password" name="password" type="password" class="redinput"/>
			</div>

			<input id="submit" name="submit" type="submit" value="Submit" />
			</fieldset>
		</form>

	</body>
</html>