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
    <link rel="stylesheet" href="css/font.css">
    <link rel="stylesheet" href="css/navbar.css">
    <link rel="stylesheet" href="css/materiels.css">
    <link rel="stylesheet" href="css/vetements.css">
    <title>Vêtements</title>
</head>

<body>

    <?php include_once("./include/navbar.php"); ?>

    <div id="news-lien-id">
        <div class="lien-news-8">
            <button class="lien-nouveautes" onclick="openTab('vetements')">Vêtements</button>
            <button class="lien-nouveautes" onclick="openTab('accessoires')">Accesoires</button>
            <button class="lien-nouveautes" onclick="openTab('motos')">Equipements</button>
        </div>
    </div>

    <!-- Card  -->

    <div id="vetements" class="card-container">
        <h1 class="titre-categorie">Vêtements de sécurité</h1>
        <div class="wrapper-vetements">
            <div class="card-area">
                <div class="box-area">
                    <?php foreach ($catalogue as $item): ?>
                    <?php if ($item['category'] === 'vetements'): ?>
                    <div class="box">
                        <img class="img-card" src="<?= htmlspecialchars($item['img']); ?>" alt="img">
                        <div class="overlay">
                            <h3 class="titre-3"><?= htmlspecialchars($item['titre']); ?></h3>
                            <p class="text-card-3"><?= htmlspecialchars($item['text']); ?></p>
                            <a class="lien-card" href="description.php?id=<?= $item['id']; ?>">Description</a>


                            <!-- Boutons administrateur -->
                            <?php if (isset($_SESSION['admin']) && $_SESSION['admin']): ?>
                            <div class="admin-buttons">
                                <button class="btn-edit">Modifier</button>
                                <button class="btn-delete">Supprimer</button>
                            </div>
                            <?php endif; ?>
                        </div>
                    </div>
                    <?php endif; ?>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </div>

    <?php if (isset($_SESSION['admin']) && $_SESSION['admin']): ?>
    <div class="admin-buttons">
        <button class="btn-add">Ajouter</button>
    </div>
    <?php endif; ?>

    <div id="accessoires" class="card-container">
        <h1 class="titre-categorie">Accesoires Harnais Ergo-pro</h1>
        <div class="wrapper-vetements">
            <div class="card-area">
                <div class="box-area">
                    <?php foreach ($catalogue as $item): ?>
                    <?php if ($item['category'] === 'accessoires'): ?>
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

    <div id="motos" class="card-container">
        <h1 class="titre-categorie">Equipements Motos</h1>
        <div class="wrapper-vetements">
            <div class="card-area">
                <div class="box-area">
                    <?php foreach ($catalogue as $item): ?>
                    <?php if ($item['category'] === 'motos'): ?>
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
        openTab('vetements');
    });
    </script>

    <?php include_once("./include/footer.php"); ?>

</body>

</html>