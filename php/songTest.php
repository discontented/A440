<?php

include 'Song.php';

include 'dbConnect.php';

$jeff = new Song($db, '1');

var_dump($jeff->getArtist());

?>