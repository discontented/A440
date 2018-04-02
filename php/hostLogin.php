<?php

    include_once 'mySqlLogin.php';
    $userName = $_POST['username'];
    $true = true; 
    $sql = "SELECT * FROM Participant WHERE username='$userName'";
    $result = mysqli_query($conn, $sql);
    if(mysqli_num_rows($result) > 0 ){
        //throws ERROR, User already logged in
        //header("Location: /index.html?signup=usertaken");
        exit;
    } else {
        $sql1 = "INSERT INTO Participant (username, host) VALUES ('$userName', '$true');";
        mysqli_query($conn, $sql1); 
        echo($user);
    }
    
   