<?php

session_start();

if (
    isset($_POST["img"]) && !empty($_POST["img"]) &&
    isset($_POST["text"]) && !empty($_POST["text"]) &&
    isset($_POST["titre"]) && !empty($_POST["titre"]) &&
    isset($_POST["message"]) && !empty($_POST["message"]) &&
    isset($_POST["prix"]) && !empty($_POST["prix"]) &&
    isset($_POST["category"]) && !empty($_POST["category"])
) {
    require_once("connect.php");

    // Récupérer les données obligatoires
    $img = strip_tags($_POST["img"]);
    $titre = strip_tags($_POST["titre"]);
    $text = strip_tags($_POST["text"]);

    // Traitement pour le message
    $message = htmlspecialchars($_POST["message"]);

    // Vérification que le prix est un nombre positif
    $prix = str_replace('€', '', $_POST["prix"]);
    if (!is_numeric($prix) || $prix <= 0) {
        echo "Erreur : Le prix doit être un nombre positif.";
        exit;
    }

    $category = strip_tags($_POST["category"]);

    // Récupérer les données facultatives (elles peuvent être vides)
    $ref = isset($_POST["ref"]) ? strip_tags($_POST["ref"]) : null;
    $marque = isset($_POST["marque"]) ? strip_tags($_POST["marque"]) : null;
    $couleur = isset($_POST["couleur"]) ? strip_tags($_POST["couleur"]) : null;

    // Préparation de la requête SQL pour insérer les données
    $sql = "INSERT INTO catalogue (img, titre, text, message, prix, ref, marque, couleur, category) 
            VALUES (:img, :titre, :text, :message, :prix, :ref, :marque, :couleur, :category)";

    $query = $db->prepare($sql);
    $query->bindValue(":img", $img);
    $query->bindValue(":titre", $titre);
    $query->bindValue(":text", $text);
    $query->bindValue(":message", $message);
    $query->bindValue(":prix", floatval($prix));
    $query->bindValue(":ref", $ref);
    $query->bindValue(":marque", $marque);
    $query->bindValue(":couleur", $couleur);
    $query->bindValue(":category", $category);

    // Exécution de la requête
    if ($query->execute()) {
        // Récupérer l'ID de l'article ajouté
        $lastInsertId = $db->lastInsertId();

        // Redirection vers la description de l'article avec son ID
        header("Location: description.php?id=" . $lastInsertId);
        exit();
    } else {
        echo "Erreur : Impossible d'ajouter l'article.";
    }
} else {
    echo "Erreur : Veuillez remplir tous les champs obligatoires.";
}

?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="js/script.js"></script>
    <title>Backend-ajout</title>
</head>

<body>

</body>

</html>