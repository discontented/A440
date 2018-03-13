function account(name, password) {
    this.name = name;
    this.password = password;

    this.postLogin = function (targetForm, phpPage) {
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
}

function postForm(targetForm, phpURL) {
    $(targetForm).on("submit", function (event) {
        event.preventDefault();
        $.ajax({
            url: phpURL,
            type: 'POST',
            data: $(this).serialize(),
            success: function (data) {
                console.log(data);
                window.location = "main.html";
            }
        })
    });
}

postForm("#hostForm", "php/receivePost.php");
postForm("#guestForm", "php/receivePost.php");


