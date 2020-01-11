<?php
session_start();
if (empty($_SESSION['role']) || $_SESSION['role'] !== 'admin') {
    header('Location: login.php');
    exit(); // stop right here
}

try {
    $bdd = new PDO('mysql:host=localhost;port=3308;dbname=modula;charset=utf8', 'root', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION)); // affiche des erreurs plus précises)
} catch (Exception $e) {
    die('Erreur : ' . $e->getMessage());
}

$messages = $bdd->query("SELECT id, email, 
DATE_FORMAT(dateMessage, '%d/%m/%Y') AS dateSend, 
DATE_FORMAT(timeMessage, '%H:%i:%s') AS timeSend
FROM message ORDER BY dateMessage, timeMessage DESC");

$message = null;

if (!empty($_POST['user-id'])) {
    $message = $bdd->prepare("SELECT id, name, firstName, email, message,
    DATE_FORMAT(dateMessage, '%d/%m/%Y') AS dateSend, 
    DATE_FORMAT(timeMessage, '%H:%i:%s') AS timeSend
    FROM message WHERE id = ?");
    $message->execute(array($_POST['user-id']));
}

?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <title>Tableau de Bord | Le site officiel de Bordeaux&Vous</title>
    <meta name="description" content="Votre tableau de bord" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/admin.css" />
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:400,700" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/5814eb4b63.js" crossorigin="anonymous"></script>
</head>

<body>
    <div id="bloc-page">

        <div class="container">
            <div class="jumbotron">
                <div class="d-flex flex-column flex-xl-row flex-wrap justify-content-between align-items-xl-center">
                    <h1 class="h1">Bienvenue sur votre tableau de bord ! </h1>
                    <a href="index.php" class="d-inline-block btn btn-outline-secondary" role="button">
                        Revenir sur le site
                    </a>
                </div>
                <hr class="my-4" />
                <p class="lead">
                    Vous retrouverez ici l'ensemble des formulaires de contact envoyés,
                    triés par date et heure d'envoi.
                </p>

            </div>
        </div>

        <div class="container mb-5">

            <h2>Les derniers messages</h2>

            <div class="table-responsive mb-5">
                <table class="table">
                    <thead class="thead-light">
                        <tr>
                            <th scope="col">Date</th>
                            <th scope="col">Heure</th>
                            <th scope="col">Email</th>
                            <th scope="col">En savoir plus</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        // open loop with php
                        while ($result = $messages->fetch()) {
                        ?>
                            <tr>
                                <th scope="row"><?= htmlspecialchars($result['dateSend']); ?></th>
                                <td><?= htmlspecialchars($result['timeSend']); ?></td>
                                <td><?= htmlspecialchars($result['email']); ?></td>
                                <td>
                                    <form action="" method="post">
                                        <input type="hidden" name="user-id" value="<?= htmlspecialchars($result['id']); ?>">
                                        <input class="btn btn-primary" type="submit" value="En savoir plus" name="submit">
                                    </form>
                                </td>
                            </tr>
                        <?php // end loop with php
                        }
                        ?>
                    </tbody>
                </table>
            </div>

            <?php if ($message) { ?>
                <h2>En détails</h2>

                <div class="table-responsive mb-5">
                    <table class="table">
                        <thead class="thead-light">
                            <tr>
                                <th scope="col">Nom</th>
                                <th scope="col">Prénom</th>
                                <th scope="col">Email</th>
                                <th scope="col">Date</th>
                                <th scope="col">Heure</th>
                                <th style="width : 50%" scope="col">Message</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            // open loop with php
                            while ($result = $message->fetch()) {
                            ?>
                                <tr>
                                    <th scope="row"><?= htmlspecialchars($result['name']); ?></th>
                                    <td><?= htmlspecialchars($result['firstName']); ?></td>
                                    <td><?= htmlspecialchars($result['email']); ?></td>
                                    <td><?= htmlspecialchars($result['dateSend']); ?></td>
                                    <td><?= htmlspecialchars($result['timeSend']); ?></td>
                                    <td><?= htmlspecialchars($result['message']); ?>
                                    </td>
                                </tr>
                            <?php // end loop with php
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            <?php } ?>

        </div>




        <script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
        </script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
        </script>
        <script type="text/javascript" src="js/admin.js"></script>
    </div>
</body>

</html>