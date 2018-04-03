$("#playlist").on("click", ".upVote", function () {
    if ($(this).hasClass("on")) {
        $(this).removeClass("on");
    } else {
        $(this).addClass("on");
    }
    //must reload playlist each time a vote is clicked.
    
    loadPlaylist("php/loadPlaylist.php", thisSession.sessionID);
});

////Get vote # for specific song
//$(".songBox").on("click", ".voteNum", function() {
//    $(this).
//})