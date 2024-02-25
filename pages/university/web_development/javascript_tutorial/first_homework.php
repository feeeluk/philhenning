<!DOCTYPE html>
<html lang=en>
	<head>
		<title>First homework</title>
		<script>
		var change;
		var image_1 = 'firstcar.gif';
		var image_2 = 'secondcar.gif';
		</script>
	</head>
	<body>
	<h1>First homework</h1>
	<img src="firstcar.gif" name="selected_car_image" />
	<br />

	<!-- the onmouseover call changes all of the values of the images each time it is called, and then sets the image to display as the same variable nambe each time, which is why a different picture shows each time it is called. It is a REALLY crude loop!-->
	<a href="#" onmouseover="change=image_1; image_1=image_2; image_2=change; document.car_image.src=image_1;" onclick="document.selected_car_image.src=image_1;">Mouse over</a>
	<br />
	<img name="car_image" />
	</body>
</html>

