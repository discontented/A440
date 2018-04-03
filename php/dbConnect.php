<?php

require_once("mySqlLogin.php");

ini_set('display_errors', 'On');
error_reporting(E_ALL);

try {//Connects to database and creates object
	$db = new PDO("mysql:host=".$db_hostname.";dbname=".$db_database.";",$db_username,$db_password);
	$db->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
} catch (Exception $e) {
	echo $e->getMessage();
	echo "Could not connect to the database";
	exit;
}

?>
