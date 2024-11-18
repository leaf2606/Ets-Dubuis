<?php

session_start();

require_once("connect.php");

// Pour la newsletter 

$erreur = '';
$message_soumission = '';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Récupération des données du formulaire
    $prenom = trim($_POST['prenom_newsletter']);  
    $email = trim($_POST['email_newsletter']);    

    // Validation des champs
    if (empty($prenom)) {
        $erreur .= "<li>Prénom laissé vide !</li>";
    }
    if (empty($email)) {
        $erreur .= "<li>Email laissé vide !</li>";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) { 
        $erreur .= "<li>Email invalide !</li>";
    }

    // Si aucune erreur, procéder à l'insertion dans la base de données
    if (empty($erreur)) {
        // Insertion des données dans la table
        $insertSql = "INSERT INTO newsletter (prenom_newsletter, email_newsletter) VALUES (?, ?)";
        $insertQuery = $db->prepare($insertSql);
        $insertQuery->execute([$prenom, $email]);
        
        // Message de succès
        $message_soumission = "<p>Formulaire soumis avec succès!</p>";
    }
}

?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/propos.css">
    <link rel="stylesheet" href="css/navbar.css">
    <link rel="stylesheet" href="css/footer.css">
    <link rel="stylesheet" href="css/font.css">
    <script src="js/script.js" defer></script>
    <title>A propos</title>
</head>

