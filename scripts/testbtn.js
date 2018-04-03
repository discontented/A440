function testbtn() {
        $.ajax({
            method: 'POST',
        url: 'php/testbtn.php',
            success: function(data) {
                
            },
            error(msg) {
                console.log(msg);
            }
        })
    
};