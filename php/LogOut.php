<?php

session_start();
$GuestID = $_SESSION['SessionID'];
$sql = "DELETE FROM Session_Guest WHERE UserID = '$GuestID'";

$result = mysqli_query($conn, $sql);
$sql = "DELETE FROM Participant WHERE UserID = '$GuestID'";
$result = mysqli_query($conn, $sql);

session_destroy();
?>