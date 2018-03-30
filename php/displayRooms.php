<?php

require 'dbConnect.php';

try {
    $results = $db->query("SELECT Room.session_ID, Participant.username
FROM Session_Guest
JOIN Room ON Session_Guest.session_ID = Room.session_ID
JOIN Participant ON Session_Guest.User_ID = Participant.user_ID
LIMIT 0 , 30");
} catch (Exception $ex) {
    echo $ex->getMessage();
    exit;
}

$db_array = $results->fetchAll(PDO::FETCH_ASSOC);

var_dump($db_array);
?>
