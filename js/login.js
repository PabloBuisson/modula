$(document).ready(function () {

    // main method of jQuery validation plugin
    $('#form-login').validate({
        rules: {
            "username": {
                required: true
            },
            "password": {
                required: true
            }
        },
        messages: {
            "username": {
                required: "Veuillez saisir votre pseudo"
            },
            "password": {
                required: "Veuillez saisir votre mot de passe"
            }
        }
    });

});