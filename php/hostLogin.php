<?php
    
    include_once 'mySqlLogin.php';
    $userName = $_POST['username'];
    $true = true; 
    //$sql_select = "SELECT * FROM Participant WHERE username='$userName'";
    //$result = mysqli_query($conn, $sql_select);
    //echo($result);
    //if(!$row = mysqli_fetch_assoc($result)){
        //throws ERROR, User already logged in
       // echo("Your username is already take");
        //exit;
    //} else {
        $sql_Participant = "INSERT INTO Participant (username, host) VALUES ('$userName', '$true');";
        mysqli_query($conn, $sql_Participant); 
         //$sql_select = "SELECT * FROM Participant WHERE username='$userName'";
         //$result = mysqli_query($conn, $sql_select);
         //$row = mysqli_fetch_assoc($result);
        // echo($user);
         $sql_Room = "INSERT INTO Room (time_stamp) VALUES ('NULL');";
         mysqli_query($conn, $sql_Room); 
         $sql_Connector = "INSERT INTO Session_Guest (User_ID, Session_ID) VALUES ('$row['User_ID']','0'');";
         //mysqli_query($conn, $sql_Connector); 
    //}
    
    ?>
    
   