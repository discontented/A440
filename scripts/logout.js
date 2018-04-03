function logOut(phpURL) {
    $("#logOut").click(function() {
        $.ajax({
            url: phpURL,
            type: 'POST',
            success: function(data) {
                window.location = "index.php";
            },
            error(msg) {
                console.log(msg);
            }
        })
    })
};
logOut("php/LogOut.php");

