<?php
    session_start();
    include_once 'mySqlLogin.php';
    $sql_Participant = "INSERT INTO Participant (username, host) VALUES ('tonyny', '$true');";
    mysqli_query($conn, $sql_Participant); 


    ?>
    
   