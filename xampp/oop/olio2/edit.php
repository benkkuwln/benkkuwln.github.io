<?php
require_once("signupConfig.php");
$data = new signupConfig();
$id = $_GET['id'];
$data->setId($id);

if(isset($_POST['edit'])){
    $data->setfirstName($_POST['firstName']);
    $data->setlastName($_POST['lastName']);
    $data->setAddress($_POST['address']);

    echo $data->update();
    echo "<script>alert('data edited successfully');document.location='allData.php'</script>";

}
$record = $data->fetchOne();
$val=$record[0];
?>

<!DOCTYPE html>
<html lang="en">
<head>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Simple registration form</title>
</head>
<body>
    <h3>Edit file</h3>
        <div>
            <form action="" method="post">
                <label for="fname">First Name</label>
                <input type="text" id="firstName" name="firstName" value="<?php echo $val['firstName'];?>">

                <label for="lname">Last Name</label>
                <input type="text" id="lastName" name="lastName" value="<?php echo $val['lastName'];?>">

                <label for="address">Address</label>
                <input type="text" id="address" name="address" value="<?php echo $val['address'];?>">

                <input type="submit" value="UPDATE" name="edit">
            </form>
        </div>
</body>
</html>