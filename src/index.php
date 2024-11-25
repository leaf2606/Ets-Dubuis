<?php

session_start();

require_once("connect.php");

?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/index.css">
    <link rel="stylesheet" href="css/font.css">
    <link rel="stylesheet" href="css/navbar.css">
    <link rel="stylesheet" href="css/header.css">
    <link rel="stylesheet" href="css/footer.css">
    <title>Accueil</title>
</head>

<body>

    <?php include_once("./include/navbar.php"); ?>

    <header>

        <section id="home">
            <img class="img-header active" src="../img/img-3.jpg" alt="header">
            <img class="img-header" src="../img/img-9.jpg" alt="header">
            <img class="img-header" src="../img/img-2.jpg" alt="header">
            <img class="img-header" src="../img/img-7.jpg" alt="header">
            <img class="img-header" src="../img/11.jpg" alt="header">
            <div class="content active">
                <h1 class="titre-header">Ets Dubuis</h1>
                <p class="text-header">Depuis le 2 avril 2001, nous mettons notre expertise et notre passion au service
                    de vos besoins en motoculture. Spécialisés dans la vente, la réparation et l’entretien de matériel
                    pour jardins et espaces verts, nous accompagnons particuliers et professionnels avec des solutions
                    adaptées à chaque projet. Forts de plus de 20 ans d’expérience, nous sommes fiers de proposer des
                    équipements de qualité et un service personnalisé pour entretenir vos espaces extérieurs en toute
                    sérénité. Faites confiance à une entreprise familiale et locale qui place votre satisfaction au cœur
                    de ses priorités.</p>
                <a href="../propos.php#paragraphe-1-section" class="button-lien">A propos</a>
            </div>
            <div class="content">
                <h1 class="titre-header">Mission principale</h1>
                <p class="text-header">Notre entreprise se consacre à la vente et au service après-vente de matériel de
                    motoculture et de motos.
                    Nous vous proposons des produits de qualité, accompagnés d’un service professionnel et personnalisé.
                    Que ce soit pour des conseils d’achat ou l’entretien de vos équipements, nous sommes à vos côtés.
                    Notre mission est de vous offrir des solutions fiables, adaptées à vos besoins.
                    Faites confiance à notre expertise pour un accompagnement complet et sur mesure.</p>
                <a href="../propos.php#parallax-1" class="button-lien">A propos</a>
            </div>
            <div class="content">
                <h1 class="titre-header">Evolution</h1>
                <p class="text-header">Notre entreprise a débuté avec une seule personne : le patron lui-même, animé par
                    la passion de la motoculture et des motos. Grâce à son engagement et à la confiance de nos clients,
                    l’entreprise a grandi et compte aujourd’hui une équipe de deux personnes, le patron et un ouvrier
                    qualifié. Ensemble, nous unissons nos forces pour vous offrir un service de qualité, aussi bien dans
                    la vente que dans le service après-vente de vos équipements. Une aventure humaine, bâtie sur le
                    savoir-faire et la proximité !</p>
                <a href="../propos.php#paragraphe-2-section" class="button-lien">A propos</a>
            </div>
            <div class="content">
                <h1 class="titre-header">Fidélité des clients</h1>
                <p class="text-header">Nous avons la chance de bénéficier d’une clientèle fidèle depuis nos débuts. Leur
                    confiance renouvelée au fil des années témoigne de la qualité de nos produits et de notre service.
                    Nous nous engageons à toujours satisfaire leurs attentes, et à entretenir des relations durables.
                </p>
                <a href="../propos.php#newsletter-section" class="button-lien">A propos</a>
            </div>
            <div class="content">
                <h1 class="titre-header">Partenaire</h1>
                <p class="text-header">Depuis 2001, nous travaillons avec des partenaires de qualité, qui nous
                    permettent de proposer des équipements performants et fiables. Ces partenariats, établis dès notre
                    création, sont essentiels pour offrir des solutions efficaces à nos clients.</p>
                <a href="../propos.php#paragraphe-3-section" class="button-lien">A propos</a>
            </div>
            <div class="media-icons">
                <a href="" class="lien-logo-header"><img class="img-logo" src="../img/linkedin.png" alt="linkedin"></a>
                <a href="" class="lien-logo-header"><img class="img-logo" src="../img/facebook.png" alt="facebook"></a>
            </div>
            <div class="slider-navigation">
                <div class="nav-button active"></div>
                <div class="nav-button"></div>
                <div class="nav-button"></div>
                <div class="nav-button"></div>
                <div class="nav-button"></div>
            </div>
        </section>

    </header>

    <!-- JS pour les slides  -->

    <script>
    const btns = document.querySelectorAll(".nav-button");
    const slides = document.querySelectorAll(".img-header");
    const contents = document.querySelectorAll(".content");

    var sliderNav = function(manual) {
        btns.forEach((btn) => {
            btn.classList.remove("active");
        });

        slides.forEach((slide) => {
            slide.classList.remove("active");
        });

        contents.forEach((content) => {
            content.classList.remove("active");
        });

        btns[manual].classList.add("active");
        slides[manual].classList.add("active");
        contents[manual].classList.add("active");
    }

    btns.forEach((btn, i) => {
        btn.addEventListener("click", () => {
            sliderNav(i);
        });
    });
    </script>

</body>

</html>