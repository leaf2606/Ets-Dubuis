<?php

session_start();

require_once("connect.php");

// Vérifier si l'utilisateur est administrateur
if (isset($_SESSION['compte']) && $_SESSION['compte']['role'] === 'admin') {
    // Vérifier si l'ID de l'article est passé dans l'URL
    if (isset($_GET['id']) && !empty($_GET['id'])) {
        $id = strip_tags($_GET['id']);

        // Vérification de l'existence de l'article avant suppression
        $sql = "SELECT * FROM catalogue WHERE id = :id";
        $query = $db->prepare($sql);
        $query->bindValue(":id", $id, PDO::PARAM_INT);
        $query->execute();
        $item = $query->fetch(PDO::FETCH_ASSOC);  

        if (!$item) {
            echo "Erreur : article non trouvé.";
            exit;
        }

        // Si l'utilisateur confirme la suppression
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $sql = "DELETE FROM catalogue WHERE id = :id";
            $query = $db->prepare($sql);
            $query->bindValue(":id", $id, PDO::PARAM_INT);

            // Exécuter la suppression
            if ($query->execute()) {
                header("Location: index.php"); 
                exit();
            } else {
                echo "Erreur : impossible de supprimer l'article.";
            }
        }
    } else {
        echo "Erreur : aucun ID d'article fourni.";
        exit();
    }
} else {
    echo "Erreur : accès interdit.";
    exit();
}

?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/font.css">
    <link rel="stylesheet" href="css/backend.css">
    <title>Suppression d'article</title>
</head>

<body>
    <div class="container-back">
        <h1 class="sup-backend-titre">Suppression de l'article</h1>
        <p class="sup-backend">Êtes-vous sûr de vouloir supprimer cet article ?</p>

        <!-- Affichage des détails de l'article -->
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
            <?php endif; ?>
            <?php if (!empty($item['capacite_bac'])): ?>
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
        </div><br><br>

        <form action="backend-sup.php?id=<?= htmlspecialchars($_GET['id']); ?>" method="POST">
            <div class="admin-buttons-5">
                <button type="submit" class="button-back-5">Supprimer l'article</button>
                <a href="index.php" class="button-back-5">Annuler</a>
            </div>
        </form>
    </div>
</body>

</html>