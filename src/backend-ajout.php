<?php

session_start();

require_once("connect.php");

// Vérification des données POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    if (
        isset($_POST["img"]) && !empty($_POST["img"]) &&
        isset($_POST["text"]) && !empty($_POST["text"]) &&
        isset($_POST["titre"]) && !empty($_POST["titre"]) &&
        isset($_POST["message"]) && !empty($_POST["message"]) &&
        isset($_POST["prix"]) && !empty($_POST["prix"]) &&
        isset($_POST["category"]) && !empty($_POST["category"])
    ) {
        // Récupération et nettoyage des données
        $img = strip_tags($_POST["img"]);
        $titre = strip_tags($_POST["titre"]);
        $text = strip_tags($_POST["text"]);
        $message = htmlspecialchars($_POST["message"]);
        $prix = str_replace('€', '', $_POST["prix"]);
        $category = strip_tags($_POST["category"]);

        $ref = isset($_POST["ref"]) ? strip_tags($_POST["ref"]) : null;
        $marque = isset($_POST["marque"]) ? strip_tags($_POST["marque"]) : null;
        $couleur = isset($_POST["couleur"]) ? strip_tags($_POST["couleur"]) : null;
        $largeur_coupe = isset($_POST["largeur_coupe"]) ? strip_tags($_POST["largeur_coupe"]) : null;
        $moteur = isset($_POST["moteur"]) ? strip_tags($_POST["moteur"]) : null;
        $capacite_bac = isset($_POST["capacite_bac"]) ? strip_tags($_POST["capacite_bac"]) : null;
        $coupe = isset($_POST["coupe"]) ? strip_tags($_POST["coupe"]) : null;
        $roue = isset($_POST["roue"]) ? strip_tags($_POST["roue"]) : null;
        $divers = isset($_POST["divers"]) ? strip_tags($_POST["divers"]) : null;
        $transmission = isset($_POST["transmission"]) ? strip_tags($_POST["transmission"]) : null;
        $cylindre = isset($_POST["cylindre"]) ? strip_tags($_POST["cylindre"]) : null;
        $carburant = isset($_POST["carburant"]) ? strip_tags($_POST["carburant"]) : null;
        $poids = isset($_POST["poids"]) ? strip_tags($_POST["poids"]) : null;
        $puissance = isset($_POST["puissance"]) ? strip_tags($_POST["puissance"]) : null;

        // Préparation de la requête d'insertion
        $sql = "INSERT INTO catalogue (img, titre, text, message, prix, ref, marque, couleur, category, largeur_coupe, moteur, capacite_bac, coupe, roue, divers, transmission, cylindre, carburant, poids, puissance) 
                VALUES (:img, :titre, :text, :message, :prix, :ref, :marque, :couleur, :category, :largeur_coupe, :moteur, :capacite_bac, :coupe, :roue, :divers, :transmission, :cylindre, :carburant, :poids, :puissance)";

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
        $query->bindValue(":largeur_coupe", $largeur_coupe);
        $query->bindValue(":moteur", $moteur);
        $query->bindValue(":capacite_bac", $capacite_bac);
        $query->bindValue(":coupe", $coupe);
        $query->bindValue(":roue", $roue);
        $query->bindValue(":divers", $divers);
        $query->bindValue(":transmission", $transmission);
        $query->bindValue(":cylindre", $cylindre);
        $query->bindValue(":carburant", $carburant);
        $query->bindValue(":poids", $poids);
        $query->bindValue(":puissance", $puissance);

        // Exécution de la requête
        if ($query->execute()) {
            $lastInsertId = $db->lastInsertId();
            header("Location: description.php?id=" . $lastInsertId);
            exit();
        } else {
            echo "Erreur : Impossible d'ajouter l'article.";
        }
    } else {
        echo "Erreur : Veuillez remplir tous les champs obligatoires.";
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
    <script src="js/script.js"></script>
    <title>Ajout d'article</title>
</head>

<body>

</body>

</html>