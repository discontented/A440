<?php

require_once 'dbConnect.php';

require_once 'Session.php';

$session1 = new Session($db);

return json_encode($session1->getHost());

?>