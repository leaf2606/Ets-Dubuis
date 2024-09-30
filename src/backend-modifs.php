<?php
session_start();
require_once("connect.php");

if (isset($_GET["id"]) && !empty($_GET["id"])) {
    $id = strip_tags($_GET["id"]);
    $sql = "SELECT * FROM users WHERE id = :id";
    $query = $db->prepare($sql);
    $query->bindValue(":id", $id, PDO::PARAM_INT);
    $query->execute();
    $user = $query->fetch();

    if (!$user) {
        header("Location: index.php");
        exit();
    }
} else {
    header("Location: index.php");
    exit();
}

if ($_POST) {
    if (
        isset($_POST["id"]) && !empty($_POST["id"]) &&
        isset($_POST["titre"]) && !empty($_POST["titre"]) &&
        isset($_POST["message"]) && !empty($_POST["message"]) &&
        isset($_POST["prix"]) && !empty($_POST["prix"])
    ) {
        $id = strip_tags($_POST["id"]);
        $titre = strip_tags($_POST["titre"]);
        $message = strip_tags($_POST["message"]);
        $prix = strip_tags($_POST["prix"]);

        $sql = "UPDATE users SET titre = :titre, message = :message, prix = :prix WHERE id = :id";
        $query = $db->prepare($sql);
        $query->bindValue(":id", $id, PDO::PARAM_INT);
        $query->bindValue(":titre", $titre, PDO::PARAM_STR);
        $query->bindValue(":message", $message, PDO::PARAM_STR);
        $query->bindValue(":prix", $prix, PDO::PARAM_STR);
        $query->execute();

        $_SESSION["message"] = "Article modifié avec succès !";
        header("Location: description.php");
        exit();
    }
}
?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/backend.css">
    <title>Modifier l'Article</title>
</head>

<body>
    <h1>Modifier l'Article</h1>
    <form method="POST">
        <input type="hidden" name="id" value="<?= $user['id'] ?>">
        <input type="text" name="titre" value="<?= $user['titre'] ?>">
        <textarea name="message"><?= $user['message'] ?></textarea>
        <input type="text" name="prix" value="<?= $user['prix'] ?>">
        <button type="submit">Modifier l'article</button>
    </form>
</body>

</html>