<?php

require_once "dbConnect.php";

require "Song.php";

require "Playlist.php";

$selection = new Song($db, $_POST['selection']);

$sessionPlaylist = new Playlist($db);

//Adds the song by songID to the current playlist
$sessionPlaylist->addSong($selection->songID);

$keys = ['song_id', 'track_name', 'votes'];
$values = [$selection->songID, $selection->title, $selection->numVotes];

$song = array_combine($keys, $values);

return json_encode($song);
?>
