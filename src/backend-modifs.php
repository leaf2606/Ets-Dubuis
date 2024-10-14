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
    $query->execute();
    $item = $query->fetch(PDO::FETCH_ASSOC); 

    // Vérifier si l'article existe
    if (!$item) {
        echo "Article non trouvé.";
        exit;
    }

    // Traitement du formulaire lors de la soumission
    if ($_POST) {
        // Vérifier si tous les champs obligatoires sont remplis
        if (
            isset($_POST["id"]) && !empty($_POST["id"]) &&
            isset($_POST["titre"]) && !empty($_POST["titre"]) &&
            isset($_POST["message"]) && !empty($_POST["message"]) &&
            isset($_POST["prix"]) && !empty($_POST["prix"])
        ) {
            // Nettoyer et stocker les données
            $id = strip_tags($_POST["id"]);
            $titre = strip_tags($_POST["titre"]);
            $message = strip_tags($_POST["message"]);
            $prix = strip_tags($_POST["prix"]);
            $img = strip_tags($_POST["img"]); 
            $ref = strip_tags($_POST["ref"]);
            $marque = strip_tags($_POST["marque"]);
            $couleur = strip_tags($_POST["couleur"]);
            $category = strip_tags($_POST["category"]);

            // Préparer la requête de mise à jour
            $sql = "UPDATE catalogue SET img = :img, titre = :titre, message = :message, prix = :prix, ref = :ref, marque = :marque, couleur = :couleur, category = :category WHERE id = :id";
            $query = $db->prepare($sql);
            $query->bindValue(":id", $id, PDO::PARAM_INT);
            $query->bindValue(":img", $img, PDO::PARAM_STR);
            $query->bindValue(":titre", $titre, PDO::PARAM_STR);
            $query->bindValue(":message", $message, PDO::PARAM_STR);
            $query->bindValue(":prix", floatval($prix), PDO::PARAM_STR);
            $query->bindValue(":ref", $ref, PDO::PARAM_STR);
            $query->bindValue(":marque", $marque, PDO::PARAM_STR);
            $query->bindValue(":couleur", $couleur, PDO::PARAM_STR);
            $query->bindValue(":category", $category, PDO::PARAM_STR);
            
            // Exécution de la requête
            if ($query->execute()) {
                // Redirection vers la description de l'article avec son ID
                header("Location: description.php?id=" . $id);
                exit();
            } else {
                echo "Erreur : Impossible de modifier l'article. " . implode(", ", $query->errorInfo());
            }
        } else {
            echo "Erreur : Veuillez remplir tous les champs obligatoires.";
        }
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
    <link rel="stylesheet" href="css/font.css">
    <title>Modifier l'Article</title>
</head>

<body>
    <h1 class="titre-back">Article | <a href="../index.php">&ensp;Accueil</a></h1>
    <div class="container-back">
        <form action="backend-modifs.php?id=<?= $item['id']; ?>" method="POST" class="formulaire-admin"
            enctype="multipart/form-data">
            <h1>Formulaire d'ajout d'article</h1>
            <input type="hidden" name="id" value="<?= htmlspecialchars($item['id']); ?>">
            <input class="input-admin" type="text" name="img" value="<?= htmlspecialchars($item['img']); ?>"
                placeholder="Image">
            <input class="input-admin" type="text" name="titre" value="<?= htmlspecialchars($item['titre']); ?>"
                placeholder="Titre pour la carte et la description">
            <input class="input-admin" type="text" name="text" value="<?= htmlspecialchars($item['text']); ?>"
                placeholder="Texte pour la carte">
            <textarea class="input-admin" name="message"
                placeholder="Description"><?= htmlspecialchars($item['message']); ?></textarea>
            <input class="input-admin" type="text" name="prix" value="<?= htmlspecialchars($item['prix']); ?>"
                placeholder="Prix">
            <input class="input-admin" type="text" name="ref" value="<?= htmlspecialchars($item['ref']); ?>"
                placeholder="Référence">
            <input class="input-admin" type="text" name="marque" value="<?= htmlspecialchars($item['marque']); ?>"
                placeholder="Marque">
            <input class="input-admin" type="text" name="couleur" value="<?= htmlspecialchars($item['couleur']); ?>"
                placeholder="Couleur">

            <label for="category">Choisir la catégorie :</label><br>
            <select name="category" value="<?= htmlspecialchars($item['category']); ?>" required>
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

            <?php if (isset($_SESSION['compte']) && $_SESSION['compte']['role'] === 'admin'): ?>
            <div class="admin-buttons">
                <button type="submit" class="button-back">Modifier</button>
                <a class="button-back" href="backend-sup.php?id=<?= $item['id']; ?>"
                    onclick="return confirm('Êtes-vous sûr de vouloir supprimer cet article ?');">Supprimer
                    l'article</a>
            </div>
            <?php endif; ?>
        </form>
    </div>
</body>

</html>