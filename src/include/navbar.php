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

    <header class="header-nav">

        <a href="index.php" class="logo-nav">Accueil</a>

        <div class="menu-burger">
            <img src="../img/menu-burger.png" alt="menu-burger" class="menu-burger">
        </div>

        <nav class="navbar">
            <ul>
                <li><a href="propos.php">A propos</a></li>
                <li><a href="">Matériels +</a>
                    <ul>
                        <li><a href="debrousailleuse.php">Débroussailleuse</a></li>
                        <li><a href="taille-haie.php">Taille Haie</a></li>
                        <li><a href="tronçonneuse.php">Tronçonneuse</a></li>
                        <li><a href="elagueur.php">Élagueuse</a></li>
                        <li><a href="souffleur.php">Souffleur</a></li>
                    </ul>
                </li>
                <li><a href="../vetements.php">Vêtements</a></li>
                <li><a href="">Engins +</a>
                    <ul>
                        <li><a href="motos.php">Motos</a></li>
                        <li><a href="diesel.php">Véhicules Diesel</a></li>
                        <li><a href="essence.php">Véhicules Essence</a></li>
                    </ul>
                </li>
                <li><a href="contact.php">Contact</a></li>
                <?php if ($loggedIn): ?>
                <li>
                    <?php if (isset($_SESSION["compte"]["role"]) && $_SESSION["compte"]["role"] == "admin"): ?>
                    <a href="formulaire.php">Admin</a>
                    <?php else: ?>
                    <span class="nav-span"><?= htmlspecialchars($_SESSION["compte"]["username"]); ?></span>
                    <?php endif; ?>
                </li>
                <li>
                    <a href="compte.php?action=deconnexion">Déconnexion</a>
                </li>
                <?php else: ?>
                <li>
                    <a href="compte.php">Compte</a>
                </li>
                <li class="lien-img-navbar"><img class="img-jour-nuit" src="../img/jour-nuit-essai.svg"
                        alt="image-jour-nuit"></li>
                <?php endif; ?>
            </ul>

            <div class="changeTheme"></div>

        </nav>

    </header>

    <!-- JS pour l'animation jour / nuit  -->

    <script>
    const switchThemeBtn = document.querySelector('.img-jour-nuit');
    let toggleTheme;

    // Vérifie si un thème est enregistré dans LocalStorage, sinon par défaut au mode jour
    if (localStorage.getItem('theme') === 'dark') {
        toggleTheme = 1;
    } else {
        toggleTheme = 0;
    }

    // Fonction pour appliquer le thème
    function applyTheme() {
        if (toggleTheme === 1) {
            // Mode nuit
            document.documentElement.style.setProperty('--primary-text-color', 'white');
            document.documentElement.style.setProperty('--secondary-text-color', 'black');
            document.documentElement.style.setProperty('--background-color-main', '#262626');
            document.documentElement.style.setProperty('--background-color-secondary', 'black');
            document.documentElement.style.setProperty('--background-color-tertiary', '#1a1a1a');
            document.documentElement.style.setProperty('--primary-border-solid', 'black');
            localStorage.setItem('theme', 'dark');
        } else {
            // Mode jour
            document.documentElement.style.setProperty('--primary-text-color', 'black');
            document.documentElement.style.setProperty('--secondary-text-color', 'white');
            document.documentElement.style.setProperty('--background-color-main', 'white');
            document.documentElement.style.setProperty('--background-color-secondary', '#262626');
            document.documentElement.style.setProperty('--background-color-tertiary', 'black');
            document.documentElement.style.setProperty('--secondary-border-solid', 'white');
            localStorage.setItem('theme', 'light');
        }
    }

    // Applique le thème dès le chargement de la page
    applyTheme();

    // Changement de thème lors du clic sur le bouton
    switchThemeBtn.addEventListener('click', () => {
        toggleTheme = toggleTheme === 0 ? 1 : 0;
        applyTheme();
    });
    </script>

    <!-- JS pour le menu burger  -->

    <script>
    const burgerMenuButton = document.querySelector('.menu-burger img');
    const burgerMenu = document.querySelector('.menu-burger');
    const navbar = document.querySelector('.navbar');

    burgerMenuButton.onclick = function() {
        burgerMenu.classList.toggle('open');
        navbar.classList.toggle('open');
    }
    </script>

</body>

</html>