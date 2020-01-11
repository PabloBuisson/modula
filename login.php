<?php
session_start();
$error = null;

if (!empty($_POST)) { // if form is sent

    $validation = true;

    if (empty($_POST['login']) || empty($_POST['password'])) {
        $validation = false;
        $error = 1;
    }
    if (strlen($_POST['login']) > 100 || strlen($_POST['password']) > 100) {
        $validation = false;
        $error = 1;
    }
    if ($validation) {
        $verifiedAdmin = password_verify($_POST['login'], '$2y$10$CZojDjdI6/YIhQtne0oby..JdEAOZUXkk0qUDFkxQLAl22AKO0xxi');
        $verifiedPassword = password_verify($_POST['password'], '$2y$10$CZojDjdI6/YIhQtne0oby..JdEAOZUXkk0qUDFkxQLAl22AKO0xxi');
        
        if ($verifiedAdmin && $verifiedPassword) {
            $_SESSION['role'] = 'admin';
            header('Location: admin.php');
        } else {
            $error = 1;
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
    <link rel="stylesheet" href="css/login.css" />
    <link href="https://fonts.googleapis.com/css?family=Nunito:400,700" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/5814eb4b63.js" crossorigin="anonymous"></script>
</head>

<body>
    <div id="bloc-page">

        <?php include("nav.php"); ?>

        <section id="login-form">

            <div class="container">
                <div class="row">
                    <div class="col-md-8 offset-md-2 col-lg-6 offset-lg-3 login-content pb-5 px-5">
                        <form id="form-login" action="" method="post">
                            <div class="form-group mt-5">
                                <?php if ($error) { 
                                ?>
                                <p class="text-center text-danger mt-3">
                                    Mauvais identifiant ou mot de passe.
                                    Veuillez réessayer à nouveau.
                                </p>
                                <?php } 
                                ?>
                                <label for="pseudo" class="text-white">Identifiant</label><br />
                                <input type="text" value="" class="form-control" name="login" id="pseudo" placeholder="Veuillez saisir votre identifiant" required>
                            </div>
                            <div class="form-group">
                                <label for="password" class="text-white">Mot de passe</label>
                                <input type="password" value="" class="form-control" name="password" id="password" placeholder="Veuillez saisir votre mot de passe" required>
                            </div>
                            <div class="text-center">
                                <button type="submit" class="btn btn-primary mt-3 float-none float-md-right">Se connecter</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

        </section>

        <?php include("footer.php"); ?>

        <script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
        </script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
        </script>
        <script type="text/javascript" src="js/login.js"></script>
    </div>
</body>

</html>