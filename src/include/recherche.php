<?php

require_once("connect.php");

$sql = "SELECT * FROM catalogue ORDER BY id DESC";
$query = $db->prepare($sql);
$query->execute();
$catalogue = $query->fetchAll(PDO::FETCH_ASSOC);

if (isset($_GET['s']) && !empty($_GET['s'])) {
    $recherche = htmlspecialchars($_GET['s']);
    $sql = 'SELECT titre FROM catalogue WHERE titre LIKE "%' . $recherche . '%" ORDER BY id DESC';
    $query = $db->prepare($sql);
    $query->execute();
    $catalogue = $query->fetchAll(PDO::FETCH_ASSOC);
}

?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/materiels.css">
    <title>Barre de recherche</title>
</head>

<body>

    <form action="" method="GET" class="form-recherche">
        <input class="input-recherche" type="search" name="s" placeholder="Recherche d'article">
        <input class="button-recherche" type="submit" name="rechercher" placeholder="Rechercher">
    </form>

    <section class="afficher-article">

        <?php
        // Vérification si des résultats ont été trouvés
        if ($query->rowCount() > 0) {
            // Afficher chaque résultat en utilisant la boucle while
            while ($catalogue = $query->fetch(PDO::FETCH_ASSOC)) {
                echo "<p>" . $catalogue['titre'] . "</p>";
            }
        } else {
            echo "<p>Aucun article trouvé</p>";
        }
        ?>

    </section>

</body>

</html>