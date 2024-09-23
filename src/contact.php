<!DOCTYPE html>
<html lang="en">

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
                    <h2 class="formulaire-contact">Formulaire de contact &ensp;|&ensp; <a
                            href="../index.php">Accueil</a></h2>
                    <div class="inputBox">
                        <input type="text" name="nom" id="nom" placeholder="Nom" value="Nom" required>
                    </div>
                    <div class="inputBox">
                        <input type="text" name="prenom" id="prenom" placeholder="Prénom" value="Prénom" required>
                    </div>
                    <div class="inputBox">
                        <input type="email" name="email" id="email" placeholder="E-mail" value="E-mail" required>
                    </div>
                    <div class="inputBox">
                        <input type="text" name="telephone" id="telephone" placeholder="Téléphone" value="Téléphone"
                            required>
                    </div>
                    <div class="inputBox">
                        <input type="datetime-local" name="date" id="date" placeholder="Date et Heure RDV" value="date"
                            required>
                    </div>
                    <div class="inputBox">
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