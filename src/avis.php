<?php
session_start();
require_once("connect.php");

// Vérifie que l'ID de l'article est fourni
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Vérification que l'utilisateur est connecté
    if (!isset($_SESSION['compte']) || !isset($_SESSION['compte']['id'])) {
        // echo "Erreur : Vous devez être connecté pour laisser un avis.";
        header("Location: compte.php");
        exit();
    }

    // Récupération des données du formulaire
    $article_id = filter_input(INPUT_POST, 'article_id', FILTER_VALIDATE_INT);
    $note = filter_input(INPUT_POST, 'note', FILTER_VALIDATE_INT);
    $commentaire = strip_tags(trim($_POST['commentaire']));

    // Validation des données
    if (!$article_id || !$note || !$commentaire) {
        echo "Erreur : Données invalides.";
        exit();
    }

    $user_id = $_SESSION['compte']['id']; 

    // Préparation de l'insertion dans la base de données
    $sql = "INSERT INTO avis (article_id, user_id, note, commentaire) VALUES (:article_id, :user_id, :note, :commentaire)";
    $query = $db->prepare($sql);

    // Liaison des paramètres
    $query->bindValue(':article_id', $article_id, PDO::PARAM_INT);
    $query->bindValue(':user_id', $user_id, PDO::PARAM_INT);
    $query->bindValue(':note', $note, PDO::PARAM_INT);
    $query->bindValue(':commentaire', $commentaire, PDO::PARAM_STR);

    // Exécution de la requête
    if ($query->execute()) {
        // Redirection vers la page de description de l'article
        header("Location: description.php?id=" . $article_id);
        exit();
    } else {
        echo "Erreur : Impossible d'ajouter l'avis.";
    }
} else {
    echo "Erreur : Méthode de requête invalide.";
}
?>