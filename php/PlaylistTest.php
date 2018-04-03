<?php

require 'dbConnect.php';
require 'Playlist.php';

$playlist = new Playlist($db, 1);

$playlist->addSong(2);

echo "executed";

?>