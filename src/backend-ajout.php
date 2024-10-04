<!-- Code backend-ajout

<?php
session_start();
require_once("connect.php"); // Assurez-vous de charger votre fichier de connexion à la base de données

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Vérifiez si le premier formulaire (ajout d'article) a été soumis
    if (isset($_POST['button-back']) && isset($_POST['titre']) && isset($_POST['message'])) {
        // Récupérez et sécurisez les entrées
        $titre = htmlspecialchars($_POST['titre']);
        $message = htmlspecialchars($_POST['message']);
        $prix = htmlspecialchars($_POST['prix']);
        $ref = htmlspecialchars($_POST['ref']);
        $marque = htmlspecialchars($_POST['marque']);
        $couleur = htmlspecialchars($_POST['couleur']);
        $category = htmlspecialchars($_POST['category']);
        $lien = htmlspecialchars($_POST['lien']);
        
        // Préparez et exécutez l'insertion dans la table users
        $sql = "INSERT INTO users (titre, message, prix, ref, marque, couleur, category, lien) VALUES (:titre, :message, :prix, :ref, :marque, :couleur, :category, :lien)";
        $query = $db->prepare($sql);
        $query->bindParam(':titre', $titre);
        $query->bindParam(':message', $message);
        $query->bindParam(':prix', $prix);
        $query->bindParam(':ref', $ref);
        $query->bindParam(':marque', $marque);
        $query->bindParam(':couleur', $couleur);
        $query->bindParam(':category', $category);
        $query->bindParam(':lien', $lien);
        
        if ($query->execute()) {
            echo "Article ajouté avec succès.";
        } else {
            echo "Erreur lors de l'ajout de l'article.";
        }
    }

    // Vérifiez si le deuxième formulaire (ajout de suggestion) a été soumis
    if (isset($_POST['button-back-suggestion']) && isset($_POST['titre']) && isset($_POST['text'])) {
        // Récupérez et sécurisez les entrées
        $suggestionTitre = htmlspecialchars($_POST['titre']);
        $suggestionText = htmlspecialchars($_POST['text']);
        $suggestionCategory = htmlspecialchars($_POST['category']);
        
        // Gérer le téléchargement de l'image si nécessaire
        if (isset($_FILES['image']) && $_FILES['image']['error'] == UPLOAD_ERR_OK) {
            $image = $_FILES['image']['name'];
            $tmp_name = $_FILES['image']['tmp_name'];
            move_uploaded_file($tmp_name, "uploads/$image"); // Assurez-vous que le dossier "uploads" existe
            
            // Préparez et exécutez l'insertion dans la table catalogue
            $sql = "INSERT INTO catalogue (titre, text, img, category) VALUES (:titre, :text, :img, :category)";
            $query = $db->prepare($sql);
            $query->bindParam(':titre', $suggestionTitre);
            $query->bindParam(':text', $suggestionText);
            $query->bindParam(':img', $image);
            $query->bindParam(':category', $suggestionCategory);
            
            if ($query->execute()) {
                echo "Suggestion ajoutée avec succès.";
            } else {
                echo "Erreur lors de l'ajout de la suggestion.";
            }
        } else {
            echo "Erreur lors du téléchargement de l'image.";
        }
    }
}
?>


<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/font.css">
    <link rel="stylesheet" href="css/materiels.css">
    <link rel="stylesheet" href="css/description.css">
    <title>Document</title>
</head>

<body>

    <form action="vetements.php" method="POST" class="formulaire-admin" enctype="multipart/form-data">
        <h1>Formulaire d'ajout d'article</h1>
        <input class="input-admin" type="file" name="image" value="<?= $catalogue["image"] ?>" required>
        <input class="input-admin" type="text" name="titre" placeholder="Titre" value="<?= $catalogue["titre"] ?>"
            required>
        <textarea class="input-admin" name="text" placeholder="Description" value="<?= $catalogue["text"] ?>"
            required></textarea>
        <a class="lien-card" href="vetements.php?id=<?= $similarItem['id']; ?>">Description</a>

        <label for="category">Choisir une catégorie :</label>
        <select name="category" required>
            <option value="<?= $catalogue["category"] ?>">Gants</option>
            <option value="<?= $catalogue["category"] ?>">Veste</option>
            <option value="<?= $catalogue["category"] ?>">Pantalons</option>
            <option value="<?= $catalogue["category"] ?>">Casque</option>
            <option value="<?= $catalogue["category"] ?>">Blousons</option>
        </select>

        <input class="button-back" type="submit" value="Ajouter l'article" name="button-back">
    </form>

</body>

</html> -->