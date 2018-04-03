<?php

    $userName = $_POST['username'];
    $sql_select_id = "SELECT * FROM Room WHERE SessionID=(SELECT MAX(SessionID) FROM Room);";
    $result_id = mysqli_query($conn, $sql_select_id);
    $row_id = mysqli_fetch_assoc($result_id);
    $_SESSION['id']= $row_id['SessionID'];


    $sql_select = "SELECT * FROM Participant WHERE username='$userName'";
    $result = mysqli_query($conn, $sql_select);
    $row = mysqli_fetch_assoc($result);

    $sql_Connector = "INSERT INTO Session_Guest (UserID, SessionID) VALUES ('49'  ,'$row_id['SessionID']');";
    mysqli_query($conn, $sql_Connector); 


?>