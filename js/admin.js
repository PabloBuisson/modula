$(document).ready(function () {

    // if the details of message is displayed
    if ($('#title-details').length) {
        $('html, body').animate({
            scrollTop: $('#title-details').offset().top
        }, 1000);
    }
    
    // AJAX
    $('#details-message').click(function (e) { 
        const user = $('#details-message').data('user-id');
        console.log(user);
        $.ajax({
            url: 'admin.php',
            type: 'POST',
            dataType: 'html',
            data: {
                "user-id": user
            },
        })
            .done(function () {
                console.log("success");
            })
            .fail(function () {
                console.log("error");
            })
            .always((response) => {
                console.log("complete");
            });
    });
});