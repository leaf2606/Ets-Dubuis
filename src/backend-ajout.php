<?php

session_start();

require_once("connect.php");

$sql = "SELECT * FROM article_back";
$query = $db->prepare($sql);
$query->execute();
$article_back = $query->fetchAll(PDO::FETCH_ASSOC);

if (
isset($_POST["titre"]) && !empty($_POST["titre"]) &&
isset($_POST["message"]) && !empty($_POST["message"]) &&
isset($_POST["prix"]) && !empty($_POST["prix"]) &&
isset($_POST["ref"]) && !empty($_POST["ref"]) &&
isset($_POST["marque"]) && !empty($_POST["marque"]) &&
isset($_POST["couleur"]) && !empty($_POST["couleur"]) &&
isset($_POST["category"]) && !empty($_POST["category"])
) {
$titre = strip_tags($_POST["titre"]);
$message = strip_tags($_POST["message"]);
$prix = (float)strip_tags($_POST["prix"]);
$ref = strip_tags($_POST["ref"]);
$marque = strip_tags($_POST["marque"]);
$couleur = strip_tags($_POST["couleur"]);
$category = strip_tags($_POST["category"]); 

// Gérer l'upload d'image
$img = '';
if (isset($_FILES['image']) && $_FILES['image']['error'] == 0) {
$img = 'uploads/' . basename($_FILES['image']['name']);
move_uploaded_file($_FILES['image']['tmp_name'], $img);
}

$sql = "INSERT INTO article_back (titre, message, prix, ref, marque, couleur, img, category)
VALUES (:titre, :message, :prix, :ref, :marque, :couleur, :img, :category)";
$query = $db->prepare($sql);
$query->bindValue(":titre", $titre);
$query->bindValue(":message", $message);
$query->bindValue(":prix", $prix);
$query->bindValue(":ref", $ref);
$query->bindValue(":marque", $marque);
$query->bindValue(":couleur", $couleur);
$query->bindValue(":img", $img);
$query->bindValue(":category", $category);

$query->execute();
$_SESSION["message"] = "Article ajouté avec succès !";
header("Location: description.php?category=$category");
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
    <title>Page administrateur</title>
</head>

<body>
    <h1 class="titre-back">Article |<a href="../index.php">&ensp;Accueil</a></h1>
    <div class="container-back">

        <!-- Formulaire de soumission d'article -->

        <form action="" method="POST" class="formulaire-admin" enctype="multipart/form-data">
            <input class="input-admin" type="text" name="titre" id="titre" placeholder="Titre">
            <textarea class="input-admin" name="message" id="message" placeholder="Description"></textarea>
            <input class="input-admin" type="text" name="prix" id="prix" placeholder="Prix">
            <input class="input-admin" type="text" name="ref" id="ref" placeholder="Référence">
            <input class="input-admin" type="text" name="marque" id="marque" placeholder="Marque">
            <input class="input-admin" type="text" name="couleur" id="couleur" placeholder="Couleur">
            <input class="input-admin" type="file" name="image" id="image">

            <!-- Choix des catégories -->

            <label for="category">Choisir une catégorie :</label>
            <select name="category" id="category">
                <option value="gants">Gants</option>
                <option value="veste">Veste</option>
                <option value="pantalons">Pantalons</option>
                <option value="casque">Casque</option>
                <option value="blousons">Blousons</option>
            </select>

            <label for="file">Choisir un fichier :</label>
            <select name="file" id="file">
                <option value="debrouissailleuse.php">Débrousailleuse</option>
                <option value="diesel.php">Diesel</option>
                <option value="vetements.php">Vêtements</option>
            </select>

            <!-- Boutons de soumission -->

            <input class="button-back" type="submit" value="Ajouter l'article" name="button-back">
        </form>

        <!-- Les Cards -->

        <form action="vetements.php" method="POST" class="formulaire-admin" enctype="multipart/form-data">
            <h1>Pour Vêtements :</h1>
            <input class="input-admin" type="file" name="image" id="image">
            <input class="input-admin" type="text" name="titre" id="titre" placeholder="Titre">
            <input class="input-admin" type="text" name="titre" id="titre" placeholder="Titre">
            <textarea class="input-admin" name="message" id="message" placeholder="Description"></textarea>

            <input class="button-back" type="submit" value="Ajouter l'article" name="button-back">
        </form>


        <form action="motos.php" method="POST" class="formulaire-admin" enctype="multipart/form-data">
            <h1>Pour Motos :</h1>
            <input class="input-admin" type="file" name="image" id="image">
            <input class="input-admin" type="text" name="titre" id="titre" placeholder="Titre">
            <input class="input-admin" type="text" name="titre" id="titre" placeholder="Titre">
            <textarea class="input-admin" name="message" id="message" placeholder="Description"></textarea>

            <input class="button-back" type="submit" value="Ajouter l'article" name="button-back">
        </form>


        <form action="diesel.php" method="POST" class="formulaire-admin" enctype="multipart/form-data">
            <h1>Pour diesel :</h1>
            <input class="input-admin" type="file" name="image" id="image">
            <input class="input-admin" type="text" name="titre" id="titre" placeholder="Titre">
            <input class="input-admin" type="text" name="titre" id="titre" placeholder="Titre">
            <textarea class="input-admin" name="message" id="message" placeholder="Description"></textarea>

            <input class="button-back" type="submit" value="Ajouter l'article" name="button-back">
        </form>

    </div>

</body>

</html>