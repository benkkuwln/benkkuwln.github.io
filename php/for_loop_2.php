<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>For Loop 2</title>
</head>
<body>
<?php

$tableSize = 10;

echo "<table>";

for ($i = 1; $i <= $tableSize; $i++) {
    echo "<tr>";
    for ($j = 1; $j <= $tableSize; $j++) {
        $result = $i * $j;

        if ($i === 1 || $j === 1) {
            echo "<th>$result</th>";
        } else {
            echo "<td>$result</td>";
        }
    }
    echo "</tr>";
}
echo "</table>";

?>
</body>
</html>