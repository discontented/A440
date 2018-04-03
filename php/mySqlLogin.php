<?php
session_start();
$db_hostname = 'localhost';
$db_database = 'A440';
$db_username = 'www';
$db_password = 'guest';

$conn = mysqli_connect($db_hostname, $db_username, $db_password, $db_database);

?>