<?php

session_start();

require_once("connect.php");

// Vérifie si l'ID est passé dans l'URL
if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    $id = intval($_GET['id']);
    
    // Préparer la requête pour obtenir l'article correspondant à l'ID
    $sql = "SELECT * FROM catalogue WHERE id = :id";
    $query = $db->prepare($sql);
    $query->bindParam(':id', $id, PDO::PARAM_INT);
    $query->execute();
    $item = $query->fetch(PDO::FETCH_ASSOC);

    // Vérifier si l'article existe
    if (!$item) {
        echo "Article non trouvé.";
        exit;
    }
} else {
    echo "Aucun ID fourni.";
    exit;
}

?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/description.css">
    <link rel="stylesheet" href="css/font.css">
    <link rel="stylesheet" href="css/materiels.css">
    <link rel="stylesheet" href="css/backend.css">
    <script src="js/script.js" defer></script>
    <title>Description</title>
</head>

<body>
    <?php include_once("./include/navbar.php"); ?>

    <!-- Article unique -->
    <header>
        <div class="section1">
            <div class="text-description"><?= htmlspecialchars($item['titre']); ?></div>
        </div>
    </header>

    <div class="zoomable-container">
        <img class="zoomable-container_img" src="<?= htmlspecialchars($item['img']); ?>"
            alt="Image de <?= htmlspecialchars($item['titre']); ?>">
        <div class="zoom-controls">
            <button id="zoom-in">+</button>
            <button id="zoom-out">-</button>
        </div>
    </div><br><br>

    <div class="container-description">
        <p class="text-descriptif">Déscription : <?= htmlspecialchars($item['message']); ?></p>
        <?php if (!empty($item['marque'])): ?>
        <p class="text-descriptif">Marque : <?= htmlspecialchars($item['marque']); ?></p>
        <?php endif; ?>
        <?php if (!empty($item['prix'])): ?>
        <p class="text-descriptif">Prix : <?= htmlspecialchars($item['prix']); ?> €</p>
        <?php endif; ?>
        <?php if (!empty($item['couleur'])): ?>
        <p class="text-descriptif">Couleur : <?= htmlspecialchars($item['couleur']); ?></p>
        <?php endif; ?>
        <?php if (!empty($item['largeur_coupe'])): ?>
        <p class="text-descriptif">Largeur de la coupe : <?= htmlspecialchars($item['largeur_coupe']); ?></p>
        <?php endif; ?>
        <?php if (!empty($item['type_moteur'])): ?>
        <p class="text-descriptif">Moteur : <?= htmlspecialchars($item['type_moteur']); ?></p>
        <?php endif; ?><?php if (!empty($item['type_coupe'])): ?>
        <p class="text-descriptif">Type de coupe : <?= htmlspecialchars($item['type_coupe']); ?></p>
        <?php endif; ?>
        <?php if (!empty($item['type_carburant'])): ?>
        <p class="text-descriptif">Carburant : <?= htmlspecialchars($item['type_carburant']); ?></p>
        <?php endif; ?>
        <?php if (!empty($item['poids'])): ?>
        <p class="text-descriptif">Poids : <?= htmlspecialchars($item['poids']); ?></p>
        <?php endif; ?>
        <?php if (!empty($item['puissance'])): ?>
        <p class="text-descriptif">Puissance : <?= htmlspecialchars($item['puissance']); ?></p>
        <?php endif; ?>
        <?php if (!empty($item['capacite_batterie'])): ?>
        <p class="text-descriptif">Capacité de la batterie : <?= htmlspecialchars($item['capacite_batterie']); ?></p>
        <?php endif; ?>
        <?php if (!empty($item['type_temps'])): ?>
        <p class="text-descriptif">Temps : <?= htmlspecialchars($item['type_temps']); ?></p>
        <?php endif; ?>
        <?php if (!empty($item['tension'])): ?>
        <p class="text-descriptif">Tension : <?= htmlspecialchars($item['tension']); ?></p>
        <?php endif; ?>
        <?php if (!empty($item['autonomie'])): ?>
        <p class="text-descriptif">Autonomie : <?= htmlspecialchars($item['autonomie']); ?></p>
        <?php endif; ?>
        <?php if (!empty($item['capacite_reservoir'])): ?>
        <p class="text-descriptif">Capacité du reservoir : <?= htmlspecialchars($item['capacite_reservoir']); ?></p>
        <?php endif; ?>
        <?php if (!empty($item['type_fil'])): ?>
        <p class="text-descriptif">Type de fil : <?= htmlspecialchars($item['type_fil']); ?></p>
        <?php endif; ?>
        <?php if (!empty($item['type_lame'])): ?>
        <p class="text-descriptif">Type de lame : <?= htmlspecialchars($item['type_lame']); ?></p>
        <?php endif; ?>
        <?php if (!empty($item['longueur_lame'])): ?>
        <p class="text-descriptif">Longueur de la lame : <?= htmlspecialchars($item['longueur_lame']); ?></p>
        <?php endif; ?>
        <?php if (!empty($item['vitesse_coupe'])): ?>
        <p class="text-descriptif">Vitesse de la coupe : <?= htmlspecialchars($item['vitesse_coupe']); ?></p>
        <?php endif; ?>
        <?php if (!empty($item['poignee'])): ?>
        <p class="text-descriptif">Poignée : <?= htmlspecialchars($item['poignee']); ?></p>
        <?php endif; ?>
        <?php if (!empty($item['vibrations'])): ?>
        <p class="text-descriptif">Vibrations : <?= htmlspecialchars($item['vibrations']); ?></p>
        <?php endif; ?>
        <?php if (!empty($item['sangle'])): ?>
        <p class="text-descriptif">Sangle : <?= htmlspecialchars($item['sangle']); ?></p>
        <?php endif; ?>
        <?php if (!empty($item['sonore'])): ?>
        <p class="text-descriptif">Son : <?= htmlspecialchars($item['sonore']); ?></p>
        <?php endif; ?>
        <?php if (!empty($item['systeme'])): ?>
        <p class="text-descriptif">Système : <?= htmlspecialchars($item['systeme']); ?></p>
        <?php endif; ?>
        <?php if (!empty($item['securite'])): ?>
        <p class="text-descriptif">sécurité : <?= htmlspecialchars($item['securite']); ?></p>
        <?php endif; ?>
        <?php if (!empty($item['dimension'])): ?>
        <p class="text-descriptif">Dimension : <?= htmlspecialchars($item['dimension']); ?></p>
        <?php endif; ?>
        <?php if (!empty($item['diametre'])): ?>
        <p class="text-descriptif">Diamètre : <?= htmlspecialchars($item['diametre']); ?></p>
        <?php endif; ?>
        <?php if (!empty($item['vitesse_souffle'])): ?>
        <p class="text-descriptif">Vitesse de souffle : <?= htmlspecialchars($item['vitesse_souffle']); ?></p>
        <?php endif; ?>
        <?php if (!empty($item['type_essence'])): ?>
        <p class="text-descriptif">Type : <?= htmlspecialchars($item['type_essence']); ?></p>
        <?php endif; ?>
        <?php if (isset($_SESSION['compte']) && $_SESSION['compte']['role'] === 'admin'): ?>
        <p class="text-descriptif">Catégorie : <?= htmlspecialchars($item['category']); ?></p>
        <?php endif; ?>
    </div>

    <?php if (isset($_SESSION['compte']) && $_SESSION['compte']['role'] === 'admin'): ?>
    <div class="admin-buttons">
        <a class="button-back-2" href="backend-modifs.php?id=<?= $item['id']; ?>">Modifier</a>
        <a class="button-back-2" href="backend-sup.php?id=<?= $item['id']; ?>"
            onclick="return confirm('Êtes-vous sûr de vouloir supprimer cet article ?');">Supprimer l'article</a>
    </div>
    <?php endif; ?><br>

    <section id="avis-section">
        <div class="container-avis">
            <p><strong>Bonjour, <?= htmlspecialchars($_SESSION['compte']['username'] ?? 'Invité'); ?>, laissez un avis
                    !</strong></p><br>
            <form action="avis.php" class="avis" method="POST">
                <input type="hidden" name="article_id" value="<?= htmlspecialchars($item['id']); ?>">
                <select name="note" id="note" required>
                    <option value="">Choisir une note</option>
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                    <option value="5">5</option>
                </select>
                <textarea name="commentaire" id="commentaire" placeholder="Mettre un commentaire" required></textarea>
                <button class="bouton-avis" type="submit">Soumettre l'avis</button>
            </form>
        </div>
    </section>

    <!-- Produit similaire  -->
    <h1 class="produit-suggeres">Produits similaires</h1>
    <?php
    // Récupérer les articles similaires
    $category = $item['category'];
    $sqlSimilar = "SELECT * FROM catalogue WHERE category = :category AND id != :id";
    $querySimilar = $db->prepare($sqlSimilar);
    $querySimilar->bindParam(':category', $category, PDO::PARAM_STR);
    $querySimilar->bindParam(':id', $id, PDO::PARAM_INT);
    $querySimilar->execute();
    $similarItems = $querySimilar->fetchAll(PDO::FETCH_ASSOC);
    ?>

    <?php if ($similarItems): ?>
    <div class="card-container">
        <div class="wrapper-vetements">
            <div class="card-area">
                <div class="box-area">
                    <?php foreach ($similarItems as $similarItem): ?>
                    <div class="box">
                        <img class="img-card" src="<?= htmlspecialchars($similarItem['img']); ?>"
                            alt="Image de <?= htmlspecialchars($similarItem['titre']); ?>">
                        <div class="overlay">
                            <h3 class="titre-3"><?= htmlspecialchars($similarItem['titre']); ?></h3>
                            <p class="text-card-3"><?= htmlspecialchars($similarItem['text']); ?></p>
                            <a class="lien-card" href="description.php?id=<?= $similarItem['id']; ?>">Description</a>
                        </div>
                    </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </div>
    <?php else: ?>
    <?php if (isset($_SESSION['compte']) && $_SESSION['compte']['role'] === 'user'): ?>
    <p class="similaire-backend">Aucun produit similaire.</p>
    <?php endif; ?>
    <?php if (isset($_SESSION['compte']) && $_SESSION['compte']['role'] === 'admin'): ?>
    <p class="similaire-backend">Aucun produit similaire trouvé dans la catégorie <?= htmlspecialchars($category); ?>.
    </p>
    <?php endif; ?>
    <?php endif; ?>

    <?php include_once("./include/footer.php"); ?>

    <script>
    const zoomableContainer = document.querySelector('.zoomable-container');
    const zoomableImg = document.querySelector('.zoomable-container_img');

    const zoomInBtn = document.getElementById('zoom-in');
    const zoomOutBtn = document.getElementById('zoom-out');

    let zoomLevel = 1;

    // Fonction pour gérer le zoom
    function setZoomLevel(scale) {
        zoomLevel = scale;
        zoomableImg.style.transform = `scale(${zoomLevel})`;
    }

    // Bouton "+" pour zoomer
    zoomInBtn.addEventListener('click', () => {
        zoomLevel = Math.min(zoomLevel + 0.2, 5);
        setZoomLevel(zoomLevel);
    });

    // Bouton "-" pour dézoomer
    zoomOutBtn.addEventListener('click', () => {
        zoomLevel = Math.max(zoomLevel - 0.2, 1);
        setZoomLevel(zoomLevel);
    });

    // Gestion du mouvement de la souris pour ajuster le point d'origine du zoom
    zoomableContainer.addEventListener('mousemove', (e) => {
        const rect = zoomableContainer.getBoundingClientRect();

        const x = e.clientX - rect.left;
        const y = e.clientY - rect.top;

        const positionXInContainer = (x / rect.width) * 100;
        const positionYInContainer = (y / rect.height) * 100;

        zoomableImg.style.transformOrigin = `${positionXInContainer}% ${positionYInContainer}%`;
    });

    // Réinitialiser le zoom lorsque la souris quitte le conteneur
    zoomableContainer.addEventListener('mouseleave', () => {
        setZoomLevel(1);
    });
    </script>

</body>

</html>