<?php

require_once 'dbConnect.php';
require_once 'Playlist.php';

$song = new Song($db, $_POST['songID']);
return $song->getURL();

?>