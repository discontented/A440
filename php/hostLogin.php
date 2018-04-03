<?php
    
    include_once 'mySqlLogin.php';
    $userName = $_POST['username'];
    $true = true; 
    $sql_select = "SELECT * FROM Participant Where username='$userName'";
    $result = mysqli_query($conn, $sql_select);
    //echo($result);
    if(mysqli_num_rows($result) > 0 ){
        //throws ERROR, User already logged in
        echo("Your username is already take");
        exit;
    } else {
        $sql = "INSERT INTO Participant (username, host) VALUES ('$userName', '$true');";
        mysqli_query($conn, $sql); 
        echo($user);
      
    }
    ?>
    
   