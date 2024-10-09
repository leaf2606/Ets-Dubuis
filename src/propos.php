<?php

session_start();

require_once("connect.php");

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
    <title>A propos</title>
</head>

<body>

    <?php include_once("./include/navbar.php"); ?>

    <section id="header-section">

        <header>
            <figure class="figure-container">
                <img class="img-propos" src="../img/header-1.png" alt="img-header">
                <!-- <div class="animated-text">
                    <h1 class="titre-animated">Entreprise de &ensp;<span class="auto-typing"></span></h1><br><br>
                    <a href="#paragraphe-1-section">
                        <img class="fleche-bas" src="../img/fleche-bas.png" alt="img-fleche-bas">
                    </a>
                </div> -->
            </figure>
        </header>

    </section>

    <section id="paragraphe-1-section">

        <h1 class="titre-propos">Informations sur l'entreprise</h1>

        <p class="text-propos">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Earum quibusdam, eum natus
            nesciunt
            ab, vero quia
            repellendus ratione perferendis sed in eius voluptatum quam excepturi quod numquam, animi nostrum mollitia?
            Soluta, veritatis. Ea officia iusto, et exercitationem eos quo tempora iure saepe praesentium aperiam vel
            assumenda provident harum perferendis distinctio deserunt voluptate? Distinctio beatae magnam perspiciatis
            harum
            minima amet officia!
            Delectus voluptatum id quaerat, voluptatibus eaque quisquam autem consequatur iure molestias hic,
            repudiandae
            odio ab totam. Tempore officia nam eveniet voluptate quis asperiores, aliquid dolore, quas tenetur facilis
            temporibus fugiat.
            Labore corrupti non quod illum voluptatem, culpa ab perferendis rerum. Ullam, praesentium possimus. Eligendi
            ea
            aperiam quidem corporis dolore, animi tenetur similique ab perferendis neque iusto, id libero culpa officia?
            Quo ex eum ipsum! Illo deleniti voluptatibus iusto, iure alias placeat fugit praesentium voluptas, veritatis
            nobis reprehenderit itaque sed, consequuntur odit totam sit voluptates accusamus pariatur qui asperiores
            tempora
            quaerat?</p>

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

        <h1 class="titre-propos">Autre infos sur l'entreprise</h1>


        <p class="text-propos">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Earum quibusdam, eum natus
            nesciunt
            ab, vero quia
            repellendus ratione perferendis sed in eius voluptatum quam excepturi quod numquam, animi nostrum mollitia?
            Soluta, veritatis. Ea officia iusto, et exercitationem eos quo tempora iure saepe praesentium aperiam vel
            assumenda provident harum perferendis distinctio deserunt voluptate? Distinctio beatae magnam perspiciatis
            harum
            minima amet officia!
            Delectus voluptatum id quaerat, voluptatibus eaque quisquam autem consequatur iure molestias hic,
            repudiandae
            odio ab totam. Tempore officia nam eveniet voluptate quis asperiores, aliquid dolore, quas tenetur facilis
            temporibus fugiat.
            Labore corrupti non quod illum voluptatem, culpa ab perferendis rerum. Ullam, praesentium possimus. Eligendi
            ea
            aperiam quidem corporis dolore, animi tenetur similique ab perferendis neque iusto, id libero culpa officia?
            Quo ex eum ipsum! Illo deleniti voluptatibus iusto, iure alias placeat fugit praesentium voluptas, veritatis
            nobis reprehenderit itaque sed, consequuntur odit totam sit voluptates accusamus pariatur qui asperiores
            tempora
            quaerat?Delectus voluptatum id quaerat, voluptatibus eaque quisquam autem consequatur iure molestias hic,
            repudiandae
            odio ab totam. Tempore officia nam eveniet voluptate quis asperiores, aliquid dolore, quas tenetur facilis
            temporibus fugiat.
            Labore corrupti non quod illum voluptatem, culpa ab perferendis rerum. Ullam, praesentium possimus. Eligendi
            ea
            aperiam quidem corporis dolore, animi tenetur similique ab perferendis neque iusto, id libero culpa officia?
            Quo ex eum ipsum! Illo deleniti voluptatibus iusto, iure alias placeat fugit praesentium voluptas, veritatis
            nobis reprehenderit itaque sed, consequuntur odit totam sit voluptates accusamus pariatur qui asperiores
            tempora
            quaerat?</p>

        <section class="parallax-2">
            <div class="parallax-inner">
                <h1 class="titre-parallax">Ventes</h1>
            </div>
        </section>

    </section>

    <section>
        <h1 class="titre-propos">Coucou la papaye</h1>
        <p class="text-propos ">Lorem ipsum dolor sit amet consectetur adipisicing elit. Deleniti exercitationem omnis
            architecto quam? Est,
            officiis expedita fuga assumenda non voluptas libero esse, deserunt autem, sint itaque quasi quod quos
            nobis.
            Doloremque saepe nihil veniam consequuntur modi quibusdam inventore suscipit sequi laudantium incidunt vitae
            totam eveniet minus obcaecati, architecto fugit temporibus explicabo, nisi doloribus aut voluptatum aliquid
            enim similique. Error, officiis.</p>
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
            <div class="formulaire-gauche">
                <form class="newsletter" action="/api/newsAdd" method="POST">
                    <h2 class="titre-2-news">Inscrivez-vous à notre Newsletter</h2>
                    <p class="text-news">Recevez les dernières nouvelles et mises à jour directement dans votre
                        boîte
                        mail !</p>
                    <input type="email" id="news" name="email" placeholder="Mon adresse mail" required>
                    <button class="bouton-news">Envoyer</button>
                </form>
            </div>
        </div>
    </section><br>

    <section id="paragraphe-3-section">

        <h1 class="titre-propos">Autre infos sur l'entreprise</h1>

        <h2 class="titre-propos">Bonsoir, Paris</h2>

        <div class="container-propos">
            <div class="left-column">
                <p class="text-bas">Lorem ipsum dolor sit amet consectetur adipisicing elit. Sint soluta doloribus,
                    repellat
                    enim ipsum vitae odit voluptate, quo quia minima saepe numquam facere possimus et labore minus
                    cumque
                    deleniti debitis.</p>
                <p class="text-bas">Lorem ipsum dolor sit amet consectetur adipisicing elit. Sint soluta doloribus,
                    repellat
                    enim ipsum vitae odit voluptate, quo quia minima saepe numquam facere possimus et labore minus
                    cumque
                    deleniti debitis.</p>
                <p class="text-bas">Lorem ipsum dolor sit amet consectetur adipisicing elit. Sint soluta doloribus,
                    repellat
                    enim ipsum vitae odit voluptate, quo quia minima saepe numquam facere possimus et labore minus
                    cumque
                    deleniti debitis.</p>
            </div>

            <div class="img-container">
                <img class="img-container-text" src="../img/4.jpg" alt="img">
            </div>

            <div class="right-column">
                <p class="text-bas">Lorem ipsum dolor sit amet consectetur adipisicing elit. Sint soluta doloribus,
                    repellat
                    enim ipsum vitae odit voluptate, quo quia minima saepe numquam facere possimus et labore minus
                    cumque
                    deleniti debitis.</p>
                <p class="text-bas">Lorem ipsum dolor sit amet consectetur adipisicing elit. Sint soluta doloribus,
                    repellat
                    enim ipsum vitae odit voluptate, quo quia minima saepe numquam facere possimus et labore minus
                    cumque
                    deleniti debitis.</p>
                <p class="text-bas">Lorem ipsum dolor sit amet consectetur adipisicing elit. Sint soluta doloribus,
                    repellat
                    enim ipsum vitae odit voluptate, quo quia minima saepe numquam facere possimus et labore minus
                    cumque
                    deleniti debitis.</p>
            </div>
        </div>

    </section>

    <!-- JS pour l'animation du titre sur le header  -->

    <script src="https://unpkg.com/typed.js@2.1.0/dist/typed.umd.js"></script>

    <script>
    let typed = new Typed('.auto-typing', {
        strings: ['Ets Dubuis', 'Motos', 'Réparation', 'Rendez-vous'],
        typeSpeed: 100,
        backSpeed: 100,
        startDelay: 300,
        backDelay: 1000,
        loop: true,
        showCursor: true,
        cursorChar: '|',
        autoInsertCss: true,
        showCursor: false
    });
    </script>

    <?php include_once("./include/footer.php"); ?>

</body>

</html>