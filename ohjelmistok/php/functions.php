<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Internal Functions in PHP</title>
</head>
<body>

<form method="post">
    <input type="text" name="user">
    <button>SUBMIT</button>
</form>

<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $user = $_POST["user"];
    $characterCount = strlen($user);
    echo $characterCount;
}
?>

</body>
</html>