<?php
session_start();
require_once("connect.php");

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Vérifier quel formulaire a été soumis
    if (isset($_POST['button-back'])) {
        // Traitement de l'ajout d'article
        $titre = $_POST['titre'];
        $message = $_POST['message'];
        $prix = $_POST['prix'];
        $ref = $_POST['ref'];
        $marque = $_POST['marque'];
        $couleur = $_POST['couleur'];
        $category = $_POST['category'];

        // Insérer dans la base de données
        $sql = "INSERT INTO catalogue (titre, message, prix, ref, marque, couleur, category) VALUES (:titre, :message, :prix, :ref, :marque, :couleur, :category)";
        $query = $db->prepare($sql);
        $query->bindParam(':titre', $titre);
        $query->bindParam(':message', $message);
        $query->bindParam(':prix', $prix);
        $query->bindParam(':ref', $ref);
        $query->bindParam(':marque', $marque);
        $query->bindParam(':couleur', $couleur);
        $query->bindParam(':category', $category);
        $query->execute();

        echo "Article ajouté avec succès.";
    }

    if (isset($_POST['button-back-suggestion'])) {
        // Traitement de l'ajout de suggestion
        $titreSuggestion = $_POST['titre'];
        $text = $_POST['text'];
        $categorySuggestion = $_POST['category'];
        
        // Si vous devez gérer l'upload d'image, ajoutez cette logique ici

        // Insérer dans la base de données
        $sql = "INSERT INTO users (titre, text, category) VALUES (:titre, :text, :category)";
        $query = $db->prepare($sql);
        $query->bindParam(':titre', $titre);
        $query->bindParam(':text', $text);
        $query->bindParam(':category', $category);
        $query->execute();

        echo "Suggestion ajoutée avec succès.";
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
    <link rel="stylesheet" href="css/backend.css">
    <title>Document</title>
</head>

<body>

    <h1 class="titre-back">Article |<a href="../index.php">&ensp;Accueil</a></h1>
    <div class="container-back">

        <!-- Formulaire de soumission d'article -->

        <form action="description.php" method="POST" class="formulaire-admin" enctype="multipart/form-data">
            <h1>Formulaire d'ajout de déscription</h1>
            <input type="hidden" name="user_id" value="<?= $catalogue['id'] ?>">
            <input class="input-admin" type="text" name="titre" placeholder="Titre" required>
            <textarea class="input-admin" name="message" placeholder="Description" required></textarea>
            <input class="input-admin" type="text" name="prix" placeholder="Prix" required>
            <input class="input-admin" type="text" name="ref" placeholder="Référence" required>
            <input class="input-admin" type="text" name="marque" placeholder="Marque" required>
            <input class="input-admin" type="text" name="couleur" placeholder="Couleur" required>

            <label for="category">Choisir une catégorie :</label>
            <select name="category" required>
                <option value="gants">Gants</option>
                <option value="veste">Veste</option>
                <option value="pantalons">Pantalons</option>
                <option value="casque">Casque</option>
                <option value="blousons">Blousons</option>
            </select>

            <input class="button-back" type="submit" value="Ajouter l'article" name="button-back">
        </form>

        <!-- Formulaire d'ajout de suggestion -->

        <form action="description.php" method="POST" class="formulaire-admin" enctype="multipart/form-data">
            <h1>Formulaire d'ajout de suggestion</h1>
            <input class="input-admin" type="file" name="image" required>
            <input class="input-admin" type="text" name="titre" placeholder="Titre" required>
            <textarea class="input-admin" name="text" placeholder="Description" required></textarea>
            <input class="input-admin" type="text" name="category" placeholder="Catégorie" required>

            <input class="button-back" type="submit" value="Ajouter la suggestion" name="button-back-suggestion">
        </form>

</body>

</html>