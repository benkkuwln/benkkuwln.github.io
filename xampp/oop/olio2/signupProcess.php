<?php
if(isset($_POST['save'])){
    require_once("signupConfig.php");
    $sc = new signupConfig();

    $sc->setfirstName($_POST['firstName']);
    $sc->setlastName($_POST['lastName']);
    $sc->setAddress($_POST['address']);
    $sc->insertData();

    echo "<script>alert('data saved successfully');document.location='allData.php'</script>";
}




?>