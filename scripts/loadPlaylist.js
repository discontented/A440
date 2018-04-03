function loadPlaylist(phpURL, session_id) {
    $.ajax({
        method: "POST",
        url: phpURL,
        data: {session_id: session_id},
        success: function (response) {
            var results = $.parseJSON(response);
            
            //clears out playlist of any previous entries.
            $("#playlist").empty();
            
            for (var index in results) {
                $("#playlist").append(songBox(results[index]["Song_ID"], results[index]["track_name"], null));
            }
        }
    });
}

$(function () {
    var session_id = 1;
    
    loadPlaylist("php/loadPlaylist.php", session_id);
});