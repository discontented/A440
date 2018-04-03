var thisSession = new Session();
thisSession.getSessionID('php/getSession.php');

$("#search").on('click', '.result', function(e) {
    e.preventDefault();
    
    $.ajax({
        method: 'POST',
        url: 'php/selectSong.php',
        data: { selection: $(this).data('song_id') },
        success: function(response) {
            testbtn();
            loadPlaylist("php/loadPlaylist.php", thisSession.getSessionID);
        },
        error: function(error) {
            console.log(error);
        }
    });
});