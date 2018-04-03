<?php

session_start();
$GuestID = $_SESSION['SessionID'];
//$sql = "DELETE FROM Session_Guest WHERE UserID = '$GuestID'";

//$result = mysqli_query($conn, $sql);
//$sql = "DELETE FROM Participant WHERE UserID = '$GuestID'";
//$result = mysqli_query($conn, $sql);

$sql_Participant = "INSERT INTO Participant (username, host) VALUES ('$GuestID', '$true');";
    mysqli_query($conn, $sql_Participant); 
session_destroy();
?>