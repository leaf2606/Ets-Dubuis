<?php

session_start();

require_once("connect.php");

// Vérifier que l'utilisateur est connecté
if (!isset($_SESSION['user_id'])) {
    header("Location: compte.php");
    exit();
}

// Vérifier la présence de l'ID utilisateur dans l'URL
if (isset($_GET["user_id"]) && !empty($_GET["user_id"])) {
    $id = strip_tags($_GET["user_id"]);

    // Vérifier que l'utilisateur n'essaie pas de consulter les données d'un autre utilisateur
    if ($id != $_SESSION['user_id']) {
        header("Location: index.php");
        exit();
    }

    // Récupérer les informations de l'utilisateur depuis la base de données
    $sql = "SELECT * FROM users WHERE id = :id";
    $query = $db->prepare($sql); 
    $query->bindValue(":id", $id, PDO::PARAM_INT);
    $query->execute();
    $user = $query->fetch(PDO::FETCH_ASSOC);

    // Vérifier que l'utilisateur existe
    if (!$user) {
        echo "<p>Erreur : utilisateur non trouvé.</p>";
        header("Refresh: 3; url=index.php");
        exit();
    }
} else {
    header("Location: index.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <title>Recherche de stage</title>
</head>

<body>
    <h1>Recherche de Stage</h1>
    <div class="container-user">

        <!-- Utilisation de htmlspecialchars pour chaque valeur affichée -->
        <p>Titre : <?= htmlspecialchars($user["titre"]) ?></p>
        <p>Texte : <?= htmlspecialchars($user["text"]) ?></p>
        <p>Message : <?= htmlspecialchars($user["message"]) ?></p>
        <p>Prix : <?= htmlspecialchars($user["prix"]) ?></p>
        <p>Référence : <?= htmlspecialchars($user["ref"]) ?></p>
        <p>Marque : <?= htmlspecialchars($user["marque"]) ?></p>
        <p>Couleur : <?= htmlspecialchars($user["couleur"]) ?></p>

        <!-- Valider que l'image est bien une URL avant de l'afficher -->
        <p>Image :
            <?= filter_var($user["img"], FILTER_VALIDATE_URL) ? htmlspecialchars($user["img"]) : "URL d'image invalide" ?>
        </p>
        <p>Category : <?= htmlspecialchars($user["category"]) ?></p>

        <a href="description.php">Retour</a><br>
    </div>
</body>

</html>