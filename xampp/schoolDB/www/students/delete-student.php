<?php

    require_once('../../db_config.php');

    if (!isset($_GET['studentID'])) {
        header('Location: list-students.php');
        die();
    } else {
        $studentID = filter_var($_GET['studentID'], FILTER_SANITIZE_NUMBER_INT);
        if (!$studentID) {
            header('Location: list-students.php');
            die();
        } else {
            $query = "DELETE FROM students WHERE studentID = :studentID LIMIT 1";
            $result = $db_connection->prepare($query);
            $result->execute([
                'studentID' => $studentID
            ]);
            $rowsdeleted = $result->rowCount();
            if ($rowsdeleted == 1) {
            header("Location: list-students.php");
        } else {
            $error_message = "Student was not deleted.";
        }
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
    <div class="container">
        <?php
        if (isset($error_message)) {
            ?>
            <div class="alert alert-danger">
                <strong>Error!</strong>
                <?php echo $error_message; ?> Go back to <a href="list-students.php" class="alert-link">list of classes</a>
            </div>
        <?php
        }
            ?>
    </div>
</body>
</html>