$(document).ready(function () {

    // get user IP
    let ipAdress = '';
    $.getJSON('https://json.geoiplookup.io/api?callback=?', function (data) {
        ipAdress = data.ip;
    });

    // validator for email
    $.validator.addMethod("mailverified", function (value, element, params) {
        let pattern = new RegExp(/^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/);
        return pattern.test(value);
    }, "Veuillez saisir une adresse mail valide");

    // main method of jQuery validation plugin
    $('#form-contact').validate({
        rules: {
            "form-mail": {
                required: true,
                mailverified: true, // replace mail property
                minlength: 3,
                maxlength: 100
            },
            "form-firstname": {
                required: true,
                maxlength: 255
            },
            "form-name": {
                required: true,
                maxlength: 255
            },
            "form-message": {
                required: true
            }
        },
        messages: {
            "email": {
                required: "Veuillez saisir votre adresse mail",
                email: "Veuillez saisir une adresse mail valide",
                mailverified: "Veuillez saisir une adresse mail valide", // replace mail property
                minlength: "Veuillez saisir une adresse mail valide",
                maxlength: "Veuillez saisir une adresse mail valide"
            },
            "firstName": {
                required: "Veuillez saisir votre prénom",
                maxlength: "Veuillez saisir un prénom moins long"
            },
            "name": {
                required: "Veuillez saisir votre nom",
                maxlength: "Veuillez saisir un nom moins long"
            },
            "message": {
                required: "Veuillez saisir votre message"
            }
        },
        submitHandler: function (form) {
            $.ajax({
                url: 'contact.php',
                type: 'POST',
                dataType: 'html',
                data: {
                    firstName: $('#form-firstname').val(),
                    name: $('#form-name').val(),
                    email: $('#form-mail').val(),
                    message: $('#form-message').val(),
                    captcha: grecaptcha.getResponse(),
                    "request-rgpd": $('#request-rgpd').is(':checked'),
                    ip: ipAdress
                },
            })
                .done(function () {
                    console.log("success");
                })
                .fail(function () {
                    console.log("error");
                    $('#modalAlertEmail').text("Erreur lors de l'envoi, veuillez réessayer.");
                    $('#mail-success').prop('aria-labelledby', 'Votre mail a rencontré une erreur.');
                    $('#mail-success').modal('toggle');
                })
                .always((response) => {
                    console.log("complete");
                    if (response) {
                        console.log(response);
                    } else {
                       // display modal of success
                        $('#mail-success').modal('toggle');
                        // remove values
                        $('#form-firstname').val('');
                        $('#form-name').val('');
                        $('#form-mail').val('');
                        $('#form-message').val('');
                        $('#request-rgpd').prop('checked', false);
                        $('#request-check').prop('checked', false); 
                    }
                });
            return false; // required to block normal submit since ajax is used
        }
    });
});