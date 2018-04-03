<?php

session_start();
$sql = "DELETE FROM Session_Guest WHERE UserID = '$_SESSION['SessionID']'";

$result = mysqli_query($conn, $sql);
$sql = "DELETE FROM Participant WHERE UserID = '$_SESSION['SessionID']'";
$result = mysqli_query($conn, $sql);

session_destroy();
?>