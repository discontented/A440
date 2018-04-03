<?php

session_start();
session_destroy();
$sql = "DELETE FROM Participant WHERE username='$userName'";
$result = mysqli_query($conn, $sql);
?>