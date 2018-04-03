<?php

require_once(dirname(dirname(__FILE__)).'dbConnect.php');

require '../Session.php';

$session1 = new Session($db);

echo $session1->getSessionID();

var_dump($session1->getHost());

?>