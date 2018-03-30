$("#search").on('click', '.result', function(e) {
    e.preventDefault();
    var selection = $(this).data('song_id');
    
    $.ajax({
        method: 'POST',
        url: 'php/selectSong.php',
        data: { selection: selection },
        success: function(response) {
            console.log(response);
            $("#playlist").append("<div class='songBox'><div class='songTitle'>" + response[0]['track_name'] + "</div><div class='upVote'></div><div class='voteNum'></div></div>");
        }
    });
});