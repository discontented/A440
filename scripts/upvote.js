$("#playlist").on("click", ".upVote", function () {
    if ($(this).hasClass("on")) {
        $(this).removeClass("on");
    } else {
        $(this).addClass("on");
    }
    //must reload playlist each time a vote is clicked.
    var session_id = 1;
    
    loadPlaylist("php/loadPlaylist.php", session_id);
});

////Get vote # for specific song
//$(".songBox").on("click", ".voteNum", function() {
//    $(this).
//})