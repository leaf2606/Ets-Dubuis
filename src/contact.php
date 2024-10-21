<?php

session_start();

require_once("connect.php");

$erreur = '';
$message_soumission = '';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Récupération des données du formulaire
    $nom = $_POST['nom'];
    $prenom = $_POST['prenom'];
    $email = $_POST['email'];
    $telephone = $_POST['telephone'];
    $objet = $_POST['objet']; 
    $message = $_POST['message'];
    $envoyer = $_POST['envoyer'];

    if(isset($envoyer)) {
        // Validation des champs
        if(empty($nom)) $erreur .= "<li>Nom laissé vide !</li>";
        if(empty($prenom)) $erreur .= "<li>Prénom laissé vide !</li>";
        if(empty($email)) $erreur .= "<li>E-mail laissé vide !</li>";
        if(empty($telephone)) $erreur .= "<li>Téléphone laissé vide !</li>";
        if(empty($objet)) $erreur .= "<li>Statut laissé vide !</li>"; 
        if(empty($message)) $erreur .= "<li>Message laissé vide !</li>";

        // Si aucune erreur, procéder à l'insertion dans la base de données
        if (empty($erreur)) {
            // Insertion des données dans la table
            $insertSql = "INSERT INTO formulaire_contact (nom, prenom, email, telephone, objet, message) VALUES (?, ?, ?, ?, ?, ?)";
            $insertQuery = $db->prepare($insertSql);
            $insertQuery->execute([$nom, $prenom, $email, $telephone, $objet, $message]);
            
            // Message de succès
            echo "<p>Formulaire soumis avec succès!</p>";
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
    <link rel="stylesheet" href="css/contact.css">
    <script src="js/script.js" defer></script>
    <title>Contact</title>
</head>

<body>

    <!-- Formulaire de devis  -->

    <div class="background-container-contact">

        <h1 class="titre-contact">Formulaire de contact</h1>

        <div id="devis" class="container-contact active">
            <form method="post">
                <div class="container">
                    <div class="form">
                        <div class="contact-lien">
                            <a href="#" class="contact-link" onclick="showForm('devis')">Devis &ensp;|</a>
                            <a href="#" class="contact-link" onclick="showForm('renseignement')">Renseignements
                                &ensp;|</a>
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
                                <option value="">Votre status</option>
                                <option value="particulier">Particulier</option>
                                <option value="profesionnel">Professionnel</option>
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
                            <a href="#" class="contact-link" onclick="showForm('renseignement')">Renseignements
                                &ensp;|</a>
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
                                <option value="">Préférence contact</option>
                                <option value="telephone">Téléphone</option>
                                <option value="email">E-mail</option>
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