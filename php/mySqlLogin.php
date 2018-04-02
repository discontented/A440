<?php

$db_hostname = 'localhost';
$db_database = 'A440';
$db_username = 'root';
$db_password = 'harmony';

$conn = mysqli_connect($dbServername, $dbUsername, $dbPassword, $db_database);
if (!$conn){
    die("Connection failed: ".mysqli_connect_error());
}
?>