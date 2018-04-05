function getSessionID(phpURL) {
    $.ajax({
        url: phpURL,
        type: 'POST',
        success: function (response) {
            console.log(response);
            $("#roomNumber").text(response);
        }
    });
}
;

function getHost(phpURL) {
    $.ajax({
        url: phpURL,
        type: 'POST',
        success: function (response) {
            var result = eval(response);
            console.log(result);
            $("#hostName").text(result);
        }
    });
}
;

function loadPlaylist(phpURL) {
    $.ajax({
        method: "POST",
        url: phpURL,
        success: function (response) {
            console.log(response);
            var results = eval(response);

            //clears out playlist of any previous entries.
            $("#playlist").empty();

            for (var index in results) {
                $("#playlist").append(
                        songBox(results[index]["Song_ID"], results[index]["track_name"], null)
                        );
            }
            loadSong();
        }
    });
}

function getFirstSong() {
    //gets first song currently in playlist.
    var song_id = $('#playlist .songTitle:first-child').data('song_id');

    return song_id;
}

function getSongURL(phpURL, songID) {
    $.ajax({
        method: "POST",
        url: phpURL,
        data: {songID, songID},
        success: function (response) {
            var song = $.parseJSON(response)[0];
            updatePlayer(song.mp3_file);
        }
    });
}

function updatePlayer(songURL) {
    var audio = document.getElementById('audio');
    audio.src = "/" + songURL;
    audio.load();
}

function loadSong() {
    var nextSong = getFirstSong();
    getSongURL('php/getSongURL.php', nextSong);
}

function postForm(targetForm, phpURL) {
    $(targetForm).on("submit", function (event) {
        event.preventDefault();
        $.ajax({
            url: phpURL,
            type: 'POST',
            data: $(this).serialize(),
            success: function (data) {
                window.location = "main.php";
            },
            error: function (data) {
                console.log(data.responseText);
            }
        });
    });
}

function logOut(phpURL) {
    $("#logOut").click(function () {
        $.ajax({
            url: phpURL,
            type: 'POST',
            success: function (data) {
                window.location = "index.php";
            },
            error(msg) {
                console.log(msg);
            }
        });
    });
}
;
