function Session() {
    this.sessionID;
    this.hostName;

    this.getSessionID = function (phpURL) {
        $.ajax({
            url: phpURL,
            type: 'POST',
            success: function (response) {
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

var session1 = new Session();
session1.getSessionID('php/getSession.php');
session1.getHost("php/getHost.php");