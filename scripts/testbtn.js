function testbtn() {
        $.ajax({
            method: 'POST',
        url: 'php/testbtn.php',
        data: $(this).serialize(),
                success: function (data) {
                    alert(data)
                }
           ,
            error(msg) {
                console.log(msg);
            }
        })
    
};