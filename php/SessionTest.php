<?php

require 'dbConnect.php';

require 'Session.php';

$session1 = new Session($db, "1");

echo $session1->sessionExists();

echo "Users<br>";
var_dump($session1->getUsers());

echo "<br>Host<br>";
var_dump($session1->getHost());

?>