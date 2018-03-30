<?php
if(isset($_POST['save_audio']) && $_POST['save_audio']=="Upload Audio")
{
    $dir='uploads/';
    $audio_path=$dir.basename($_FILES['audiofile']['name']);
    if(move_uploaded_file($_FILES['audiofile']['tmp_name'],$audio_path))
       {
           echo "uploaded successfully";
           saveAudio($audio_path);
       }
     else 
     {
         echo "upload unsuccessful";
     }
}
function displayAudios()
{
    $conn=mysqli_connect('localhost','root','harmony','A440');
    if(!$conn)
    {
        die('server not connected');
    }
    $query="select * from Song";
    $r=mysqli_query($conn,$query);
    while($row=mysqli_fetch_array($r))
    {
        echo $row['mp3_file'];
        echo "<br/>";
    }
    mysqli_close($conn);
}
function saveAudio($mp3_file)
{
    $conn=mysqli_connect('localhost','root','harmony','A440');
    if(!$conn)
    {
        die('server not connected');
    }
    $query="use table Song";
    $query="insert into Song(mp3_file)values('{$mp3_file}')";
    mysqli_query($conn,$query);
    if(mysqli_affected_rows($conn)>0)
    {
        echo "audio file path saved in database";
        echo "<br/>";
    }
    mysqli_close($conn);
}
?>