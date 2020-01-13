$(document).ready(function () {

    // if the details of the message are displayed
    if ($('#title-details').length) {
        $('html, body').animate({
            scrollTop: $('#title-details').offset().top
        }, 1000);
    }
    
});