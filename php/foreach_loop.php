<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Foreach Loops in PHP</title>
</head>
<body>
    
<?php
//Foreach Loop
$array = array("January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December");

foreach ($array as $loopdata) {
    echo $loopdata."<br>";
}

?>

</body>
</html>