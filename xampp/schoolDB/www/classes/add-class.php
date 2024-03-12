<?php
require_once("../../db_config.php");

if (isset($_POST["createClass"])) {

    $className = filter_var($_POST["className"], FILTER_UNSAFE_RAW);
    $query = "INSERT INTO classes (className)
                    VALUES (:className)";
    $result = $db_connection->prepare($query);
    $result->execute([
        "className" => $className,
    ]);
    $rows = $result->rowcount();
    if ($rows == 1) {
        header("Location: list-classes.php");
    } else {
        $error_message = "Class creation failed";
    }
}


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create a Class</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>
<body>
    
<nav class="navbar navbar-inverse">
    <div class="container-fluid">
        <div class="navbar-header">
            <a class="navbar-brand" href="list-classes.php">Home</a>
        </div>
    </div>
</nav>

    <br>
    <div class="container">
        <form method="post" action="">
            <div class="form-group row">
                <label for="className" class="col-sm-2 col-form-label">Class name</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="className" name="className">
            </div>
        </div>

        <button type="submit" name="createClass" class="btn btn-success">Add Class</button>

        </form>
    </div>
                
</body>
</html>