<?php

require_once 'dbConnect.php';

require_once 'Session.php';

$session1 = new Session($db);

echo $session1->getSessionID();

?>