<?php

require 'dbConnect.php';

require 'Session.php';

$session1 = new Session($db, "1");

echo $session1->sessionExists();

echo $session1->getUsers();
?>