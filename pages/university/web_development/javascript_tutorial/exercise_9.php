<!DOCTYPE html>
<html lang="en">
		<title>Exercise 9 - Image swap stop/start</title>
	
		<style type="text/css">
			#container {width:500px; text-align:center; position:relative;}
			#left {position:absolute; top:0; left:0; background:rgba(0, 0, 50, 0.25); width:50px; height:300px;}
			#middle {width:500px;}
			#right {position:absolute; top:0; left:450px; background:rgba(0, 0, 50, 0.25); width:50px; height:300px;}
			.nav {visibility: hidden;}
			.middle {margin-top:140px;}
			.middle p {cursor:pointer; color:white; font-style:bold; font-size:40px;}
			#container:hover > .nav {visibility: visible;}

		</style>

		<script type="text/javascript">
	
			var image1=new Image()
			image1.src="firstcar.gif"
			var image2=new Image()
			image2.src="secondcar.gif"
			var image3=new Image()
			image3.src="thirdcar.gif"


			//variable that will increment through the images
			var step=1;
			var slidenow;

			function slide()
				{
					if (step<3)
						{
							step++;
						}
					
					else
						{
							step=1;
						}
					document.images.slide.src=eval("image"+step+".src");
					document.getElementById("imageNumber").innerHTML = step;			
				}

			function start()
				{
					clearInterval(slidenow);
					slidenow = setInterval(function(){slide()}, 2000);
				}

			function stop()
				{
					clearInterval(slidenow);
				}

			function back()
				{	
					clearInterval(slidenow);
					
					if (step>1)
						{
							step--;
						}
					
					else
						{
							step=3;
						}
					document.getElementById("imageNumber").innerHTML = step;
					document.images.slide.src=eval("image"+step+".src");
					setTimeout("start()", 4000);
				}

			function forward()
				{
					clearInterval(slidenow);
					
					if (step<3)
						{
							step++;
						}
					
					else
						{
							step=1;
						}
					document.getElementById("imageNumber").innerHTML = step;
					document.images.slide.src=eval("image"+step+".src");
					setTimeout("start()", 4000);
				}

		</script>

	</head>

	<body onload="start()">

		<h1>Exercise 9 - Image swap stop/start</h1>

		<div id="container" >
			<div class="nav" id="left" >
				<div class="middle">
					<p onclick="back()"><</p>
				</div>
			</div>

			<div id="middle">
				<img src="firstcar.gif" name="slide" width="500" height="300" />
			</div>

			<div class="nav" id="right" >
				<div class="middle">
					<p onclick="forward()">></p>
				</div>
			</div>

		</div>

		<p id="imageNumber"></p>

		<script type="text/javascript">
		<!--
		document.getElementById("imageNumber").innerHTML = step;
		//-->
		</script>
		<button onclick="stop()">Stop</button>
		<button onclick="start()">Start</button>

		<br />
		<a href="index.php">back to tutorial contents</a>		

	</body>
</html>