function Session() {
    this.sessionID;
    this.hostName;

    this.getSessionID = function (phpURL) {
        $.ajax({
            url: phpURL,
            type: 'POST',
            success: function (response) {
                console.log(response);
                sessionID = response;
                $("#roomNumber").text(sessionID);
            }
        });
    };

    this.getHost = function (phpURL) {
        $.ajax({
            url: phpURL,
            type: 'POST',
            success: function (response) {
                var result = eval(response);
                console.log(result);
                $("#hostName").text(hostName);
            }
        });
    };
}
<<<<<<< HEAD
$(function() {
    var session1 = new Session();
    session1.getSessionID('php/getSession.php');
=======

$(function() {
    var thisSession = new Session();
    thisSession.getSessionID('php/getSession.php');
>>>>>>> 1faf6bfdfc1741f39648449b95a43584d577a8fa
})
