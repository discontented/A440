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

$(function() {
    var thisSession = new Session();
    thisSession.getSessionID('php/getSession.php');
})
