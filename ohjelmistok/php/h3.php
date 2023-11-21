<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Harjoitus 3</title>
</head>
<body>
	<form method="post" action="">
		<label for="alaraja">Alaraja:</label>
		<input type="number" id="alaraja" name="alaraja"><br>
		<label for="ylaraja">Yläraja:</label>
		<input type="number" id="ylaraja" name="ylaraja"><br><br>
		<input type="submit" value="Tulosta lukualue">
	</form>

	<?php
	if ($_SERVER["REQUEST_METHOD"] == "POST") {
		$alaraja = $_POST["alaraja"];
		$ylaraja = $_POST["ylaraja"];

		if ($alaraja > $ylaraja) {
			echo "Yläraja on oltava suurempi kuin alaraja.";
		} else {
			echo "Lukualueen kokonaisluvut:<br>";
			
			$rowLength = 10;
			$count = 0;

			for ($i = $alaraja; $i <= $ylaraja; $i++) {
				echo $i . " ";

				$count++;

				if ($count == $rowLength) {
					echo "<br>";
					$count = 0;
				}
			}
		}
	}
	?>
    
</body>
</html>