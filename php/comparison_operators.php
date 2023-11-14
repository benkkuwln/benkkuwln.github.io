<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Comparison Operators</title>
</head>
<body>
<form method="post" action="<?php echo $_SERVER['PHP_SELF'];?>">Syötä luku: <input type="text" name="luku">
<input type="submit" value="Tarkista">
</form>
<!--
<?php

//$x = 5;
//$y = 10;

//if($x > $y) {
//    echo "True!";
//}
//else {
//    echo "False!";
//}

?>
-->
<!--
<?php

// Tehtävä 1
//$x = 5;
//$y = 10;

//if($x > $y) {
//    echo "Luku oli suurempi";
//}
//else {
//    echo "Luku oli pienempi";
//}

?>
//Tehtävä 2
-->

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $luku = intval($_POST["luku"]);

  if ($luku == 5) {
    echo "Luku on 5";
  } elseif ($luku < 5) {
    echo "Luku on pienempi kuin 5";
  } else {
    echo "Luku on suurempi kuin 5";
  }
}
?>


</body>
</html>