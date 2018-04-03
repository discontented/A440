<?php


    $sql_select_id = "SELECT * FROM Room WHERE id=(SELECT MAX(id) FROM Room);";
    $result_id = mysqli_query($conn, $sql_select_id);
    $row_id = mysqli_fetch_assoc($result_id);
    $_SESSION['id']= $row_id['Session_ID'];

    $sql_select = "SELECT * FROM Participant WHERE username='$userName'";
    $result = mysqli_query($conn, $sql_select);
    $row = mysqli_fetch_assoc($result);

    $sql_Connector = "INSERT INTO Session_Guest (UserID, SessionID) VALUES ('31','11');";
    mysqli_query($conn, $sql_Connector); 


?>