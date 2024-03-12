<?php
require_once("../../db_config.php");
 
$classesquery = "SELECT * FROM classes";
 
$results = $db_connection->query($classesquery);
 
if (isset($_POST["createStudent"])) {
 
    $firstName = filter_var($_POST["firstName"], FILTER_UNSAFE_RAW);
    $lastName = filter_var($_POST["lastName"], FILTER_UNSAFE_RAW);
    $dateOfBirth = filter_var($_POST["dateOfBirth"], FILTER_SANITIZE_NUMBER_INT);
    $class = filter_var($_POST["class"], FILTER_SANITIZE_NUMBER_INT);
    $query = "INSERT INTO students (firstName, lastName, dateOfBirth, class)
                    VALUES (:firstName, :lastName, :dateOfBirth, :class)";
    $result = $db_connection->prepare($query);
    $result->execute([
        "firstName" => $firstName,
        "lastName" => $lastName,
        "dateOfBirth" => $dateOfBirth,
        "class" => $class
    ]);
    $rows = $result->rowcount();
    if ($rows == 1) {
        header("Location: list-students.php");
    } else {
        $error_message = "Student addition failed";
    }
}
 
 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add a Student</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>
<body>

<nav class="navbar navbar-inverse">
    <div class="container-fluid">
        <div class="navbar-header">
            <a class="navbar-brand" href="list-students.php">Home</a>
        </div>
    </div>
</nav>

<br>
<div class="container">
    <form method="post" action="">
        <div class="form-group row">
            <label for="firstName" class="col-sm-2 col-form-label">Student first name</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="firstName" name="firstName">
            </div>
        </div>
        <div class="form-group row">
            <label for="lastName" class="col-sm-2 col-form-label">Student last name</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="lastName" name="lastName">
            </div>
        </div>
        <div class="form-group row">
            <label for="dateOfBirth" class="col-sm-2 col-form-label">Student date of birth</label>
            <div class="col-sm-10">
                <input type="date" class="form-control" id="dateOfBirth" name="dateOfBirth">
            </div>
        </div>
        <div class="form-group row">
            <label for="" class="col-sm-2 col-form-label">Student classID</label>
            <div class="col-sm-10">
                <select class="form-control" id="class" name="class">
                    <?php
                    foreach ($results as $result) {
                        echo "<option value=" . $result['classID'] . ">" . $result['className'] . "</option>";
                    }
                    ?>
                </select>
            </div>
        </div>

        <button type="submit" name="createStudent" class="btn btn-success">Add Student</button>

    </form>
</div>

</body>
</html>