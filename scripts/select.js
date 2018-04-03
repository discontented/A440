$("#search").on('click', '.result', function(e) {
    e.preventDefault();
    
    $.ajax({
        method: 'POST',
        url: 'php/selectSong.php',
        data: { selection: $(this).data('song_id') },
        success: function(response) {
            console.log(response);
            loadPlaylist("php/loadPlaylist.php");
        },
        error: function(error) {
            
            console.log(error);
        }
    });
});