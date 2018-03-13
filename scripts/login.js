function account(name, password) {
    this.name = name;
    this.password = password;

    this.postLogin = function (phpPage) {
        $("form").on("submit", function (event) {
            event.preventDefault();
            console.log($(this).serialize());
        });
    }
}

var username = $("#hostUser");
var user_pw = $("#guestUser");

function postForm(targetForm, phpURL) {
    $(targetForm).on("submit", function (event) {
        event.preventDefault();
        $.ajax({
            url: phpURL,
            type: 'POST',
            data: $(this).serialize(),
            success: function (data) {
                alert(data)
            }
        })
    });
}
$("#hostUser").click(function(){
    
})
postForm("form", "php/receivePost.php");


