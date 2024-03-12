<?php

require_once("../../db_config.php");

$query = "SELECT * FROM students";

$results = $db_connection->query($query);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>List of Students</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.1.0/css/all.css">
</head>
<body>

<nav class="navbar navbar-inverse">
    <div class="container-fluid">
        <div class="navbar-header">
            <a class="navbar-brand" href="../classes/list-classes.php">Classes</a>
        </div>
    </div>
</nav>

    <div class="container-fluid">
        <h1 class="display-1 text-center">Students</h1>
        <a href="add-student.php" class="btn btn-info">Add new student</a>
        <table class="table">
            <thead>
                <tr>
                    <th>FIRST NAME</th>
                    <th>LAST NAME</th>
                    <th>DATE OF BIRTH</th>
                    <th>CLASS</th>
                    <th>EDIT</th>
                    <th>DELETE</th>
                </tr>
            </thead>
            <tbody>
                <?php
                foreach ($results as $result) {
                    $queryClass = "SELECT * FROM classes WHERE classID = :id LIMIT 1";
                    $cResult = $db_connection->prepare($queryClass);
                    $id = $result["class"];
                    $cResult->execute([
                        "id" => $id
                    ]);
                    ?>
                    <tr>
                        <td>
                            <?php echo $result["firstName"] ?>
                        </td>
                        <td>
                            <?php echo $result["lastName"] ?>
                        </td>
                        <td>
                            <?php echo $result["dateOfBirth"] ?>
                        </td>
                        <td>
                            <?php
                            foreach ($cResult as $res) {
                                echo $res["className"];
                            }
                            ?>
                        </td>
                        <td>
                            <a href="edit-student.php?studentID=<?php echo $result["studentID"] ?>"><i class="fas fa-edit"></i></a>
                        </td>
                        <td>
                            <a href="delete-student.php?studentID=<?php echo $result["studentID"] ?>"><i class="fas fa-trash-alt"></i></a>
                        </td>
                    </tr>
                    <?php
                }
                ?>

            </tbody>
        </table>
    </div>
</body>

</html>