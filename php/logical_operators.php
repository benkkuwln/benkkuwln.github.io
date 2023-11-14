<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Logical Operators</title>
</head>
<body>

	<form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
		<input type="text" name="luku1" placeholder="Luku 1"><br><br>
		<input type="text" name="luku2" placeholder="Luku 2"><br><br>
		<input type="submit" value="Tarkista">
	</form>

	<?php
	if ($_SERVER["REQUEST_METHOD"] == "POST") {
		$luku1 = $_POST["luku1"];
		$luku2 = $_POST["luku2"];

		if ($luku1 % 2 == 0 && $luku2 % 2 == 0) {
			echo "Luvut ovat parillisia";
		} else {
			echo "Luvut eivät ole parillisia";
		}
	}
	?>

</body>
</html>