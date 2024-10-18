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

    <figure class="figure-description">
        <img class="img-description" src="<?= htmlspecialchars($item['img']); ?>"
            alt="Image de <?= htmlspecialchars($item['titre']); ?>">
    </figure>

    <div class="container-description">
        <p class="text-descriptif">Déscription : <?= htmlspecialchars($item['message']); ?></p>
        <?php if (!empty($item['ref'])): ?>
        <p class="text-descriptif">Référence : <?= htmlspecialchars($item['ref']); ?></p>
        <?php endif; ?>
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
        <?php if (!empty($item['moteur'])): ?>
        <p class="text-descriptif">Moteur : <?= htmlspecialchars($item['moteur']); ?></p>
        <?php endif; ?><?php if (!empty($item['capacite_bac'])): ?>
        <p class="text-descriptif">Capacité de la coupe : <?= htmlspecialchars($item['capacite_bac']); ?></p>
        <?php endif; ?>
        <?php if (!empty($item['coupe'])): ?>
        <p class="text-descriptif">Coupe : <?= htmlspecialchars($item['coupe']); ?></p>
        <?php endif; ?>
        <?php if (!empty($item['roue'])): ?>
        <p class="text-descriptif">Roue : <?= htmlspecialchars($item['roue']); ?></p>
        <?php endif; ?>
        <?php if (!empty($item['divers'])): ?>
        <p class="text-descriptif">Divers : <?= htmlspecialchars($item['divers']); ?></p>
        <?php endif; ?>
        <?php if (!empty($item['transmission'])): ?>
        <p class="text-descriptif">Transmission : <?= htmlspecialchars($item['transmission']); ?></p>
        <?php endif; ?>
        <?php if (!empty($item['cylindre'])): ?>
        <p class="text-descriptif">Cylindre : <?= htmlspecialchars($item['cylindre']); ?></p>
        <?php endif; ?>
        <?php if (!empty($item['carburant'])): ?>
        <p class="text-descriptif">Carburant : <?= htmlspecialchars($item['carburant']); ?></p>
        <?php endif; ?>
        <?php if (!empty($item['poids'])): ?>
        <p class="text-descriptif">Poids : <?= htmlspecialchars($item['poids']); ?></p>
        <?php endif; ?>
        <?php if (!empty($item['puissance'])): ?>
        <p class="text-descriptif">Puissance : <?= htmlspecialchars($item['puissance']); ?></p>
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

    <?php if ($loggedIn): ?>
    <div class="container-avis">
        <p><strong>Bonjour, <?= htmlspecialchars($_SESSION['compte']['username']); ?> laisser un avis !</strong></p>
        <form action="avis.php" method="POST">
            <input type="hidden" name="article_id" value="<?= htmlspecialchars($item['id']); ?>">
            <label for="note">Note :</label>
            <select name="note" id="note" required>
                <option value="">Choisir une note</option>
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
                <option value="5">5</option>
            </select>
            <textarea name="commentaire" id="commentaire" required></textarea>

            <button type="submit">Soumettre l'avis</button>
        </form>
    </div>
    <?php else: ?>
    <p>Veuillez vous connecter pour laisser un avis.</p>
    <?php endif; ?>

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

</body>

</html>