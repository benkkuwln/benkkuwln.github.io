<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>formhandler</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</head>
<body>
    
</body>
</html>

<?php

include "product.php";

if(isset($_POST["hinta"]))
    //header("Location: product.php");

    $tuote1 = new Product($_POST["nimi"], $_POST["valmistaja"], $_POST["hinta"], $_POST["kuvaus"]);
    
?>

<h1>Tuotteen tiedot:</h1>

<table>
    <tr>
        <td class="border border-dark">Tuotteen nimi</td>
        <td class="border border-dark"><?php echo $tuote1->get_nimi();?></td>
    </tr>
    <tr>
        <td class="border border-dark">Tuotteen valmistaja</td>
        <td class="border border-dark"><?php echo $tuote1->get_valmistaja();?></td>
    </tr>
    <tr>
        <td class="border border-dark">Tuotteen hinta (alv 0%)</td>
        <td class="border border-dark"><?php echo $tuote1->get_hinta();?></td>
    </tr>
    <tr>
        <td class="border border-dark">Tuotteen verollinen hinta</td>
        <td class="border border-dark"><?php echo $tuote1->get_alvhinta(24);?></td>
    </tr>
    <tr>
        <td class="border border-dark">Tuotteen kuvaus</td>
        <td class="border border-dark"><?php echo $tuote1->get_kuvaus();?></td>
    </tr>