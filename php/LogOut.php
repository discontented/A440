<?php

session_start();

include_once 'mySqlLogin.php';
$GuestID = $_SESSION['UserID'];
$SessionID_Get =$_SESSION['SessionID'] ;


$sql_select = "SELECT * FROM Participant WHERE username='$userName'";
$result = mysqli_query($conn, $sql_select);
$row = mysqli_fetch_assoc($result);


$sql = "DELETE FROM `Session_Guest` WHERE `Session_Guest`.`UserID` = $GuestID AND `Session_Guest`.`SessionID` = $SessionID_Get;";
mysqli_query($conn, $sql);
if(
$IsHost= $row['host'];
if(!$IsHost){
    $sql = "DELETE FROM `Room` WHERE `Room`.`SessionID` = $SessionID_Get;";
    mysqli_query($conn, $sql);
}
$sql = "DELETE FROM `Participant` WHERE `Participant`.`UserID` = $GuestID;";
mysqli_query($conn, $sql);


session_destroy();
?>