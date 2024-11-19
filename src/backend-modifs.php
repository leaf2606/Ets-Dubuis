<?php

session_start();

require_once("connect.php");

// Vérifier si l'ID est passé dans l'URL
if (isset($_GET["id"]) && !empty($_GET["id"])) {
    // Valider l'ID
    $id = filter_var($_GET["id"], FILTER_VALIDATE_INT);
    if (!$id) {
        echo "ID invalide.";
        exit;
    }

    // Préparer la requête pour obtenir les informations de l'article
    $sql = "SELECT * FROM catalogue WHERE id = :id";
    $query = $db->prepare($sql);
    $query->bindValue(":id", $id, PDO::PARAM_INT);
    
    try {
        $query->execute();
        $item = $query->fetch(PDO::FETCH_ASSOC);

        // Vérifier si l'article existe
        if (!$item) {
            echo "Article non trouvé.";
            exit;
        }

        // Conserver la catégorie actuelle de l'article
        $currentCategory = $item['category'];

        // Affichage des informations de l'article pour débogage
        // echo "<pre>";
        // var_dump($item); 
        // echo "</pre>";

        // Traitement du formulaire lors de la soumission
        if ($_POST) {
            // Vérifier si tous les champs obligatoires sont remplis
            if (
                isset($_POST["id"]) && !empty($_POST["id"]) &&
                isset($_POST["titre"]) && !empty($_POST["titre"]) &&
                isset($_POST["text"]) && !empty($_POST["text"]) &&
                isset($_POST["message"]) && !empty($_POST["message"]) &&
                isset($_POST["prix"]) && !empty($_POST["prix"]) &&
                isset($_POST["category"]) && !empty($_POST["category"])  
            ) {
                // Nettoyer et stocker les données
                $id = strip_tags($_POST["id"]);
                $titre = strip_tags($_POST["titre"]);
                $text = strip_tags($_POST["text"]);
                $message = strip_tags($_POST["message"]);
                $prix = strip_tags($_POST["prix"]);
                $img = strip_tags($_POST["img"] ?? '');  
                $marque = strip_tags($_POST["marque"] ?? '');
                $couleur = strip_tags($_POST["couleur"] ?? '');
                $largeur_coupe = strip_tags($_POST["largeur_coupe"] ?? '');
                $type_moteur = strip_tags($_POST["type_moteur"] ?? '');
                $capacite_batterie = strip_tags($_POST["capacite_batterie"] ?? '');
                $type_temps = strip_tags($_POST["type_temps"] ?? '');
                $type_carburant = strip_tags($_POST["type_carburant"] ?? '');
                $tension = strip_tags($_POST["tension"] ?? '');
                $largeur_coupe = strip_tags($_POST["largeur_coupe"] ?? '');
                $type_fil = strip_tags($_POST["type_fil"] ?? '');
                $type_lame = strip_tags($_POST["type_lame"] ?? '');
                $longueur_lame = strip_tags($_POST["longueur_lame"] ?? '');
                $vitesse_coupe = strip_tags($_POST["vitesse_coupe"] ?? '');
                $poids = strip_tags($_POST["poids"] ?? '');
                $poignee = strip_tags($_POST["poignee"] ?? '');
                $vibrations = strip_tags($_POST["vibrations"] ?? '');
                $sangle = strip_tags($_POST["sangle"] ?? '');
                $type_coupe = strip_tags($_POST["type_coupe"] ?? '');
                $sonore = strip_tags($_POST["sonore"] ?? '');
                $systeme = strip_tags($_POST["systeme"] ?? '');
                $securite = strip_tags($_POST["securite"] ?? '');
                $dimension = strip_tags($_POST["dimension"] ?? '');
                $puissance = strip_tags($_POST["puissance"] ?? '');
                $capacite_reservoir = strip_tags($_POST["capacite_reservoir"] ?? '');
                $diametre = strip_tags($_POST["diametre"] ?? '');
                $vitesse_souffle = strip_tags($_POST["vitesse_souffle"] ?? '');
                $autonomie = strip_tags($_POST["autonomie"] ?? '');
                $type_essence = strip_tags($_POST["type_essence"] ?? '');
                $category = strip_tags($_POST["category"]); 

                // Débogage des données traitées avant l'insertion
                // echo "<pre>";
                // print_r([
                //     "id" => $id,
                //     "titre" => $titre,
                //     "text" => $text,
                //     "message" => $message,
                //     "prix" => $prix,
                //     "category" => $category,
                //     "img" => $img,
                //     "marque" => $marque,
                //     "couleur" => $couleur,
                //     "largeur_coupe" => $largeur_coupe,
                //     "type_moteur" => $type_moteur,
                //     "capacite_batterie" => $capacite_batterie,
                //     "type_temps" => $type_temps,
                //     "type_carburant" => $type_carburant,
                //     "tension" => $tension,
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
                //     "autonomie" => $autonomie,
                //     "type_essence" => $type_essence
                // ]);
                // echo "</pre>";

                // Préparer la requête de mise à jour
                $sql = "UPDATE catalogue 
                        SET img = :img, 
                            titre = :titre, 
                            text = :text, 
                            message = :message, 
                            prix = :prix, 
                            marque = :marque, 
                            couleur = :couleur, 
                            category = :category, 
                            largeur_coupe = :largeur_coupe, 
                            type_moteur = :type_moteur,
                            capacite_batterie = :capacite_batterie,
                            type_temps = :type_temps,
                            type_carburant = :type_carburant,
                            tension = :tension,
                            type_fil = :type_fil,
                            type_lame = :type_lame,
                            longueur_lame = :longueur_lame,
                            vitesse_coupe = :vitesse_coupe,
                            poids = :poids,
                            poignee = :poignee,
                            vibrations = :vibrations,
                            sangle = :sangle,
                            type_coupe = :type_coupe,
                            sonore = :sonore,
                            systeme = :systeme,
                            securite = :securite,
                            dimension = :dimension,
                            puissance = :puissance,
                            capacite_reservoir = :capacite_reservoir,
                            diametre = :diametre,
                            vitesse_souffle = :vitesse_souffle,
                            autonomie = :autonomie
                            type_essence = :type_essence
                        WHERE id = :id";
                
                $query = $db->prepare($sql);
                $query->bindValue(":id", $id, PDO::PARAM_INT);
                $query->bindValue(":img", $img, PDO::PARAM_STR);
                $query->bindValue(":titre", $titre, PDO::PARAM_STR);
                $query->bindValue(":text", $text, PDO::PARAM_STR);
                $query->bindValue(":message", $message, PDO::PARAM_STR);
                $query->bindValue(":prix", floatval($prix), PDO::PARAM_STR);
                $query->bindValue(":marque", $marque, PDO::PARAM_STR);
                $query->bindValue(":couleur", $couleur, PDO::PARAM_STR);
                $query->bindValue(":category", $category, PDO::PARAM_STR);
                $query->bindValue(":largeur_coupe", $largeur_coupe, PDO::PARAM_STR);
                $query->bindValue(":type_moteur", $type_moteur, PDO::PARAM_STR);
                $query->bindValue(":capacite_batterie", $capacite_batterie, PDO::PARAM_STR);
                $query->bindValue(":type_temps", $type_temps, PDO::PARAM_STR);
                $query->bindValue(":type_carburant", $type_carburant, PDO::PARAM_STR);
                $query->bindValue(":tension", $tension, PDO::PARAM_STR);
                $query->bindValue(":type_fil", $type_fil, PDO::PARAM_STR);
                $query->bindValue(":type_lame", $type_lame, PDO::PARAM_STR);
                $query->bindValue(":longueur_lame", $longueur_lame, PDO::PARAM_STR);
                $query->bindValue(":vitesse_coupe", $vitesse_coupe, PDO::PARAM_STR);
                $query->bindValue(":poids", $poids, PDO::PARAM_STR);
                $query->bindValue(":poignee", $poignee, PDO::PARAM_STR);
                $query->bindValue(":vibrations", $vibrations, PDO::PARAM_STR);
                $query->bindValue(":sangle", $sangle, PDO::PARAM_STR);
                $query->bindValue(":type_coupe", $type_coupe, PDO::PARAM_STR);
                $query->bindValue(":sonore", $sonore, PDO::PARAM_STR);
                $query->bindValue(":systeme", $systeme, PDO::PARAM_STR);
                $query->bindValue(":securite", $securite, PDO::PARAM_STR);
                $query->bindValue(":dimension", $dimension, PDO::PARAM_STR);
                $query->bindValue(":puissance", $puissance, PDO::PARAM_STR);
                $query->bindValue(":capacite_reservoir", $capacite_reservoir, PDO::PARAM_STR);
                $query->bindValue(":diametre", $diametre, PDO::PARAM_STR);
                $query->bindValue(":vitesse_souffle", $vitesse_souffle, PDO::PARAM_STR);
                $query->bindValue(":autonomie", $autonomie, PDO::PARAM_STR);
                $query->bindValue(":type_essence", $type_essence, PDO::PARAM_STR);
                
                // Exécution de la requête
                if ($query->execute()) {
                    // Redirection vers la description de l'article avec son ID
                    header("Location: description.php?id=" . $id);
                    exit();
                } else {
                    $errorInfo = implode(", ", $query->errorInfo());
                    echo "Erreur : Impossible de modifier l'article. " . $errorInfo;
                    // error_log("Erreur lors de la mise à jour de l'article ID $id: $errorInfo"); 
                }
            } else {
                var_dump($_POST);
                echo "Erreur : Veuillez remplir tous les champs obligatoires.";
            }
        }
    } catch (Exception $e) {
        echo "Une erreur s'est produite : " . $e->getMessage();
        // error_log("Exception capturée : " . $e->getMessage());
    }
} else {
    echo "Aucun ID fourni.";
}

?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/backend.css">
    <link rel="stylesheet" href="css/vetements.css">
    <link rel="stylesheet" href="css/font.css">
    <title>Modifier l'Article</title>
</head>

