<!DOCTYPE html>
<html>
	<head>
		<title>Week 3 - Exercise 3</title>
		<meta charset="utf-8" />

		<style type="text/css">
		.true {
			color: blue;
		}

		.false {
			color: red;
		}
		</style>
	</head>
	
	<body>
		<h1>Pick a date...</h1>
		
		<form action="" method="get">
			<fieldset>
				<legend>Give me a date!</legend>

				<label for="day">Day</label>
				
				<select name="day">				
				<?php
					$day=1;
						
						for ($day; $day<=31; $day++)
						{
						echo "<option>". $day . "</option>";	
						}
					?>

				</select>
				
				<label for="month">Month</label>
				
				<select name="month">
					<?php
					$month = array(
						"January",
						"February",
						"March",
						"April",
						"May",
						"June",
						"July",
						"August",
						"September",
						"October",
						"November",
						"December"
						);
					foreach ($month as $value)	
						{
						echo "<option>". $value . "</option>";	
						}
					?>	
				</select>
				
				<label for="year">Year</label>
				
				<select name="year">
					<?php
					$year=date("Y");
						
						for ($limit = 1950; $year>=$limit; $year--)
						{
						echo "<option>". $year . "</option>";	
						}
					?>	
				</select>
				
				<input type="submit" name="submit" value="submit"/>
			
			</fieldset>
		</form>

		<?php

			if(isset($_GET['submit']))
			{

				// stops the annoying date issue that I haven't resolved on my testing server
				date_default_timezone_set('Europe/London');

				// capture the data from the form on this page - the submit sends the form to itself  
				$selected_day = $_GET['day'];
				$selected_month = $_GET['month'];
				$selected_year = $_GET['year'];

				// parse the results of the form so that they are in a date format recognised by the checkdate() function. The date_parse_from_fromat() function stores results in array (in this case we have saved the array as a variable)
				$date_array = date_parse_from_format("j.F.Y", $selected_day.".".$selected_month.".".$selected_year);				
			
				// build the checkdate() argument by refering to the associative array data contained within $date_array
				$result = checkdate($date_array["month"], $date_array["day"], $date_array["year"]);

					// checkdate() returns a value of 1 if the date is valid. Check if a value of 1 is returned?
					if($result == 1)
					{
						echo "<p class='true'>Congratulations, ".$selected_day." ".$selected_month.", ".$selected_year." is a valid date!</p>";
					}
						
					else
					{
						echo "<p class='false'>".$selected_day." ".$selected_month.", ".$selected_year." is an invalid date!</p>";
					}

			}

		?>

	</body>
</html>