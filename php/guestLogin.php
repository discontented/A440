<?php
    session_start();
    include_once 'mySqlLogin.php';
    $userName = $_POST['username'];
    $session_ID= $_POST['sessionID'];
    $host = false; 
    $sql = "INSERT INTO Participant (username, host) VALUES ('$userName', '$host');";
    mysqli_query($conn, $sql); 
    include 'Session_Creation_Guest.php';
    echo($user);