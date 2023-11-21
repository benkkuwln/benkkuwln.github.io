<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Foreach Loop 2</title>
</head>
<body>
    
<?php

$taulukko = array(1, 2, 3, 4, 5, 6, 7, 8, 9, 10);

foreach ($taulukko as $alkio) {
    echo $alkio . "
";
}

for ($i = count($taulukko) - 1; $i >= 0; $i--) {
    if ($taulukko[$i] % 2 == 0) {
        echo $taulukko[$i] . "
";
    }
}

?>

</body>
</html>