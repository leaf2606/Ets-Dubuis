<?php

session_start();

require_once("connect.php");

// Vérifie si l'ID est passé dans l'URL
if (isset($_GET['id'])) {
    $id = intval($_GET['id']); // Sécuriser l'entrée

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

// Récupérer les articles similaires dans la même catégorie
$category = $item['category']; 
$sqlSimilar = "SELECT * FROM catalogue WHERE category = :category AND id != :id"; 
$querySimilar = $db->prepare($sqlSimilar);
$querySimilar->bindParam(':category', $category, PDO::PARAM_STR);
$querySimilar->bindParam(':id', $id, PDO::PARAM_INT);
$querySimilar->execute();
$similarItems = $querySimilar->fetchAll(PDO::FETCH_ASSOC);

?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/description.css">
    <link rel="stylesheet" href="css/font.css">
    <link rel="stylesheet" href="css/materiels.css">
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
        <p class="text-descriptif"><?= htmlspecialchars($item['message']); ?></p>
        <p class="text-descriptif">Référence: <?= htmlspecialchars($item['ref']); ?></p>
        <p class="text-descriptif">Marque: <?= htmlspecialchars($item['marque']); ?></p>
        <p class="text-descriptif">Prix: <?= htmlspecialchars($item['prix']); ?> €</p>
        <p class="text-descriptif">Couleur: <?= htmlspecialchars($item['couleur']); ?></p>
        <p class="text-descriptif">Catégories: <?= htmlspecialchars($item['category']); ?></p>
        <div class="container-etoile">
            <input type="radio" name="etoile<?= $item['id']; ?>" id="etoile1<?= $item['id']; ?>">
            <label for="etoile1<?= $item['id']; ?>"></label>
            <input type="radio" name="etoile<?= $item['id']; ?>" id="etoile2<?= $item['id']; ?>">
            <label for="etoile2<?= $item['id']; ?>"></label>
            <input type="radio" name="etoile<?= $item['id']; ?>" id="etoile3<?= $item['id']; ?>">
            <label for="etoile3<?= $item['id']; ?>"></label>
            <input type="radio" name="etoile<?= $item['id']; ?>" id="etoile4<?= $item['id']; ?>">
            <label for="etoile4<?= $item['id']; ?>"></label>
            <input type="radio" name="etoile<?= $item['id']; ?>" id="etoile5<?= $item['id']; ?>">
            <label for="etoile5<?= $item['id']; ?>"></label>
        </div>
    </div>

    <!-- Produits similaires -->
    <h1 class="produit-suggeres">Produits similaires</h1>
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
                            <!-- Boutons administrateur -->
                            <?php if (isset($_SESSION['admin']) && $_SESSION['admin']): ?>
                            <div class="admin-buttons">
                                <button class="btn-edit">Modifier</button>
                                <button class="btn-delete">Supprimer</button>
                            </div>
                            <?php endif; ?>
                        </div>
                    </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </div>
    <?php else: ?>
    <p>Aucun produit similaire trouvé dans la catégorie <?= htmlspecialchars($category); ?>.</p>
    <?php endif; ?>

    <a href="formulaire.php">Ajouter un article</a>
    <a href="backend-modifs.php">Modifier un article</a>
    <a href="description.php">Voir les descriptions</a>

    <?php include_once("./include/footer.php"); ?>

</body>

</html>