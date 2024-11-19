<?php

session_start();

require_once("connect.php");

// Vérification des données POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    // Débogage initial des données POST
    // echo "<pre>";
    // print_r($_POST); 
    // echo "</pre>";

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

        $marque = isset($_POST["marque"]) ? strip_tags($_POST["marque"]) : '';
        $couleur = isset($_POST["couleur"]) ? strip_tags($_POST["couleur"]) : '';
        $type_moteur = isset($_POST["type_moteur"]) ? strip_tags($_POST["type_moteur"]) : '';
        $capacite_batterie = isset($_POST["capacite_batterie"]) ? strip_tags($_POST["capacite_batterie"]) : '';
        $type_temps = isset($_POST["type_temps"]) ? strip_tags($_POST["type_temps"]) : '';
        $type_carburant = isset($_POST["type_carburant"]) ? strip_tags($_POST["type_carburant"]) : '';
        $tension = isset($_POST["tension"]) ? strip_tags($_POST["tension"]) : '';
        $largeur_coupe = isset($_POST["largeur_coupe"]) ? strip_tags($_POST["largeur_coupe"]) : '';
        $type_fil = isset($_POST["type_fil"]) ? strip_tags($_POST["type_fil"]) : '';
        $type_lame = isset($_POST["type_lame"]) ? strip_tags($_POST["type_lame"]) : '';
        $longueur_lame = isset($_POST["longueur_lame"]) ? strip_tags($_POST["longueur_lame"]) : '';
        $vitesse_coupe = isset($_POST["vitesse_coupe"]) ? strip_tags($_POST["vitesse_coupe"]) : '';
        $poids = isset($_POST["poids"]) ? strip_tags($_POST["poids"]) : '';
        $poignee = isset($_POST["poignee"]) ? strip_tags($_POST["poignee"]) : '';
        $vibrations = isset($_POST["vibrations"]) ? strip_tags($_POST["vibrations"]) : '';
        $sangle = isset($_POST["sangle"]) ? strip_tags($_POST["sangle"]) : '';
        $type_coupe = isset($_POST["type_coupe"]) ? strip_tags($_POST["type_coupe"]) : '';
        $sonore = isset($_POST["sonore"]) ? strip_tags($_POST["sonore"]) : '';
        $systeme = isset($_POST["systeme"]) ? strip_tags($_POST["systeme"]) : '';
        $securite = isset($_POST["securite"]) ? strip_tags($_POST["securite"]) : '';
        $dimension = isset($_POST["dimension"]) ? strip_tags($_POST["dimension"]) : '';
        $puissance = isset($_POST["puissance"]) ? strip_tags($_POST["puissance"]) : '';
        $capacite_reservoir = isset($_POST["capacite_reservoir"]) ? strip_tags($_POST["capacite_reservoir"]) : '';
        $diametre = isset($_POST["diametre"]) ? strip_tags($_POST["diametre"]) : '';
        $vitesse_souffle = isset($_POST["vitesse_souffle"]) ? strip_tags($_POST["vitesse_souffle"]) : '';
        $autonomie = isset($_POST["autonomie"]) ? strip_tags($_POST["autonomie"]) : '';
        $type_essence = isset($_POST["type_essence"]) ? strip_tags($_POST["type_essence"]) : '';

    // Débogage des données traitées avant l'insertion
    //     echo "<pre>";
    // print_r([
    //     "img" => $img,
    //     "titre" => $titre,
    //     "text" => $text,
    //     "message" => $message,
    //     "prix" => $prix,
    //     "category" => $category,
    //     "marque" => $marque,
    //     "couleur" => $couleur,
    //     "type_moteur" => $type_moteur,
    //     "capacite_batterie" => $capacite_batterie,
    //     "type_temps" => $type_temps,
    //     "type_carburant" => $type_carburant,
    //     "tension" => $tension,
    //     "largeur_coupe" => $largeur_coupe,
    //     "type_fil" => $type_fil,
    //     "type_lame" => $type_lame,
    //     "longueur_lame" => $longueur_lame,
    //     "vitesse_coupe" => $vitesse_coupe,
    //     "poids" => $poids,
    //     "poignee" => $poignee,
    //     "vibrations" => $vibrations,
    //     "sangle" => $sangle,
    //     "type_coupe" => $type_coupe,
    //     "sonore" => $sonore,
    //     "systeme" => $systeme,
    //     "securite" => $securite,
    //     "dimension" => $dimension,
    //     "puissance" => $puissance,
    //     "capacite_reservoir" => $capacite_reservoir,
    //     "diametre" => $diametre,
    //     "vitesse_souffle" => $vitesse_souffle,
    //     "autonomie" => $autonomie
    // ]);
    // echo "</pre>";

        // Préparation de la requête d'insertion
         $sql = "INSERT INTO catalogue (img, titre, text, message, prix, marque, couleur, category, type_moteur, capacite_batterie, type_temps, type_carburant, tension, largeur_coupe, type_fil, type_lame, longueur_lame, vitesse_coupe, poids, poignee, vibrations, sangle, type_coupe, sonore, systeme, securite, dimension, puissance, capacite_reservoir, diametre, vitesse_souffle, autonomie, type_essence) 
                VALUES (:img, :titre, :text, :message, :prix, :marque, :couleur, :category, :type_moteur, :capacite_batterie, :type_temps, :type_carburant, :tension, :largeur_coupe, :type_fil, :type_lame, :longueur_lame, :vitesse_coupe, :poids, :poignee, :vibrations, :sangle, :type_coupe, :sonore, :systeme, :securite, :dimension, :puissance, :capacite_reservoir, :diametre, :vitesse_souffle, :autonomie, :type_essence)";

        $query = $db->prepare($sql);
        $query->bindValue(":img", $img);
        $query->bindValue(":titre", $titre);
        $query->bindValue(":text", $text);
        $query->bindValue(":message", $message);
        $query->bindValue(":prix", floatval($prix));
        $query->bindValue(":marque", $marque);
        $query->bindValue(":couleur", $couleur);
        $query->bindValue(":category", $category);
        $query->bindValue(":type_moteur", $type_moteur);
        $query->bindValue(":capacite_batterie", $capacite_batterie);
        $query->bindValue(":type_temps", $type_temps);
        $query->bindValue(":type_carburant", $type_carburant);
        $query->bindValue(":tension", $tension);
        $query->bindValue(":largeur_coupe", $largeur_coupe);
        $query->bindValue(":type_fil", $type_fil);
        $query->bindValue(":type_lame", $type_lame);
        $query->bindValue(":longueur_lame", $longueur_lame);
        $query->bindValue(":vitesse_coupe", $vitesse_coupe);
        $query->bindValue(":poids", $poids);
        $query->bindValue(":poignee", $poignee);
        $query->bindValue(":vibrations", $vibrations);
        $query->bindValue(":sangle", $sangle);
        $query->bindValue(":type_coupe", $type_coupe);
        $query->bindValue(":sonore", $sonore);
        $query->bindValue(":systeme", $systeme);
        $query->bindValue(":securite", $securite);
        $query->bindValue(":dimension", $dimension);
        $query->bindValue(":puissance", $puissance);
        $query->bindValue(":capacite_reservoir", $capacite_reservoir);
        $query->bindValue(":diametre", $diametre);
        $query->bindValue(":vitesse_souffle", $vitesse_souffle);
        $query->bindValue(":autonomie", $autonomie);
        $query->bindValue(":type_essence", $type_essence);

        // Exécution de la requête
        if ($query->execute()) {
            $lastInsertId = $db->lastInsertId();
            header("Location: description.php?id=" . $lastInsertId);
            exit();
        } else {
            // Affichage d'erreurs SQL (utile uniquement en phase de débogage)
            // echo "<pre>";
            // print_r($query->errorInfo()); 
            // echo "</pre>";
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