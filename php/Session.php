<?php

class Session {

    private $session_id;
    private $db;

    function __construct($db, $session_id) {
        $this->db = $db;
        $this->session_id = $session_id;
    }

    public function getSessionID() {
        return $this->session_id;
    }

    public function getUsers() {
        try {
            $query = "
                SELECT Participant.username, Participant.host
                FROM Session_Guest
                JOIN Participant
                ON Session_Guest.User_ID = Participant.User_ID
                WHERE Session_Guest.Session_ID = :sessionID
                ";
            $st = $this->db->prepare($query);
            $st->bindParam(":sessionID", $this->session_id, PDO::PARAM_INT);
            $st->execute();
        } catch (Exception $ex) {
            echo $ex->getMessage();
            exit;
        }

        return $st->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getGuests() {
        try {
            $query = "
                SELECT Participant.username
                FROM Session_Guest
                JOIN Participant
                ON Session_Guest.User_ID = Participant.User_ID
                WHERE Session_Guest.Session_ID = :sessionID
                AND Participant.host = false
                ";
            $st = $this->db->prepare($query);
            $st->bindParam(":sessionID", $this->session_id, PDO::PARAM_INT);
            $st->execute();
        } catch (Exception $ex) {
            echo $ex->getMessage();
            exit;
        }

        return $st->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getHost() {
        try {
            $query = "
                SELECT Participant.username
                FROM Session_Guest
                JOIN Participant
                ON Session_Guest.User_ID = Participant.User_ID
                WHERE Session_Guest.Session_ID = :sessionID
                AND Participant.host = true
                ";
            $st = $this->db->prepare($query);
            $st->bindParam(":sessionID", $this->session_id, PDO::PARAM_INT);
            $st->execute();
        } catch (Exception $ex) {
            echo $ex->getMessage();
            exit;
        }

        return $st->fetchAll(PDO::FETCH_ASSOC);
    }

    public function sessionExists() {
        try {
            $st = $this->db->prepare("SELECT * FROM Room WHERE Session_ID = :sessionID");
            $st->bindParam(":sessionID", $this->session_id, PDO::PARAM_INT);
            $st->execute();
        } catch (Exception $ex) {
            echo $ex->getMessage();
            exit;
        }

        if ($st->rowCount() >= 1) {
            return true;
        } else {
            return false;
        }
    }

}

?>