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