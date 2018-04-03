<?php

require 'dbConnect.php';
require 'Playlist.php';

$playlist = new Playlist($db);

$playlist->addSong(2);

echo "executed";

?>