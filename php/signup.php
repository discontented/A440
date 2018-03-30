<?php

//if (isset($_POST['submit'])){
    include_once 'mySqlLogin.php';
    $userName = $_POST['username'];
    //$password = $_POST['passwd'];
    $true = true; 

    $sql = "INSERT INTO Participant (username, host) VALUES ('$userName', '$true');";
    mysqli_query($conn, $sql); 

    echo($user);
// } else {
//     header("Location: ../main.html?signup=success");
//     exit();
// }