<?php

session_start();

require_once("connect.php");

$sql = "SELECT * FROM catalogue";
$query = $db->prepare($sql);
$query->execute();
$catalogue = $query->fetchAll(PDO::FETCH_ASSOC);
    
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/materiels.css">
    <link rel="stylesheet" href="css/font.css">
    <link rel="stylesheet" href="css/vetements.css">
    <link rel="stylesheet" href="css/backend.css">
    <title>Débrousailleuse</title>
</head>

<body>

    <?php include_once("./include/navbar.php"); ?> <br>

    <h1 class="titre-categorie">Véhicules moteur Diesel</h1>

    <div id="news-lien-id">
        <div class="lien-news-2">
            <button class="lien-nouveautes" onclick="openTab('terre')">Travail de la terre</button>
            <button class="lien-nouveautes" onclick="openTab('vegetation')">Végétation</button>
            <button class="lien-nouveautes" onclick="openTab('gazon')">Gazon</button>
            <button class="lien-nouveautes" onclick="openTab('grands')">Grands espaces</button>
        </div>
    </div>

    <!-- Card  -->

    <?php if (isset($_SESSION['compte']) && $_SESSION['compte']['role'] === 'admin'): ?>
    <a class="button-back-1" href="formulaire.php">Ajouter un article</a>
    <?php endif; ?>

    <div id="terre" class="card-container">
        <div class="wrapper-vetements">
            <div class="card-area">
                <div class="box-area">
                    <?php foreach ($catalogue as $item): ?>
                    <?php if ($item['category'] === 'terre'): ?>
                    <div class="box">
                        <img class="img-card" src="<?= htmlspecialchars($item['img']); ?>" alt="img">
                        <div class="overlay">
                            <h3 class="titre-3"><?= htmlspecialchars($item['titre']); ?></h3>
                            <p class="text-card-3"><?= htmlspecialchars($item['text']); ?></p>
                            <a class="lien-card" href="description.php?id=<?= $item['id']; ?>">Description</a>
                        </div>
                    </div>
                    <?php endif; ?>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </div>

    <div id=" vegetation" class="card-container">
        <div class="wrapper-vetements">
            <div class="card-area">
                <div class="box-area">
                    <?php foreach ($catalogue as $item): ?>
                    <?php if ($item['category'] === 'vegetation'): ?>
                    <div class="box">
                        <img class="img-card" src="<?= htmlspecialchars($item['img']); ?>" alt="img">
                        <div class="overlay">
                            <h3 class="titre-3"><?= htmlspecialchars($item['titre']); ?></h3>
                            <p class="text-card-3"><?= htmlspecialchars($item['text']); ?></p>
                            <a class="lien-card" href="description.php?id=<?= $item['id']; ?>">Description</a>
                        </div>
                    </div>
                    <?php endif; ?>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </div>

    <div id=" gazon" class="card-container">
        <div class="wrapper-vetements">
            <div class="card-area">
                <div class="box-area">
                    <?php foreach ($catalogue as $item): ?>
                    <?php if ($item['category'] === 'gazon'): ?>
                    <div class="box">
                        <img class="img-card" src="<?= htmlspecialchars($item['img']); ?>" alt="img">
                        <div class="overlay">
                            <h3 class="titre-3">
                                <?= htmlspecialchars($item['titre']); ?>
                            </h3>
                            <p class="text-card-3">
                                <?= htmlspecialchars($item['text']); ?>
                            </p>
                            <a class="lien-card" href="description.php?id=<?= $item['id']; ?>">Description</a>
                        </div>
                    </div>
                    <?php endif; ?>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </div>

    <div id="grands" class="card-container">
        <div class="wrapper-vetements">
            <div class="card-area">
                <div class="box-area">
                    <?php foreach ($catalogue as $item): ?>
                    <?php if ($item['category'] === 'grands'): ?>
                    <div class="box">
                        <img class="img-card" src="<?= htmlspecialchars($item['img']); ?>" alt="img">
                        <div class="overlay">
                            <h3 class="titre-3">
                                <?= htmlspecialchars($item['titre']); ?>
                            </h3>
                            <p class="text-card-3">
                                <?= htmlspecialchars($item['text']); ?>
                            </p>
                            <a class="lien-card" href="description.php?id=<?= $item['id']; ?>">Description</a>
                        </div>
                    </div>
                    <?php endif; ?>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </div>

    <!-- Le script sert à accéder aux autres liens sur la même page et à activer ou cacher les sections -->
    <script>
    function openTab(tabId) {
        console.log('Tab clicked:', tabId);
        // Cache toutes les sections
        document.querySelectorAll('.card-container')
            .forEach(function(tab) {
                tab.style.display = 'none';
            });

        // Affiche la section cliquée
        document.getElementById(tabId).style
            .display = 'block';
    }

    // Affiche le premier onglet chaque fois que la page est rafraîchie
    document.addEventListener('DOMContentLoaded',
        function() {
            openTab('terre');
        });
    </script>

    <?php include_once("./include/footer.php"); ?>

</body>

</html>