<?php

session_start();

require_once("connect.php");

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['button-back'])) {
        // Récupérer les données du formulaire
        $titre = $_POST['titre'] ?? null;
        $message = $_POST['message'] ?? null;
        $prix = $_POST['prix'] ?? null;
        $ref = $_POST['ref'] ?? null;
        $marque = $_POST['marque'] ?? null;
        $couleur = $_POST['couleur'] ?? null;
        $category = $_POST['category'] ?? null;

        // Vérifiez que tous les champs sont remplis
        if ($titre && $message && $prix && $ref && $marque && $couleur && $category) {
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

            // Récupérer l'ID de l'article nouvellement inséré
            $lastId = $db->lastInsertId();

            // Rediriger vers la page de description
            header("Location: description.php?id=" . $lastId);
            exit;
        } else {
            echo "Erreur : Tous les champs sont requis.";
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
    <link rel="stylesheet" href="css/backend.css">
    <title>Document</title>
</head>

<body>

    <h1 class="titre-back">Article |<a href="../index.php">&ensp;Accueil</a></h1>
    <div class="container-back">

        <!-- Formulaire ajout pour les cartes avec les catégories -->

        <form action="" method="POST" class="formulaire-admin" enctype="multipart/form-data">
            <h1>Formulaire d'ajout d'article</h1>
            <input class="input-admin" type="file" name="image" required>
            <input class="input-admin" type="text" name="titre" placeholder="Titre-carte" required>
            <textarea class="input-admin" name="message" placeholder="Description-carte" required></textarea>

            <label for="category">Choisir une catégorie :</label>
            <select name="category" required>
                <option value="vetements">Vêtements</option>
                <option value="accessoires">Accessoires</option>
                <option value="motos">Equipements</option>
                <option value="dhc">DHC</option>
                <option value="cs">CS</option>
                <option value="hc">HC</option>
                <option value="hcr">HCR</option>
                <option value="dhcs">DHCS</option>
                <option value="hcs">HCS</option>
                <option value="pb">PB</option>
                <option value="dpb">DPB</option>
                <option value="es">ES</option>
                <option value="enduro">RR ENDURO</option>
                <option value="motard">RR MOTARD</option>
                <option value="rx">RX</option>
                <option value="trainer">XTRAINER</option>
                <option value="evo">EVO</option>
                <option value="alp">ALP</option>
                <option value="electric">MINIBIKES ELECTRIC</option>
                <option value="gazon-1">Gazon Essence</option>
                <option value="vegetation-1">Végétation Essence</option>
                <option value="travail">Travail de la terre Essence</option>
                <option value="ppf">PPF</option>
                <option value="ppt">PPT</option>
                <option value="dhca">DHCA</option>
                <option value="dppf">DPPF</option>
                <option value="terre">Travail de la terre Diesel</option>
                <option value="vegetation">Végétation Diesel</option>
                <option value="gazon">Gazon Diesel</option>
                <option value="grands">Grands espaces Diesel</option>
                <option value="dos">A Dos</option>
                <option value="serie">Série T</option>
                <option value="srm">SRM</option>
                <option value="dsrm">DSRM</option>
            </select>

        </form>

        <!-- Formulaire de description -->

        <form action="description.php" method="POST" class="formulaire-admin" enctype="multipart/form-data">
            <h1>Formulaire d'ajout de description</h1>
            <input class="input-admin" type="text" name="titre" placeholder="Titre" required>
            <textarea class="input-admin" name="message" placeholder="Description" required></textarea>
            <input class="input-admin" type="text" name="prix" placeholder="Prix" required>
            <input class="input-admin" type="text" name="ref" placeholder="Référence" required>
            <input class="input-admin" type="text" name="marque" placeholder="Marque" required>
            <input class="input-admin" type="text" name="couleur" placeholder="Couleur" required>

            <input class="button-back" type="submit" value="Ajouter l'article" name="button-back">

        </form>
    </div>
</body>

</html>