<?php
    
    include_once 'mySqlLogin.php';
    $userName = $_POST['username'];
    $host = false; 
    $sql = "INSERT INTO Participant (username, host) VALUES ('$userName', '$host');";
    mysqli_query($conn, $sql); 
    echo($user);