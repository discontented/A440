//add song to the playlist
$("#search").on('click', '.result', function(e) {
    e.preventDefault();
    
    $.ajax({
        method: 'POST',
        url: 'php/selectSong.php',
        data: { selection: $(this).data('song_id') },
        success: function(response) {
            loadPlaylist("php/loadPlaylist.php", session1.getSessionID);
        },
        error: function(error) {
            console.log(error);
        }
    });
});