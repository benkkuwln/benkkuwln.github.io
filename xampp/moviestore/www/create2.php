<?php
require_once("../db_config.php");

if (isset($_POST["createRecord"])) {

    $title = filter_var($_POST["title"], FILTER_UNSAFE_RAW);
    $director = filter_var($_POST["director"], FILTER_UNSAFE_RAW);
    $actors = filter_var($_POST["actors"], FILTER_UNSAFE_RAW);
    $duration = filter_var($_POST["duration"], FILTER_SANITIZE_NUMBER_INT);
    $top = filter_var($_POST["top"], FILTER_SANITIZE_NUMBER_INT);
    $quality = filter_var($_POST["quality"], FILTER_SANITIZE_NUMBER_INT);
    $query = "INSERT INTO movies (title, director, actors, duration, top, quality)
                    VALUES (:title, :director, :actors, :duration, :top, :quality)";
    $result = $db_connection->prepare($query);
    $result->execute([
        "title" => $title,
        "director" => $director,
        "actors" => $actors,
        "duration" => $duration,
        "top" => $top,
        "quality" => $quality,
    ]);
    $rows = $result->rowcount();
    if ($rows == 1) {
        header("Location: list-movies.php");
    } else {
        $error_message = "Record creation failed";
    }
}


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create a Record</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>
<body>
    
    <br>
    <div class="container">
        <form method="post" action="">
            <div class="form-group row">
                <label for="title" class="col-sm-2 col-form-label">Title</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="title" name="title">
            </div>
            <div class="form-group row">
                <label for="director" class="col-sm-2 col-form-label">Director</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="director" name="director">
            </div>
            <div class="form-group row">
                <label for="actors" class="col-sm-2 col-form-label">Actors</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="actors" name="actors">
            </div>
            <div class="form-group row">
                <label for="duration" class="col-sm-2 col-form-label">Duration</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="duration" name="duration">
            </div>
            <div class="form-group row">
                <label for="top" class="col-sm-2 col-form-label">Time of Purchase</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="top" name="top">
            </div>
            <div class="form-group row">
                <label for="quality" class="col-sm-2 col-form-label">Quality</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="quality" name="quality">
            </div>
        </div>

        <button type="submit" name="createRecord" class="btn btn-success">Add Record</button>

        </form>
    </div>
                
</body>
</html>