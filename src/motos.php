<?php

session_start();

require_once("connect.php");

$sql = "SELECT * FROM catalogue";
$query = $db->prepare($sql);
$query->execute();
$catalogue = $query->fetchAll(PDO::FETCH_ASSOC);
    
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/materiels.css">
    <link rel="stylesheet" href="css/font.css">
    <link rel="stylesheet" href="css/vetements.css">
    <title>Débrousailleuse</title>
</head>

<body>

    <?php include_once("./include/navbar.php"); ?>

    <div id="news-lien-id">
        <div class="lien-news-5">
            <button class="lien-nouveautes" onclick="openTab('enduro')">RR ENDURO</button>
            <button class="lien-nouveautes" onclick="openTab('motard')">RR MOTARD</button>
            <button class="lien-nouveautes" onclick="openTab('rx')">RX</button>
            <button class="lien-nouveautes" onclick="openTab('trainer')">XTRAINER</button>
            <button class="lien-nouveautes" onclick="openTab('evo')">EVO</button>
            <button class="lien-nouveautes" onclick="openTab('alp')">ALP</button>
            <button class="lien-nouveautes" onclick="openTab('electric')">MINIBIKES ELECTRIC</button>
        </div>
    </div>

    <!-- Card  -->

    <div id="enduro" class="card-container">
        <div class="wrapper-vetements">
            <div class="card-area">
                <div class="box-area">
                    <?php foreach ($catalogue as $item): ?>
                    <?php if ($item['category'] === 'enduro'): ?>
                    <div class="box">
                        <img class="img-card" src="<?= htmlspecialchars($item['img']); ?>" alt="img">
                        <div class="overlay">
                            <h3 class="titre-3"><?= htmlspecialchars($item['titre']); ?></h3>
                            <p class="text-card-3"><?= htmlspecialchars($item['text']); ?></p>
                            <a class="lien-card" href="description.php?id=<?= $item['id']; ?>">Description</a>
                        </div>
                    </div>
                    <?php endif; ?>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </div>

    <div id="motard" class="card-container">
        <div class="wrapper-vetements">
            <div class="card-area">
                <div class="box-area">
                    <?php foreach ($catalogue as $item): ?>
                    <?php if ($item['category'] === 'motard'): ?>
                    <div class="box">
                        <img class="img-card" src="<?= htmlspecialchars($item['img']); ?>" alt="img">
                        <div class="overlay">
                            <h3 class="titre-3"><?= htmlspecialchars($item['titre']); ?></h3>
                            <p class="text-card-3"><?= htmlspecialchars($item['text']); ?></p>
                            <a class="lien-card" href="description.php?id=<?= $item['id']; ?>">Description</a>
                        </div>
                    </div>
                    <?php endif; ?>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </div>

    <div id="rx" class="card-container">
        <div class="wrapper-vetements">
            <div class="card-area">
                <div class="box-area">
                    <?php foreach ($catalogue as $item): ?>
                    <?php if ($item['category'] === 'rx'): ?>
                    <div class="box">
                        <img class="img-card" src="<?= htmlspecialchars($item['img']); ?>" alt="img">
                        <div class="overlay">
                            <h3 class="titre-3"><?= htmlspecialchars($item['titre']); ?></h3>
                            <p class="text-card-3"><?= htmlspecialchars($item['text']); ?></p>
                            <a class="lien-card" href="description.php?id=<?= $item['id']; ?>">Description</a>
                        </div>
                    </div>
                    <?php endif; ?>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </div>

    <div id="trainer" class="card-container">
        <div class="wrapper-vetements">
            <div class="card-area">
                <div class="box-area">
                    <?php foreach ($catalogue as $item): ?>
                    <?php if ($item['category'] === 'trainer'): ?>
                    <div class="box">
                        <img class="img-card" src="<?= htmlspecialchars($item['img']); ?>" alt="img">
                        <div class="overlay">
                            <h3 class="titre-3"><?= htmlspecialchars($item['titre']); ?></h3>
                            <p class="text-card-3"><?= htmlspecialchars($item['text']); ?></p>
                            <a class="lien-card" href="description.php?id=<?= $item['id']; ?>">Description</a>
                        </div>
                    </div>
                    <?php endif; ?>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </div>

    <div id="evo" class="card-container">
        <div class="wrapper-vetements">
            <div class="card-area">
                <div class="box-area">
                    <?php foreach ($catalogue as $item): ?>
                    <?php if ($item['category'] === 'evo'): ?>
                    <div class="box">
                        <img class="img-card" src="<?= htmlspecialchars($item['img']); ?>" alt="img">
                        <div class="overlay">
                            <h3 class="titre-3"><?= htmlspecialchars($item['titre']); ?></h3>
                            <p class="text-card-3"><?= htmlspecialchars($item['text']); ?></p>
                            <a class="lien-card" href="description.php?id=<?= $item['id']; ?>">Description</a>
                        </div>
                    </div>
                    <?php endif; ?>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </div>


    <div id="alp" class="card-container">
        <div class="wrapper-vetements">
            <div class="card-area">
                <div class="box-area">
                    <?php foreach ($catalogue as $item): ?>
                    <?php if ($item['category'] === 'alp'): ?>
                    <div class="box">
                        <img class="img-card" src="<?= htmlspecialchars($item['img']); ?>" alt="img">
                        <div class="overlay">
                            <h3 class="titre-3"><?= htmlspecialchars($item['titre']); ?></h3>
                            <p class="text-card-3"><?= htmlspecialchars($item['text']); ?></p>
                            <a class="lien-card" href="description.php?id=<?= $item['id']; ?>">Description</a>
                        </div>
                    </div>
                    <?php endif; ?>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </div>


    <div id="electric" class="card-container">
        <div class="wrapper-vetements">
            <div class="card-area">
                <div class="box-area">
                    <?php foreach ($catalogue as $item): ?>
                    <?php if ($item['category'] === 'electric'): ?>
                    <div class="box">
                        <img class="img-card" src="<?= htmlspecialchars($item['img']); ?>" alt="img">
                        <div class="overlay">
                            <h3 class="titre-3"><?= htmlspecialchars($item['titre']); ?></h3>
                            <p class="text-card-3"><?= htmlspecialchars($item['text']); ?></p>
                            <a class="lien-card" href="description.php?id=<?= $item['id']; ?>">Description</a>
                        </div>
                    </div>
                    <?php endif; ?>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </div>


    <!-- Le script sert à accéder aux autres liens sur la même page et à activer ou cacher les sections -->
    <script>
    function openTab(tabId) {
        console.log('Tab clicked:', tabId);
        // Cache toutes les sections
        document.querySelectorAll('.card-container').forEach(function(tab) {
            tab.style.display = 'none';
        });

        // Affiche la section cliquée
        document.getElementById(tabId).style.display = 'block';
    }

    // Affiche le premier onglet chaque fois que la page est rafraîchie
    document.addEventListener('DOMContentLoaded', function() {
        openTab('enduro');
    });
    </script>

    <?php include_once("./include/footer.php"); ?>

</body>

</html>