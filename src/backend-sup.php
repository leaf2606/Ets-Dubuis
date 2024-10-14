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
        $article = $query->fetch(PDO::FETCH_ASSOC);

        if (!$article) {
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
    <h1>Suppression de l'article</h1>
    <div>
        <p>Êtes-vous sûr de vouloir supprimer cet article ?</p>

        <form action="backend-sup.php?id=<?= htmlspecialchars($_GET['id']); ?>" method="POST">
            <button type="submit" class="button-back">Supprimer l'article</button>
            <a href="index.php" class="button-back">Annuler</a>
        </form>
    </div>
</body>

</html>