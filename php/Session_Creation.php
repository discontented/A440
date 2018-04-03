<?php

    $sql_select_id = "SELECT * FROM Room WHERE SessionID=(SELECT MAX(SessionID) FROM Room);";
    $result_id = mysqli_query($conn, $sql_select_id);
    $row_id = mysqli_fetch_assoc($result_id);
    $SessionID_Get = $row_id['SessionID'];
   


    $sql_select = "SELECT * FROM Participant WHERE username='$userName'";
    $result = mysqli_query($conn, $sql_select);
    $row = mysqli_fetch_assoc($result);
    $UserID_Get = $row['UserID'];
    $sql_Connector = "INSERT INTO Session_Guest (UserID, SessionID) VALUES ('$UserID_Get'  ,'$SessionID_Get');";
    mysqli_query($conn, $sql_Connector); 


    $_SESSION['SessionID']= $SessionID_Get;
    $_SESSION['UserID']= $UserID_Get;



?>