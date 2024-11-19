<?php

session_start(); 

require_once("connect.php");

function isAdmin() {
    return isset($_SESSION['compte']['role']) && $_SESSION['compte']['role'] === 'admin';
}

// Redirection si l'utilisateur n'est pas admin
if (!isAdmin()) {
    header("Location: ../index.php"); 
    exit();
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
    <link rel="stylesheet" href="css/vetements.css">
    <script src="js/script.js"></script>
    <title>Document</title>
</head>

<body>

    <h1 class="titre-back">Article | <a href="../index.php">&ensp;Accueil</a></h1>

    <div id="news-lien-id">
        <div class="lien-news-modifs">
            <button class="lien-nouveautes-modifs"
                onclick="openTab('debroussailleuse-formulaire')">Débroussailleuse</button>
            <button class="lien-nouveautes-modifs" onclick="openTab('taille-formulaire')">Taille Haie</button>
            <button class="lien-nouveautes-modifs" onclick="openTab('tronçonneuse-formulaire')">Tronçonneuse</button>
            <button class="lien-nouveautes-modifs" onclick="openTab('elagueuse-formulaire')">Elagueuse</button>
            <button class="lien-nouveautes-modifs" onclick="openTab('souffleur-formulaire')">Souffleur</button>
            <button class="lien-nouveautes-modifs" onclick="openTab('equipements-formulaire')">Equipements</button>
            <button class="lien-nouveautes-modifs" onclick="openTab('motos-formulaire')">Motos</button>
            <button class="lien-nouveautes-modifs" onclick="openTab('vehicules-formulaire')">Véhicules</button>
        </div>
    </div><br>

    <div class="container-back">
        <div id="debroussailleuse-formulaire" class="container-catagorie">
            <form action="backend-ajout.php" method="POST" class="formulaire-admin" enctype="multipart/form-data">
                <h1 class="titre-formulaire-admin">Formulaire d'ajout Débroussailleuse</h1>
                <input class="input-admin" type="text" name="img" id="img" placeholder="URL de l'image">
                <input class="input-admin" type="text" name="titre" id="titre"
                    placeholder="Titre pour la carte et la description">
                <input class="input-admin" type="text" name="text" id="text" placeholder="Texte pour la carte">
                <textarea class="input-admin" name="message" id="message" placeholder="Description"></textarea>
                <input class="input-admin" type="text" name="prix" id="prix" placeholder="Prix">
                <input class="input-admin" type="text" name="couleur" id="couleur" placeholder="Couleur">
                <input class="input-admin" type="text" name="marque" id="marque" placeholder="Marque"><br>

                <label class="label-formulaire-admin" for="type_moteur">Type de débrousailleuse</label>
                <select name="type_moteur" id="type_moteur" class="select-formulaire-admin" required>
                    <option value="electric">Electrique</option>
                    <option value="batterie">A batterie</option>
                    <option value="thermique">Thermique</option>
                </select><br>

                <input class="input-admin" type="text" name="puissance" id="puissance"
                    placeholder="Puissance du moteur">
                <input class="input-admin" type="text" name="capacite_batterie" id="capacite_batterie"
                    placeholder="Capacité de la batterie"><br>

                <label class="label-formulaire-admin" for="type_temps">Type de moteur</label>
                <select name="type_temps" id="type_temps" class="select-formulaire-admin" required>
                    <option value="2-temps">2 temps</option>
                    <option value="4-temps">4 temps</option>
                </select><br>

                <input class="input-admin" type="text" name="type_carburant" id="type_carburant"
                    placeholder="Type de carburant">
                <input class="input-admin" type="text" name="tension" id="tension" placeholder="Tension">
                <input class="input-admin" type="text" name="autonomie" id="autonomie" placeholder="Autonomie">
                <input class="input-admin" type="text" name="capacite_reservoir" id="capacite_reservoir"
                    placeholder="Capacité du réservoir">
                <input class="input-admin" type="text" name="largeur_coupe" id="largeur_coupe"
                    placeholder="Largeur de coupe">
                <input class="input-admin" type="text" name="type_fil" id="type_fil" placeholder="Type de fil de coupe">
                <input class="input-admin" type="text" name="type_lame" id="type_lame" placeholder="Type de lame">
                <input class="input-admin" type="text" name="poids" id="poids" placeholder="Poids">
                <input class="input-admin" type="text" name="poignee" id="poignee" placeholder="Type de poignée">
                <input class="input-admin" type="text" name="vibrations" id="vibrations"
                    placeholder="Système de redirection des vibrations">
                <input class="input-admin" type="text" name="sangle" id="sangle" placeholder="Sangle de maintien"><br>

                <label class="label-formulaire-admin" for="type_coupe">Type de coupe</label>
                <select name="type_coupe" id="type_coupe" class="select-formulaire-admin" required>
                    <option value="debrousailleuse-fil">Débrousailleuse à fil</option>
                    <option value="debrousailleuse-lame">Débrousailleuse à lame</option>
                </select><br>

                <input class="input-admin" type="text" name="sonore" id="sonore" placeholder="Niveau sonore">
                <input class="input-admin" type="text" name="systeme" id="systeme" placeholder="Système de démarrage">
                <input class="input-admin" type="text" name="securite" id="securite"
                    placeholder="Caractéristique de sécurité">
                <input class="input-admin" type="text" name="dimension" id="dimension" placeholder="Dimension">

                <label class="label-formulaire-admin" for="category">Choisir la catégorie :</label>
                <select name="category" id="category" class="select-formulaire-admin" required>
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
                    <option value="gazon-1">Gazon ( Essence )</option>
                    <option value="vegetation-1">Végétation ( Essence )</option>
                    <option value="travail">Travail de la terre ( Essence )</option>
                    <option value="ppf">PPF</option>
                    <option value="ppt">PPT</option>
                    <option value="dhca">DHCA</option>
                    <option value="dppf">DPPF</option>
                    <option value="terre">Travail de la terre ( Diesel )</option>
                    <option value="vegetation">Végétation ( Diesel )</option>
                    <option value="gazon">Gazon ( Diesel )</option>
                    <option value="grands">Grands espaces ( Diesel )</option>
                    <option value="dos">A Dos</option>
                    <option value="serie">Série T</option>
                    <option value="srm">SRM</option>
                    <option value="dsrm">DSRM</option>
                </select><br>

                <input class="button-back-4" type="submit" value="Ajouter un article">
            </form>
        </div>

        <div id="taille-formulaire" class="container-catagorie">
            <form action="backend-ajout.php" method="POST" class="formulaire-admin" enctype="multipart/form-data">
                <h1 class="titre-formulaire-admin">Formulaire d'ajout Taille Haie</h1>
                <input class="input-admin" type="text" name="img" id="img" placeholder="URL de l'image">
                <input class="input-admin" type="text" name="titre" id="titre"
                    placeholder="Titre pour la carte et la description">
                <input class="input-admin" type="text" name="text" id="text" placeholder="Texte pour la carte">
                <textarea class="input-admin" name="message" id="message" placeholder="Description"></textarea>
                <input class="input-admin" type="text" name="prix" id="prix" placeholder="Prix">
                <input class="input-admin" type="text" name="couleur" id="couleur" placeholder="Couleur">
                <input class="input-admin" type="text" name="marque" id="marque" placeholder="Marque"><br>

                <label class="label-formulaire-admin" for="type_moteur">Type de taille-haie</label>
                <select name="type_moteur" id="type_moteur" class="select-formulaire-admin" required>
                    <option value="electrique">Electrique</option>
                    <option value="batterie">A batterie</option>
                    <option value="thermique">Thermique</option>
                </select><br>

                <input class="input-admin" type="text" name="longueur_lame" id="longueur_lame"
                    placeholder="Longueur de la lame">
                <input class="input-admin" type="text" name="vitesse_coupe" id="vitesse_coupe"
                    placeholder="Vitesse de coupe"><br>

                <label class="label-formulaire-admin" for="type_temps">Type de moteur</label>
                <select name="type_temps" id="type_temps" class="select-formulaire-admin" required>
                    <option value="2-temps">2 temps</option>
                    <option value="4-temps">4 temps</option>
                </select><br>

                <input class="input-admin" type="text" name="type_carburant" id="type_carburant"
                    placeholder="Type de carburant">
                <input class="input-admin" type="text" name="poids" id="poids" placeholder="Poids"><br>

                <label class="label-formulaire-admin" for="category">Choisir la catégorie :</label>
                <select name="category" id="category" class="select-formulaire-admin" required>
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
                    <option value="gazon-1">Gazon ( Essence )</option>
                    <option value="vegetation-1">Végétation ( Essence )</option>
                    <option value="travail">Travail de la terre ( Essence )</option>
                    <option value="ppf">PPF</option>
                    <option value="ppt">PPT</option>
                    <option value="dhca">DHCA</option>
                    <option value="dppf">DPPF</option>
                    <option value="terre">Travail de la terre ( Diesel )</option>
                    <option value="vegetation">Végétation ( Diesel )</option>
                    <option value="gazon">Gazon ( Diesel )</option>
                    <option value="grands">Grands espaces ( Diesel )</option>
                    <option value="dos">A Dos</option>
                    <option value="serie">Série T</option>
                    <option value="srm">SRM</option>
                    <option value="dsrm">DSRM</option>
                </select><br>

                <input class="button-back-4" type="submit" value="Ajouter un article">
            </form>
        </div>

        <div id="tronçonneuse-formulaire" class="container-catagorie">
            <form action="backend-ajout.php" method="POST" class="formulaire-admin" enctype="multipart/form-data">
                <h1 class="titre-formulaire-admin">Formulaire d'ajout Tronçonneuse</h1>
                <input class="input-admin" type="text" name="img" id="img" placeholder="URL de l'image">
                <input class="input-admin" type="text" name="titre" id="titre"
                    placeholder="Titre pour la carte et la description">
                <input class="input-admin" type="text" name="text" id="text" placeholder="Texte pour la carte">
                <textarea class="input-admin" name="message" id="message" placeholder="Description"></textarea>
                <input class="input-admin" type="text" name="prix" id="prix" placeholder="Prix">
                <input class="input-admin" type="text" name="couleur" id="couleur" placeholder="Couleur">
                <input class="input-admin" type="text" name="marque" id="marque" placeholder="Marque"><br>

                <label class="label-formulaire-admin" for="type_moteur">Type de tronçonneuse</label>
                <select name="type_moteur" id="type_moteur" class="select-formulaire-admin" required>
                    <option value="electrique">Electrique</option>
                    <option value="batterie">A batterie</option>
                    <option value="thermique">Thermique</option>
                </select>

                <input class="input-admin" type="text" name="longueur_lame" id="longueur_lame"
                    placeholder="Longueur de la lame (en cm)">
                <input class="input-admin" type="text" name="vitesse_coupe" id="vitesse_coupe"
                    placeholder="Vitesse de coupe (en m/s)">

                <input class="input-admin" type="text" name="puissance" id="puissance"
                    placeholder="Puissance du moteur (en W ou cv)">
                <input class="input-admin" type="text" name="capacite_reservoir" id="capacite_reservoir"
                    placeholder="Capacité du réservoir (en L)"><br>

                <label class="label-formulaire-admin" for="category">Choisir la catégorie :</label>
                <select name="category" id="category" class="select-formulaire-admin" required>
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
                    <option value="gazon-1">Gazon ( Essence )</option>
                    <option value="vegetation-1">Végétation ( Essence )</option>
                    <option value="travail">Travail de la terre ( Essence )</option>
                    <option value="ppf">PPF</option>
                    <option value="ppt">PPT</option>
                    <option value="dhca">DHCA</option>
                    <option value="dppf">DPPF</option>
                    <option value="terre">Travail de la terre ( Diesel )</option>
                    <option value="vegetation">Végétation ( Diesel )</option>
                    <option value="gazon">Gazon ( Diesel )</option>
                    <option value="grands">Grands espaces ( Diesel )</option>
                    <option value="dos">A Dos</option>
                    <option value="serie">Série T</option>
                    <option value="srm">SRM</option>
                    <option value="dsrm">DSRM</option>
                </select><br>

                <input class="button-back-4" type="submit" value="Ajouter un article">
            </form>
        </div>

        <div id="elagueuse-formulaire" class="container-catagorie">
            <form action="backend-ajout.php" method="POST" class="formulaire-admin" enctype="multipart/form-data">
                <h1 class="titre-formulaire-admin">Formulaire d'ajout Elageuse</h1>
                <input class="input-admin" type="text" name="img" id="img" placeholder="URL de l'image">
                <input class="input-admin" type="text" name="titre" id="titre"
                    placeholder="Titre pour la carte et la description">
                <input class="input-admin" type="text" name="text" id="text" placeholder="Texte pour la carte">
                <textarea class="input-admin" name="message" id="message" placeholder="Description"></textarea>
                <input class="input-admin" type="text" name="prix" id="prix" placeholder="Prix">
                <input class="input-admin" type="text" name="couleur" id="couleur" placeholder="Couleur">
                <input class="input-admin" type="text" name="marque" id="marque" placeholder="Marque"><br>

                <label class="label-formulaire-admin" for="type_moteur">Type de tronçonneuse</label>
                <select name="type_moteur" id="type_moteur" class="select-formulaire-admin" required>
                    <option value="electrique">Electrique</option>
                    <option value="batterie">A batterie</option>
                    <option value="thermique">Thermique</option>
                    <option value="telescopique">Thélescopique</option>
                </select>

                <input class="input-admin" type="text" name="longueur_lame" id="longueur_lame"
                    placeholder="Longueur de la lame (en cm)">
                <input class="input-admin" type="text" name="puissance" id="puissance"
                    placeholder="Puissance du moteur (en W ou cv)">
                <input class="input-admin" type="text" name="type_coupe" id="type_coupe" placeholder="Type de coupe">
                <input class="input-admin" type="text" name="diametre" id="diametre"
                    placeholder="Diamètre maximal de la coupe">
                <input class="input-admin" type="text" name="poids" id="poids" placeholder="Poids">
                <input class="input-admin" type="text" name="securite" id="securite" placeholder="Système de sécurité">
                <input class="input-admin" type="text" name="poignee" id="poignee" placeholder="Type de poignée"><br>

                <label class="label-formulaire-admin" for="category">Choisir la catégorie :</label>
                <select name="category" id="category" class="select-formulaire-admin" required>
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
                    <option value="gazon-1">Gazon ( Essence )</option>
                    <option value="vegetation-1">Végétation ( Essence )</option>
                    <option value="travail">Travail de la terre ( Essence )</option>
                    <option value="ppf">PPF</option>
                    <option value="ppt">PPT</option>
                    <option value="dhca">DHCA</option>
                    <option value="dppf">DPPF</option>
                    <option value="terre">Travail de la terre ( Diesel )</option>
                    <option value="vegetation">Végétation ( Diesel )</option>
                    <option value="gazon">Gazon ( Diesel )</option>
                    <option value="grands">Grands espaces ( Diesel )</option>
                    <option value="dos">A Dos</option>
                    <option value="serie">Série T</option>
                    <option value="srm">SRM</option>
                    <option value="dsrm">DSRM</option>
                </select><br>

                <input class="button-back-4" type="submit" value="Ajouter un article">
            </form>
        </div>

        <div id="souffleur-formulaire" class="container-catagorie">
            <form action="backend-ajout.php" method="POST" class="formulaire-admin" enctype="multipart/form-data">
                <h1 class="titre-formulaire-admin">Formulaire d'ajout souffleur</h1>
                <input class="input-admin" type="text" name="img" id="img" placeholder="URL de l'image">
                <input class="input-admin" type="text" name="titre" id="titre"
                    placeholder="Titre pour la carte et la description">
                <input class="input-admin" type="text" name="text" id="text" placeholder="Texte pour la carte">
                <textarea class="input-admin" name="message" id="message" placeholder="Description"></textarea>
                <input class="input-admin" type="text" name="prix" id="prix" placeholder="Prix">
                <input class="input-admin" type="text" name="couleur" id="couleur" placeholder="Couleur">
                <input class="input-admin" type="text" name="marque" id="marque" placeholder="Marque"><br>

                <label class="label-formulaire-admin" for="type_moteur">Type de souffleur</label>
                <select name="type_moteur" id="type_moteur" class="select-formulaire-admin" required>
                    <option value="main">Souffleur à main</option>
                    <option value="porte">Souffleur porté</option>
                    <option value="electrique">Souffleur Eletrique</option>
                    <option value="thermique">Souffleur Thermique</option>
                    <option value="batterie">Souffleur Batterie</option>
                </select><br>

                <input class="input-admin" type="text" name="puissance" id="puissance"
                    placeholder="Puissance du moteur">
                <input class="input-admin" type="text" name="vitesse_souffle" id="vitesse_souffle"
                    placeholder="Vitesse de soufflage">
                <input class="input-admin" type="text" name="autonomie" id="autonomie" placeholder="Autonomie"><br>


                <label class="label-formulaire-admin" for="category">Choisir la catégorie :</label>
                <select name="category" id="category" class="select-formulaire-admin" required>
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
                    <option value="gazon-1">Gazon ( Essence )</option>
                    <option value="vegetation-1">Végétation ( Essence )</option>
                    <option value="travail">Travail de la terre ( Essence )</option>
                    <option value="ppf">PPF</option>
                    <option value="ppt">PPT</option>
                    <option value="dhca">DHCA</option>
                    <option value="dppf">DPPF</option>
                    <option value="terre">Travail de la terre ( Diesel )</option>
                    <option value="vegetation">Végétation ( Diesel )</option>
                    <option value="gazon">Gazon ( Diesel )</option>
                    <option value="grands">Grands espaces ( Diesel )</option>
                    <option value="dos">A Dos</option>
                    <option value="serie">Série T</option>
                    <option value="srm">SRM</option>
                    <option value="dsrm">DSRM</option>
                </select><br>

                <input class="button-back-4" type="submit" value="Ajouter un article">
            </form>
        </div>

        <div id="equipements-formulaire" class="container-catagorie">
            <form action="backend-ajout.php" method="POST" class="formulaire-admin" enctype="multipart/form-data">
                <h1 class="titre-formulaire-admin">Formulaire d'ajout Equipements</h1>
                <input class="input-admin" type="text" name="img" id="img" placeholder="URL de l'image">
                <input class="input-admin" type="text" name="titre" id="titre"
                    placeholder="Titre pour la carte et la description">
                <input class="input-admin" type="text" name="text" id="text" placeholder="Texte pour la carte">
                <textarea class="input-admin" name="message" id="message" placeholder="Description"></textarea>
                <input class="input-admin" type="text" name="prix" id="prix" placeholder="Prix">
                <input class="input-admin" type="text" name="couleur" id="couleur" placeholder="Couleur">
                <input class="input-admin" type="text" name="marque" id="marque" placeholder="Marque">
                <input class="input-admin" type="text" name="taille" id="taille" placeholder="Taille disponible"><br>

                <label class="label-formulaire-admin" for="category">Choisir la catégorie :</label>
                <select name="category" id="category" class="select-formulaire-admin" required>
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
                    <option value="gazon-1">Gazon ( Essence )</option>
                    <option value="vegetation-1">Végétation ( Essence )</option>
                    <option value="travail">Travail de la terre ( Essence )</option>
                    <option value="ppf">PPF</option>
                    <option value="ppt">PPT</option>
                    <option value="dhca">DHCA</option>
                    <option value="dppf">DPPF</option>
                    <option value="terre">Travail de la terre ( Diesel )</option>
                    <option value="vegetation">Végétation ( Diesel )</option>
                    <option value="gazon">Gazon ( Diesel )</option>
                    <option value="grands">Grands espaces ( Diesel )</option>
                    <option value="dos">A Dos</option>
                    <option value="serie">Série T</option>
                    <option value="srm">SRM</option>
                    <option value="dsrm">DSRM</option>
                </select><br>

                <input class="button-back-4" type="submit" value="Ajouter un article">
            </form>
        </div>

        <div id="motos-formulaire" class="container-catagorie">
            <form action="backend-ajout.php" method="POST" class="formulaire-admin" enctype="multipart/form-data">
                <h1 class="titre-formulaire-admin">Formulaire d'ajout Motos</h1>
                <input class="input-admin" type="text" name="img" id="img" placeholder="URL de l'image">
                <input class="input-admin" type="text" name="titre" id="titre"
                    placeholder="Titre pour la carte et la description">
                <input class="input-admin" type="text" name="text" id="text" placeholder="Texte pour la carte">
                <textarea class="input-admin" name="message" id="message" placeholder="Description"></textarea>
                <input class="input-admin" type="text" name="prix" id="prix" placeholder="Prix">
                <input class="input-admin" type="text" name="couleur" id="couleur" placeholder="Couleur">
                <input class="input-admin" type="text" name="marque" id="marque" placeholder="Marque"><br>

                <label class="label-formulaire-admin" for="type_moteur">Type de Motos</label>
                <select name="type_moteur" id="type_moteur" class="select-formulaire-admin" required>
                    <option value="electrique">Electrique</option>
                    <option value="batterie">A batterie</option>
                    <option value="thermique">Thermique</option>
                </select>

                <input class="input-admin" type="text" name="puissance" id="puissance" placeholder="Puissance">
                <input class="input-admin" type="text" name="dimension" id="dimension" placeholder="Dimensions">
                <input class="input-admin" type="text" name="poids" id="poids" placeholder="Poids"><br>


                <label class="label-formulaire-admin" for="category">Choisir la catégorie :</label>
                <select name="category" id="category" class="select-formulaire-admin" required>
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
                    <option value="gazon-1">Gazon ( Essence )</option>
                    <option value="vegetation-1">Végétation ( Essence )</option>
                    <option value="travail">Travail de la terre ( Essence )</option>
                    <option value="ppf">PPF</option>
                    <option value="ppt">PPT</option>
                    <option value="dhca">DHCA</option>
                    <option value="dppf">DPPF</option>
                    <option value="terre">Travail de la terre ( Diesel )</option>
                    <option value="vegetation">Végétation ( Diesel )</option>
                    <option value="gazon">Gazon ( Diesel )</option>
                    <option value="grands">Grands espaces ( Diesel )</option>
                    <option value="dos">A Dos</option>
                    <option value="serie">Série T</option>
                    <option value="srm">SRM</option>
                    <option value="dsrm">DSRM</option>
                </select><br>

                <input class="button-back-4" type="submit" value="Ajouter un article">
            </form>
        </div>

        <div id="vehicules-formulaire" class="container-catagorie">
            <form action="backend-ajout.php" method="POST" class="formulaire-admin" enctype="multipart/form-data">
                <h1 class="titre-formulaire-admin">Formulaire d'ajout Véhicules</h1>
                <input class="input-admin" type="text" name="img" id="img" placeholder="URL de l'image">
                <input class="input-admin" type="text" name="titre" id="titre"
                    placeholder="Titre pour la carte et la description">
                <input class="input-admin" type="text" name="text" id="text" placeholder="Texte pour la carte">
                <textarea class="input-admin" name="message" id="message" placeholder="Description"></textarea>
                <input class="input-admin" type="text" name="prix" id="prix" placeholder="Prix"><br>

                <label class="label-formulaire-admin" for="type_moteur">Type de Véhicules</label>
                <select name="type_moteur" id="type_moteur" class="select-formulaire-admin" required>
                    <option value="electrique">Electrique</option>
                    <option value="batterie">A batterie</option>
                    <option value="thermique">Thermique</option>
                </select>

                <input class="input-admin" type="text" name="puissance" id="puissance" placeholder="Puissance">
                <input class="input-admin" type="text" name="dimension" id="dimension" placeholder="Dimensions">
                <input class="input-admin" type="text" name="poids" id="poids" placeholder="Poids"><br>

                <label class="label-formulaire-admin" for="type_essence">Type de coupe</label>
                <select name="type_essence" id="type_essence" class="select-formulaire-admin" required>
                    <option value="essence">Essence</option>
                    <option value="diesel">Diesel</option>
                </select><br>

                <label class="label-formulaire-admin" for="category">Choisir la catégorie :</label>
                <select name="category" id="category" class="select-formulaire-admin" required>
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
                    <option value="gazon-1">Gazon ( Essence )</option>
                    <option value="vegetation-1">Végétation ( Essence )</option>
                    <option value="travail">Travail de la terre ( Essence )</option>
                    <option value="ppf">PPF</option>
                    <option value="ppt">PPT</option>
                    <option value="dhca">DHCA</option>
                    <option value="dppf">DPPF</option>
                    <option value="terre">Travail de la terre ( Diesel )</option>
                    <option value="vegetation">Végétation ( Diesel )</option>
                    <option value="gazon">Gazon ( Diesel )</option>
                    <option value="grands">Grands espaces ( Diesel )</option>
                    <option value="dos">A Dos</option>
                    <option value="serie">Série T</option>
                    <option value="srm">SRM</option>
                    <option value="dsrm">DSRM</option>
                </select><br>

                <input class="button-back-4" type="submit" value="Ajouter un article">
            </form>
        </div>
    </div>

    <!-- Le script sert à accéder aux autres liens sur la même page et à activer ou cacher les sections -->
    <script>
    function openTab(tabId) {
        console.log('Tab clicked:', tabId);
        // Cache toutes les sections
        document.querySelectorAll('.container-catagorie').forEach(function(tab) {
            tab.style.display = 'none';
        });

        // Affiche la section cliquée
        document.getElementById(tabId).style.display = 'block';
    }

    // Affiche le premier onglet chaque fois que la page est rafraîchie
    document.addEventListener('DOMContentLoaded', function() {
        openTab('debroussailleuse-formulaire');
    });
    </script>

</body>

</html>