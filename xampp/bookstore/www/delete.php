<?php

    require_once('../db_config.php');

    if (!isset($_GET['id'])) {
        header('Location: list-books.php');
        die();
    } else {
        $id = filter_var($_GET['id'], FILTER_SANITIZE_NUMBER_INT);
        if (!$id) {
            header('Location: list-books.php');
            die();
        } else {
            $query = "DELETE FROM books WHERE id = :id LIMIT 1";
            $result = $db_connection->prepare($query);
            $result->execute([
                'id' => $id
            ]);
            $rowsdeleted = $result->rowCount();
            if ($rowsdeleted == 1) {
        } else {
            $error_message = "Record was not deleted.";
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
                <?php echo $error_message; ?> Go back to <a href="list-books.php" class="alert-link">list of books</a>
            </div>
        <?php
        }
            ?>
    </div>
</body>
</html>