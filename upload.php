<?php
if(isset($_POST['save_audio']) && $_POST['save_audio']=="Upload Audio")
{
    $file = $_FILES['audiofile'];
    $dir='uploads/';
    $audio_name=$file['name'];
    $audio_path=$dir.basename($_FILES['audiofile']['name']);
    if(move_uploaded_file($_FILES['audiofile']['tmp_name'],$audio_path))
       {
           echo "uploaded successfully";
           saveAudio($audio_name, $audio_path);
       }
     else 
     {
         echo "upload unsuccessful";
     }
}
function saveAudio($track_name,$mp3_file)
{
    $conn=mysqli_connect('localhost','root','harmony','A440');
    if(!$conn)
    {
        die('server not connected');
    }
    $query="use table Song";
    $query="insert into Song(track_name, mp3_file)values('{$track_name}','{$mp3_file}')";
    mysqli_query($conn,$query);
    if(mysqli_affected_rows($conn)>0)
    {
        echo "audio file path saved in database";
        echo "<br/>";
    }
    mysqli_close($conn);
}
?>