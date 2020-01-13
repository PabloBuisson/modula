$(document).ready(function () {

    // la méthode principale de jQuery validation plugin
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