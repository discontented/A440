$.ajax({
    method: "POST",
    url: 'loadSong.php',
    data: {songID : 1 }
    success: function(response) {
        console.log(response);
        // $("#player").find("audio").html(audioSource(songUrl));
    }
})