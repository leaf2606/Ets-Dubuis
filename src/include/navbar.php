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
                    <span><?= htmlspecialchars($_SESSION["compte"]["username"]); ?></span>
                    <?php endif; ?>
                </li>
                <li>
                    <a href="compte.php?action=deconnexion">Déconnexion</a>
                </li>
                <?php else: ?>
                <li>
                    <a href="compte.php">Compte</a>
                </li>
                <?php endif; ?>
            </ul>
        </nav>

    </header>

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