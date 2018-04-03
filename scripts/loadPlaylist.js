function loadPlaylist(phpURL) {
  $.ajax({
    method: "POST",
    url: phpURL,
    success: function(response) {
      console.log(response);
      var results = eval(response);

      //clears out playlist of any previous entries.
      $("#playlist").empty();

      for (var index in results) {
        $("#playlist").append(
          songBox(results[index]["Song_ID"], results[index]["track_name"], null)
        );
      }
    }
  });
}

function getSongURL(phpURL, songID, session_id) {
  $.ajax({
    method: "POST",
    url: phpURL,
    data: { session_id: session_id },
    success: function(response) {
      console.log(response);
    }
  });
}

function loadSong(phpURL, songURL) {
  $.ajax({
    method: "POST",
    url: phpURL,
    success: function(response) {
      console.log(response);
      var results = eval(response);
      var firstSong = results[0]["Song_ID"];

      }
    }
  });
}

loadPlaylist("php/loadPlaylist.php");
