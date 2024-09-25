<?php

session_start();

require_once("connect.php");

$sql = "SELECT * FROM suggestion";
$query = $db->prepare($sql);
$query->execute();
$suggestion = $query->fetchAll(PDO::FETCH_ASSOC);
    
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/description.css">
    <link rel="stylesheet" href="css/font.css">
    <link rel="stylesheet" href="css/materiels.css">
    <title>Déscription</title>
</head>

<body>

    <div id="news-lien-id">
        <div class="lien-news">
            <button class="lien-nouveautes" onclick="openTab('gants')">Gants</button>
            <button class="lien-nouveautes" onclick="openTab('pantalons')">Pantalons</button>
            <button class="lien-nouveautes" onclick="openTab('veste')">Veste</button>
            <button class="lien-nouveautes" onclick="openTab('casque')">Casque</button>
            <button class="lien-nouveautes" onclick="openTab('blousons')">Blousons</button>
        </div>
    </div>

    <header>
        <div class="section1">
            <div class="text-description">Titre</div>
        </div>
    </header>

    <figure class="figure-description">
        <img class="img-description" src="../img/13.jpg" alt="img">
    </figure>

    <div class="container-description">
        <p class="text-descriptif">Déscription du matériels, la couleur, tout ce qui est écrit dans les catalogues de
            philipe</p>
        <p class="text-descriptif">Référence</p>
        <p class="text-descriptif">Marque</p>
        <p class="text-descriptif">Prix unitaire du produit</p>
        <p class="text-descriptif">Couleur disponinle</p>
        <div class="container-etoile">
            <input type="radio" name="etoile" id="etoile1">
            <label for="etoile1"></label>
            <input type="radio" name="etoile" id="etoile2">
            <label for="etoile2"></label>
            <input type="radio" name="etoile" id="etoile3">
            <label for="etoile3"></label>
            <input type="radio" name="etoile" id="etoile4">
            <label for="etoile4"></label>
            <input type="radio" name="etoile" id="etoile5">
            <label for="etoile5"></label>
        </div>
    </div>

    <!-- Card  -->

    <h1>Produits suggérés</h1>

    <!-- <div class="box">
        <img class="img-card" src="../img/8.jpg" alt="img">
        <div class="overlay">
            <h3 class="titre-3">Test Titre</h3>
            <p class="text-card-3">Test Text</p>
            <a class="lien-card" href="">Description</a>
        </div>
    </div> -->

    <div id="gants" class="card-container">
        <div class="wrapper-vetements">
            <div class="card-area">
                <div class="box-area">
                    <?php foreach ($suggestion as $item): ?>
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
        <div class="wrapper-vetements">
            <div class="card-area">
                <div class="box-area">
                    <?php foreach ($suggestion as $item): ?>
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
        <div class="wrapper-vetements">
            <div class="card-area">
                <div class="box-area">
                    <?php foreach ($suggestion as $item): ?>
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
        <div class="wrapper-vetements">
            <div class="card-area">
                <div class="box-area">
                    <?php foreach ($suggestion as $item): ?>
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
        <div class="wrapper-vetements">
            <div class="card-area">
                <div class="box-area">
                    <?php foreach ($suggestion as $item): ?>
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

</body>

</html>