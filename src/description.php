<?php

session_start();

require_once("connect.php");

$sql = "SELECT * FROM article_back";
$query = $db->prepare($sql);
$query->execute();
$suggestion = $query->fetchAll(PDO::FETCH_ASSOC);
    
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/description.css">
    <link rel="stylesheet" href="css/font.css">
    <link rel="stylesheet" href="css/materiels.css">
    <title>Description</title>
</head>

<body>

    <?php include_once("./include/navbar.php"); ?>

    <div id="news-lien-id">
        <div class="lien-news">
            <button class="lien-nouveautes" onclick="openTab('gants')">Gants</button>
            <button class="lien-nouveautes" onclick="openTab('pantalons')">Pantalons</button>
            <button class="lien-nouveautes" onclick="openTab('veste')">Veste</button>
            <button class="lien-nouveautes" onclick="openTab('casque')">Casque</button>
            <button class="lien-nouveautes" onclick="openTab('blousons')">Blousons</button>
        </div>
    </div>

    <!-- Articles -->

    <?php foreach ($suggestion as $item): ?>
    <?php if ($item['category'] === 'gants'): ?>
    <header>
        <div class="section1">
            <div class="text-description"><?php echo htmlspecialchars($item['titre']); ?></div>
        </div>
    </header>

    <figure class="figure-description">
        <img class="img-description" src="<?php echo htmlspecialchars($item['img']); ?>" alt="img">
    </figure>

    <div class="container-description">
        <p class="text-descriptif"><?php echo htmlspecialchars($item['message']); ?></p>
        <p class="text-descriptif">Référence: <?php echo htmlspecialchars($item['ref']); ?></p>
        <p class="text-descriptif">Marque: <?php echo htmlspecialchars($item['marque']); ?></p>
        <p class="text-descriptif">Prix: <?php echo htmlspecialchars($item['prix']); ?> €</p>
        <p class="text-descriptif">Couleur: <?php echo htmlspecialchars($item['couleur']); ?></p>
        <p class="text-descriptif">Catégories: <?php echo htmlspecialchars($item['category']); ?></p>
        <div class="container-etoile">
            <input type="radio" name="etoile<?php echo $item['id']; ?>" id="etoile1<?php echo $item['id']; ?>">
            <label for="etoile1<?php echo $item['id']; ?>"></label>
            <input type="radio" name="etoile<?php echo $item['id']; ?>" id="etoile2<?php echo $item['id']; ?>">
            <label for="etoile2<?php echo $item['id']; ?>"></label>
            <input type="radio" name="etoile<?php echo $item['id']; ?>" id="etoile3<?php echo $item['id']; ?>">
            <label for="etoile3<?php echo $item['id']; ?>"></label>
            <input type="radio" name="etoile<?php echo $item['id']; ?>" id="etoile4<?php echo $item['id']; ?>">
            <label for="etoile4<?php echo $item['id']; ?>"></label>
            <input type="radio" name="etoile<?php echo $item['id']; ?>" id="etoile5<?php echo $item['id']; ?>">
            <label for="etoile5<?php echo $item['id']; ?>"></label>
        </div>
    </div>
    <?php endif; ?>
    <?php endforeach; ?>

    <?php foreach ($suggestion as $item): ?>
    <?php if ($item['category'] === 'pantalons'): ?>
    <header>
        <div class="section1">
            <div class="text-description"><?php echo htmlspecialchars($item['titre']); ?></div>
        </div>
    </header>

    <figure class="figure-description">
        <img class="img-description" src="<?php echo htmlspecialchars($item['img']); ?>" alt="img">
    </figure>

    <div class="container-description">
        <p class="text-descriptif"><?php echo htmlspecialchars($item['message']); ?></p>
        <p class="text-descriptif">Référence: <?php echo htmlspecialchars($item['ref']); ?></p>
        <p class="text-descriptif">Marque: <?php echo htmlspecialchars($item['marque']); ?></p>
        <p class="text-descriptif">Prix: <?php echo htmlspecialchars($item['prix']); ?> €</p>
        <p class="text-descriptif">Couleur: <?php echo htmlspecialchars($item['couleur']); ?></p>
        <p class="text-descriptif">Catégories: <?php echo htmlspecialchars($item['category']); ?></p>
        <div class="container-etoile">
            <input type="radio" name="etoile<?php echo $item['id']; ?>" id="etoile1<?php echo $item['id']; ?>">
            <label for="etoile1<?php echo $item['id']; ?>"></label>
            <input type="radio" name="etoile<?php echo $item['id']; ?>" id="etoile2<?php echo $item['id']; ?>">
            <label for="etoile2<?php echo $item['id']; ?>"></label>
            <input type="radio" name="etoile<?php echo $item['id']; ?>" id="etoile3<?php echo $item['id']; ?>">
            <label for="etoile3<?php echo $item['id']; ?>"></label>
            <input type="radio" name="etoile<?php echo $item['id']; ?>" id="etoile4<?php echo $item['id']; ?>">
            <label for="etoile4<?php echo $item['id']; ?>"></label>
            <input type="radio" name="etoile<?php echo $item['id']; ?>" id="etoile5<?php echo $item['id']; ?>">
            <label for="etoile5<?php echo $item['id']; ?>"></label>
        </div>
    </div>
    <?php endif; ?>
    <?php endforeach; ?>

    <?php foreach ($suggestion as $item): ?>
    <?php if ($item['category'] === 'veste'): ?>
    <header>
        <div class="section1">
            <div class="text-description"><?php echo htmlspecialchars($item['titre']); ?></div>
        </div>
    </header>

    <figure class="figure-description">
        <img class="img-description" src="<?php echo htmlspecialchars($item['img']); ?>" alt="img">
    </figure>

    <div class="container-description">
        <p class="text-descriptif"><?php echo htmlspecialchars($item['message']); ?></p>
        <p class="text-descriptif">Référence: <?php echo htmlspecialchars($item['ref']); ?></p>
        <p class="text-descriptif">Marque: <?php echo htmlspecialchars($item['marque']); ?></p>
        <p class="text-descriptif">Prix: <?php echo htmlspecialchars($item['prix']); ?> €</p>
        <p class="text-descriptif">Couleur: <?php echo htmlspecialchars($item['couleur']); ?></p>
        <p class="text-descriptif">Catégories: <?php echo htmlspecialchars($item['category']); ?></p>
        <div class="container-etoile">
            <input type="radio" name="etoile<?php echo $item['id']; ?>" id="etoile1<?php echo $item['id']; ?>">
            <label for="etoile1<?php echo $item['id']; ?>"></label>
            <input type="radio" name="etoile<?php echo $item['id']; ?>" id="etoile2<?php echo $item['id']; ?>">
            <label for="etoile2<?php echo $item['id']; ?>"></label>
            <input type="radio" name="etoile<?php echo $item['id']; ?>" id="etoile3<?php echo $item['id']; ?>">
            <label for="etoile3<?php echo $item['id']; ?>"></label>
            <input type="radio" name="etoile<?php echo $item['id']; ?>" id="etoile4<?php echo $item['id']; ?>">
            <label for="etoile4<?php echo $item['id']; ?>"></label>
            <input type="radio" name="etoile<?php echo $item['id']; ?>" id="etoile5<?php echo $item['id']; ?>">
            <label for="etoile5<?php echo $item['id']; ?>"></label>
        </div>
    </div>
    <?php endif; ?>
    <?php endforeach; ?>

    <?php foreach ($suggestion as $item): ?>
    <?php if ($item['category'] === 'casque'): ?>
    <header>
        <div class="section1">
            <div class="text-description"><?php echo htmlspecialchars($item['titre']); ?></div>
        </div>
    </header>

    <figure class="figure-description">
        <img class="img-description" src="<?php echo htmlspecialchars($item['img']); ?>" alt="img">
    </figure>

    <div class="container-description">
        <p class="text-descriptif"><?php echo htmlspecialchars($item['message']); ?></p>
        <p class="text-descriptif">Référence: <?php echo htmlspecialchars($item['ref']); ?></p>
        <p class="text-descriptif">Marque: <?php echo htmlspecialchars($item['marque']); ?></p>
        <p class="text-descriptif">Prix: <?php echo htmlspecialchars($item['prix']); ?> €</p>
        <p class="text-descriptif">Couleur: <?php echo htmlspecialchars($item['couleur']); ?></p>
        <p class="text-descriptif">Catégories: <?php echo htmlspecialchars($item['category']); ?></p>
        <div class="container-etoile">
            <input type="radio" name="etoile<?php echo $item['id']; ?>" id="etoile1<?php echo $item['id']; ?>">
            <label for="etoile1<?php echo $item['id']; ?>"></label>
            <input type="radio" name="etoile<?php echo $item['id']; ?>" id="etoile2<?php echo $item['id']; ?>">
            <label for="etoile2<?php echo $item['id']; ?>"></label>
            <input type="radio" name="etoile<?php echo $item['id']; ?>" id="etoile3<?php echo $item['id']; ?>">
            <label for="etoile3<?php echo $item['id']; ?>"></label>
            <input type="radio" name="etoile<?php echo $item['id']; ?>" id="etoile4<?php echo $item['id']; ?>">
            <label for="etoile4<?php echo $item['id']; ?>"></label>
            <input type="radio" name="etoile<?php echo $item['id']; ?>" id="etoile5<?php echo $item['id']; ?>">
            <label for="etoile5<?php echo $item['id']; ?>"></label>
        </div>
    </div>
    <?php endif; ?>
    <?php endforeach; ?>

    <?php foreach ($suggestion as $item): ?>
    <?php if ($item['category'] === 'blousons'): ?>
    <header>
        <div class="section1">
            <div class="text-description"><?php echo htmlspecialchars($item['titre']); ?></div>
        </div>
    </header>

    <figure class="figure-description">
        <img class="img-description" src="<?php echo htmlspecialchars($item['img']); ?>" alt="img">
    </figure>

    <div class="container-description">
        <p class="text-descriptif"><?php echo htmlspecialchars($item['message']); ?></p>
        <p class="text-descriptif">Référence: <?php echo htmlspecialchars($item['ref']); ?></p>
        <p class="text-descriptif">Marque: <?php echo htmlspecialchars($item['marque']); ?></p>
        <p class="text-descriptif">Prix: <?php echo htmlspecialchars($item['prix']); ?> €</p>
        <p class="text-descriptif">Couleur: <?php echo htmlspecialchars($item['couleur']); ?></p>
        <p class="text-descriptif">Catégories: <?php echo htmlspecialchars($item['category']); ?></p>
        <div class="container-etoile">
            <input type="radio" name="etoile<?php echo $item['id']; ?>" id="etoile1<?php echo $item['id']; ?>">
            <label for="etoile1<?php echo $item['id']; ?>"></label>
            <input type="radio" name="etoile<?php echo $item['id']; ?>" id="etoile2<?php echo $item['id']; ?>">
            <label for="etoile2<?php echo $item['id']; ?>"></label>
            <input type="radio" name="etoile<?php echo $item['id']; ?>" id="etoile3<?php echo $item['id']; ?>">
            <label for="etoile3<?php echo $item['id']; ?>"></label>
            <input type="radio" name="etoile<?php echo $item['id']; ?>" id="etoile4<?php echo $item['id']; ?>">
            <label for="etoile4<?php echo $item['id']; ?>"></label>
            <input type="radio" name="etoile<?php echo $item['id']; ?>" id="etoile5<?php echo $item['id']; ?>">
            <label for="etoile5<?php echo $item['id']; ?>"></label>
        </div>
    </div>
    <?php endif; ?>
    <?php endforeach; ?>

    <!-- Card  -->

    <h1 class="produit-suggeres">Produits similaires</h1>

    <div id="gants" class="card-container">
        <div class="wrapper-vetements">
            <div class="card-area">
                <div class="box-area">
                    <?php foreach ($suggestion as $item): ?>
                    <?php if ($item['category'] === 'gants'): ?>
                    <div class="box">
                        <img class="img-card" src="<?= htmlspecialchars($item['img']); ?>" alt="img">
                        <div class="overlay">
                            <h3 class="titre-3"><?= htmlspecialchars($item['titre']); ?></h3>
                            <p class="text-card-3"><?= htmlspecialchars($item['text']); ?></p>
                            <a class="lien-card" href="">Description</a>
                        </div>
                    </div>
                    <?php endif; ?>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </div>

    <div id="pantalons" class="card-container">
        <div class="wrapper-vetements">
            <div class="card-area">
                <div class="box-area">
                    <?php foreach ($suggestion as $item): ?>
                    <?php if ($item['category'] === 'pantalons'): ?>
                    <div class="box">
                        <img class="img-card" src="<?= htmlspecialchars($item['img']); ?>" alt="img">
                        <div class="overlay">
                            <h3 class="titre-3"><?= htmlspecialchars($item['titre']); ?></h3>
                            <p class="text-card-3"><?= htmlspecialchars($item['text']); ?></p>
                            <a class="lien-card" href="">Description</a>
                        </div>
                    </div>
                    <?php endif; ?>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </div>

    <div id="veste" class="card-container">
        <div class="wrapper-vetements">
            <div class="card-area">
                <div class="box-area">
                    <?php foreach ($suggestion as $item): ?>
                    <?php if ($item['category'] === 'veste'): ?>
                    <div class="box">
                        <img class="img-card" src="<?= htmlspecialchars($item['img']); ?>" alt="img">
                        <div class="overlay">
                            <h3 class="titre-3"><?= htmlspecialchars($item['titre']); ?></h3>
                            <p class="text-card-3"><?= htmlspecialchars($item['text']); ?></p>
                            <a class="lien-card" href="">Description</a>
                        </div>
                    </div>
                    <?php endif; ?>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </div>

    <div id="casque" class="card-container">
        <div class="wrapper-vetements">
            <div class="card-area">
                <div class="box-area">
                    <?php foreach ($suggestion as $item): ?>
                    <?php if ($item['category'] === 'casque'): ?>
                    <div class="box">
                        <img class="img-card" src="<?= htmlspecialchars($item['img']); ?>" alt="img">
                        <div class="overlay">
                            <h3 class="titre-3"><?= htmlspecialchars($item['titre']); ?></h3>
                            <p class="text-card-3"><?= htmlspecialchars($item['text']); ?></p>
                            <a class="lien-card" href="">Description</a>
                        </div>
                    </div>
                    <?php endif; ?>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </div>

    <div id="blousons" class="card-container">
        <div class="wrapper-vetements">
            <div class="card-area">
                <div class="box-area">
                    <?php foreach ($suggestion as $item): ?>
                    <?php if ($item['category'] === 'blousons'): ?>
                    <div class="box">
                        <img class="img-card" src="<?= htmlspecialchars($item['img']); ?>" alt="img">
                        <div class="overlay">
                            <h3 class="titre-3"><?= htmlspecialchars($item['titre']); ?></h3>
                            <p class="text-card-3"><?= htmlspecialchars($item['text']); ?></p>
                            <a class="lien-card" href="">Description</a>
                        </div>
                    </div>
                    <?php endif; ?>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </div>

    <a href="backend-ajout.php">Ajouter un article</a>
    <a href="backend-modif.php">Modifier un article</a>
    <a href="description.php">Voir les descriptions</a>

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
        openTab('gants');
    });
    </script>

    <?php include_once("./include/footer.php"); ?>

</body>

</html>