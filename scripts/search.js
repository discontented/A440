$("#search").on('click', '#searchArtist', function() {
    var artist = $("#searchBox").val();
    $.ajax() {
        method: "POST",
        url: "searchArtist.php",
        data: { artist: artist },
        success: function(data) {
            $("#searchResults").append(data);
        }
    }
})

$("#search").on('click', '#searchTrack', function() {
    var artist = $("#searchBox").val();
    $.ajax() {
        method: "POST",
        url: "searchTrack.php",
        data: { artist: artist },
        success: function(data) {
            $("#searchResults").append(data);
        }
    }
})