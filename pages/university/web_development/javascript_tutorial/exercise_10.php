

<!DOCTYPE html>
<html lang="en">
		<title>Exercise 10 - Image swap stop/start</title>
	
		<style type="text/css">
			#slider_container {width:500px; text-align:center; position:relative; border: solid; border-width:10px; border-color: #f90; border-radius: 10px;}
			#slider_top {width:500px; position: relative;}
			#slider_bottom {position:absolute; bottom:0px; left:0px; background:rgba(255, 153, 0, 0.4); width:500px; height:25px; padding-top:10px; padding-bottom: 5px;}
			#slider_imageNumber {position: absolute; top:240px; left:450px; font-size: 25px; color: #fff; font-family: impact;}
			.slider_nav {visibility: hidden;}
			#slider_container:hover > .slider_nav {visibility: visible;}
			#slider_top img {display: block; width:500px; height:300px;}
			#slider_bottom img{width: 20px; height: 20px;}


		</style>

		<script type="text/javascript">
	


			//variable that will increment through the images
			var step=0;
			var slidenow;

			var image = new Array();
			image [0] = "snowboard_1.jpg";
			image [1] = "snowboard_2.jpg";
			image [2] = "snowboard_3.jpg";
			image [3] = "snowboard_4.jpg";

			function slide()
				{
					if (step<eval(image.length-1))
						{
							step++;
						}
					
					else
						{
							step=0;
						}
					document.images.slide.src=image[step];
					document.getElementById("slider_imageNumber").innerHTML = eval(step +1) + " / " + eval(image.length);			
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
					
					if (step>0)
						{
							step--;
						}
					
					else
						{
							step=eval(image.length-1);
						}
					document.getElementById("slider_imageNumber").innerHTML = eval(step +1) + " / " + eval(image.length);
					document.images.slide.src=image[step];;
					setTimeout("start()", 4000);
				}

			function forward()
				{
					clearInterval(slidenow);
					
					if (step<eval(image.length-1))
						{
							step++;
						}
					
					else
						{
							step=0;
						}
					document.getElementById("slider_imageNumber").innerHTML = eval(step +1) + " / " + eval(image.length);
					document.images.slide.src=image[step];;
					setTimeout("start()", 4000);
				}

		</script>

	</head>

	<body onload="start()">

		<h1>Exercise 10 - Image swap using array</h1>

		<div id="slider_container" >

			<div id="slider_top">
				<img src="snowboard_1.jpg" name="slide" />
				<p id="slider_imageNumber"></p>
			</div>

			<div class="slider_nav" id="slider_bottom" >

				<a href="#non"><img src="back.png" onclick="back()" /></a>
				<a href="#non"><img src="pause.png" onclick="stop()"></a>
				<a href="#non"><img src="play.png"onclick="start()"></a>
				<a href="#non"><img src="forward.png" onclick="forward()"></a>
				
			</div>

		</div>

		<script type="text/javascript">
		<!--
		document.getElementById("slider_imageNumber").innerHTML = eval(step +1) + " / " + eval(image.length);
		//-->
		</script>
		

		<br />
		<a href="index.php">back to tutorial contents</a>

	</body>
</html>