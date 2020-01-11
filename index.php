<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <title>Bordeaux&Vous, votre agence événementielle à Bordeaux et en Gironde</title>
    <meta name="description" content="Bordeaux&Vous est une agence événementielle 
    qui propose diverses activités à Bordeaux et en Gironde" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/front.css" />
    <link href="https://fonts.googleapis.com/css?family=Nunito:400,700" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/5814eb4b63.js" crossorigin="anonymous"></script>
</head>

<body>
    <div id="bloc-page">

        <?php include("nav.php"); ?>

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
                    <div id="slider-container" class="col-lg-12 position-relative">
                        <div class="slide">
                            <p class="slide-text text-white">Jeu de Piste</p>
                            <img class="img-fluid" src="img/jeu-piste-bordeaux.jpg" alt="Jeu de Piste et d'Enquêtes sur Bordeaux et la Gironde">
                        </div>
                        <div class="slide">
                            <p class="slide-text text-white">Visite Guidée</p>
                            <img class="img-fluid" src="img/visite-guidee-bordeaux.jpg" alt="Visites historiques et insolites sur Bordeaux et la Gironde">
                        </div>
                        <div class="slide">
                            <p class="slide-text text-white">Team Building</p>
                            <img class="img-fluid" src="img/team-building-bordeaux.jpg" alt="Team Building et activités d'équipes sur Bordeaux et la Gironde">
                        </div>
                        <!-- buttons prev and next -->
                        <a href="#void" id="slider-prev" title="Image précédente">
                            <span class="fas fa-angle-left"></span>
                        </a>
                        <a href="#void" id="slider-next" title="Image suivante">
                            <span class="fas fa-angle-right"></span>
                        </a>
                        <!-- barre de progression -->
                        <div id="timeline-container">
                            <div id="timeline" data-percent="100%"></div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section id="section-presentation">
            <div class="container">
                <div class="row">
                    <div class="col-lg-10 offset-lg-1 text-center">
                        <p>
                            Bordeaux&Vous propose un large pannel d'<strong>activités</strong> sur <strong>Bordeaux</strong>
                            et la <strong>Gironde</strong> pour rendre vos <strong>événements</strong>
                            mémorables et remarqués : visites insolites, jeux d'enquêtes, team-building,
                            escape games et bien plus encore !
                        </p>
                        <span class="fas fa-fan mb-3"></span>
                        <p>
                            Nos <strong>activités</strong> s'adressent autant à un public adulte qu'aux groupes d'enfants.<br />
                            Nous travaillons avec des entreprises, des comités d'entreprise,
                            mais aussi des centres de loisirs et des écoles.
                        </p>
                        <span class="fas fa-fan mb-3"></span>
                        <p class="mb-5">
                            Vous souhaitez en savoir plus ou vous souhaitez réserver une <strong>activité</strong> ?<br />
                            Adressez-nous votre demande via notre
                            <a href="contact.php" title="Envoyez-nous un message">formulaire de contact</a>
                            et nous vous répondrons dans les plus brefs délais !
                        <p>
                    </div>
                </div>
            </div>
        </section>

        <?php include("footer.php"); ?>

        <script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
        </script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
        </script>
        <script type="text/javascript" src="js/slider.js"></script>
    </div>
</body>

</html>