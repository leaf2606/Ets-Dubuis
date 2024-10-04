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
                    <a href="index.php" class="logo">Accueil</a>
                </li>
                <li class="lien">
                    <ul class="menu-nav">
                        <li>
                            <a href="propos.php" class="lien-cote">À propos</a>
                        </li>
                        <li>
                            <a href="vetements.php" class="lien-cote">Vêtements</a>
                        </li>
                        <li class="has-sous-nav">
                            <a href="#" class="lien-cote">Matériels</a>
                            <ul class="sous-nav-1">
                                <li><a href="debrousailleuse.php">Débroussailleuse</a></li>
                                <li><a href="taille-haie.php">Taille Haie</a></li>
                                <li><a href="tronçonneuse.php">Tronçonneuse</a></li>
                                <li><a href="elagueur.php">Élagueuse</a></li>
                                <li><a href="souffleur.php">Souffleur</a></li>
                            </ul>
                        </li>
                        <li class="has-sous-nav">
                            <a href="#" class="lien-cote">Engins et Outils</a>
                            <ul class="sous-nav-2">
                                <li><a href="motos.php">Motos</a></li>
                                <li><a href="diesel.php">Véhicules Diesel</a></li>
                                <li><a href="essence.php">Véhicules Essence</a></li>
                            </ul>
                        </li>
                        <li>
                            <a href="contact.php" class="lien-cote">Contact</a>
                        </li>
                        <?php if ($loggedIn): ?>
                        <li>
                            <?php if (isset($_SESSION["compte"]["role"]) && $_SESSION["compte"]["role"] == "admin"): ?>
                            <a href="formulaire.php" class="lien-cote">Admin</a>
                            <?php else: ?>
                            <span class="lien-cote"><?= htmlspecialchars($_SESSION["compte"]["username"]); ?></span>
                            <?php endif; ?>
                        </li>
                        <li>
                            <a href="compte.php?action=deconnexion" class="lien-cote">Déconnexion</a>
                        </li>
                        <?php else: ?>
                        <li>
                            <a href="compte.php" class="lien-cote">Compte</a>
                        </li>
                        <?php endif; ?>
                    </ul>
                </li>
            </ul>
            <img src="../img/jour-et-nuit.png" alt="img" class="jour-nuit">
            <div class="burger-menu-button">
                <img src="../img/menu-burger.png" alt="menu-burger" class="burger-menu-button">
            </div>
        </div>

        <!-- Navbar pour la version mobile (burger menu) -->

        <div class="burger-menu-cote">
            <ul class="links">
                <li class="lien-cote"><a href="../index.php">Accueil</a></li>
                <li class="lien-cote"><a href="../propos.php">À propos</a></li>
                <li class="lien-cote"><a href="../vetements.php">Vêtements</a></li>
                <li class="lien-cote"><a href="#" class="sous-menu-toggle">Matériels</a>
                    <ul class="sous-nav-1">
                        <li><a href="debrousailleuse.php">Débroussailleuse</a></li>
                        <li><a href="taille-haie.php">Taille Haie</a></li>
                        <li><a href="tronçonneuse.php">Tronçonneuse</a></li>
                        <li><a href="elagueur.php">Élagueuse</a></li>
                        <li><a href="souffleur.php">Souffleur</a></li>
                    </ul>
                </li>
                <li class="lien-cote"><a href="#" class="sous-menu-toggle">Engins et Outils</a>
                    <ul class="sous-nav-2">
                        <li><a href="motos.php">Motos</a></li>
                        <li><a href="diesel.php">Véhicules Diesel</a></li>
                        <li><a href="essence.php">Véhicules Essence</a></li>
                    </ul>
                </li>

                <?php if (isset($_SESSION["compte"]["role"]) && $_SESSION["compte"]["role"] == "admin"): ?>
                <li class="lien-cote"><a href="../backend-ajout.php">Admin</a></li>
                <?php else: ?>
                <li class="lien-cote"><a href="../contact.php">Contact</a></li>
                <?php endif; ?>

                <?php if ($loggedIn): ?>
                <li class="lien-cote"><a href="#"><?= htmlspecialchars($_SESSION["compte"]["username"]); ?></a></li>
                <li class="lien-cote"><a href="../compte.php?action=deconnexion">Déconnexion</a></li>
                <?php else: ?>
                <li class="lien-cote"><a href="../compte.php">Compte</a></li>
                <?php endif; ?>
            </ul>
            <img src="../img/jour-nuit-essai.svg" alt="img" class="jour-nuit-svg">
        </div>
    </nav>


    <script>
    const burgerMenuButton = document.querySelector('.burger-menu-button img');
    const burgerMenu = document.querySelector('.burger-menu-cote');

    burgerMenuButton.onclick = function() {
        burgerMenu.classList.toggle('open');
    }
    </script>

    <script>
    const switchThemeBtn = document.querySelector('.jour-nuit');
    const switchThemeSvg = document.querySelector('.jour-nuit-svg');
    let toggleTheme = 0;

    switchThemeBtn.addEventListener('click', () => {
        if (toggleTheme === 0) {
            document.documentElement.style.setProperty('--ecriture', '#262626');
            document.documentElement.style.setProperty('--border', 'solid 2px black');
            document.documentElement.style.setProperty('--background', '#f1f1f1');
            toggleTheme++;
        } else {
            document.documentElement.style.setProperty('--ecriture', '#f1f1f1');
            document.documentElement.style.setProperty('--border', 'solid 2px white');
            document.documentElement.style.setProperty('--background', '#262626');
            toggleTheme--;
        }
    });
    </script>

    <!-- JS pour gérer les sous-nav au menu-burger  -->

    <script>
    const sousMenuToggles = document.querySelectorAll('.sous-menu-toggle');

    sousMenuToggles.forEach(toggle => {
        toggle.addEventListener('click', (event) => {
            event.preventDefault(); // Empêche le lien de naviguer
            const sousMenu = toggle.nextElementSibling; // Sélectionne le sous-menu suivant
            sousMenu.classList.toggle('open'); // Ajoute ou retire la classe 'open'
        });
    });
    </script>

</body>

</html>