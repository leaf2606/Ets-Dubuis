<?php
 
session_start();

require_once("connect.php");

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
        <form action="backend-ajout.php" method="POST" class="formulaire-admin" enctype="multipart/form-data">
            <input class="input-admin" type="text" name="titre" id="titre" placeholder="Titre">
            <textarea class="input-admin" name="message" id="message" placeholder="Description"></textarea>
            <input class="input-admin" type="text" name="prix" id="prix" placeholder="Prix">
            <input class="input-admin" type="text" name="ref" id="ref" placeholder="Référence">
            <input class="input-admin" type="text" name="marque" id="marque" placeholder="Marque">
            <input class="input-admin" type="text" name="couleur" id="couleur" placeholder="Couleur">
            <input class="input-admin" type="file" name="image" id="image">

            <!-- Choix des catégories -->
            <div class="container">
                <div class="title">La catégorie pour chaque lien</div>
                <div class="input-admin-group">
                    <input class="input-admin" type="checkbox" id="pc" name="category" value="pc">
                    <label class="input-admin" for="pc">PC</label>
                </div>
                <div class="input-admin-group">
                    <input class="input-admin" type="checkbox" id="playstation" name="category" value="playstation">
                    <label class="input-admin" for="playstation">PlayStation</label>
                </div>
                <div class="input-admin-group">
                    <input class="input-admin" type="checkbox" id="xbox" name="category" value="xbox">
                    <label class="input-admin" for="xbox">Xbox</label>
                </div>
                <div class="input-admin-group">
                    <input class="input-admin" type="checkbox" id="switch" name="category" value="switch">
                    <label class="input-admin" for="switch">Switch</label>
                </div>
            </div>

            <!-- Boutons de soumission -->
            <input class="button-back" type="submit" value="Ajouter l'article" name="button-back">
        </form>
    </div>
</body>

</html>