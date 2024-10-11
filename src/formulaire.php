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
    <link rel="stylesheet" href="css/materiels.css">
    <link rel="stylesheet" href="css/backend.css">
    <title>Document</title>
</head>

<body>

    <h1 class="titre-back">Article | <a href="../index.php">&ensp;Accueil</a></h1>
    <div class="container-back">
        <form action="backend-ajout.php" method="POST" class="formulaire-admin" enctype="multipart/form-data">
            <h1>Formulaire d'ajout d'article</h1>
            <input class="input-admin" type="text" name="img" required>
            <input class="input-admin" type="text" name="titre" placeholder="Titre" required>
            <input class="input-admin" type="text" name="text" placeholder="Titre" required>
            <textarea class="input-admin" name="message" placeholder="Description" required></textarea>
            <input class="input-admin" type="text" name="prix" placeholder="Prix" required>
            <input class="input-admin" type="text" name="ref" placeholder="Référence" required>
            <input class="input-admin" type="text" name="marque" placeholder="Marque" required>
            <input class="input-admin" type="text" name="couleur" placeholder="Couleur" required>

            <label for="category">Choisir la catégorie :</label><br>
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
            </select><br>

            <select id="typeProduit" onchange="afficherChamps()">
                <option value="">Les liens pour la description</option>
                <option value="vetements">Vêtements</option>
                <option value="debrouissailleuse">Débrouissailleuse</option>
                <option value="taille-haie">Taille Haie</option>
                <option value="tronçonneuse">Tronçonneuse</option>
                <option value="elagueuse">Elagueuse</option>
                <option value="souffleur">Soufleur</option>
                <option value="motos">Motos</option>
                <option value="vehicules-diesel">vehicules Diesel</option>
                <option value="vehicules-essence">Vehicules Essence</option>
            </select>

            <div id="champsSpecifiques"></div>

            <input class="button-back" type="submit" value="Ajouter un article">
        </form>
    </div>

    <script>
    function afficherChamps() {
        const typeProduit = document.getElementById("typeProduit").value;
        const champsDiv = document.getElementById("champsSpecifiques");
        champsDiv.innerHTML = '';

        let champs = '';

        if (typeProduit === 'vetements') {
            champs = `
      <label>Couleur: <input type="text" name="couleur"></label><br>
      <label>Marque: <input type="text" name="marque"></label><br>
      <label>Référence: <input type="text" name="ref"></label><br>
    `;
        } else if (typeProduit === 'motos') {
            champs = `
      <label>Marque: <input type="text" name="marque"></label><br>
    `;
        } else if (typeProduit === 'debrouissailleuse') {
            champs = `
      <label>Référence: <input type="text" name="reference"></label><br>
    `;
        }

        champsDiv.innerHTML = champs; // Afficher les champs correspondants
    }
    </script>


</body>

</html>