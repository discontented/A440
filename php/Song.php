<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Song
 *
 * @author Josh Corneille
 */
class Song {

    public $songID;
    public $title;
    public $artist;
    public $numVotes;
    private $db;

    function __construct($db, $songID) {
        $this->db = $db;
        $this->songID = $songID;
    }

    public function getVotes() {
        try {
            $st = $this->db->prepare("SELECT COUNT(*) FROM Vote WHERE Song_ID = :songID");
            $st->bindParam(':songID', $this->songID, PDO::PARAM_INT);
            $st->execute();
        } catch (Exception $ex) {
            echo $ex->getMessage();
            exit;
        }

        return $st->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getArtist() {
        try {
            $st = $this->db->prepare("SELECT artist FROM Song WHERE Song_ID = :songID");
            $st->bindParam(":songID", $this->songID, PDO::PARAM_INT);
            $st->execute();
        } catch (Exception $ex) {
            echo $ex->getMessage();
            exit;
        }

        return $st->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getTitle() {
        try {
            $st = $this->db->prepare("SELECT track_name FROM Song WHERE Song_ID = :songID");
            $st->bindParam(":songID", $this->songID, PDO::PARAM_INT);
            $st->execute();
        } catch (Exception $ex) {
            echo $ex->getMessage();
            exit;
        }

        return $st->fetchAll(PDO::FETCH_ASSOC);
    }

}
