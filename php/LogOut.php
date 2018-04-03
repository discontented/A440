<?php

session_start();

include_once 'mySqlLogin.php';
$GuestID = $_SESSION['UserID'];
$SessionID_Get =$_SESSION['SessionID'] ;


$sql = "DELETE FROM `Session_Guest` WHERE `Session_Guest`.`UserID` = $GuestID AND `Session_Guest`.`SessionID` = $SessionID_Get;";
mysqli_query($conn, $sql);
$sql = "DELETE FROM `Participant` WHERE `Participant`.`UserID` = $GuestID;";
mysqli_query($conn, $sql);
if($_SESSION['host']){
    $sql = "DELETE FROM `Room` WHERE `Room`.`SessionID` = $SessionID_Get;";
    mysqli_query($conn, $sql);
} else {

}
session_destroy();
?>