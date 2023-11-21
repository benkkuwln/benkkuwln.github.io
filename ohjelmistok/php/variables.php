<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Variables</title>
</head>
<body>

<form method="GET">
    <input type="number" name="number">
    <button>SUBMIT</button>
</form>

<?php
    $number = $_GET['number'];
    echo $number + rand (1, 10);
?>

</body>
</html>