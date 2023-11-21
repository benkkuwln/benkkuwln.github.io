<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Arithmetic Operators in PHP</title>
</head>
<body>

<form method="post" action="">
    <input type="text" name="num" placeholder="Enter a number">
    <input type="text" name="mod" placeholder="Enter a modulus">
    <input type="submit" name="submit" value="Calculate">
</form>

<?php
if (isset($_POST['submit'])) {
    $num = $_POST['num'];
    $mod = $_POST['mod'];

    if (is_numeric($num) && is_numeric($mod)) {
        $result = $num % $mod;
        echo "Result: " . $result;
    } else {
        echo "Write a number brother";
    }
}
?>

</body>
</html>