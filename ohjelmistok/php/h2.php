<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Harjoitus 2</title>
</head>
<body>
    <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
        Syötä luku: <input type="number" name="luku" /><br/><br/>
        <input type="submit" value="Näytä kertotaulu" />
    </form>
    
    <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $luku = $_POST["luku"];

            echo "<h2>Kertotaulu:</h2>";
            for ($i = 1; $i <= 10; $i++) {
                $tulos = $luku * $i;
                echo "$luku x $i = $tulos <br/>";
            }
        }
    ?>
    
</body>
</html>