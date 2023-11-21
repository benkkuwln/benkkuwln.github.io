<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Timed messages in PHP</title>
</head>
<body>
<?php

$currentDate = new DateTime();
$christmasDay = new DateTime(date('Y') . '-12-24');

$interval = $currentDate->diff($christmasDay);
$daysUntilChristmas = $interval->format('%a');

echo $daysUntilChristmas . " days until Christmas!";

?>
</body>
</html>