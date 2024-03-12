<?php

require_once("../db_config.php");

$query = "SELECT * FROM movies";

$results = $db_connection->query($query);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>List of Movies</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.1.0/css/all.css">
</head>
<body>
    <div class="container">
        <h1 class="display-1 text-center">Movies</h1>
        <a href="create2.php" class="btn btn-info">Add new movie</a>
        <table class="table">
            <thead>
                <tr>
                    <th>TITLE</th>
                    <th>DIRECTOR</th>
                    <th>ACTORS</th>
                    <th>DURATION</th>
                    <th>TIME OF PURCHASE</th>
                    <th>QUALITY</th>
                </tr>
            </thead>
            <tbody>
                <?php
                foreach ($results as $result) {
                    ?>
                    <tr>
                        <td>
                            <?php echo $result["title"] ?>
                        </td>
                        <td>
                            <?php echo $result["director"] ?>
                        </td>
                        <td>
                            <?php echo $result["actors"] ?>
                        </td>
                        <td>
                            <?php echo $result["duration"] ?>
                        </td>
                        <td>
                            <?php echo $result["top"] ?>
                        </td>
                        <td>
                            <?php echo $result["quality"] ?>
                        </td>
                        <td><a href="edit.php?id=<?php echo $result["id"] ?>"><i class="fas fa-edit"></i></a></td>
                        <td><a href="delete.php?id=<?php echo $result["id"] ?>"><i class="fas fa-trash-alt"></i></a></td>
                    </tr>
                    <?php
                }
                ?>

            </tbody>
        </table>
    </div>
</body>

</html>