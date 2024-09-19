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
    <link rel="stylesheet" href="css/contact.css">
    <title>Navbar</title>
</head>

<body>

    <nav>
        <div class="navbar-cote">
            <ul class="links">
                <a href="../index.php" class="logo">Accueil</a>
                <div class="lien">
                    <ul class="menu-nav">
                        <li><a href="../propos.php" class="lien-cote">A propos</a></li>
                        <li class="has-sous-nav">
                            <a href="#" class="lien-cote">Equipements</a>
                            <ul class="sous-nav">
                                <li><a href="">Gants</a></li>
                                <li><a href="">Casques</a></li>
                                <li><a href="">Blousons</a></li>
                            </ul>
                        </li>
                        <ul class="menu-nav">
                            <li class="has-sous-nav">
                                <a href="#" class="lien-cote">Pièces</a>
                                <ul class="sous-nav-1">
                                    <li><a href="">Pièces</a></li>
                                    <li><a href="">Pièces</a></li>
                                    <li><a href="">Pièces</a></li>
                                </ul>
                            </li>
                            <ul class="menu-nav">
                                <li class="has-sous-nav">
                                    <a href="#" class="lien-cote">Engins et Outils</a>
                                    <ul class="sous-nav-2">
                                        <li><a href="">Outils</a></li>
                                        <li><a href="">Engins</a></li>
                                        <li><a href=""> Outils</a></li>
                                    </ul>
                                </li>
                                <li><a href="../contact.php" class="lien-cote">Contact</a></li>
                                <?php if ($loggedIn): ?>
                                <li><a href="#" class="lien-cote">
                                        <?= htmlspecialchars($_SESSION["compte"]["username"]); ?></a></li>
                                <li><a href="../compte.php?action=deconnexion" class="lien-cote">Déconnexion</a></li>

                                <?php else: ?>
                                <li><a href="../compte.php" class="lien-cote">Compte</a></li>
                </div>
                <?php endif; ?>
            </ul>

            <div class="burger-menu-button">
                <img src="../img/menu-burger.png" alt="menu-burger" class="burger-menu-button">
            </div>
            </ul>
        </div>
        <div class="burger-menu-cote">
            <ul class="links">
                <li class="lien-cote"><a href="">Accueil</a></li>
                <li class="lien-cote"><a href="">Equipements</a></li>
                <li class="lien-cote"><a href="">Pièces</a></li>
                <li class="lien-cote"><a href="">Engins et Outils</a></li>
                <li class="lien-cote"><a href="">Contact</a></li>
                <?php if ($loggedIn): ?>
                <li class="lien-cote"><a href="#"><?= htmlspecialchars($_SESSION["compte"]["username"]); ?></a></li>
                <li class="lien-cote"><a href="../compte.php?action=deconnexion">Déconnexion</a></li>
                <?php else: ?>
                <li class="lien-cote"><a href="../compte.php">Compte</a></li>
                <?php endif; ?>
            </ul>
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

</body>

</html>