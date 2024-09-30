<?php

session_start();

require_once("connect.php");

if (!isset($_SESSION['user_id'])) {
    header("Location: compte.php");
    exit();
}

if(isset($_GET["user_id"]) && !empty($_GET["user_id"])) {
    $id = strip_tags($_GET["user_id"]);

    $sql = "SELECT * FROM users WHERE id = :id";

    $query = $db->prepare($sql); 

    $query->bindValue(":id", $id, PDO::PARAM_INT);
    $query->execute();
    $user = $query->fetch(PDO::FETCH_ASSOC);

    if(!$user){
        header("Location: index.php");
        exit();
    }

} else {
    header("Location: index.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">

    <title>Recherche de stage</title>
</head>

<body>

    <h1>Recherche de Stage</h1>
    <div class="container-user">

        <p>Statut de la recherche : <?= $user["titre"] ?></p>
        <p>Nom de l'entreprise : <?= $user["message"] ?></p>
        <p>Date de postulation : <?= $user["prix"] ?></p>
        <p>Date de relance : <?= $user["ref"] ?></p>
        <p>Type depostulation : <?= $user["marque"] ?></p>
        <p>Méthode depostulation : <?= $user["couleur"] ?></p>
        <p>Intitule deposte : <?= $user["img"] ?></p>
        <p>Type decontrat : <?= $user["category"] ?></p>

        <a href="description.php">Retour</a><br>

    </div>
</body>

</html>