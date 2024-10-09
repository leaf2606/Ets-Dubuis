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

    <!-- Formulaire de devis  -->

    <div id="devis" class="container-contact active">
        <form method="post">
            <div class="container">
                <div class="form">
                    <div class="contact-lien">
                        <a href="#" class="contact-link" onclick="showForm('devis')">Devis &ensp;|</a>
                        <a href="#" class="contact-link" onclick="showForm('renseignement')">Renseignements &ensp;|</a>
                        <a href="../index.php" class="contact-link">Accueil</a>
                    </div>
                    <div class="inputBox">
                        <input type="text" name="nom" id="nom_devis" placeholder="Nom" required>
                    </div>
                    <div class="inputBox">
                        <input type="text" name="prenom" id="prenom_devis" placeholder="Prénom" required>
                    </div>
                    <div class="inputBox">
                        <input type="email" name="email" id="email_devis" placeholder="E-mail" required>
                    </div>
                    <div class="inputBox">
                        <input type="text" name="telephone" id="telephone_devis" placeholder="Téléphone" required>
                    </div>
                    <div class="inputBox">
                        <select name="objet" id="objet_devis">
                            <option value="1">Votre status</option>
                            <option value="2">Particulier</option>
                            <option value="3">Professionnel</option>
                        </select>
                    </div>
                    <div class="inputBox">
                        <textarea name="message" id="message_devis" placeholder="Votre message"></textarea>
                    </div>
                    <div class="inputBox">
                        <input type="submit" value="Envoyer" name="envoyer" class="button-connexion">
                    </div>
                </div>
            </div>
        </form>
    </div>

    <!-- Formulaire de renseignement  -->

    <div id="renseignement" class="container-contact">
        <form method="post">
            <div class="container">
                <div class="form">
                    <div class="contact-lien">
                        <a href="#" class="contact-link" onclick="showForm('devis')">Devis &ensp;|</a>
                        <a href="#" class="contact-link" onclick="showForm('renseignement')">Renseignements &ensp;|</a>
                        <a href="../index.php" class="contact-link">Accueil</a>
                    </div>
                    <div class="inputBox">
                        <input type="text" name="nom" id="nom_renseignement" placeholder="Nom" required>
                    </div>
                    <div class="inputBox">
                        <input type="text" name="prenom" id="prenom_renseignement" placeholder="Prénom" required>
                    </div>
                    <div class="inputBox">
                        <input type="email" name="email" id="email_renseignement" placeholder="E-mail" required>
                    </div>
                    <div class="inputBox">
                        <input type="text" name="telephone" id="telephone_renseignement" placeholder="Téléphone"
                            required>
                    </div>
                    <div class="inputBox">
                        <select name="objet" id="objet_devis">
                            <option value="1">Préférence de contact</option>
                            <option value="2">Téléphone</option>
                            <option value="3">E-mail</option>
                        </select>
                    </div>
                    <div class="inputBox">
                        <textarea name="message" id="message_renseignement" placeholder="Votre message"></textarea>
                    </div>
                    <div class="inputBox">
                        <input type="submit" value="Envoyer" name="envoyer" class="button-connexion">
                    </div>
                </div>
            </div>
        </form>
    </div>

    <!-- lien connexion-inscription -->

    <script>
    function showForm(formId) {
        document.getElementById('devis').classList.remove('active');
        document.getElementById('renseignement').classList.remove('active');
        document.getElementById(formId).classList.add('active');
    }
    </script>

</body>

</html>