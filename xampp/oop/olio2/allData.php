<?php
require_once("signupConfig.php");
$data = new signupConfig();
$all = $data->fetchAll();

?>


<!DOCTYPE html>
<html lang="en">
<head>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>All data</title>
</head>
<body>
    
<h2>List of all records</h2>
    <a class="btn btn-success" href="signup.php">Add new</a>
    <br>
<br>
<table>
    <tr>
        <th>First Name</th>
        <th>Last Name</th>
        <th>Address</th>
        <th>Action</th>
    </tr>
    <?php
foreach($all as $key => $val){
    ?>

    
    <tr>
        <td><?=$val['firstName']?></td>
        <td><?=$val['lastName']?></td>
        <td><?=$val['address']?></td>
        <td><a class="btn btn-danger" href="delete.php?id=<?=$val['id']?>&req=delete">DELETE</a> <a class="btn btn-warning" href="edit.php?id=<?=$val['id']?>">EDIT</a></td>
    </tr>

</tr>
<?php

}
?>
</table>


</body>
</html>