<body>

    <?php include_once("./include/navbar.php"); ?>

    <section id="header-section">

        <header>
            <figure class="figure-container">
                <img class="img-propos" src="../img/header-1.png" alt="img-header">
            </figure>
        </header>

    </section>

    <section id="paragraphe-1-section">

        <h1 class="titre-propos">Nos initiatives pour l'avenir</h1>

        <p class="text-propos">Depuis toujours, notre entreprise place l’entretien et la fidélisation de sa clientèle au
            cœur de ses priorités. Nous cultivons des relations de confiance durables, convaincus que cette proximité
            est essentielle pour bâtir un avenir solide. Notre objectif est de transmettre cette passion et ce
            savoir-faire à un futur successeur, afin de garantir la continuité de nos valeurs et de notre engagement
            envers nos clients.</p>

    </section>

    <section id="parallax-1">
        <div class="parallax-trios">
            <div class="parallax-item">
                <img src="../img/reparation.png" class="img-parallax" alt="img-reparation">
                <p class="parallax-text">Réparation</p>
            </div>
            <div class="parallax-item">
                <img src="../img/vente.png" class="img-parallax" alt="img-vente">
                <p class="parallax-text">Vente</p>
            </div>
            <div class="parallax-item">
                <img src="../img/conseil.png" class="img-parallax" alt="img-conseil">
                <p class="parallax-text">Conseil</p>
            </div>
        </div>
    </section>

    <section id="paragraphe-2-section">

        <h1 class="titre-propos">La vente de matériel de qualité</h1>


        <p class="text-propos">Chez Ets Dubuis, nous mettons un point d’honneur à vous proposer des
            équipements de motoculture et de motos de haute qualité, soigneusement sélectionnés auprès de marques
            réputées pour leur fiabilité et leur performance. Nous savons que la qualité du matériel est essentielle
            pour garantir une expérience optimale et une utilisation à long terme. C’est pourquoi nous choisissons des
            produits conçus pour répondre aux besoins des particuliers comme des professionnels, en tenant compte des
            dernières innovations et des standards les plus élevés en matière de technologie et de sécurité.

            Que ce soit pour entretenir votre jardin, travailler vos espaces verts ou profiter de vos motos, nous vous
            offrons des solutions fiables et durables, adaptées à chaque type de projet. Notre équipe vous guide dans le
            choix de l’équipement le mieux adapté à vos besoins, en tenant compte de vos critères spécifiques comme la
            puissance, la maniabilité, et bien sûr, votre budget.

            Nous sommes convaincus qu’un matériel de qualité est la clé de la satisfaction de nos clients. C’est
            pourquoi, au-delà de la vente, nous vous accompagnons tout au long de l’utilisation de vos équipements, avec
            des conseils d’entretien pour prolonger leur durée de vie et optimiser leur performance. En choisissant [Nom
            de l’entreprise], vous optez pour des produits robustes et un service de proximité, afin de vous assurer une
            entière satisfaction.</p>

        <section class="parallax-2">
            <div class="parallax-inner">
                <h1 class="titre-parallax">Ventes</h1>
            </div>
        </section>

    </section>

    <section>
        <h1 class="titre-propos">Le service de réparation</h1>
        <p class="text-propos ">Nous savons que la réparation rapide et de qualité de vos
            équipements est essentielle pour maintenir leur performance et prolonger leur durée de vie. C'est pourquoi
            nous mettons un point d'honneur à offrir un service de réparation soigné et professionnel, adapté aux
            besoins spécifiques de chaque client. Que ce soit pour du matériel de motoculture ou des motos, nous
            diagnostiquons avec précision les problèmes, et nous nous engageons à apporter les solutions les plus
            efficaces.

            Notre équipe qualifiée prend le temps de réparer vos équipements dans les plus brefs délais, tout en
            garantissant un travail soigné, effectué avec des pièces de qualité. Nous comprenons l’importance de
            minimiser les temps d'immobilisation, surtout pour les professionnels qui dépendent de leurs outils au
            quotidien, et c'est pourquoi nous mettons tout en œuvre pour intervenir rapidement.

            En outre, nous proposons des solutions flexibles de règlement afin de faciliter l’accès à nos services de
            réparation. Nous savons que chaque situation est unique, c'est pourquoi nous restons à l’écoute de vos
            besoins, en vous offrant des options de paiement adaptées à votre budget. En choisissant [Nom de
            l’entreprise], vous avez la garantie d’un service de réparation fiable, rapide et sur-mesure, pour que vous
            puissiez reprendre vos activités en toute sérénité.</p>
    </section>

    <div class="wrapper">
        <div class="slider">
            <div class="slide-track">

                <div class="slide">
                    <img class="img-marque" src="../img/beta-logo.png" alt="img">
                </div>

                <div class="slide">
                    <img class="img-marque" src="../img/echo.png" alt="img">
                </div>

                <div class="slide">
                    <img class="img-marque" src="../img/stiga.png" alt="img">
                </div>

                <div class="slide">
                    <img class="img-marque" src="../img/iseki.png" alt="img">
                </div>

                <div class="slide">
                    <img class="img-marque" src="../img/igol.png" alt="img">
                </div>

                <div class="slide">
                    <img class="img-marque" src="../img/peugeot.png" alt="img">
                </div>

                <div class="slide">
                    <img class="img-marque" src="../img/ktm-logo.png" alt="img">
                </div>

                <div class="slide">
                    <img class="img-marque" src="../img/solo.png" alt="img">
                </div>

                <div class="slide">
                    <img class="img-marque" src="../img/beal.png" alt="img">
                </div>

                <div class="slide">
                    <img class="img-marque" src="../img/beta-logo.png" alt="img">
                </div>

                <div class="slide">
                    <img class="img-marque" src="../img/echo.png" alt="img">
                </div>

                <div class="slide">
                    <img class="img-marque" src="../img/stiga.png" alt="img">
                </div>

                <div class="slide">
                    <img class="img-marque" src="../img/iseki.png" alt="img">
                </div>

                <div class="slide">
                    <img class="img-marque" src="../img/igol.png" alt="img">
                </div>

                <div class="slide">
                    <img class="img-marque" src="../img/peugeot.png" alt="img">
                </div>

                <div class="slide">
                    <img class="img-marque" src="../img/ktm-logo.png" alt="img">
                </div>

                <div class="slide">
                    <img class="img-marque" src="../img/solo.png" alt="img">
                </div>

                <div class="slide">
                    <img class="img-marque" src="../img/beal.png" alt="img">
                </div>

            </div>
        </div>
    </div>

    <section id="newsletter-section">
        <div class="conteneur-formulaire">
            <div class="formulaire-news">
                <form class="newsletter" action="" method="POST">
                    <h2 class="titre-2-news">Inscrivez-vous à notre Newsletter</h2>
                    <p class="text-news">Recevez les dernières nouvelles et mises à jour directement dans votre
                        boîte
                        mail !</p>
                    <input type="text" id="prenom" name="prenom_newsletter" placeholder="Prénom" required>
                    <input type="email" id="news" name="email_newsletter" placeholder="Mon adresse mail" required>
                    <button class="bouton-news">Envoyer</button>
                </form>
            </div>
        </div>
    </section><br>

    <section id="paragraphe-3-section">
        <div class="container-section-3">
            <h1 class="titre-propos">La relation avec les clients</h1>
            <h2 class="sub-title">Une équipe compétente</h2>
            <p class="text-bas">Notre ouvrier qualifié joue un rôle essentiel dans la satisfaction de nos clients. Grâce
                à son expertise, nous pouvons assurer des réparations et entretiens de qualité, garantissant ainsi des
                équipements toujours performants.</p>

            <div class="img-container">
                <img class="img-container-text" src="../img/4.jpg" alt="Image">
            </div>

            <p class="text-bas">Nous plaçons la satisfaction client au cœur de notre démarche. En étant à l’écoute de
                leurs besoins et en offrant un service personnalisé, nous établissons des relations de confiance
                durables et solides avec chacun d’entre eux.</p>
        </div>
    </section>

    <?php include_once("./include/footer.php"); ?>

</body>

</html>