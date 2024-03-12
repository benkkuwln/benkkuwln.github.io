<?php

require_once("../../db_config.php");

$query = "SELECT * FROM classes";

$results = $db_connection->query($query);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>List of Classes</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.1.0/css/all.css">
</head>
<body>

<nav class="navbar navbar-inverse">
    <div class="container-fluid">
        <div class="navbar-header">
            <a class="navbar-brand" href="../students/list-students.php">Students</a>
        </div>
    </div>
</nav>

    <div class="container">
        <h1 class="display-1 text-center">Classes</h1>
        <a href="add-class.php" class="btn btn-info">Add new class</a>
        <table class="table">
            <thead>
                <tr>
                    <th>NAME</th>
                    <th>EDIT</th>
                    <th>DELETE</th>
                </tr>
            </thead>
            <tbody>
                <?php
                foreach ($results as $result) {
                    ?>
                    <tr>
                        <td>
                            <?php echo $result["className"] ?>
                        </td>
                        <td><a href="edit-class.php?classID=<?php echo $result["classID"] ?>"><i class="fas fa-edit"></i></a></td>
                        <td><a href="delete-class.php?classID=<?php echo $result["classID"] ?>"><i class="fas fa-trash-alt"></i></a></td>
                    </tr>
                    <?php
                }
                ?>

            </tbody>
        </table>
    </div>
</body>

</html>