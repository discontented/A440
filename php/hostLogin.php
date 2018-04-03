<?php
      //header("Location: main.html");
    include_once 'mySqlLogin.php';
    $userName = $_POST['username'];
    $true = true; 
    $sql_select = "SELECT * FROM Participant";
    $result = mysqli_query($conn, $sql_select);
    echo($result);
    //if(mysqli_num_rows($result) > 0 ){
        //throws ERROR, User already logged in
        //header("Location: /index.html?signup=usertaken");
    //    exit;
    //} else {
        $sql = "INSERT INTO Participant (username, host) VALUES ('$userName', '$true');";
        mysqli_query($conn, $sql); 
        echo($user);
      
    //}
    ?>
    
   