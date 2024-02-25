<!DOCTYPE html>
<html lang="en">
	<head>
		<title>Exercise 8 - Seconds stop / start</title>
	</head>
	<body onload="start()">

		<h1>Exercise 8 - Seconds stop / start</h1>

		<p id="time"></p>

		<script type="text/javascript">

			//Variables need to be declared outside the function count() in order for the initial value to load
			var date = new Date();
			var sec = date.getSeconds();
			var timer;

			//without this line, the page would initially load without the time, and would only display it 1 second after the page loaded. This line stops this.
			document.getElementById("time").innerHTML = sec;

			function count()
				{
					var date = new Date();
					var sec = date.getSeconds();
					document.getElementById("time").innerHTML = sec;
				}

			function start()
				{
					timer = setInterval(function(){count()}, 1000);	
				}

			function stop()
				{
					clearInterval(timer);
				}
			
			</script>

		<button onclick="stop()">Stop</button>
		<button onclick="start()">Start</button>

		<br />
		<a href="index.php">back to tutorial contents</a>

	</body>

</html>