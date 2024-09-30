<?php

require_once("connect.php");

$loggedIn = isset($_SESSION["compte"]);

?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/navbar.css">
    <link rel="stylesheet" href="css/propos.css">
    <link rel="stylesheet" href="css/contact.css">
    <title>Navbar</title>
</head>

<body>


    <nav>
        <div class="navbar-cote">
            <ul class="links">
                <li>
                    <a href="../index.php" class="logo padding-20">Accueil</a>
                </li>
                <li class="lien">
                    <ul class="menu-nav">
                        <li>
                            <a href="../propos.php" class="lien-cote padding-20">À propos</a>
                        </li>
                        <li>
                            <a href="../vetements.php" class="lien-cote padding-20">Vêtements</a>
                        </li>
                        <li class="has-sous-nav">
                            <a href="#" class="lien-cote padding-20">Matériels</a>
                            <ul class="sous-nav-1">
                                <li><a href="../debrousailleuse.php">Débroussailleuse</a></li>
                                <li><a href="../taille-haie.php">Taille Haie</a></li>
                                <li><a href="../tronçonneuse.php">Tronçonneuse</a></li>
                                <li><a href="../elagueur.php">Élagueuse</a></li>
                                <li><a href="../souffleur.php">Souffleur</a></li>
                            </ul>
                        </li>
                        <li class="has-sous-nav">
                            <a href="#" class="lien-cote padding-20">Engins et Outils</a>
                            <ul class="sous-nav-2">
                                <li><a href="../motos.php">Motos</a></li>
                                <li><a href="../diesel.php">Véhicules Diesel</a></li>
                                <li><a href="../essence.php">Véhicules Essence</a></li>
                            </ul>
                        </li>
                        <li>
                            <a href="../contact.php" class="lien-cote padding-20">Contact</a>
                        </li>

                        <?php if ($loggedIn): ?>
                        <li>
                            <?php if (isset($_SESSION["compte"]["role"]) && $_SESSION["compte"]["role"] == "admin"): ?>
                            <a href="../backend-ajout.php" class="lien-cote padding-admin">Admin</a>
                            <?php else: ?>
                            <span class="lien-cote"
                                style="padding: 0;"><?= htmlspecialchars($_SESSION["compte"]["username"]); ?></span>
                            <?php endif; ?>
                        </li>
                        <li>
                            <a href="../compte.php?action=deconnexion" class="lien-cote padding-5">Déconnexion</a>
                        </li>
                        <?php else: ?>
                        <li>
                            <a href="../compte.php" class="lien-cote padding-5">Compte</a>
                        </li>
                        <?php endif; ?>
                    </ul>
                </li>
            </ul>
            <img src="../img/jour-et-nuit.png" alt="img" class="jour-nuit">
            <!-- <div id="changeur">
                <div class="cercle"></div>
            </div> -->
            <div class="burger-menu-button">
                <img src="../img/menu-burger.png" alt="menu-burger" class="burger-menu-button">
            </div>
        </div>
        <div class="burger-menu-cote">
            <ul class="links">
                <li class="lien-cote padding-20"><a href="../index.php">Accueil</a></li>
                <li class="lien-cote padding-20"><a href="../propos.php">À propos</a></li>
                <li class="lien-cote padding-20"><a href="../vetements.php">Vêtements</a></li>
                <li class="lien-cote padding-20"><a href="#">Matériels</a></li>
                <li class="lien-cote padding-20"><a href="#">Engins et Outils</a></li>

                <?php if (isset($_SESSION["compte"]["role"]) && $_SESSION["compte"]["role"] == "admin"): ?>
                <li class="lien-cote padding-20"><a href="../backend-ajout.php">Admin</a></li>
                <?php else: ?>
                <li class="lien-cote padding-20"><a href="../contact.php">Contact</a></li>
                <?php endif; ?>

                <?php if ($loggedIn): ?>
                <li class="lien-cote padding-30"><a href="#"
                        style="padding-left: 25px;"><?= htmlspecialchars($_SESSION["compte"]["username"]); ?></a></li>
                <li class="lien-cote padding-30"><a href="../compte.php?action=deconnexion"
                        style="padding-left: 20px;">Déconnexion</a></li>
                <?php else: ?>
                <li class="lien-cote padding-20"><a href="../compte.php">Compte</a></li>
                <?php endif; ?>
            </ul>

            <img src="../img/jour-nuit-essai.svg" alt="img" class="jour-nuit-svg">
        </div>
    </nav>

    <!-- Menu burger  -->

    <script>
    const burgerMenuButton = document.querySelector('.burger-menu-button img');
    const burgerMenu = document.querySelector('.burger-menu-cote');

    burgerMenuButton.onclick = function() {
        burgerMenu.classList.toggle('open');
    }
    </script>

    <!-- Menu Jour et Nuit -->
    <script>
    const switchThemeBtn = document.querySelector('.jour-nuit')
    const switchThemeBtn = document.querySelector('.jour-nuit-svg')
    let toggleTheme = 0;

    switchThemeBtn.addEventListener('click', () => {
        if (toggleTheme === 0) {
            document.documentElement.style.setProperty('--ecriture', '#262626');
            document.documentElement.style.setProperty('--border', 'solid 2px black');
            document.documentElement.style.setProperty('--background', '#f1f1f1');
            toggleTheme++;
        } else {
            document.documentElement.style.setProperty('--ecriture', '#f1f1f1');
            document.documentElement.style.setProperty('--border1', 'solid 2px white');
            document.documentElement.style.setProperty('--background', '#262626');
            toggleTheme--;
        }
    })
    const changeur = document.getElementById('changeur');
    const body = document.getElementById('body');

    changeur.onclick = function() {
        changeur.classList.toggle('active')
        body.classList.toggle('active')
    }
    </script>

</body>

</html>