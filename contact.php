<?php
session_start();
$error = null;

if (!empty($_POST)) {

    $validation = true;

    if (empty($_POST['firstName']) || empty($_POST['name']) || empty($_POST['email']) || empty($_POST['message'])) {
        $validation = false;
        $error = 'un champ est vide';
    }
    if ($_POST['firstName'] > 100 || $_POST['name'] > 100) {
        $validation = false;
        $error = 'un champ est trop long';
    }
    if (!preg_match("#^[a-z0-9._-]+@[a-z0-9._-]{2,}\.[a-z]{2,4}$#", $_POST['email'])) {
        $validation = false;
        $error = 'mail incompatible';
    }

    try {
        $bdd = new PDO('mysql:host=localhost;port=3308;dbname=modula;charset=utf8', 'root', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION)); // affiche des erreurs plus précises)
    } catch (Exception $e) {
        die('Erreur : ' . $e->getMessage());
    }

    $query = $bdd->query("SELECT * FROM captcha");
    $captcha = $query->fetch();

    // verify reCaptcha
    $secret = $captcha['secretKey'];
    $response = $_POST["captcha"];
    $verify = file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret={$secret}&response={$response}");
    $captcha_success = json_decode($verify);

    if ($captcha_success->success == false) {
        $validation = false;
        $error = 'vérification manquante';
        // AJAX callback
        echo 'Erreur : vérification manquante';
        exit();
    }

    if ($validation) {
        
        // 0 = user decline the use of his data
        // 1 = user ok with the use of his data
        $rgpd = 0;
        if ($_POST['request-rgpd'] === "true") {
            $rgpd = 1;
        }

        // ONLINE SOLUTION FOR IP ADRESS
        /* function getClientIpServer()
        {
            $ipAdress = '';
            if ($_SERVER['HTTP_CLIENT_IP'])
                $ipAdress = $_SERVER['HTTP_CLIENT_IP'];
            else if ($_SERVER['HTTP_X_FORWARDED_FOR'])
                $ipAdress = $_SERVER['HTTP_X_FORWARDED_FOR'];
            else if ($_SERVER['HTTP_X_FORWARDED'])
                $ipAdress = $_SERVER['HTTP_X_FORWARDED'];
            else if ($_SERVER['HTTP_FORWARDED_FOR'])
                $ipAdress = $_SERVER['HTTP_FORWARDED_FOR'];
            else if ($_SERVER['HTTP_FORWARDED'])
                $ipAdress = $_SERVER['HTTP_FORWARDED'];
            else if ($_SERVER['REMOTE_ADDR'])
                $ipAdress = $_SERVER['REMOTE_ADDR'];
            else
                $ipAdress = 'UNKNOWN';

            return $ipAdress;
        }

        $ipAdress = getClientIpServer(); */

        $query = $bdd->prepare("INSERT INTO message(name, firstName, email, message, rgpd, dateMessage, timeMessage, ip) 
        VALUES(:name, :firstName, :email, :message, :rgpd, CURDATE(), CURTIME(), :ip)");
        $query->execute(array(
            'name' => $_POST['name'],
            'firstName' => $_POST['firstName'],
            'email' => $_POST['email'],
            'message' => $_POST['message'],
            'rgpd' => $rgpd,
            'ip' => $_POST['ip']
        ));
    }


    if ($validation) {
        $to = "pablo.buisson@gmail.com";
        $subject = "Nouveau message depuis bordeaux-et-vous.com";
        $securedMessage = htmlspecialchars($_POST['message']);
        // Si les lignes ont plus de 70 cactères, on utilise wordwrap()
        $message = wordwrap($securedMessage, 70, "\r\n");
        $headers = "From:" . htmlspecialchars($_POST['firstName']) . " " . htmlspecialchars($_POST['name']) . "<" . htmlspecialchars($_POST['email']) . ">\r\n";
        $headers .= "Reply-to:" . htmlspecialchars($_POST['email']) . "\r\n";
        $headers .= "Content-type: text/html\r\n";
        $success = mail($to, $subject, $message, $headers);

        if (!$success) {
            $errorMessage = error_get_last()['message'];
            print_r(error_get_last());
            echo '<p class="text-danger">Problème d\'envoi</p>';
        }
    }
}
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <title>Contactez-nous | Le site officiel de Bordeaux&Vous</title>
    <meta name="description" content="Vous recherchez une information, 
    vous souhaitez réserver une activité ? 
    Contactez-nous en remplissant notre formulaire de contact." />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/front.css" />
    <link rel="stylesheet" href="css/contact.css" />
    <link href="https://fonts.googleapis.com/css?family=Nunito:400,700" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/5814eb4b63.js" crossorigin="anonymous"></script>
    <script type="text/javascript">
        var onloadCallback = function() {
            grecaptcha.render('captcha-widget', {
                'sitekey': "6LeIK88UAAAAAIe_PpJz_BoSqpnExKJK27B9WF4H"
            });
        };
    </script>
