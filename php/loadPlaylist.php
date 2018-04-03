<?php

require 'dbConnect.php';
require 'Playlist.php';

$playlist = new Playlist($db);

//echo json_encode($playlist->getSongs());

?>