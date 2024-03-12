<?php

require_once('../db_config.php');
$id = $_GET['id'];
$query = "SELECT * FROM movies WHERE id = :id LIMIT 1";
$result = $db_connection->prepare($query);
$result->execute([
    'id' => $id
]);
$result = $result->fetch();


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Edit a Record</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>
<body>
    
    <br>
    <div class="container">
        <form method="post" action="update.php">
            <div class="form-group row">
                <label for="id" class="col-sm-2 col-form-label">ID</label>
                <div class="col-sm-10">
                    <input type="number" readonly class="form-control" id="id" name="id" value="<?php echo $result['id'] ?>">
                </div>
            </div>
            <div class="form-group row">
                <label for="title" class="col-sm-2 col-form-label">Title</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="title" name="title" value="<?php echo $result['title'] ?>">
                </div>
            </div>
            <div class="form-group row">
                <label for="director" class="col-sm-2 col-form-label">Director</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="director" name="director" value="<?php echo $result['director'] ?>">
                </div>
            </div>
            <div class="form-group row">
                <label for="actors" class="col-sm-2 col-form-label">Actors</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="actors" name="actors" value="<?php echo $result['actors'] ?>">
                </div>
            </div>
            <div class="form-group row">
                <label for="duration" class="col-sm-2 col-form-label">Duration</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="duration" name="duration" value="<?php echo $result['duration'] ?>">
                </div>
            </div>
            <div class="form-group row">
                <label for="top" class="col-sm-2 col-form-label">Time of Purchase</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="top" name="top" value="<?php echo $result['top'] ?>">
                </div>
            </div>
            <div class="form-group row">
                <label for="quality" class="col-sm-2 col-form-label">Quality</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="quality" name="quality" value="<?php echo $result['quality'] ?>">
                </div>
            </div>
    </div>
            <button type="submit" name="updateRecord" class="btn btn-success">Update Record</button>

        </form>
    </div>
</body>
</html>