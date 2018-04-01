$(".songBox").on("click", ".upVote", function() {
    if($(this).hasClass("on")) {
        $(this).removeClass("on");
    } else {
        $(this).addClass("on");
    }
    
});