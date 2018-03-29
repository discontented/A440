
$(function () {

    $("#search").on('click', '#searchArtist', function (e) {
        e.preventDefault();
        if ($("#searchBox").val().length > 0) {
            var artist = $("#searchBox").val();
            $.ajax({
                method: "POST",
                url: "php/searchArtist.php",
                data: {artist: artist},
                success: function (response) {
                    var result = eval(response);

                    for (var index in result) {
                        $('#searchResults').append("<div class='result' data-song_id=" + result[index]["Song_ID"] + "><div class='trackName'>" + result[index]['track_name'] + "</div></div>");
                    }
                }
            });
        }
    });

//
//    $("#search").on('click', '#searchTrack', function (e) {
//        e.preventDefault();
//        var track = $("#searchBox").val();
//        $.ajax({
//            method: "POST",
//            url: "php/searchTrack.php",
//            data: {track: track},
//            success: function (data) {
//                var result = eval(data);
//
//                for (var index in result) {
//                    var resultDiv = document.createElement('div');
//                    resultDiv.className = 'result';
//                    $(resultDiv).text(index);
//                    $("#searchResults").append(resultDiv);
//                }
//            }
//        });
//    });
//
});