</head>

<body>
    <div id="bloc-page">

        <?php include("nav.php"); ?>

        <header id="contact-header">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 text-center">
                        <h1 class="display-4 main-title text-center d-inline-block position-relative">
                            Contactez-nous
                        </h1>
                    </div>
                    <div class="col-lg-10 offset-lg-1 col-xl-8 offset-xl-2 text-center">
                        <p id="text-form" class="text-center">
                            Adressez votre demande via le formulaire de contact ci-dessous et
                            nous vous répondrons dans les plus brefs délais !
                        </p>
                    </div>
                </div>
            </div>
        </header>

        <!-- modal alert after successful send -->
        <div class="modal fade" id="mail-success" tabindex="-1" role="dialog" aria-labelledby="votre mail a bien été envoyé" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="modalAlertEmail">Message bien envoyé !</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Fermer">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary close-button" data-dismiss="modal">Fermer</button>
                    </div>
                </div>
            </div>
        </div>

        <section id="contact-form">
            <div class="container bg-dark">
                <div class="row">
                    <div class="px-sm-5 px-lg-0 col-lg-10 offset-lg-1 mb-5 mt-5">
                        <p id="error-ajax" class="text-center text-danger my-5"></p>
                        <?php if ($error) { ?> <p class="text-center text-danger my-5">Message d'erreur : <?= $error ?></p> <?php } ?>
                        <h5 class="text-center mt-5 mb-5 text-white">Formulaire de contact</h5>
                        <form id="form-contact" action="" method="post">
                            <div class="form-row">
                                <div class="form-group col-12 col-md-6">
                                    <label for="form-firstname" class="text-white">Votre prénom</label>
                                    <input type="text" class="form-control" name="firstName" id="form-firstname" placeholder="Prénom" required>
                                </div>
                                <div class="form-group col-12 col-md-6">
                                    <label for="form-name" class="text-white">Votre nom</label>
                                    <input type="text" class="form-control" name="name" id="form-name" placeholder="Nom" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="form-mail" class="text-white">Votre adresse e-mail</label>
                                <input type="email" class="form-control" name="email" id="form-mail" placeholder="votre_adresse@mail.com" required>
                            </div>
                            <div class="form-group">
                                <label for="form-message" class="text-white mt-2">Votre message</label>
                                <textarea class="form-control" name="message" id="form-message" rows="3" placeholder="Votre message" required></textarea>
                            </div>
                            <div class="form-group mt-5 mb-3">
                                <div class="col-md-8 offset-md-4" id="captcha-widget"></div>
                            </div>
                            <div class="form-check text-center mt-4">
                                <input class="form-check-input" type="checkbox" name="request-rgpd" id="request-rgpd">
                                <label class="form-check-label text-white" for="request-rgpd">
                                    J'accepte que Bordeaux&Vous conserve mes données <small>(qui ne seront ni vendues
                                        ni utilisées à des fins commerciales)</small>
                                </label>
                            </div>
                            <div class="col-lg-12 text-center">
                                <button id="form-submit" type="submit" class="btn btn-primary mt-4 px-4">Envoyer</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>

        <?php include("footer.php"); ?>

        <script src="https://www.google.com/recaptcha/api.js?onload=onloadCallback&render=explicit" async defer></script>
        <script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
        </script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
        </script>
        <script type="text/javascript" src="js/contact.js"></script>
    </div>
</body>

</html>