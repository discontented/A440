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
        $sql = "INSERT INTO Participant (username, host) VALUES ('$userName', '$true');";
        mysqli_query($conn, $sql); 
        echo($user);
        $sql = "INSERT INTO Room (time_stamp) VALUES ('NULL');";
        mysqli_query($conn, $sql); 
      
    //}
    
    ?>
    
   