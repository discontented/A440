<?php

if (isset($_POST[''])){
    include_once 'mySqlLogin.php';
    $userName = $_POST['username'];
    $password = $_POST['passwd'];

    $sql = "INSERT INTO participant (username, host) VALUES ('$userName', '$password');";
    //$result = mysqli_query($conn, $sql); 

} else {
    header("Location: ../index.php?signup=success");
    exit();
}