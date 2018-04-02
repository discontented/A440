<?php

require 'dbConnect.php';
require 'Playlist.php';

$playlist = new Playlist($db, $_POST['session_id']);

echo json_encode($playlist->getSongs());

?>