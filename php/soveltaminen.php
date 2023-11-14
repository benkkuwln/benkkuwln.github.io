<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Soveltaminen</title>
</head>
<body>
    
<h2>Onko vuosiluku karkausvuosi</h2>

<form method="POST">
  Vuosiluku: <input type="text" name="year">
  <input type="submit" value="Tarkista">
</form>

<?php
//Tulee error, mutta toimii
$year = $_POST['year'];
if(($year % 4 == 0) && ($year % 100 != 0) || ($year % 400 == 0)){
    echo $year . " on karkausvuosi";
} else {
    echo $year . " ei ole karkausvuosi";
}
?>
</body>
</html>