<?php

echo "<h1>Databases - Task 3a</h1>
	<h3>Philip Henning - abpy140</h3>";

$hostname = "lamp.soi.city.ac.uk"; 
$username = "abpy140"; 
$password = "130044928"; 
$databaseName = "tflBikes";

// create a variable that stores the mysql_connection details, and connects to the database
$connection = mysqli_connect($hostname, $username, $password, $databaseName) or die ("Unable to connect".mysqli_connect_error());

$query = "SELECT round(average,1) AS Average, round((average / capacity) *100,1) AS Percentage, name, postCode
		FROM tflStations
		LEFT JOIN (SELECT stationId, AVG(availableBikes) AS average
			FROM tflBikeUsage
			WHERE (DATE_FORMAT(t, '%H') BETWEEN '16' AND '23')
			OR (DATE_FORMAT(t, '%H') BETWEEN '00' AND '00')
			GROUP BY stationID)
			AS a
		ON tflStations.ID = a.stationId
		WHERE easting BETWEEN
			(SELECT easting - 500 FROM tflStations
			WHERE name = 'Clerkenwell Green, Clerkenwell')
			AND
			(SELECT easting + 500 FROM tflStations
			WHERE name = 'Clerkenwell Green, Clerkenwell')
		AND northing BETWEEN
			(SELECT northing - 500 FROM tflStations
			WHERE name = 'Clerkenwell Green, Clerkenwell')
			AND
			(SELECT northing + 500 FROM tflStations
			WHERE name = 'Clerkenwell Green, Clerkenwell')
		ORDER BY Percentage DESC";
$result = mysqli_query($connection, $query);

?>

<table border="1">

	<tr>
		<td>
			Average number of bikes availabe at time of day
		</td>

		<td>
			Percentage of total capacity (&#37)
		</td>

		<td>
			Station Name
		</td>

		<td>
			Postcode
		</td>

	</tr>
<?php

	if(mysqli_num_rows($result) > 0)
	{
		while($row = mysqli_fetch_array($result, MYSQLI_ASSOC))
		{
		echo "<tr>
			<td>
				". $row['Average']."
			</td>

			<td>
				". $row['Percentage']."&#37
			</td>

			<td>
				". $row['name']."
			</td>

			<td>
				". $row['postCode']."
			</td>

		</tr>";
		}
	}
?>	

</table>