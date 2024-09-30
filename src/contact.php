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
    <link rel="stylesheet" href="css/contact.css">
    <title>Contact</title>
</head>

<body>

    <?php include_once("./include/navbar.php"); ?>

    <div class="container-contact">
        <form method="post">
            <div class="container">
                <div class="form">
                    <h2 class="formulaire-contact">Formulaire de contact &ensp;|&ensp; <a href="../index.php"
                            class="retour-accueil">Accueil</a></h2>
                    <div class="inputBox">
                        <input type="text" name="nom" id="nom" placeholder="Nom" required>
                    </div>
                    <div class="inputBox">
                        <input type="text" name="prenom" id="prenom" placeholder="Prénom" required>
                    </div>
                    <div class="inputBox">
                        <input type="email" name="email" id="email" placeholder="E-mail" required>
                    </div>
                    <div class="inputBox">
                        <input type="text" name="telephone" id="telephone" placeholder="Téléphone""
                            required>
                    </div>
                    <div class=" inputBox">
                        <input type="datetime-local" name="date" id="datetime-local" placeholder="Date et Heure RDV""
                            required>
                    </div>
                    <div class=" inputBox">
                        <textarea name="message" id="text" placeholder="Votre message"></textarea>
                    </div>
                    <div class="inputBox">
                        <input type="submit" value="Envoyer" name="envoyer" class="button-connexion">
                    </div>
                </div>
            </div>
        </form>
    </div>
</body>

</html>