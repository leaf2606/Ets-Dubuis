<?php

session_start();

require_once("connect.php");

$sql = "SELECT * FROM vetements";
$query = $db->prepare($sql);
$query->execute();
$vetements = $query->fetchAll(PDO::FETCH_ASSOC);
    
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/font.css">
    <link rel="stylesheet" href="css/navbar.css">
    <link rel="stylesheet" href="css/vetements.css">
    <title>Vêtements</title>
</head>

<body>

    <?php include_once("./include/navbar.php"); ?>

    <div id="news-lien-id">
        <div class="lien-news">
            <button class="lien-nouveautes" onclick="openTab('gants')">Gants</button>
            <button class="lien-nouveautes" onclick="openTab('pantalons')">Pantalons</button>
            <button class="lien-nouveautes" onclick="openTab('veste')">Veste</button>
            <button class="lien-nouveautes" onclick="openTab('casque')">Casque</button>
            <button class="lien-nouveautes" onclick="openTab('blousons')">Blousons</button>
        </div>
    </div>

    <!-- Test de cards stylé  -->

    <div id="gants" class="card-container">
        <div class="wrapper">
            <div class="card-area">
                <div class="box-area">
                    <?php foreach ($vetements as $item): ?>
                    <?php if ($item['category'] === 'gants'): ?>
                    <div class="box">
                        <img class="img-card" src="<?= htmlspecialchars($item['img']); ?>" alt="img">
                        <div class="overlay">
                            <h3 class="titre-3"><?= htmlspecialchars($item['titre']); ?></h3>
                            <p class="text-card-3"><?= htmlspecialchars($item['text']); ?></p>
                            <a class="lien-card" href="">Description</a>
                        </div>
                    </div>
                    <?php endif; ?>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </div>

    <div id="pantalons" class="card-container">
        <div class="wrapper">
            <div class="card-area">
                <div class="box-area">
                    <?php foreach ($vetements as $item): ?>
                    <?php if ($item['category'] === 'pantalons'): ?>
                    <div class="box">
                        <img class="img-card" src="<?= htmlspecialchars($item['img']); ?>" alt="img">
                        <div class="overlay">
                            <h3 class="titre-3"><?= htmlspecialchars($item['titre']); ?></h3>
                            <p class="text-card-3"><?= htmlspecialchars($item['text']); ?></p>
                            <a class="lien-card" href="">Description</a>
                        </div>
                    </div>
                    <?php endif; ?>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </div>

    <div id="veste" class="card-container">
        <div class="wrapper">
            <div class="card-area">
                <div class="box-area">
                    <?php foreach ($vetements as $item): ?>
                    <?php if ($item['category'] === 'veste'): ?>
                    <div class="box">
                        <img class="img-card" src="<?= htmlspecialchars($item['img']); ?>" alt="img">
                        <div class="overlay">
                            <h3 class="titre-3"><?= htmlspecialchars($item['titre']); ?></h3>
                            <p class="text-card-3"><?= htmlspecialchars($item['text']); ?></p>
                            <a class="lien-card" href="">Description</a>
                        </div>
                    </div>
                    <?php endif; ?>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </div>

    <div id="casque" class="card-container">
        <div class="wrapper">
            <div class="card-area">
                <div class="box-area">
                    <?php foreach ($vetements as $item): ?>
                    <?php if ($item['category'] === 'casque'): ?>
                    <div class="box">
                        <img class="img-card" src="<?= htmlspecialchars($item['img']); ?>" alt="img">
                        <div class="overlay">
                            <h3 class="titre-3"><?= htmlspecialchars($item['titre']); ?></h3>
                            <p class="text-card-3"><?= htmlspecialchars($item['text']); ?></p>
                            <a class="lien-card" href="">Description</a>
                        </div>
                    </div>
                    <?php endif; ?>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </div>

    <div id="blousons" class="card-container">
        <div class="wrapper">
            <div class="card-area">
                <div class="box-area">
                    <?php foreach ($vetements as $item): ?>
                    <?php if ($item['category'] === 'blousons'): ?>
                    <div class="box">
                        <img class="img-card" src="<?= htmlspecialchars($item['img']); ?>" alt="img">
                        <div class="overlay">
                            <h3 class="titre-3"><?= htmlspecialchars($item['titre']); ?></h3>
                            <p class="text-card-3"><?= htmlspecialchars($item['text']); ?></p>
                            <a class="lien-card" href="">Description</a>
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
        document.querySelectorAll('.card-container').forEach(function(tab) {
            tab.style.display = 'none';
        });

        // Affiche la section cliquée
        document.getElementById(tabId).style.display = 'block';
    }

    // Affiche le premier onglet chaque fois que la page est rafraîchie
    document.addEventListener('DOMContentLoaded', function() {
        openTab('gants');
    });
    </script>


    <?php include_once("./include/footer.php"); ?>

</body>

</html>