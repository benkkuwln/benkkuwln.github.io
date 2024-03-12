<?php

require_once('../db_config.php');

if (isset($_POST['updateRecord'])) {

    $id = filter_var($_POST["id"], FILTER_SANITIZE_NUMBER_INT);
    $title = filter_var($_POST["title"], FILTER_UNSAFE_RAW);
    $director = filter_var($_POST["director"], FILTER_UNSAFE_RAW);
    $actors = filter_var($_POST["actors"], FILTER_UNSAFE_RAW);
    $duration = filter_var($_POST["duration"], FILTER_SANITIZE_NUMBER_INT);
    $top = filter_var($_POST["top"], FILTER_SANITIZE_NUMBER_INT);
    $quality = filter_var($_POST["quality"], FILTER_SANITIZE_NUMBER_INT);
    $query = "UPDATE movies SET title=:title, director=:director, actors=:actors, duration=:duration, top=:top, quality=:quality
    WHERE id=:id";
    
    $result = $db_connection->prepare($query);
    $result->execute([
        'title' => $title,
        'director' => $director,
        'actors' => $actors,
        'duration' => $duration,
        'top' => $top,
        'quality' => $quality,
        'id' => $id,
    ]);
    $rows = $result->rowCount();
    if ($rows == 1) {
        header('Location: list-movies.php');
    } else {
        $error_message = "Updating record failed";
    }
}


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>
<body>
    
    <br>
    <div class="container">
        <?php
        if (isset($error_message)) {
            ?>
            <div class="alert alert-success">
                <strong>Error!</strong>
                <?php echo $error_message; ?>
        </div>
        <?php
        }
        ?>
    </div>

</body>
</html>