//add song to the playlist
$("#search").on('click', '.result', function(e) {
    e.preventDefault();
    
    $.ajax({
        method: 'POST',
        url: 'php/selectSong.php',
        data: { selection: $(this).data('song_id') },
        success: function(response) {
            console.log(response);
            $("#playlist").append(songBox(response[0]['songID'], response[0]['track_name'], null));
        }
    });
});