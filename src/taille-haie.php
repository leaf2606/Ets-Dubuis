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
    <title>Débrousailleuse</title>
</head>

<body>

    <?php include_once("./include/navbar.php"); ?>

    <div id="news-lien-id">
        <div class="lien-news">
            <button class="lien-nouveautes" onclick="openTab('hc')">HC</button>
            <button class="lien-nouveautes" onclick="openTab('hcr')">HCR</button>
            <button class="lien-nouveautes" onclick="openTab('dhc')">DHC</button>
            <button class="lien-nouveautes" onclick="openTab('dhcs')">DHCS</button>
            <button class="lien-nouveautes" onclick="openTab('hcs')">HCS</button>
        </div>
    </div>

    <!-- Card  -->

    <div id="hc" class="card-container">
        <h1 class="titre-categorie">Taille Haie HC</h1>
        <div class="wrapper-vetements">
            <div class="card-area">
                <div class="box-area">
                    <?php foreach ($catalogue as $item): ?>
                    <?php if ($item['category'] === 'hc'): ?>
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

    <div id="hcr" class="card-container">
        <h1 class="titre-categorie">Taille Haie HCR</h1>
        <div class="wrapper-vetements">
            <div class="card-area">
                <div class="box-area">
                    <?php foreach ($catalogue as $item): ?>
                    <?php if ($item['category'] === 'hcr'): ?>
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

    <div id="dhc" class="card-container">
        <h1 class="titre-categorie">Taille Haie DHC</h1>
        <div class="wrapper-vetements">
            <div class="card-area">
                <div class="box-area">
                    <?php foreach ($catalogue as $item): ?>
                    <?php if ($item['category'] === 'dhc'): ?>
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

    <div id="dhcs" class="card-container">
        <h1 class="titre-categorie">Taille Haie DHCS</h1>
        <div class="wrapper-vetements">
            <div class="card-area">
                <div class="box-area">
                    <?php foreach ($catalogue as $item): ?>
                    <?php if ($item['category'] === 'dhcs'): ?>
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

    <div id="hcs" class="card-container">
        <h1 class="titre-categorie">Taille Haie HCS</h1>
        <div class="wrapper-vetements">
            <div class="card-area">
                <div class="box-area">
                    <?php foreach ($catalogue as $item): ?>
                    <?php if ($item['category'] === 'hcs'): ?>
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
        openTab('hc');
    });
    </script>

    <?php include_once("./include/footer.php"); ?>

</body>

</html>