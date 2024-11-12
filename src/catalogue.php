<?php

session_start();

require_once("connect.php");

// Vérifier la présence de l'ID utilisateur dans l'URL
if (isset($_GET["id"]) && !empty($_GET["id"])) {
    $id = strip_tags($_GET["id"]);

    // Vérifier que l'utilisateur n'essaie pas de consulter les données d'un autre utilisateur
    if ($id != $_SESSION['compte']['id']) {
        header("Location: index.php"); 
        exit();
    }

    // Récupérer les informations de l'utilisateur depuis la base de données
    $sql = "SELECT * FROM catalogue WHERE id = :id";
    $query = $db->prepare($sql); 
    $query->bindValue(":id", $id, PDO::PARAM_INT);
    $query->execute();
    $catalogue = $query->fetch(PDO::FETCH_ASSOC);

    // Vérifier que l'utilisateur existe
    if (!$catalogue) {
        echo "<p>Erreur : utilisateur non trouvé.</p>";
        header("Location: description.php");
        exit();
    }
} else {
    header("Location: description.php");
    exit();
}

?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/font.css">
    <title>Recherche de Stage</title>
</head>

<body>
    <h1>Recherche de Stage</h1>
    <div class="container-user">

        <!-- Utilisation de htmlspecialchars pour chaque valeur affichée -->
        <p>Image : <?= htmlspecialchars($catalogue["img"]) ?></p>
        <p>Titre : <?= htmlspecialchars($catalogue["titre"]) ?></p>
        <p>Texte : <?= htmlspecialchars($catalogue["text"]) ?></p>
        <p>Message : <?= htmlspecialchars($catalogue["message"]) ?></p>
        <p>Prix : <?= htmlspecialchars($catalogue["prix"]) ?></p>
        <p>Marque : <?= htmlspecialchars($catalogue["marque"]) ?></p>
        <p>Couleur : <?= htmlspecialchars($catalogue["couleur"]) ?></p>
        <p>Category : <?= htmlspecialchars($catalogue["category"]) ?></p>

        <a href="description.php">Retour</a><br>
    </div>
</body>

</html>