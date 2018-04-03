<?php

require('dbConnect.php');

class Playlist {
    private $db;
    private $sessionID;
    
    function __construct($db) {
        $this->db = $db;
        $this->sessionID = $_SESSION['SessionID'];
    }
    
    public function getSongs() {
        try {
            $query = "SELECT Song.Song_ID, Song.track_name
                FROM Session_Song
                JOIN Song ON Session_Song.Song_ID = Song.Song_ID
                WHERE Session_Song.Session_ID = :sessionID";
            $st = $this->db->prepare($query);
            $st->bindParam(":sessionID", $this->sessionID, PDO::PARAM_INT);
            $st->execute();
        } catch (Exception $ex) {
            echo $ex->getMessage();
            exit;
        }
        
        return $st->fetchAll(PDO::FETCH_ASSOC);
    }
    
    public function addSong($songID) {
        try {
            $query = "INSERT INTO Session_Song
                        (Session_ID, Song_ID)
                    VALUES
                        (:sessionID, :songID)";
            $st = $this->db->prepare($query);
            $st->bindParam(":sessionID", $this->sessionID);
            $st->bindParam(":songID", $songID);
            $st->execute();
        } catch (Exception $ex) {
            echo $ex->getMessage();
            exit;
        }
    }

}
