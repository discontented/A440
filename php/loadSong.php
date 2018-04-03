<?php

require_once 'dbConnect.php';
require_once 'Playlist.php';

$playlist = new Playlist($db, $_POST['session_id']);

?>