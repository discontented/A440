<?php

class Session {

    private $session_id;
    private $db;

    function __construct($db, $session_id) {
        $this->session_id = $session_id;
        $this->db = $db;
    }

    public function getSessionID() {
        return $this->session_id;
    }

    public function getUsers() {
        try {
            $results = $this->db->query("SELECT Participant.username
FROM Session_Guest
JOIN Participant ON Session_Guest.User_ID = Participant.User_ID
WHERE Session_Guest.Session_ID = ?", $this->session_id);
        } catch (Exception $ex) {
            echo $ex->getMessage();
            exit;
        }

        return $results->fetchAll(PDO::FETCH_ASSOC);
    }

    public function sessionExists() {
        try {
            $results = $this->db->query("SELECT * FROM Room WHERE Session_ID = ?", $this->session_id);
        } catch (Exception $ex) {
            echo $ex->getMessage();
            exit;
        }

        if ($results->numRows >= 1) {
            return true;
        } else {
            return false;
        }
    }

}

?>