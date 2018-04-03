<?php

    
    $sql_select = "SELECT * FROM Participant WHERE username='$userName'";
    $result = mysqli_query($conn, $sql_select);
    $row = mysqli_fetch_assoc($result);
    $UserID_Get = $row['UserID'];
    $sql_Connector = "INSERT INTO Session_Guest (UserID, SessionID) VALUES ('$UserID_Get'  ,'$session_ID');";
    mysqli_query($conn, $sql_Connector); 

    
    $_SESSION['SessionID']= $session_ID;
    $_SESSION['UserID']= $UserID_Get;


?>