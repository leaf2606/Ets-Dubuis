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
    <script src="js/script.js" defer></script>
    <title>Navbar</title>
</head>

<body>

    <header class="header-nav">

        <a href="index.php" class="logo-nav">Accueil</a>

        <div class="menu-burger">
            <img src="../img/menu-burger.png" alt="menu-burger" class="menu-burger">
        </div>

        <nav class="navbar">
            <ul class="ul-navbar">
                <li class="li-navbar"><a href="propos.php">A propos</a></li>
                <li class="li-navbar"><a href="">Matériels +</a>
                    <ul class="ul-sous-nav">
                        <li class="li-sous-nav"><a href="debrousailleuse.php">Débroussailleuse</a></li>
                        <li class="li-sous-nav"><a href="taille-haie.php">Taille Haie</a></li>
                        <li class="li-sous-nav"><a href="tronçonneuse.php">Tronçonneuse</a></li>
                        <li class="li-sous-nav"><a href="elagueur.php">Élagueuse</a></li>
                        <li class="li-sous-nav"><a href="souffleur.php">Souffleur</a></li>
                    </ul>
                </li>
                <li class="li-navbar"><a href="../vetements.php">Equipements</a></li>
                <li class="li-navbar"><a href="">Engins +</a>
                    <ul class="ul-sous-nav">
                        <li class="li-sous-nav"><a href="motos.php">Motos</a></li>
                        <li class="li-sous-nav"><a href="diesel.php">Véhicules Diesel</a></li>
                        <li class="li-sous-nav"><a href="essence.php">Véhicules Essence</a></li>
                    </ul>
                </li>
                <li class="li-navbar"><a href="contact.php">Contact</a></li>
                <?php if ($loggedIn): ?>
                <li class="li-navbar">
                    <?php if (isset($_SESSION["compte"]["role"]) && $_SESSION["compte"]["role"] == "admin"): ?>
                    <a href="formulaire.php">Admin</a>
                    <?php else: ?>
                    <span class="nav-span"><?= htmlspecialchars($_SESSION["compte"]["username"]); ?></span>
                    <?php endif; ?>
                </li>
                <li class="li-navbar">
                    <a href="compte.php?action=deconnexion">Déconnexion</a>
                </li>
                <?php else: ?>
                <li class="li-navbar">
                    <a href="compte.php">Compte</a>
                </li>
                <?php endif; ?>
                <li class="lien-img-navbar"><img class="img-jour-nuit" src="../img/jour-nuit-essai.svg"
                        alt="image-jour-nuit"></li>
            </ul>

            <div class="changeTheme"></div>
        </nav>

    </header>

</body>

</html>