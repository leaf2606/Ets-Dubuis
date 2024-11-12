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
            <p class="text-descriptif">Description : <?= htmlspecialchars($item['message']); ?></p>
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
            <p class="text-descriptif">Type de moteur : <?= htmlspecialchars($item['type_moteur']); ?></p>
            <?php endif; ?>
            <?php if (!empty($item['capacite_batterie'])): ?>
            <p class="text-descriptif">Capacité de la batterie : <?= htmlspecialchars($item['capacite_batterie']); ?>
            </p>
            <?php endif; ?>
            <?php if (!empty($item['type_temps'])): ?>
            <p class="text-descriptif">Type de temps : <?= htmlspecialchars($item['type_temps']); ?></p>
            <?php endif; ?>
            <?php if (!empty($item['type_carburant'])): ?>
            <p class="text-descriptif">Type de carburant : <?= htmlspecialchars($item['type_carburant']); ?></p>
            <?php endif; ?>
            <?php if (!empty($item['tension'])): ?>
            <p class="text-descriptif">Tension : <?= htmlspecialchars($item['tension']); ?></p>
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
            <p class="text-descriptif">Vitesse de coupe : <?= htmlspecialchars($item['vitesse_coupe']); ?></p>
            <?php endif; ?>
            <?php if (!empty($item['poids'])): ?>
            <p class="text-descriptif">Poids : <?= htmlspecialchars($item['poids']); ?></p>
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
            <?php if (!empty($item['type_coupe'])): ?>
            <p class="text-descriptif">Type de coupe : <?= htmlspecialchars($item['type_coupe']); ?></p>
            <?php endif; ?>
            <?php if (!empty($item['sonore'])): ?>
            <p class="text-descriptif">Sonore : <?= htmlspecialchars($item['sonore']); ?></p>
            <?php endif; ?>
            <?php if (!empty($item['systeme'])): ?>
            <p class="text-descriptif">Système : <?= htmlspecialchars($item['systeme']); ?></p>
            <?php endif; ?>
            <?php if (!empty($item['securite'])): ?>
            <p class="text-descriptif">Sécurité : <?= htmlspecialchars($item['securite']); ?></p>
            <?php endif; ?>
            <?php if (!empty($item['dimension'])): ?>
            <p class="text-descriptif">Dimension : <?= htmlspecialchars($item['dimension']); ?></p>
            <?php endif; ?>
            <?php if (!empty($item['puissance'])): ?>
            <p class="text-descriptif">Puissance : <?= htmlspecialchars($item['puissance']); ?></p>
            <?php endif; ?>
            <?php if (!empty($item['capacite_reservoir'])): ?>
            <p class="text-descriptif">Capacité du réservoir : <?= htmlspecialchars($item['capacite_reservoir']); ?></p>
            <?php endif; ?>
            <?php if (!empty($item['diametre'])): ?>
            <p class="text-descriptif">Diamètre : <?= htmlspecialchars($item['diametre']); ?></p>
            <?php endif; ?>
            <?php if (!empty($item['vitesse_souffle'])): ?>
            <p class="text-descriptif">Vitesse de souffle : <?= htmlspecialchars($item['vitesse_souffle']); ?></p>
            <?php endif; ?>
            <?php if (!empty($item['autonomie'])): ?>
            <p class="text-descriptif">Autonomie : <?= htmlspecialchars($item['autonomie']); ?></p>
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