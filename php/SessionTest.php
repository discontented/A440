<?php

require_once('php/dbConnect.php');

require 'Session.php';

$session1 = new Session($db);

echo $session1->getSessionID();

var_dump($session1->getHost());

print_r($session1->getVotes);

?>