<body>
    <h1 class="titre-back">Modification | <a href="../index.php">&ensp;Accueil</a></h1>

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
            <form action="backend-modifs.php?id=<?= $item['id']; ?>" method="POST" class="formulaire-admin"
                enctype="multipart/form-data">
                <h1 class="titre-formulaire-admin">Formulaire de modification Débroussailleuse</h1>
                <input type="hidden" name="id" value="<?= htmlspecialchars($item['id']); ?>">
                <input class="input-admin" type="text" name="img" id="img"
                    value="<?= htmlspecialchars($item['img']); ?>" placeholder="URL de l'image">
                <input class="input-admin" type="text" name="titre" id="titre"
                    value="<?= htmlspecialchars($item['titre']); ?>"
                    placeholder="Titre pour la carte et la description">
                <input class="input-admin" type="text" name="text" id="text"
                    value="<?= htmlspecialchars($item['text']); ?>" placeholder="Texte pour la carte">
                <textarea class="input-admin" name="message" id="message"
                    placeholder="Description"><?= htmlspecialchars($item['message']); ?></textarea>
                <input class="input-admin" type="text" name="prix" id="prix"
                    value="<?= htmlspecialchars($item['prix']); ?>" placeholder="Prix"><br>

                <label class="label-formulaire-admin" for="type_moteur">Type de Véhicules</label>
                <select name="type_moteur" id="type_moteur" class="select-formulaire-admin"
                    value="<?= htmlspecialchars($item['type_moteur']); ?>">
                    <option value="electrique"
                        <?= (isset($currentCategory) && $currentCategory === 'electrique') ? 'selected' : '' ?>>
                        Electrique</option>
                    <option value="batterie"
                        <?= (isset($currentCategory) && $currentCategory === 'batterie') ? 'selected' : '' ?>>A batterie
                    </option>
                    <option value="thermique"
                        <?= (isset($currentCategory) && $currentCategory === 'thermique') ? 'selected' : '' ?>>Thermique
                    </option>
                </select>

                <input class="input-admin" type="text" name="puissance" id="puissance"
                    value="<?= htmlspecialchars($item['puissance']); ?>" placeholder="Puissance du moteur">
                <input class="input-admin" type="text" name="capacite_batterie" id="capacite_batterie"
                    value="<?= htmlspecialchars($item['capacite_batterie']); ?>"
                    placeholder="Capacité de la batterie"><br>

                <label class="label-formulaire-admin" for="type_temps">Type de moteur</label>
                <select name="type_temps" id="type_temps" class="select-formulaire-admin"
                    value="<?= htmlspecialchars($item['type_temps']); ?>">
                    <option value="2-temps"
                        <?= (isset($currentCategory) && $currentCategory === '2-temps') ? 'selected' : '' ?>>2 temps
                    </option>
                    <option value="4-temps"
                        <?= (isset($currentCategory) && $currentCategory === '4-temps') ? 'selected' : '' ?>>4 temps
                    </option>
                </select><br>

                <input class="input-admin" type="text" name="type_carburant" id="type_carburant"
                    value="<?= htmlspecialchars($item['type_carburant']); ?>" placeholder="Type de carburant">
                <input class="input-admin" type="text" name="tension" id="tension"
                    value="<?= htmlspecialchars($item['tension']); ?>" placeholder="Tension">
                <input class="input-admin" type="text" name="autonomie" id="autonomie"
                    value="<?= htmlspecialchars($item['autonomie']); ?>" placeholder="Autonomie">
                <input class="input-admin" type="text" name="capacite_reservoir" id="capacite_reservoir"
                    value="<?= htmlspecialchars($item['capacite_reservoir']); ?>" placeholder="Capacité du réservoir">
                <input class="input-admin" type="text" name="largeur_coupe" id="largeur_coupe"
                    value="<?= htmlspecialchars($item['largeur_coupe']); ?>" placeholder="Largeur de coupe">
                <input class="input-admin" type="text" name="type_fil" id="type_fil"
                    value="<?= htmlspecialchars($item['type_fil']); ?>" placeholder="Type de fil de coupe">
                <input class="input-admin" type="text" name="type_lame" id="type_lame"
                    value="<?= htmlspecialchars($item['type_lame']); ?>" placeholder="Type de lame">
                <input class="input-admin" type="text" name="poids" id="poids"
                    value="<?= htmlspecialchars($item['poids']); ?>" placeholder="Poids">
                <input class="input-admin" type="text" name="poignee" id="poignee"
                    value="<?= htmlspecialchars($item['poignee']); ?>" placeholder="Type de poignée">
                <input class="input-admin" type="text" name="vibrations" id="vibrations"
                    value="<?= htmlspecialchars($item['vibrations']); ?>"
                    placeholder="Système de redirection des vibrations">
                <input class="input-admin" type="text" name="sangle" id="sangle"
                    value="<?= htmlspecialchars($item['sangle']); ?>" placeholder="Sangle de maintien"><br>

                <label class="label-formulaire-admin" for="type_coupe">Type de coupe</label>
                <select name="type_coupe" id="type_coupe" class="select-formulaire-admin"
                    value="<?= htmlspecialchars($item['type_coupe']); ?>">
                    <option value="debrousailleuse-fil"
                        <?= (isset($currentCategory) && $currentCategory === 'debrousailleuse-fil') ? 'selected' : '' ?>>
                        Débrousailleuse à fil</option>
                    <option value="debrousailleuse-lame"
                        <?= (isset($currentCategory) && $currentCategory === 'debrousailleuse-lame') ? 'selected' : '' ?>>
                        Débrousailleuse à lame</option>
                </select><br>

                <input class="input-admin" type="text" name="sonore" id="sonore"
                    value="<?= htmlspecialchars($item['sonore']); ?>" placeholder="Niveau sonore">
                <input class="input-admin" type="text" name="systeme" id="systeme"
                    value="<?= htmlspecialchars($item['systeme']); ?>" placeholder="Système de démarrage">
                <input class="input-admin" type="text" name="securite" id="securite"
                    value="<?= htmlspecialchars($item['securite']); ?>" placeholder="Caractéristique de sécurité">
                <input class="input-admin" type="text" name="dimension" id="dimension"
                    value="<?= htmlspecialchars($item['dimension']); ?>" placeholder="Dimension">

                <label for="category">Choisir la catégorie :</label>
                <select name="category" value="<?= htmlspecialchars($item['category']); ?>" required>
                    <option value="vetements"
                        <?= (isset($currentCategory) && $currentCategory === 'vetements') ? 'selected' : '' ?>>Vêtements
                    </option>
                    <option value="accessoire"
                        <?= (isset($currentCategory) && $currentCategory === 'accessoires') ? 'selected' : '' ?>>
                        Accessoires
                    </option>
                    <option value="motos"
                        <?= (isset($currentCategory) && $currentCategory === 'motos') ? 'selected' : '' ?>>Equipements
                    </option>
                    <option value="dhc"
                        <?= (isset($currentCategory) && $currentCategory === 'dhc') ? 'selected' : '' ?>>DHC
                    </option>
                    <option value="cs" <?= (isset($currentCategory) && $currentCategory === 'cs') ? 'selected' : '' ?>>
                        CS
                    </option>
                    <option value="hc" <?= (isset($currentCategory) && $currentCategory === 'hc') ? 'selected' : '' ?>>
                        HC
                    </option>
                    <option value="hcr"
                        <?= (isset($currentCategory) && $currentCategory === 'hcr') ? 'selected' : '' ?>>HCR
                    </option>
                    <option value="dhcs"
                        <?= (isset($currentCategory) && $currentCategory === 'dhcs') ? 'selected' : '' ?>>
                        DHCS</option>
                    <option value="hcs"
                        <?= (isset($currentCategory) && $currentCategory === 'hcs') ? 'selected' : '' ?>>HCS
                    </option>
                    <option value="pb" <?= (isset($currentCategory) && $currentCategory === 'pb') ? 'selected' : '' ?>>
                        PB
                    </option>
                    <option value="dpb"
                        <?= (isset($currentCategory) && $currentCategory === 'dpb') ? 'selected' : '' ?>>DPB
                    </option>
                    <option value="es" <?= (isset($currentCategory) && $currentCategory === 'es') ? 'selected' : '' ?>>
                        ES
                    </option>
                    <option value="enduro"
                        <?= (isset($currentCategory) && $currentCategory === 'enduro') ? 'selected' : '' ?>>RR ENDURO
                    </option>
                    <option value="motard"
                        <?= (isset($currentCategory) && $currentCategory === 'motard') ? 'selected' : '' ?>>RR MOTARD
                    </option>
                    <option value="rx" <?= (isset($currentCategory) && $currentCategory === 'rx') ? 'selected' : '' ?>>
                        RX
                    </option>
                    <option value="trainer"
                        <?= (isset($currentCategory) && $currentCategory === 'trainer') ? 'selected' : '' ?>>XTRAINER
                    </option>
                    <option value="evo"
                        <?= (isset($currentCategory) && $currentCategory === 'evo') ? 'selected' : '' ?>>EVO
                    </option>
                    <option value="alp"
                        <?= (isset($currentCategory) && $currentCategory === 'alp') ? 'selected' : '' ?>>ALP
                    </option>
                    <option value="electric"
                        <?= (isset($currentCategory) && $currentCategory === 'electric') ? 'selected' : '' ?>>MINIBIKES
                        ELECTRIC</option>
                    <option value="gazon-1"
                        <?= (isset($currentCategory) && $currentCategory === 'gazon-1') ? 'selected' : '' ?>>Gazon
                        Essence
                    </option>
                    <option value="vegetation-1"
                        <?= (isset($currentCategory) && $currentCategory === 'vegetation-1') ? 'selected' : '' ?>>
                        Végétation
                        Essence</option>
                    <option value="travail"
                        <?= (isset($currentCategory) && $currentCategory === 'travail') ? 'selected' : '' ?>>Travail de
                        la
                        terre Essence</option>
                    <option value="ppf"
                        <?= (isset($currentCategory) && $currentCategory === 'ppf') ? 'selected' : '' ?>>PPF
                    </option>
                    <option value="ppt"
                        <?= (isset($currentCategory) && $currentCategory === 'ppt') ? 'selected' : '' ?>>PPT
                    </option>
                    <option value="dhca"
                        <?= (isset($currentCategory) && $currentCategory === 'dhca') ? 'selected' : '' ?>>
                        DHCA</option>
                    <option value="dppf"
                        <?= (isset($currentCategory) && $currentCategory === 'dppf') ? 'selected' : '' ?>>
                        DPPF</option>
                    <option value="terre"
                        <?= (isset($currentCategory) && $currentCategory === 'terre') ? 'selected' : '' ?>>Travail de la
                        terre Diesel</option>
                    <option value="vegatation"
                        <?= (isset($currentCategory) && $currentCategory === 'vegetation') ? 'selected' : '' ?>>
                        Végétation
                        Diesel</option>
                    <option value="gazon"
                        <?= (isset($currentCategory) && $currentCategory === 'gazon') ? 'selected' : '' ?>>Gazon Diesel
                    </option>
                    <option value="grands"
                        <?= (isset($currentCategory) && $currentCategory === 'grands') ? 'selected' : '' ?>>Grands
                        espaces
                        Diesel</option>
                    <option value="dos"
                        <?= (isset($currentCategory) && $currentCategory === 'dos') ? 'selected' : '' ?>>A
                        Dos</option>
                    <option value="serie"
                        <?= (isset($currentCategory) && $currentCategory === 'serie') ? 'selected' : '' ?>>Série T
                    </option>
                    <option value="srm"
                        <?= (isset($currentCategory) && $currentCategory === 'srm') ? 'selected' : '' ?>>SRM
                    </option>
                    <option value="dsrm"
                        <?= (isset($currentCategory) && $currentCategory === 'dsrm') ? 'selected' : '' ?>>
                        DSRM</option>
                </select><br>

                <?php if (isset($_SESSION['compte']) && $_SESSION['compte']['role'] === 'admin'): ?>
                <button type="submit" class="button-back-3">Modifier</button>
                <a class="button-back-3" href="backend-sup.php?id=<?= $item['id']; ?>"
                    onclick="return confirm('Êtes-vous sûr de vouloir supprimer cet article ?');">Supprimer
                    l'article</a>
                <?php endif; ?>
            </form>
        </div>

        <div id="taille-formulaire" class="container-catagorie">
            <form action="backend-ajout.php" method="POST" class="formulaire-admin" enctype="multipart/form-data">
                <h1 class="titre-formulaire-admin">Formulaire de modification Taille Haie</h1>
                <input type="hidden" name="id" value="<?= htmlspecialchars($item['id']); ?>">
                <input class="input-admin" type="text" name="img" id="img"
                    value="<?= htmlspecialchars($item['img']); ?>" placeholder="URL de l'image">
                <input class="input-admin" type="text" name="titre" id="titre"
                    value="<?= htmlspecialchars($item['titre']); ?>"
                    placeholder="Titre pour la carte et la description">
                <input class="input-admin" type="text" name="text" id="text"
                    value="<?= htmlspecialchars($item['text']); ?>" placeholder="Texte pour la carte">
                <textarea class="input-admin" name="message" id="message"
                    placeholder="Description"><?= htmlspecialchars($item['message']); ?></textarea>
                <input class="input-admin" type="text" name="prix" id="prix"
                    value="<?= htmlspecialchars($item['prix']); ?>" placeholder="Prix"><br>

                <label class="label-formulaire-admin" for="type_moteur">Type de Véhicules</label>
                <select name="type_moteur" id="type_moteur" class="select-formulaire-admin"
                    value="<?= htmlspecialchars($item['type_moteur']); ?>">
                    <option value="electrique"
                        <?= (isset($currentCategory) && $currentCategory === 'electrique') ? 'selected' : '' ?>>
                        Electrique</option>
                    <option value="batterie"
                        <?= (isset($currentCategory) && $currentCategory === 'batterie') ? 'selected' : '' ?>>A batterie
                    </option>
                    <option value="thermique"
                        <?= (isset($currentCategory) && $currentCategory === 'thermique') ? 'selected' : '' ?>>Thermique
                    </option>
                </select>

                <input class="input-admin" type="text" name="longueur_lame" id="longueur_lame"
                    value="<?= htmlspecialchars($item['longueur_lame']); ?>" placeholder="Longueur de la lame">
                <input class="input-admin" type="text" name="vitesse_coupe" id="vitesse_coupe"
                    value="<?= htmlspecialchars($item['vitesse_coupe']); ?>" placeholder="Vitesse de coupe"><br>

                <label class="label-formulaire-admin" for="type_temps">Type de moteur</label>
                <select name="type_temps" id="type_temps" class="select-formulaire-admin"
                    value="<?= htmlspecialchars($item['type_temps']); ?>">
                    <option value="2-temps"
                        <?= (isset($currentCategory) && $currentCategory === '2-temps') ? 'selected' : '' ?>>2 temps
                    </option>
                    <option value="4-temps"
                        <?= (isset($currentCategory) && $currentCategory === '4-temps') ? 'selected' : '' ?>>4 temps
                    </option>
                </select><br>

                <input class="input-admin" type="text" name="type_carburant" id="type_carburant"
                    value="<?= htmlspecialchars($item['type_carburant']); ?>" placeholder="Type de carburant">
                <input class="input-admin" type="text" name="poids" id="poids" placeholder="Poids"><br>

                <label for="category">Choisir la catégorie :</label>
                <select name="category" value="<?= htmlspecialchars($item['category']); ?>" required>
                    <option value="vetements"
                        <?= (isset($currentCategory) && $currentCategory === 'vetements') ? 'selected' : '' ?>>Vêtements
                    </option>
                    <option value="accessoire"
                        <?= (isset($currentCategory) && $currentCategory === 'accessoires') ? 'selected' : '' ?>>
                        Accessoires
                    </option>
                    <option value="motos"
                        <?= (isset($currentCategory) && $currentCategory === 'motos') ? 'selected' : '' ?>>Equipements
                    </option>
                    <option value="dhc"
                        <?= (isset($currentCategory) && $currentCategory === 'dhc') ? 'selected' : '' ?>>DHC
                    </option>
                    <option value="cs" <?= (isset($currentCategory) && $currentCategory === 'cs') ? 'selected' : '' ?>>
                        CS
                    </option>
                    <option value="hc" <?= (isset($currentCategory) && $currentCategory === 'hc') ? 'selected' : '' ?>>
                        HC
                    </option>
                    <option value="hcr"
                        <?= (isset($currentCategory) && $currentCategory === 'hcr') ? 'selected' : '' ?>>HCR
                    </option>
                    <option value="dhcs"
                        <?= (isset($currentCategory) && $currentCategory === 'dhcs') ? 'selected' : '' ?>>
                        DHCS</option>
                    <option value="hcs"
                        <?= (isset($currentCategory) && $currentCategory === 'hcs') ? 'selected' : '' ?>>HCS
                    </option>
                    <option value="pb" <?= (isset($currentCategory) && $currentCategory === 'pb') ? 'selected' : '' ?>>
                        PB
                    </option>
                    <option value="dpb"
                        <?= (isset($currentCategory) && $currentCategory === 'dpb') ? 'selected' : '' ?>>DPB
                    </option>
                    <option value="es" <?= (isset($currentCategory) && $currentCategory === 'es') ? 'selected' : '' ?>>
                        ES
                    </option>
                    <option value="enduro"
                        <?= (isset($currentCategory) && $currentCategory === 'enduro') ? 'selected' : '' ?>>RR ENDURO
                    </option>
                    <option value="motard"
                        <?= (isset($currentCategory) && $currentCategory === 'motard') ? 'selected' : '' ?>>RR MOTARD
                    </option>
                    <option value="rx" <?= (isset($currentCategory) && $currentCategory === 'rx') ? 'selected' : '' ?>>
                        RX
                    </option>
                    <option value="trainer"
                        <?= (isset($currentCategory) && $currentCategory === 'trainer') ? 'selected' : '' ?>>XTRAINER
                    </option>
                    <option value="evo"
                        <?= (isset($currentCategory) && $currentCategory === 'evo') ? 'selected' : '' ?>>EVO
                    </option>
                    <option value="alp"
                        <?= (isset($currentCategory) && $currentCategory === 'alp') ? 'selected' : '' ?>>ALP
                    </option>
                    <option value="electric"
                        <?= (isset($currentCategory) && $currentCategory === 'electric') ? 'selected' : '' ?>>MINIBIKES
                        ELECTRIC</option>
                    <option value="gazon-1"
                        <?= (isset($currentCategory) && $currentCategory === 'gazon-1') ? 'selected' : '' ?>>Gazon
                        Essence
                    </option>
                    <option value="vegetation-1"
                        <?= (isset($currentCategory) && $currentCategory === 'vegetation-1') ? 'selected' : '' ?>>
                        Végétation
                        Essence</option>
                    <option value="travail"
                        <?= (isset($currentCategory) && $currentCategory === 'travail') ? 'selected' : '' ?>>Travail de
                        la
                        terre Essence</option>
                    <option value="ppf"
                        <?= (isset($currentCategory) && $currentCategory === 'ppf') ? 'selected' : '' ?>>PPF
                    </option>
                    <option value="ppt"
                        <?= (isset($currentCategory) && $currentCategory === 'ppt') ? 'selected' : '' ?>>PPT
                    </option>
                    <option value="dhca"
                        <?= (isset($currentCategory) && $currentCategory === 'dhca') ? 'selected' : '' ?>>
                        DHCA</option>
                    <option value="dppf"
                        <?= (isset($currentCategory) && $currentCategory === 'dppf') ? 'selected' : '' ?>>
                        DPPF</option>
                    <option value="terre"
                        <?= (isset($currentCategory) && $currentCategory === 'terre') ? 'selected' : '' ?>>Travail de la
                        terre Diesel</option>
                    <option value="vegatation"
                        <?= (isset($currentCategory) && $currentCategory === 'vegetation') ? 'selected' : '' ?>>
                        Végétation
                        Diesel</option>
                    <option value="gazon"
                        <?= (isset($currentCategory) && $currentCategory === 'gazon') ? 'selected' : '' ?>>Gazon Diesel
                    </option>
                    <option value="grands"
                        <?= (isset($currentCategory) && $currentCategory === 'grands') ? 'selected' : '' ?>>Grands
                        espaces
                        Diesel</option>
                    <option value="dos"
                        <?= (isset($currentCategory) && $currentCategory === 'dos') ? 'selected' : '' ?>>A
                        Dos</option>
                    <option value="serie"
                        <?= (isset($currentCategory) && $currentCategory === 'serie') ? 'selected' : '' ?>>Série T
                    </option>
                    <option value="srm"
                        <?= (isset($currentCategory) && $currentCategory === 'srm') ? 'selected' : '' ?>>SRM
                    </option>
                    <option value="dsrm"
                        <?= (isset($currentCategory) && $currentCategory === 'dsrm') ? 'selected' : '' ?>>
                        DSRM</option>
                </select><br>

                <?php if (isset($_SESSION['compte']) && $_SESSION['compte']['role'] === 'admin'): ?>
                <button type="submit" class="button-back-3">Modifier</button>
                <a class="button-back-3" href="backend-sup.php?id=<?= $item['id']; ?>"
                    onclick="return confirm('Êtes-vous sûr de vouloir supprimer cet article ?');">Supprimer
                    l'article</a>
                <?php endif; ?>
            </form>
        </div>

        <div id="tronçonneuse-formulaire" class="container-catagorie">
            <form action="backend-ajout.php" method="POST" class="formulaire-admin" enctype="multipart/form-data">
                <h1 class="titre-formulaire-admin">Formulaire de modification Tronçonneuse</h1>
                <input type="hidden" name="id" value="<?= htmlspecialchars($item['id']); ?>">
                <input class="input-admin" type="text" name="img" id="img"
                    value="<?= htmlspecialchars($item['img']); ?>" placeholder="URL de l'image">
                <input class="input-admin" type="text" name="titre" id="titre"
                    value="<?= htmlspecialchars($item['titre']); ?>"
                    placeholder="Titre pour la carte et la description">
                <input class="input-admin" type="text" name="text" id="text"
                    value="<?= htmlspecialchars($item['text']); ?>" placeholder="Texte pour la carte">
                <textarea class="input-admin" name="message" id="message"
                    placeholder="Description"><?= htmlspecialchars($item['message']); ?></textarea>
                <input class="input-admin" type="text" name="prix" id="prix"
                    value="<?= htmlspecialchars($item['prix']); ?>" placeholder="Prix"><br>

                <label class="label-formulaire-admin" for="type_moteur">Type de Véhicules</label>
                <select name="type_moteur" id="type_moteur" class="select-formulaire-admin"
                    value="<?= htmlspecialchars($item['type_moteur']); ?>">
                    <option value="electrique"
                        <?= (isset($currentCategory) && $currentCategory === 'electrique') ? 'selected' : '' ?>>
                        Electrique</option>
                    <option value="batterie"
                        <?= (isset($currentCategory) && $currentCategory === 'batterie') ? 'selected' : '' ?>>A batterie
                    </option>
                    <option value="thermique"
                        <?= (isset($currentCategory) && $currentCategory === 'thermique') ? 'selected' : '' ?>>Thermique
                    </option>
                </select>

                <input class="input-admin" type="text" name="longueur_lame" id="longueur_lame"
                    value="<?= htmlspecialchars($item['longueur_lame']); ?>" placeholder="Longueur de la lame (en cm)">
                <input class="input-admin" type="text" name="vitesse_coupe" id="vitesse_coupe"
                    value="<?= htmlspecialchars($item['vitesse_coupe']); ?>" placeholder="Vitesse de coupe (en m/s)">

                <input class="input-admin" type="text" name="puissance" id="puissance"
                    value="<?= htmlspecialchars($item['puissance']); ?>" placeholder="Puissance du moteur (en W ou cv)">
                <input class="input-admin" type="text" name="capacite_reservoir" id="capacite_reservoir"
                    value="<?= htmlspecialchars($item['capacite_reservoir']); ?>"
                    placeholder="Capacité du réservoir (en L)"><br>

                <label for="category">Choisir la catégorie :</label>
                <select name="category" value="<?= htmlspecialchars($item['category']); ?>" required>
                    <option value="vetements"
                        <?= (isset($currentCategory) && $currentCategory === 'vetements') ? 'selected' : '' ?>>Vêtements
                    </option>
                    <option value="accessoire"
                        <?= (isset($currentCategory) && $currentCategory === 'accessoires') ? 'selected' : '' ?>>
                        Accessoires
                    </option>
                    <option value="motos"
                        <?= (isset($currentCategory) && $currentCategory === 'motos') ? 'selected' : '' ?>>Equipements
                    </option>
                    <option value="dhc"
                        <?= (isset($currentCategory) && $currentCategory === 'dhc') ? 'selected' : '' ?>>DHC
                    </option>
                    <option value="cs" <?= (isset($currentCategory) && $currentCategory === 'cs') ? 'selected' : '' ?>>
                        CS
                    </option>
                    <option value="hc" <?= (isset($currentCategory) && $currentCategory === 'hc') ? 'selected' : '' ?>>
                        HC
                    </option>
                    <option value="hcr"
                        <?= (isset($currentCategory) && $currentCategory === 'hcr') ? 'selected' : '' ?>>HCR
                    </option>
                    <option value="dhcs"
                        <?= (isset($currentCategory) && $currentCategory === 'dhcs') ? 'selected' : '' ?>>
                        DHCS</option>
                    <option value="hcs"
                        <?= (isset($currentCategory) && $currentCategory === 'hcs') ? 'selected' : '' ?>>HCS
                    </option>
                    <option value="pb" <?= (isset($currentCategory) && $currentCategory === 'pb') ? 'selected' : '' ?>>
                        PB
                    </option>
                    <option value="dpb"
                        <?= (isset($currentCategory) && $currentCategory === 'dpb') ? 'selected' : '' ?>>DPB
                    </option>
                    <option value="es" <?= (isset($currentCategory) && $currentCategory === 'es') ? 'selected' : '' ?>>
                        ES
                    </option>
                    <option value="enduro"
                        <?= (isset($currentCategory) && $currentCategory === 'enduro') ? 'selected' : '' ?>>RR ENDURO
                    </option>
                    <option value="motard"
                        <?= (isset($currentCategory) && $currentCategory === 'motard') ? 'selected' : '' ?>>RR MOTARD
                    </option>
                    <option value="rx" <?= (isset($currentCategory) && $currentCategory === 'rx') ? 'selected' : '' ?>>
                        RX
                    </option>
                    <option value="trainer"
                        <?= (isset($currentCategory) && $currentCategory === 'trainer') ? 'selected' : '' ?>>XTRAINER
                    </option>
                    <option value="evo"
                        <?= (isset($currentCategory) && $currentCategory === 'evo') ? 'selected' : '' ?>>EVO
                    </option>
                    <option value="alp"
                        <?= (isset($currentCategory) && $currentCategory === 'alp') ? 'selected' : '' ?>>ALP
                    </option>
                    <option value="electric"
                        <?= (isset($currentCategory) && $currentCategory === 'electric') ? 'selected' : '' ?>>MINIBIKES
                        ELECTRIC</option>
                    <option value="gazon-1"
                        <?= (isset($currentCategory) && $currentCategory === 'gazon-1') ? 'selected' : '' ?>>Gazon
                        Essence
                    </option>
                    <option value="vegetation-1"
                        <?= (isset($currentCategory) && $currentCategory === 'vegetation-1') ? 'selected' : '' ?>>
                        Végétation
                        Essence</option>
                    <option value="travail"
                        <?= (isset($currentCategory) && $currentCategory === 'travail') ? 'selected' : '' ?>>Travail de
                        la
                        terre Essence</option>
                    <option value="ppf"
                        <?= (isset($currentCategory) && $currentCategory === 'ppf') ? 'selected' : '' ?>>PPF
                    </option>
                    <option value="ppt"
                        <?= (isset($currentCategory) && $currentCategory === 'ppt') ? 'selected' : '' ?>>PPT
                    </option>
                    <option value="dhca"
                        <?= (isset($currentCategory) && $currentCategory === 'dhca') ? 'selected' : '' ?>>
                        DHCA</option>
                    <option value="dppf"
                        <?= (isset($currentCategory) && $currentCategory === 'dppf') ? 'selected' : '' ?>>
                        DPPF</option>
                    <option value="terre"
                        <?= (isset($currentCategory) && $currentCategory === 'terre') ? 'selected' : '' ?>>Travail de la
                        terre Diesel</option>
                    <option value="vegatation"
                        <?= (isset($currentCategory) && $currentCategory === 'vegetation') ? 'selected' : '' ?>>
                        Végétation
                        Diesel</option>
                    <option value="gazon"
                        <?= (isset($currentCategory) && $currentCategory === 'gazon') ? 'selected' : '' ?>>Gazon Diesel
                    </option>
                    <option value="grands"
                        <?= (isset($currentCategory) && $currentCategory === 'grands') ? 'selected' : '' ?>>Grands
                        espaces
                        Diesel</option>
                    <option value="dos"
                        <?= (isset($currentCategory) && $currentCategory === 'dos') ? 'selected' : '' ?>>A
                        Dos</option>
                    <option value="serie"
                        <?= (isset($currentCategory) && $currentCategory === 'serie') ? 'selected' : '' ?>>Série T
                    </option>
                    <option value="srm"
                        <?= (isset($currentCategory) && $currentCategory === 'srm') ? 'selected' : '' ?>>SRM
                    </option>
                    <option value="dsrm"
                        <?= (isset($currentCategory) && $currentCategory === 'dsrm') ? 'selected' : '' ?>>
                        DSRM</option>
                </select><br>

                <?php if (isset($_SESSION['compte']) && $_SESSION['compte']['role'] === 'admin'): ?>
                <button type="submit" class="button-back-3">Modifier</button>
                <a class="button-back-3" href="backend-sup.php?id=<?= $item['id']; ?>"
                    onclick="return confirm('Êtes-vous sûr de vouloir supprimer cet article ?');">Supprimer
                    l'article</a>
                <?php endif; ?>
            </form>
        </div>

        <div id="elagueuse-formulaire" class="container-catagorie">
            <form action="backend-ajout.php" method="POST" class="formulaire-admin" enctype="multipart/form-data">
                <h1 class="titre-formulaire-admin">Formulaire de modification Elageuse</h1>
                <input type="hidden" name="id" value="<?= htmlspecialchars($item['id']); ?>">
                <input class="input-admin" type="text" name="img" id="img"
                    value="<?= htmlspecialchars($item['img']); ?>" placeholder="URL de l'image">
                <input class="input-admin" type="text" name="titre" id="titre"
                    value="<?= htmlspecialchars($item['titre']); ?>"
                    placeholder="Titre pour la carte et la description">
                <input class="input-admin" type="text" name="text" id="text"
                    value="<?= htmlspecialchars($item['text']); ?>" placeholder="Texte pour la carte">
                <textarea class="input-admin" name="message" id="message"
                    placeholder="Description"><?= htmlspecialchars($item['message']); ?></textarea>
                <input class="input-admin" type="text" name="prix" id="prix"
                    value="<?= htmlspecialchars($item['prix']); ?>" placeholder="Prix"><br>
                <input class="input-admin" type="text" name="couleur" id="couleur"
                    value="<?= htmlspecialchars($item['couleur']); ?>" placeholder="Couleur">
                <input class="input-admin" type="text" name="marque" id="marque"
                    value="<?= htmlspecialchars($item['marque']); ?>" placeholder="Marque"><br>

                <label class="label-formulaire-admin" for="type_moteur">Type de tronçonneuse</label>
                <select name="type_moteur" id="type_moteur" class="select-formulaire-admin"
                    value="<?= htmlspecialchars($item['type_moteur']); ?>">
                    <option value="electrique"
                        <?= (isset($currentCategory) && $currentCategory === 'electrique') ? 'selected' : '' ?>>
                        Electrique</option>
                    <option value="batterie"
                        <?= (isset($currentCategory) && $currentCategory === 'batterie') ? 'selected' : '' ?>>A batterie
                    </option>
                    <option value="thermique"
                        <?= (isset($currentCategory) && $currentCategory === 'thermique') ? 'selected' : '' ?>>Thermique
                    </option>
                    <option value="telescopique"
                        <?= (isset($currentCategory) && $currentCategory === 'telescopique') ? 'selected' : '' ?>>
                        Thélescopique</option>
                </select>

                <input class="input-admin" type="text" name="longueur_lame" id="longueur_lame"
                    value="<?= htmlspecialchars($item['longueur_lame']); ?>" placeholder="Longueur de la lame (en cm)">
                <input class="input-admin" type="text" name="puissance" id="puissance"
                    value="<?= htmlspecialchars($item['puissance']); ?>" placeholder="Puissance du moteur (en W ou cv)">
                <input class="input-admin" type="text" name="type_coupe" id="type_coupe"
                    value="<?= htmlspecialchars($item['type_coupe']); ?>" placeholder="Type de coupe">
                <input class="input-admin" type="text" name="diametre" id="diametre"
                    value="<?= htmlspecialchars($item['diametre']); ?>" placeholder="Diamètre maximal de la coupe">
                <input class="input-admin" type="text" name="poids" id="poids"
                    value="<?= htmlspecialchars($item['poids']); ?>" placeholder="Poids">
                <input class="input-admin" type="text" name="securite" id="securite"
                    value="<?= htmlspecialchars($item['securite']); ?>" placeholder="Système de sécurité">
                <input class="input-admin" type="text" name="poignee" id="poignee"
                    value="<?= htmlspecialchars($item['poignee']); ?>" placeholder="Type de poignée"><br>

                <label for="category">Choisir la catégorie :</label>
                <select name="category" value="<?= htmlspecialchars($item['category']); ?>" required>
                    <option value="vetements"
                        <?= (isset($currentCategory) && $currentCategory === 'vetements') ? 'selected' : '' ?>>Vêtements
                    </option>
                    <option value="accessoire"
                        <?= (isset($currentCategory) && $currentCategory === 'accessoires') ? 'selected' : '' ?>>
                        Accessoires
                    </option>
                    <option value="motos"
                        <?= (isset($currentCategory) && $currentCategory === 'motos') ? 'selected' : '' ?>>Equipements
                    </option>
                    <option value="dhc"
                        <?= (isset($currentCategory) && $currentCategory === 'dhc') ? 'selected' : '' ?>>DHC
                    </option>
                    <option value="cs" <?= (isset($currentCategory) && $currentCategory === 'cs') ? 'selected' : '' ?>>
                        CS
                    </option>
                    <option value="hc" <?= (isset($currentCategory) && $currentCategory === 'hc') ? 'selected' : '' ?>>
                        HC
                    </option>
                    <option value="hcr"
                        <?= (isset($currentCategory) && $currentCategory === 'hcr') ? 'selected' : '' ?>>HCR
                    </option>
                    <option value="dhcs"
                        <?= (isset($currentCategory) && $currentCategory === 'dhcs') ? 'selected' : '' ?>>
                        DHCS</option>
                    <option value="hcs"
                        <?= (isset($currentCategory) && $currentCategory === 'hcs') ? 'selected' : '' ?>>HCS
                    </option>
                    <option value="pb" <?= (isset($currentCategory) && $currentCategory === 'pb') ? 'selected' : '' ?>>
                        PB
                    </option>
                    <option value="dpb"
                        <?= (isset($currentCategory) && $currentCategory === 'dpb') ? 'selected' : '' ?>>DPB
                    </option>
                    <option value="es" <?= (isset($currentCategory) && $currentCategory === 'es') ? 'selected' : '' ?>>
                        ES
                    </option>
                    <option value="enduro"
                        <?= (isset($currentCategory) && $currentCategory === 'enduro') ? 'selected' : '' ?>>RR ENDURO
                    </option>
                    <option value="motard"
                        <?= (isset($currentCategory) && $currentCategory === 'motard') ? 'selected' : '' ?>>RR MOTARD
                    </option>
                    <option value="rx" <?= (isset($currentCategory) && $currentCategory === 'rx') ? 'selected' : '' ?>>
                        RX
                    </option>
                    <option value="trainer"
                        <?= (isset($currentCategory) && $currentCategory === 'trainer') ? 'selected' : '' ?>>XTRAINER
                    </option>
                    <option value="evo"
                        <?= (isset($currentCategory) && $currentCategory === 'evo') ? 'selected' : '' ?>>EVO
                    </option>
                    <option value="alp"
                        <?= (isset($currentCategory) && $currentCategory === 'alp') ? 'selected' : '' ?>>ALP
                    </option>
                    <option value="electric"
                        <?= (isset($currentCategory) && $currentCategory === 'electric') ? 'selected' : '' ?>>MINIBIKES
                        ELECTRIC</option>
                    <option value="gazon-1"
                        <?= (isset($currentCategory) && $currentCategory === 'gazon-1') ? 'selected' : '' ?>>Gazon
                        Essence
                    </option>
                    <option value="vegetation-1"
                        <?= (isset($currentCategory) && $currentCategory === 'vegetation-1') ? 'selected' : '' ?>>
                        Végétation
                        Essence</option>
                    <option value="travail"
                        <?= (isset($currentCategory) && $currentCategory === 'travail') ? 'selected' : '' ?>>Travail de
                        la
                        terre Essence</option>
                    <option value="ppf"
                        <?= (isset($currentCategory) && $currentCategory === 'ppf') ? 'selected' : '' ?>>PPF
                    </option>
                    <option value="ppt"
                        <?= (isset($currentCategory) && $currentCategory === 'ppt') ? 'selected' : '' ?>>PPT
                    </option>
                    <option value="dhca"
                        <?= (isset($currentCategory) && $currentCategory === 'dhca') ? 'selected' : '' ?>>
                        DHCA</option>
                    <option value="dppf"
                        <?= (isset($currentCategory) && $currentCategory === 'dppf') ? 'selected' : '' ?>>
                        DPPF</option>
                    <option value="terre"
                        <?= (isset($currentCategory) && $currentCategory === 'terre') ? 'selected' : '' ?>>Travail de la
                        terre Diesel</option>
                    <option value="vegatation"
                        <?= (isset($currentCategory) && $currentCategory === 'vegetation') ? 'selected' : '' ?>>
                        Végétation
                        Diesel</option>
                    <option value="gazon"
                        <?= (isset($currentCategory) && $currentCategory === 'gazon') ? 'selected' : '' ?>>Gazon Diesel
                    </option>
                    <option value="grands"
                        <?= (isset($currentCategory) && $currentCategory === 'grands') ? 'selected' : '' ?>>Grands
                        espaces
                        Diesel</option>
                    <option value="dos"
                        <?= (isset($currentCategory) && $currentCategory === 'dos') ? 'selected' : '' ?>>A
                        Dos</option>
                    <option value="serie"
                        <?= (isset($currentCategory) && $currentCategory === 'serie') ? 'selected' : '' ?>>Série T
                    </option>
                    <option value="srm"
                        <?= (isset($currentCategory) && $currentCategory === 'srm') ? 'selected' : '' ?>>SRM
                    </option>
                    <option value="dsrm"
                        <?= (isset($currentCategory) && $currentCategory === 'dsrm') ? 'selected' : '' ?>>
                        DSRM</option>
                </select><br>

                <?php if (isset($_SESSION['compte']) && $_SESSION['compte']['role'] === 'admin'): ?>
                <button type="submit" class="button-back-3">Modifier</button>
                <a class="button-back-3" href="backend-sup.php?id=<?= $item['id']; ?>"
                    onclick="return confirm('Êtes-vous sûr de vouloir supprimer cet article ?');">Supprimer
                    l'article</a>
                <?php endif; ?>
            </form>
        </div>

        <div id="souffleur-formulaire" class="container-catagorie">
            <form action="backend-ajout.php" method="POST" class="formulaire-admin" enctype="multipart/form-data">
                <h1 class="titre-formulaire-admin">Formulaire de modification souffleur</h1>
                <input type="hidden" name="id" value="<?= htmlspecialchars($item['id']); ?>">
                <input class="input-admin" type="text" name="img" id="img"
                    value="<?= htmlspecialchars($item['img']); ?>" placeholder="URL de l'image">
                <input class="input-admin" type="text" name="titre" id="titre"
                    value="<?= htmlspecialchars($item['titre']); ?>"
                    placeholder="Titre pour la carte et la description">
                <input class="input-admin" type="text" name="text" id="text"
                    value="<?= htmlspecialchars($item['text']); ?>" placeholder="Texte pour la carte">
                <textarea class="input-admin" name="message" id="message"
                    placeholder="Description"><?= htmlspecialchars($item['message']); ?></textarea>
                <input class="input-admin" type="text" name="prix" id="prix"
                    value="<?= htmlspecialchars($item['prix']); ?>" placeholder="Prix"><br>
                <input class="input-admin" type="text" name="couleur" id="couleur" placeholder="Couleur">
                <input class="input-admin" type="text" name="marque" id="marque" placeholder="Marque"><br>

                <label class="label-formulaire-admin" for="type_moteur">Type de souffleur</label>
                <select name="type_moteur" id="type_moteur" class="select-formulaire-admin"
                    value="<?= htmlspecialchars($item['type_moteur']); ?>">
                    <option value="main"
                        <?= (isset($currentCategory) && $currentCategory === 'main') ? 'selected' : '' ?>>Souffleur à
                        main</option>
                    <option value="porte"
                        <?= (isset($currentCategory) && $currentCategory === 'porte') ? 'selected' : '' ?>>Souffleur
                        porté</option>
                    <option value="electrique"
                        <?= (isset($currentCategory) && $currentCategory === 'electrique') ? 'selected' : '' ?>>
                        Souffleur Eletrique</option>
                    <option value="thermique"
                        <?= (isset($currentCategory) && $currentCategory === 'thermique') ? 'selected' : '' ?>>Souffleur
                        Thermique</option>
                    <option value="batterie"
                        <?= (isset($currentCategory) && $currentCategory === 'batterie') ? 'selected' : '' ?>>Souffleur
                        Batterie</option>
                </select><br>

                <input class="input-admin" type="text" name="puissance" id="puissance"
                    value="<?= htmlspecialchars($item['puissance']); ?>" placeholder="Puissance du moteur">
                <input class="input-admin" type="text" name="vitesse_souffle" id="vitesse_souffle"
                    value="<?= htmlspecialchars($item['vitesse_souffle']); ?>" placeholder="Vitesse de soufflage">
                <input class="input-admin" type="text" name="autonomie" id="autonomie"
                    value="<?= htmlspecialchars($item['autonomie']); ?>" placeholder="Autonomie"><br>


                <label for="category">Choisir la catégorie :</label>
                <select name="category" value="<?= htmlspecialchars($item['category']); ?>" required>
                    <option value="vetements"
                        <?= (isset($currentCategory) && $currentCategory === 'vetements') ? 'selected' : '' ?>>Vêtements
                    </option>
                    <option value="accessoire"
                        <?= (isset($currentCategory) && $currentCategory === 'accessoires') ? 'selected' : '' ?>>
                        Accessoires
                    </option>
                    <option value="motos"
                        <?= (isset($currentCategory) && $currentCategory === 'motos') ? 'selected' : '' ?>>Equipements
                    </option>
                    <option value="dhc"
                        <?= (isset($currentCategory) && $currentCategory === 'dhc') ? 'selected' : '' ?>>DHC
                    </option>
                    <option value="cs" <?= (isset($currentCategory) && $currentCategory === 'cs') ? 'selected' : '' ?>>
                        CS
                    </option>
                    <option value="hc" <?= (isset($currentCategory) && $currentCategory === 'hc') ? 'selected' : '' ?>>
                        HC
                    </option>
                    <option value="hcr"
                        <?= (isset($currentCategory) && $currentCategory === 'hcr') ? 'selected' : '' ?>>HCR
                    </option>
                    <option value="dhcs"
                        <?= (isset($currentCategory) && $currentCategory === 'dhcs') ? 'selected' : '' ?>>
                        DHCS</option>
                    <option value="hcs"
                        <?= (isset($currentCategory) && $currentCategory === 'hcs') ? 'selected' : '' ?>>HCS
                    </option>
                    <option value="pb" <?= (isset($currentCategory) && $currentCategory === 'pb') ? 'selected' : '' ?>>
                        PB
                    </option>
                    <option value="dpb"
                        <?= (isset($currentCategory) && $currentCategory === 'dpb') ? 'selected' : '' ?>>DPB
                    </option>
                    <option value="es" <?= (isset($currentCategory) && $currentCategory === 'es') ? 'selected' : '' ?>>
                        ES
                    </option>
                    <option value="enduro"
                        <?= (isset($currentCategory) && $currentCategory === 'enduro') ? 'selected' : '' ?>>RR ENDURO
                    </option>
                    <option value="motard"
                        <?= (isset($currentCategory) && $currentCategory === 'motard') ? 'selected' : '' ?>>RR MOTARD
                    </option>
                    <option value="rx" <?= (isset($currentCategory) && $currentCategory === 'rx') ? 'selected' : '' ?>>
                        RX
                    </option>
                    <option value="trainer"
                        <?= (isset($currentCategory) && $currentCategory === 'trainer') ? 'selected' : '' ?>>XTRAINER
                    </option>
                    <option value="evo"
                        <?= (isset($currentCategory) && $currentCategory === 'evo') ? 'selected' : '' ?>>EVO
                    </option>
                    <option value="alp"
                        <?= (isset($currentCategory) && $currentCategory === 'alp') ? 'selected' : '' ?>>ALP
                    </option>
                    <option value="electric"
                        <?= (isset($currentCategory) && $currentCategory === 'electric') ? 'selected' : '' ?>>MINIBIKES
                        ELECTRIC</option>
                    <option value="gazon-1"
                        <?= (isset($currentCategory) && $currentCategory === 'gazon-1') ? 'selected' : '' ?>>Gazon
                        Essence
                    </option>
                    <option value="vegetation-1"
                        <?= (isset($currentCategory) && $currentCategory === 'vegetation-1') ? 'selected' : '' ?>>
                        Végétation
                        Essence</option>
                    <option value="travail"
                        <?= (isset($currentCategory) && $currentCategory === 'travail') ? 'selected' : '' ?>>Travail de
                        la
                        terre Essence</option>
                    <option value="ppf"
                        <?= (isset($currentCategory) && $currentCategory === 'ppf') ? 'selected' : '' ?>>PPF
                    </option>
                    <option value="ppt"
                        <?= (isset($currentCategory) && $currentCategory === 'ppt') ? 'selected' : '' ?>>PPT
                    </option>
                    <option value="dhca"
                        <?= (isset($currentCategory) && $currentCategory === 'dhca') ? 'selected' : '' ?>>
                        DHCA</option>
                    <option value="dppf"
                        <?= (isset($currentCategory) && $currentCategory === 'dppf') ? 'selected' : '' ?>>
                        DPPF</option>
                    <option value="terre"
                        <?= (isset($currentCategory) && $currentCategory === 'terre') ? 'selected' : '' ?>>Travail de la
                        terre Diesel</option>
                    <option value="vegatation"
                        <?= (isset($currentCategory) && $currentCategory === 'vegetation') ? 'selected' : '' ?>>
                        Végétation
                        Diesel</option>
                    <option value="gazon"
                        <?= (isset($currentCategory) && $currentCategory === 'gazon') ? 'selected' : '' ?>>Gazon Diesel
                    </option>
                    <option value="grands"
                        <?= (isset($currentCategory) && $currentCategory === 'grands') ? 'selected' : '' ?>>Grands
                        espaces
                        Diesel</option>
                    <option value="dos"
                        <?= (isset($currentCategory) && $currentCategory === 'dos') ? 'selected' : '' ?>>A
                        Dos</option>
                    <option value="serie"
                        <?= (isset($currentCategory) && $currentCategory === 'serie') ? 'selected' : '' ?>>Série T
                    </option>
                    <option value="srm"
                        <?= (isset($currentCategory) && $currentCategory === 'srm') ? 'selected' : '' ?>>SRM
                    </option>
                    <option value="dsrm"
                        <?= (isset($currentCategory) && $currentCategory === 'dsrm') ? 'selected' : '' ?>>
                        DSRM</option>
                </select><br>

                <?php if (isset($_SESSION['compte']) && $_SESSION['compte']['role'] === 'admin'): ?>
                <button type="submit" class="button-back-3">Modifier</button>
                <a class="button-back-3" href="backend-sup.php?id=<?= $item['id']; ?>"
                    onclick="return confirm('Êtes-vous sûr de vouloir supprimer cet article ?');">Supprimer
                    l'article</a>
                <?php endif; ?>
            </form>
        </div>

        <div id="equipements-formulaire" class="container-catagorie">
            <form action="backend-ajout.php" method="POST" class="formulaire-admin" enctype="multipart/form-data">
                <h1 class="titre-formulaire-admin">Formulaire de modification Equipements</h1>
                <input type="hidden" name="id" value="<?= htmlspecialchars($item['id']); ?>">
                <input class="input-admin" type="text" name="img" id="img"
                    value="<?= htmlspecialchars($item['img']); ?>" placeholder="URL de l'image">
                <input class="input-admin" type="text" name="titre" id="titre"
                    value="<?= htmlspecialchars($item['titre']); ?>"
                    placeholder="Titre pour la carte et la description">
                <input class="input-admin" type="text" name="text" id="text"
                    value="<?= htmlspecialchars($item['text']); ?>" placeholder="Texte pour la carte">
                <textarea class="input-admin" name="message" id="message"
                    placeholder="Description"><?= htmlspecialchars($item['message']); ?></textarea>
                <input class="input-admin" type="text" name="prix" id="prix"
                    value="<?= htmlspecialchars($item['prix']); ?>" placeholder="Prix">
                <input class="input-admin" type="text" name="couleur" id="couleur"
                    value="<?= htmlspecialchars($item['couleur']); ?>" placeholder="Couleur">
                <input class="input-admin" type="text" name="marque" id="marque"
                    value="<?= htmlspecialchars($item['marque']); ?>" placeholder="Marque">
                <input class="input-admin" type="text" name="taille" id="taille"
                    value="<?= htmlspecialchars(isset($item['taille']) ? $item['taille'] : ''); ?>"
                    placeholder="Taille disponible"><br>

                <label for="category">Choisir la catégorie :</label>
                <select name="category" value="<?= htmlspecialchars($item['category']); ?>" required>
                    <option value="vetements"
                        <?= (isset($currentCategory) && $currentCategory === 'vetements') ? 'selected' : '' ?>>Vêtements
                    </option>
                    <option value="accessoire"
                        <?= (isset($currentCategory) && $currentCategory === 'accessoires') ? 'selected' : '' ?>>
                        Accessoires
                    </option>
                    <option value="motos"
                        <?= (isset($currentCategory) && $currentCategory === 'motos') ? 'selected' : '' ?>>Equipements
                    </option>
                    <option value="dhc"
                        <?= (isset($currentCategory) && $currentCategory === 'dhc') ? 'selected' : '' ?>>DHC
                    </option>
                    <option value="cs" <?= (isset($currentCategory) && $currentCategory === 'cs') ? 'selected' : '' ?>>
                        CS
                    </option>
                    <option value="hc" <?= (isset($currentCategory) && $currentCategory === 'hc') ? 'selected' : '' ?>>
                        HC
                    </option>
                    <option value="hcr"
                        <?= (isset($currentCategory) && $currentCategory === 'hcr') ? 'selected' : '' ?>>HCR
                    </option>
                    <option value="dhcs"
                        <?= (isset($currentCategory) && $currentCategory === 'dhcs') ? 'selected' : '' ?>>
                        DHCS</option>
                    <option value="hcs"
                        <?= (isset($currentCategory) && $currentCategory === 'hcs') ? 'selected' : '' ?>>HCS
                    </option>
                    <option value="pb" <?= (isset($currentCategory) && $currentCategory === 'pb') ? 'selected' : '' ?>>
                        PB
                    </option>
                    <option value="dpb"
                        <?= (isset($currentCategory) && $currentCategory === 'dpb') ? 'selected' : '' ?>>DPB
                    </option>
                    <option value="es" <?= (isset($currentCategory) && $currentCategory === 'es') ? 'selected' : '' ?>>
                        ES
                    </option>
                    <option value="enduro"
                        <?= (isset($currentCategory) && $currentCategory === 'enduro') ? 'selected' : '' ?>>RR ENDURO
                    </option>
                    <option value="motard"
                        <?= (isset($currentCategory) && $currentCategory === 'motard') ? 'selected' : '' ?>>RR MOTARD
                    </option>
                    <option value="rx" <?= (isset($currentCategory) && $currentCategory === 'rx') ? 'selected' : '' ?>>
                        RX
                    </option>
                    <option value="trainer"
                        <?= (isset($currentCategory) && $currentCategory === 'trainer') ? 'selected' : '' ?>>XTRAINER
                    </option>
                    <option value="evo"
                        <?= (isset($currentCategory) && $currentCategory === 'evo') ? 'selected' : '' ?>>EVO
                    </option>
                    <option value="alp"
                        <?= (isset($currentCategory) && $currentCategory === 'alp') ? 'selected' : '' ?>>ALP
                    </option>
                    <option value="electric"
                        <?= (isset($currentCategory) && $currentCategory === 'electric') ? 'selected' : '' ?>>MINIBIKES
                        ELECTRIC</option>
                    <option value="gazon-1"
                        <?= (isset($currentCategory) && $currentCategory === 'gazon-1') ? 'selected' : '' ?>>Gazon
                        Essence
                    </option>
                    <option value="vegetation-1"
                        <?= (isset($currentCategory) && $currentCategory === 'vegetation-1') ? 'selected' : '' ?>>
                        Végétation
                        Essence</option>
                    <option value="travail"
                        <?= (isset($currentCategory) && $currentCategory === 'travail') ? 'selected' : '' ?>>Travail de
                        la
                        terre Essence</option>
                    <option value="ppf"
                        <?= (isset($currentCategory) && $currentCategory === 'ppf') ? 'selected' : '' ?>>PPF
                    </option>
                    <option value="ppt"
                        <?= (isset($currentCategory) && $currentCategory === 'ppt') ? 'selected' : '' ?>>PPT
                    </option>
                    <option value="dhca"
                        <?= (isset($currentCategory) && $currentCategory === 'dhca') ? 'selected' : '' ?>>
                        DHCA</option>
                    <option value="dppf"
                        <?= (isset($currentCategory) && $currentCategory === 'dppf') ? 'selected' : '' ?>>
                        DPPF</option>
                    <option value="terre"
                        <?= (isset($currentCategory) && $currentCategory === 'terre') ? 'selected' : '' ?>>Travail de la
                        terre Diesel</option>
                    <option value="vegatation"
                        <?= (isset($currentCategory) && $currentCategory === 'vegetation') ? 'selected' : '' ?>>
                        Végétation
                        Diesel</option>
                    <option value="gazon"
                        <?= (isset($currentCategory) && $currentCategory === 'gazon') ? 'selected' : '' ?>>Gazon Diesel
                    </option>
                    <option value="grands"
                        <?= (isset($currentCategory) && $currentCategory === 'grands') ? 'selected' : '' ?>>Grands
                        espaces
                        Diesel</option>
                    <option value="dos"
                        <?= (isset($currentCategory) && $currentCategory === 'dos') ? 'selected' : '' ?>>A
                        Dos</option>
                    <option value="serie"
                        <?= (isset($currentCategory) && $currentCategory === 'serie') ? 'selected' : '' ?>>Série T
                    </option>
                    <option value="srm"
                        <?= (isset($currentCategory) && $currentCategory === 'srm') ? 'selected' : '' ?>>SRM
                    </option>
                    <option value="dsrm"
                        <?= (isset($currentCategory) && $currentCategory === 'dsrm') ? 'selected' : '' ?>>
                        DSRM</option>
                </select><br>

                <?php if (isset($_SESSION['compte']) && $_SESSION['compte']['role'] === 'admin'): ?>
                <button type="submit" class="button-back-3">Modifier</button>
                <a class="button-back-3" href="backend-sup.php?id=<?= $item['id']; ?>"
                    onclick="return confirm('Êtes-vous sûr de vouloir supprimer cet article ?');">Supprimer
                    l'article</a>
                <?php endif; ?>
            </form>
        </div>

        <div id="motos-formulaire" class="container-catagorie">
            <form action="backend-ajout.php" method="POST" class="formulaire-admin" enctype="multipart/form-data">
                <h1 class="titre-formulaire-admin">Formulaire de modification Motos</h1>
                <input type="hidden" name="id" value="<?= htmlspecialchars($item['id']); ?>">
                <input class="input-admin" type="text" name="img" id="img"
                    value="<?= htmlspecialchars($item['img']); ?>" placeholder="URL de l'image">
                <input class="input-admin" type="text" name="titre" id="titre"
                    value="<?= htmlspecialchars($item['titre']); ?>"
                    placeholder="Titre pour la carte et la description">
                <input class="input-admin" type="text" name="text" id="text"
                    value="<?= htmlspecialchars($item['text']); ?>" placeholder="Texte pour la carte">
                <textarea class="input-admin" name="message" id="message"
                    placeholder="Description"><?= htmlspecialchars($item['message']); ?></textarea>
                <input class="input-admin" type="text" name="prix" id="prix"
                    value="<?= htmlspecialchars($item['prix']); ?>" placeholder="Prix"><br>

                <label class="label-formulaire-admin" for="type_moteur">Type de Véhicules</label>
                <select name="type_moteur" id="type_moteur" class="select-formulaire-admin"
                    value="<?= htmlspecialchars($item['type_moteur']); ?>">
                    <option value="electrique"
                        <?= (isset($currentCategory) && $currentCategory === 'electrique') ? 'selected' : '' ?>>
                        Electrique</option>
                    <option value="batterie"
                        <?= (isset($currentCategory) && $currentCategory === 'batterie') ? 'selected' : '' ?>>A batterie
                    </option>
                    <option value="thermique"
                        <?= (isset($currentCategory) && $currentCategory === 'thermique') ? 'selected' : '' ?>>Thermique
                    </option>
                </select>

                <input class="input-admin" type="text" name="puissance" id="puissance"
                    value="<?= htmlspecialchars($item['puissance']); ?>" placeholder="Puissance">
                <input class="input-admin" type="text" name="dimension" id="dimension"
                    value="<?= htmlspecialchars($item['dimension']); ?>" placeholder="Dimensions">
                <input class="input-admin" type="text" name="poids" id="poids"
                    value="<?= htmlspecialchars($item['poids']); ?>" placeholder="Poids"><br>


                <label for="category">Choisir la catégorie :</label>
                <select name="category" value="<?= htmlspecialchars($item['category']); ?>" required>
                    <option value="vetements"
                        <?= (isset($currentCategory) && $currentCategory === 'vetements') ? 'selected' : '' ?>>Vêtements
                    </option>
                    <option value="accessoire"
                        <?= (isset($currentCategory) && $currentCategory === 'accessoires') ? 'selected' : '' ?>>
                        Accessoires
                    </option>
                    <option value="motos"
                        <?= (isset($currentCategory) && $currentCategory === 'motos') ? 'selected' : '' ?>>Equipements
                    </option>
                    <option value="dhc"
                        <?= (isset($currentCategory) && $currentCategory === 'dhc') ? 'selected' : '' ?>>DHC
                    </option>
                    <option value="cs" <?= (isset($currentCategory) && $currentCategory === 'cs') ? 'selected' : '' ?>>
                        CS
                    </option>
                    <option value="hc" <?= (isset($currentCategory) && $currentCategory === 'hc') ? 'selected' : '' ?>>
                        HC
                    </option>
                    <option value="hcr"
                        <?= (isset($currentCategory) && $currentCategory === 'hcr') ? 'selected' : '' ?>>HCR
                    </option>
                    <option value="dhcs"
                        <?= (isset($currentCategory) && $currentCategory === 'dhcs') ? 'selected' : '' ?>>
                        DHCS</option>
                    <option value="hcs"
                        <?= (isset($currentCategory) && $currentCategory === 'hcs') ? 'selected' : '' ?>>HCS
                    </option>
                    <option value="pb" <?= (isset($currentCategory) && $currentCategory === 'pb') ? 'selected' : '' ?>>
                        PB
                    </option>
                    <option value="dpb"
                        <?= (isset($currentCategory) && $currentCategory === 'dpb') ? 'selected' : '' ?>>DPB
                    </option>
                    <option value="es" <?= (isset($currentCategory) && $currentCategory === 'es') ? 'selected' : '' ?>>
                        ES
                    </option>
                    <option value="enduro"
                        <?= (isset($currentCategory) && $currentCategory === 'enduro') ? 'selected' : '' ?>>RR ENDURO
                    </option>
                    <option value="motard"
                        <?= (isset($currentCategory) && $currentCategory === 'motard') ? 'selected' : '' ?>>RR MOTARD
                    </option>
                    <option value="rx" <?= (isset($currentCategory) && $currentCategory === 'rx') ? 'selected' : '' ?>>
                        RX
                    </option>
                    <option value="trainer"
                        <?= (isset($currentCategory) && $currentCategory === 'trainer') ? 'selected' : '' ?>>XTRAINER
                    </option>
                    <option value="evo"
                        <?= (isset($currentCategory) && $currentCategory === 'evo') ? 'selected' : '' ?>>EVO
                    </option>
                    <option value="alp"
                        <?= (isset($currentCategory) && $currentCategory === 'alp') ? 'selected' : '' ?>>ALP
                    </option>
                    <option value="electric"
                        <?= (isset($currentCategory) && $currentCategory === 'electric') ? 'selected' : '' ?>>MINIBIKES
                        ELECTRIC</option>
                    <option value="gazon-1"
                        <?= (isset($currentCategory) && $currentCategory === 'gazon-1') ? 'selected' : '' ?>>Gazon
                        Essence
                    </option>
                    <option value="vegetation-1"
                        <?= (isset($currentCategory) && $currentCategory === 'vegetation-1') ? 'selected' : '' ?>>
                        Végétation
                        Essence</option>
                    <option value="travail"
                        <?= (isset($currentCategory) && $currentCategory === 'travail') ? 'selected' : '' ?>>Travail de
                        la
                        terre Essence</option>
                    <option value="ppf"
                        <?= (isset($currentCategory) && $currentCategory === 'ppf') ? 'selected' : '' ?>>PPF
                    </option>
                    <option value="ppt"
                        <?= (isset($currentCategory) && $currentCategory === 'ppt') ? 'selected' : '' ?>>PPT
                    </option>
                    <option value="dhca"
                        <?= (isset($currentCategory) && $currentCategory === 'dhca') ? 'selected' : '' ?>>
                        DHCA</option>
                    <option value="dppf"
                        <?= (isset($currentCategory) && $currentCategory === 'dppf') ? 'selected' : '' ?>>
                        DPPF</option>
                    <option value="terre"
                        <?= (isset($currentCategory) && $currentCategory === 'terre') ? 'selected' : '' ?>>Travail de la
                        terre Diesel</option>
                    <option value="vegatation"
                        <?= (isset($currentCategory) && $currentCategory === 'vegetation') ? 'selected' : '' ?>>
                        Végétation
                        Diesel</option>
                    <option value="gazon"
                        <?= (isset($currentCategory) && $currentCategory === 'gazon') ? 'selected' : '' ?>>Gazon Diesel
                    </option>
                    <option value="grands"
                        <?= (isset($currentCategory) && $currentCategory === 'grands') ? 'selected' : '' ?>>Grands
                        espaces
                        Diesel</option>
                    <option value="dos"
                        <?= (isset($currentCategory) && $currentCategory === 'dos') ? 'selected' : '' ?>>A
                        Dos</option>
                    <option value="serie"
                        <?= (isset($currentCategory) && $currentCategory === 'serie') ? 'selected' : '' ?>>Série T
                    </option>
                    <option value="srm"
                        <?= (isset($currentCategory) && $currentCategory === 'srm') ? 'selected' : '' ?>>SRM
                    </option>
                    <option value="dsrm"
                        <?= (isset($currentCategory) && $currentCategory === 'dsrm') ? 'selected' : '' ?>>
                        DSRM</option>
                </select><br>

                <?php if (isset($_SESSION['compte']) && $_SESSION['compte']['role'] === 'admin'): ?>
                <button type="submit" class="button-back-3">Modifier</button>
                <a class="button-back-3" href="backend-sup.php?id=<?= $item['id']; ?>"
                    onclick="return confirm('Êtes-vous sûr de vouloir supprimer cet article ?');">Supprimer
                    l'article</a>
                <?php endif; ?>
            </form>
        </div>

        <div id="vehicules-formulaire" class="container-catagorie">
            <form action="backend-ajout.php" method="POST" class="formulaire-admin" enctype="multipart/form-data">
                <h1 class="titre-formulaire-admin">Formulaire de modification Véhicules</h1>
                <input type="hidden" name="id" value="<?= htmlspecialchars($item['id']); ?>">
                <input class="input-admin" type="text" name="img" id="img"
                    value="<?= htmlspecialchars($item['img']); ?>" placeholder="URL de l'image">
                <input class="input-admin" type="text" name="titre" id="titre"
                    value="<?= htmlspecialchars($item['titre']); ?>"
                    placeholder="Titre pour la carte et la description">
                <input class="input-admin" type="text" name="text" id="text"
                    value="<?= htmlspecialchars($item['text']); ?>" placeholder="Texte pour la carte">
                <textarea class="input-admin" name="message" id="message"
                    placeholder="Description"><?= htmlspecialchars($item['message']); ?></textarea>
                <input class="input-admin" type="text" name="prix" id="prix"
                    value="<?= htmlspecialchars($item['prix']); ?>" placeholder="Prix"><br>

                <label class="label-formulaire-admin" for="type_moteur">Type de Véhicules</label>
                <select name="type_moteur" id="type_moteur" class="select-formulaire-admin"
                    value="<?= htmlspecialchars($item['type_moteur']); ?>">
                    <option value="electrique"
                        <?= (isset($currentCategory) && $currentCategory === 'electrique') ? 'selected' : '' ?>>
                        Electrique</option>
                    <option value="batterie"
                        <?= (isset($currentCategory) && $currentCategory === 'batterie') ? 'selected' : '' ?>>A batterie
                    </option>
                    <option value="thermique"
                        <?= (isset($currentCategory) && $currentCategory === 'thermique') ? 'selected' : '' ?>>Thermique
                    </option>
                </select>

                <input class="input-admin" type="text" name="puissance" id="puissance"
                    value="<?= htmlspecialchars($item['puissance']); ?>" placeholder="Puissance">
                <input class="input-admin" type="text" name="dimension" id="dimension"
                    value="<?= htmlspecialchars($item['dimension']); ?>" placeholder="Dimensions">
                <input class="input-admin" type="text" name="poids" id="poids"
                    value="<?= htmlspecialchars($item['poids']); ?>" placeholder="Poids"><br>

                <label class="label-formulaire-admin" for="type_essence">Type de coupe</label>
                <select name="type_essence" id="type_essence" class="select-formulaire-admin"
                    value="<?= htmlspecialchars($item['puissance']); ?>" required>
                    <option value="essence"
                        <?= (isset($currentCategory) && $currentCategory === 'essence') ? 'selected' : '' ?>>Essence
                    </option>
                    <option value="diesel"
                        <?= (isset($currentCategory) && $currentCategory === 'diesel') ? 'selected' : '' ?>>Diesel
                    </option>
                </select><br>

                <label for="category">Choisir la catégorie :</label>
                <select name="category" value="<?= htmlspecialchars($item['category']); ?>" required>
                    <option value="vetements"
                        <?= (isset($currentCategory) && $currentCategory === 'vetements') ? 'selected' : '' ?>>Vêtements
                    </option>
                    <option value="accessoire"
                        <?= (isset($currentCategory) && $currentCategory === 'accessoires') ? 'selected' : '' ?>>
                        Accessoires
                    </option>
                    <option value="motos"
                        <?= (isset($currentCategory) && $currentCategory === 'motos') ? 'selected' : '' ?>>Equipements
                    </option>
                    <option value="dhc"
                        <?= (isset($currentCategory) && $currentCategory === 'dhc') ? 'selected' : '' ?>>DHC
                    </option>
                    <option value="cs" <?= (isset($currentCategory) && $currentCategory === 'cs') ? 'selected' : '' ?>>
                        CS
                    </option>
                    <option value="hc" <?= (isset($currentCategory) && $currentCategory === 'hc') ? 'selected' : '' ?>>
                        HC
                    </option>
                    <option value="hcr"
                        <?= (isset($currentCategory) && $currentCategory === 'hcr') ? 'selected' : '' ?>>HCR
                    </option>
                    <option value="dhcs"
                        <?= (isset($currentCategory) && $currentCategory === 'dhcs') ? 'selected' : '' ?>>
                        DHCS</option>
                    <option value="hcs"
                        <?= (isset($currentCategory) && $currentCategory === 'hcs') ? 'selected' : '' ?>>HCS
                    </option>
                    <option value="pb" <?= (isset($currentCategory) && $currentCategory === 'pb') ? 'selected' : '' ?>>
                        PB
                    </option>
                    <option value="dpb"
                        <?= (isset($currentCategory) && $currentCategory === 'dpb') ? 'selected' : '' ?>>DPB
                    </option>
                    <option value="es" <?= (isset($currentCategory) && $currentCategory === 'es') ? 'selected' : '' ?>>
                        ES
                    </option>
                    <option value="enduro"
                        <?= (isset($currentCategory) && $currentCategory === 'enduro') ? 'selected' : '' ?>>RR ENDURO
                    </option>
                    <option value="motard"
                        <?= (isset($currentCategory) && $currentCategory === 'motard') ? 'selected' : '' ?>>RR MOTARD
                    </option>
                    <option value="rx" <?= (isset($currentCategory) && $currentCategory === 'rx') ? 'selected' : '' ?>>
                        RX
                    </option>
                    <option value="trainer"
                        <?= (isset($currentCategory) && $currentCategory === 'trainer') ? 'selected' : '' ?>>XTRAINER
                    </option>
                    <option value="evo"
                        <?= (isset($currentCategory) && $currentCategory === 'evo') ? 'selected' : '' ?>>EVO
                    </option>
                    <option value="alp"
                        <?= (isset($currentCategory) && $currentCategory === 'alp') ? 'selected' : '' ?>>ALP
                    </option>
                    <option value="electric"
                        <?= (isset($currentCategory) && $currentCategory === 'electric') ? 'selected' : '' ?>>MINIBIKES
                        ELECTRIC</option>
                    <option value="gazon-1"
                        <?= (isset($currentCategory) && $currentCategory === 'gazon-1') ? 'selected' : '' ?>>Gazon
                        Essence
                    </option>
                    <option value="vegetation-1"
                        <?= (isset($currentCategory) && $currentCategory === 'vegetation-1') ? 'selected' : '' ?>>
                        Végétation
                        Essence</option>
                    <option value="travail"
                        <?= (isset($currentCategory) && $currentCategory === 'travail') ? 'selected' : '' ?>>Travail de
                        la
                        terre Essence</option>
                    <option value="ppf"
                        <?= (isset($currentCategory) && $currentCategory === 'ppf') ? 'selected' : '' ?>>PPF
                    </option>
                    <option value="ppt"
                        <?= (isset($currentCategory) && $currentCategory === 'ppt') ? 'selected' : '' ?>>PPT
                    </option>
                    <option value="dhca"
                        <?= (isset($currentCategory) && $currentCategory === 'dhca') ? 'selected' : '' ?>>
                        DHCA</option>
                    <option value="dppf"
                        <?= (isset($currentCategory) && $currentCategory === 'dppf') ? 'selected' : '' ?>>
                        DPPF</option>
                    <option value="terre"
                        <?= (isset($currentCategory) && $currentCategory === 'terre') ? 'selected' : '' ?>>Travail de la
                        terre Diesel</option>
                    <option value="vegatation"
                        <?= (isset($currentCategory) && $currentCategory === 'vegetation') ? 'selected' : '' ?>>
                        Végétation
                        Diesel</option>
                    <option value="gazon"
                        <?= (isset($currentCategory) && $currentCategory === 'gazon') ? 'selected' : '' ?>>Gazon Diesel
                    </option>
                    <option value="grands"
                        <?= (isset($currentCategory) && $currentCategory === 'grands') ? 'selected' : '' ?>>Grands
                        espaces
                        Diesel</option>
                    <option value="dos"
                        <?= (isset($currentCategory) && $currentCategory === 'dos') ? 'selected' : '' ?>>A
                        Dos</option>
                    <option value="serie"
                        <?= (isset($currentCategory) && $currentCategory === 'serie') ? 'selected' : '' ?>>Série T
                    </option>
                    <option value="srm"
                        <?= (isset($currentCategory) && $currentCategory === 'srm') ? 'selected' : '' ?>>SRM
                    </option>
                    <option value="dsrm"
                        <?= (isset($currentCategory) && $currentCategory === 'dsrm') ? 'selected' : '' ?>>
                        DSRM</option>
                </select><br>

                <?php if (isset($_SESSION['compte']) && $_SESSION['compte']['role'] === 'admin'): ?>
                <button type="submit" class="button-back-3">Modifier</button>
                <a class="button-back-3" href="backend-sup.php?id=<?= $item['id']; ?>"
                    onclick="return confirm('Êtes-vous sûr de vouloir supprimer cet article ?');">Supprimer
                    l'article</a>
                <?php endif; ?>
            </form>
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