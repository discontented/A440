<?php

echo($user);
if (isset($_POST['submit'])){
    include_once 'mySqlLogin.php';
    $userName = $_POST['username'];
    $password = $_POST['passwd'];

    $sql = "INSERT INTO Participant (username, host) VALUES ('$userName', '$password');";
    mysqli_query($conn, $sql); 

} else {
    header("Location: ../main.html?signup=success");
    exit();
}