$(document).ready(function () {

    $.validator.addMethod("mailverified", function (value, element, params) {
        let pattern = new RegExp(/^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/);
        return pattern.test(value);
    }, "Veuillez saisir une adresse mail valide");

    // la méthode principale de jQuery validation plugin
    $('#form-contact').validate({
        rules: {
            "form-mail": {
                required: true,
                mailverified: true, // remplace la propriété mail
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
            },
            "request-check": {
                required: true
            }
        },
        messages: {
            "email": {
                required: "Veuillez saisir votre adresse mail",
                email: "Veuillez saisir une adresse mail valide",
                mailverified: "Veuillez saisir une adresse mail valide", // remplace la propriété mail
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
            },
            "request-check": {
                required: "Veuillez confirmer votre demande"
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
                    "request-check": $('#request-rgpd').is(':checked'),
                    "request-rgpd": $('#request-rgpd').is(':checked'),
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
                    // display modal of success
                    $('#mail-success').modal('toggle');
                    // remove values
                    $('#form-firstname').val('');
                    $('#form-name').val('');
                    $('#form-mail').val('');
                    $('#form-message').val('');
                    $('#request-rgpd').prop('checked', false);
                    $('#request-check').prop('checked', false);
                });
            return false; // required to block normal submit since you used ajax
        }
    });
});