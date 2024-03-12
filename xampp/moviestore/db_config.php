<?php
/**
 * Movies
 */
//declare the database variables

$db_host = "localhost";
$db_name = "moviestore";
$db_username = "root";
$db_password = "";

//create the Data Source Name
$dsn = "mysql:host=$db_host;dbname=$db_name";

try {
    $db_connection = new PDO($dsn, $db_username, $db_password);
}catch(Exception $e) {
    echo "There was a failure - " . $e->getMessage();
}