<?php

session_start();
session_destroy();
sql = "DELETE FROM Participant WHERE WHERE username='$userName'";
$result = mysqli_query($conn, $sql_select);
?>