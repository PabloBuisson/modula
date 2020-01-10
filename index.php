<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <title>Bordeaux&Vous, votre agence événementielle à Bordeaux et en Gironde</title>
    <meta name="description" content="Bordeaux&Vous est une agence événementielle 
    qui propose diverses activités à Bordeaux et en Gironde" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/style.css" />
    <link href="https://fonts.googleapis.com/css?family=Nunito:400,700" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/5814eb4b63.js" crossorigin="anonymous"></script>
</head>

<body>
    <div id="bloc_page">

        <nav id="navbar-example2" class="navbar navbar-expand-md navbar-dark bg-dark fixed-top">
            <!-- le navbar-expand-md permet de décider quand le menu collapse -->
            <div class="container">
                <a class="navbar-brand text-white-50 text-uppercase" href="index.php">
                    Bordeaux&Vous</a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarToggler" aria-controls="navbarToggler" aria-expanded="false" aria-label="Toggle navigation"> <span class="navbar-toggler-icon"></span></button>
                <ul class="nav collapse navbar-collapse flex-sm-column flex-md-row justify-content-md-end 
                align-items-sm-start" id="navbarToggler">
                    <li class="nav-item">
                        <a class="nav-link text-white text-uppercase" href="index.php">
                            Accueil</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white text-uppercase" href="contact.php">
                            Contact</a>
                    </li>
                    <?php // if ($connected) { 
                    ?>
                    <li class="nav-item">
                        <a class="nav-link text-white text-uppercase" href="admin.php">
                            <span class="fas fa-user-circle"></span> Admin</a>
                    </li>
                    <?php
                    //}
                    ?>
                </ul>
            </div>
        </nav>

        <header>
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 text-center">
                        <h1 class="d-inline-block position-relative">
                            Bienvenue sur le site de Bordeaux&Vous
                        </h1>
                    </div>
                </div>
                <div id="row-h2" class="row">
                    <div class="col-lg-8 offset-lg-2 text-center">
                        <h2 class="text-center mb-5">
                            Nous proposons pour vos événements un large choix d'activités,
                            encadrés par des professionnels confirmés
                        </h2>
                        <span class="fas fa-chevron-down"></span>
                    </div>
                </div>
            </div>
        </header>

        <section id="section-slider">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 text-center">
                        Mon diaporama ici !
                    </div>
                </div>
            </div>
        </section>

        <section id="section-presentation">
            <div class="container">
                <div class="row">
                    <div class="col-lg-10 offset-lg-1 text-center">
                        <p>
                            Bordeaux&Vous propose un large pannel d'activités pour rendre vos événements
                            mémorables et remarqués : visites insolites, jeux d'enquêtes, team-building,
                            escape games et bien plus encore !
                        </p>
                        <p>
                            Nos activités s'adressent autant à un public adulte qu'aux groupes d'enfants.<br />
                            Nous travaillons avec des entreprises, des comités d'entreprise,
                            mais aussi des centres de loisirs et des écoles.
                        <p>
                        <p>
                            Vous souhaitez en savoir plus ou vous souhaitez réserver une activité ?<br />
                            Adressez-nous votre demande via notre 
                            <a href="contact.php" title="Envoyez-nous un message">formulaire de contact</a>
                            et nous vous répondrons dans les plus brefs délais !
                        <p>
                    </div>
                </div>
            </div>
        </section>
        
        <footer>
            <div class="container">
                <div class="row">
                    <div class="text-center mb-5 col-8 offset-2 text-md-left col-md-4 offset-md-0">
                        <h5 class="text-uppercase">Plan du site</h5>
                        <div>
                            <a href="index.php" class="text-white">Accueil</a><br />
                            <a href="contact.php" class="text-white">Contact</a>
                        </div>
                    </div>
                    <div class="text-center mb-5 col-8 offset-2 text-md-left col-md-4 offset-md-0">
                        <h5 class="text-uppercase">Nous retrouver sur</h5>
                        <div>
                            <a href="https://www.facebook.com/pabloush.page/" 
                            title="Page Facebook de l'agence Bordeaux&Vous" 
                            class="text-white"><span class="fab fa-facebook-square logo"></span>
                            Facebook</a><br />
                            <a href="https://twitter.com/pablobuisson" 
                            title="Compte Twitter de l'agence Bordeaux&Vous" 
                            class="text-white"><span class="fab fa-twitter-square logo"></span>
                            Twitter</a><br />
                        </div>
                    </div>
                    <div class="text-center mb-5 col-8 offset-2 text-md-left col-md-4 offset-md-0">
                        <h5 class="text-uppercase">Admin</h5>
                        <div>
                            <a href="admin.php" class="text-white">Se connecter</a>
                        </div>
                    </div>
                </div>
            </div>
        </footer>



        <script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
        </script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
        </script>
        <script type="text/javascript" src="js/slider.js"></script>
    </div>
</body>

</html>