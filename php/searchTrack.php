<?php

ini_set('display_errors', 'On');
error_reporting(E_ALL);

require "dbConnect.php";

$track = $_POST['track'];

try {
    $results = $db->prepare("SELECT Song_ID, track_name, artist FROM Song WHERE track_name LIKE :track");
    $results->execute(array(":track" => '%' . $track . '%'));
} catch (Exception $e) {
    echo $e->getMessage();
    echo "Couldn't query.";
    exit;
}

$db_array = $results->fetchAll(PDO::FETCH_ASSOC);

echo json_encode($db_array);
?>
