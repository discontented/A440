$(function () {
    $("#search").on('click', '#searchArtist', function (e) {
        e.preventDefault();
        $("#searchResults").empty();
        if ($("#searchBox").val().length > 0) {
            var artist = $("#searchBox").val();
            $.ajax({
                method: "POST",
                url: "php/searchArtist.php",
                data: {artist: artist},
                success: function (response) {
                    var result = eval(response);

                    for (var index in result) {
                        $('#searchResults').append(searchResult(result[index]["Song_ID"], result[index]['track_name']));
                    }
                }
            });
        }
    });

    $("#search").on('click', '#searchTrack', function (e) {
        e.preventDefault();
        $("#searchResults").empty();
        if ($("#searchBox").val().length > 0) {
            var track = $("#searchBox").val();
            $.ajax({
                method: "POST",
                url: "php/searchTrack.php",
                data: {track: track},
                success: function (response) {
                    var result = eval(response);

                    for (var index in result) {
                        $('#searchResults').append(searchResult(result[index]["Song_ID"], result[index]['track_name']));
                    }
                }
            });
        }
    });

});