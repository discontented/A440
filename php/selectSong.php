<?php
ini_set('display_errors', 'On');
error_reporting(E_ALL);

require "dbConnect.php";

$selection = $_POST['selection'];

try {
    $statement = $db->prepare("INSERT INTO Playlist(Song_ID, track_name, artist FROM Song WHERE artist LIKE :artist");
    $results->execute(array(":artist" => '%'.$artist.'%'));
} catch (Exception $e) {
	echo $e->getMessage();
	echo "Couldn't query.";
	exit;
}

?>
