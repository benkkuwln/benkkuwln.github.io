<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Own Function in PHP</title>
</head>
<body>
    
<?php

function laskALV($rahasumma) {
    $alvProsentti = 0.24;
    $laskettuSumma = $rahasumma * $alvProsentti;
    
    echo "Summa ALV:n kanssa: " . $laskettuSumma;
  }
  
  //esim summa
  laskALV(100)
  
?>

</body>
</html>