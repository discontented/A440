<?php

require_once 'dbConnect.php';

require_once 'Song.php';

require_once 'Playlist.php';

$playlist = new Playlist($db);

$nextSong = new Song($db, $_POST['songID']);

echo json_encode($nextSong->getURL());

$playlist->removeSong($nextSong->songID);

?>