<?php

// On vérifie qu'il y a bien un id dans l'url et que l'utilisteur correspondant existe //

if(isset($_GET{"id"}) && !empty($_POST{"id"})) {

require_once("connect.php");

    // echo $_GET["id"];
$id = strip_tags($_POST["id"]);

$sql = "SELECT * FROM users WHERE id = :id";

$query = $db->prepare($sql); 
// On accroche la valeur id de la requête à celle de la variable $id //

$query->bindValue(":id", $id, PDO::PARAM_INT);

$query->execute();

$user = $query->fetch();

// On vérifie si l'utilisateur existe // 

if(!$user){
    header("Location: index.php");
} else {
    // On gère la suppresion de l'utilisateur //
    $sql = "DELETE FROM users WHERE id = :id";
    
    $query = $db->prepare($sql); 
    
    $query->bindValue(":id", $id, PDO::PARAM_INT);

    $query->execute();
    header("Location: index.php");
}


// print_r($user);

} else{
    header("Location: index.php");
}

?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/font.css">
    <link rel="stylesheet" href="css/backend.css">
    <title>Page administrateur</title>
</head>

<body>

    <h1 class="titre-back">Ici sert à supprimer les informations pour tout les articles</h1>

    <div class="container-back">
        <form action="" method="POST" class="formulaire-admin">
            <input class="input-admin" type="text" name="titre" id="titre" placeholder="Titre">
            <textarea class="input-admin" name="message" id="message" placeholder="Déscription"></textarea>
            <input class="input-admin" type="text" name="prix" id="prix" placeholder="Prix">
            <input class="input-admin" type="text" name="ref" id="ref" placeholder="Référence">
            <input class="input-admin" type="text" name="marque" id="marque" placeholder="Marque">
            <input class="input-admin" type="text" name="couleur" id="couleur" placeholder=" Couleur">
            <input class="input-admin" type="file" name="fichier" id="fichier">
            <button class="button-back">Supprimer l'article</button>
        </form>
    </div>

</body>

</html>