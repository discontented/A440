function logOut(phpURL, userID) {
    $("#logOut").click(function() {
        $.ajax({
            url: phpURL,
            type: 'POST', 
            data: {userID : userID },
            success: function(data) {
                window.location = "index.php";
            },
            error(msg) {
                console.log(msg);
            }
        })
    })
};


