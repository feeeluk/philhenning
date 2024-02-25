<?php
    // set up a multidimensional array
    $pocket_multi = array(
      "wallet" => array(
        "material" => "brown leather",
        "type" => "money clip with card holder"
        
        ),
      "money" => array(
        "coins" => "twenty pence",
        "notes" => "twenty pounds"
        ),
      "other" => array(
        "pen" => "cheap biro",
        "chewing gum" => "spearmint flavor"
        ),
      );
?>


<!DOCTYPE html>
<html>
	<head>
		<title>Practice 1 - Sending variables to a form</title>
		<meta charset="utf-8" />
	</head>
	<body>

		<form action="" method="post">
			<fieldset>
				<select name="selected" id="selected">
				<?php
					foreach($pocket_multi as $option_selected => $option_sected_value)
					{
						echo "<option value='".$option_selected."''>".$option_selected."</option>";
					}
				?>
				</select>
				<br />
				<input type="submit" name="submit" id="submit" value="submit"/>
			</fieldset>
		</form>

		<?php

			if(isset($_POST['submit']))
			{
				$selected = $_POST['selected'];
				echo "form has been submitted";
		?>

		<form action="" method="post">
			<fieldset>
				<?php
					foreach($pocket_multi[$selected] as $item_type => $value)
					{
						echo "<label>".$item_type."</label>";
						echo "<input name='".$item_type."' value='".$value."'></input><br />";
					}
				?>
				<input type="submit" name="amend" id="amend" value="amend"/>
			</fieldset>
		</form>

		<?php
	
			}

		?>
	
	<p>
      <a href="index.php">Back to list of exercises</a>
    </p>

</body>
</html>