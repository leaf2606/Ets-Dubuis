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
    <script src="js/script.js"></script>
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
        <?php if (isset($_SESSION['compte']) && $_SESSION['compte']['role'] === 'admin'): ?>
        <p class="text-descriptif">Catégorie : <?= htmlspecialchars($item['category']); ?></p>
        <?php endif; ?>
    </div>

    <?php if (isset($_SESSION['compte']) && $_SESSION['compte']['role'] === 'admin'): ?>
    <div class="admin-buttons">
        <a href="backend-modifs.php?id=<?= $item['id']; ?>">Modifier</a>
        <a href="backend-sup.php?id=<?= $item['id']; ?>"
            onclick="return confirm('Êtes-vous sûr de vouloir supprimer cet article ?');">Supprimer l'article</a>
    </div>
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
    <p>Aucun produit similaire trouvé dans la catégorie <?= htmlspecialchars($category); ?>.</p>
    <?php endif; ?>

    <?php include_once("./include/footer.php"); ?>

</body>

</html>