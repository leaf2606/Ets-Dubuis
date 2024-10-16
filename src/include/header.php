<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/header.css">
    <title>Header</title>
</head>

<body>

    <!-- Le header ici est uniquement pour la page index -->

    <header>

        <section id="home">
            <img class="img-header active" src="../img/header-1.png" alt="header">
            <img class="img-header" src="../img/8.jpg" alt="header">
            <img class="img-header" src="../img/header-1.png" alt="header">
            <img class="img-header" src="../img/12.jpg" alt="header">
            <img class="img-header" src="../img/13.jpg" alt="header">
            <div class="content active">
                <div class="titre-div-header">
                    <h1 class="titre-header">Bonjour,<span class="span-titre">Coucou</span></h1>
                </div>
                <p class="text-header">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Molestiae eligendi
                    molestias voluptatem
                    cupiditate doloremque, id recusandae fuga ipsa sint architecto rerum! Voluptatem consequuntur, ea
                    blanditiis maiores at quidem asperiores optio!
                    Iure aspernatur perspiciatis placeat! Consequatur magni repudiandae facere voluptatem nobis repellat
                    soluta, omnis quasi. Esse cum, eos, eius ex expedita maxime, quasi ipsum quam doloribus accusamus
                    libero
                    nemo dolorum quia.</p>
                <a href="../propos.php#paragraphe-1-section" class="button-lien">A propos</a>
            </div>
            <div class="content">
                <h1 class="titre-header">Hello,<span class="span-titre">Coucou</span></h1>
                <p class="text-header">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Molestiae eligendi
                    molestias voluptatem
                    cupiditate doloremque, id recusandae fuga ipsa sint architecto rerum! Voluptatem consequuntur, ea
                    blanditiis maiores at quidem asperiores optio!
                    Iure aspernatur perspiciatis placeat! Consequatur magni repudiandae facere voluptatem nobis repellat
                    soluta, omnis quasi. Esse cum, eos, eius ex expedita maxime, quasi ipsum quam doloribus accusamus
                    libero
                    nemo dolorum quia.</p>
                <a href="../propos.php#parallax-1" class="button-lien">Bonsoir</a>
            </div>
            <div class="content">
                <h1 class="titre-header">Hi,<span class="span-titre">Coucou</span></h1>
                <p class="text-header">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Molestiae eligendi
                    molestias voluptatem
                    cupiditate doloremque, id recusandae fuga ipsa sint architecto rerum! Voluptatem consequuntur, ea
                    blanditiis maiores at quidem asperiores optio!
                    Iure aspernatur perspiciatis placeat! Consequatur magni repudiandae facere voluptatem nobis repellat
                    soluta, omnis quasi. Esse cum, eos, eius ex expedita maxime, quasi ipsum quam doloribus accusamus
                    libero
                    nemo dolorum quia.</p>
                <a href="../propos.php#paragraphe-2-section" class="button-lien">Bonsoir</a>
            </div>
            <div class="content">
                <h1 class="titre-header">Salut,<span class="span-titre">Coucou</span></h1>
                <p class="text-header">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Molestiae eligendi
                    molestias voluptatem
                    cupiditate doloremque, id recusandae fuga ipsa sint architecto rerum! Voluptatem consequuntur, ea
                    blanditiis maiores at quidem asperiores optio!
                    Iure aspernatur perspiciatis placeat! Consequatur magni repudiandae facere voluptatem nobis repellat
                    soluta, omnis quasi. Esse cum, eos, eius ex expedita maxime, quasi ipsum quam doloribus accusamus
                    libero
                    nemo dolorum quia.</p>
                <a href="../propos.php#newsletter-section" class="button-lien">Bonsoir</a>
            </div>
            <div class="content">
                <h1 class="titre-header">Beunos,<span class="span-titre">Coucou</span></h1>
                <p class="text-header">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Molestiae eligendi
                    molestias voluptatem
                    cupiditate doloremque, id recusandae fuga ipsa sint architecto rerum! Voluptatem consequuntur, ea
                    blanditiis maiores at quidem asperiores optio!
                    Iure aspernatur perspiciatis placeat! Consequatur magni repudiandae facere voluptatem nobis repellat
                    soluta, omnis quasi. Esse cum, eos, eius ex expedita maxime, quasi ipsum quam doloribus accusamus
                    libero
                    nemo dolorum quia.</p>
                <a href="../propos.php#paragraphe-3-section" class="button-lien">Bonsoir</a>
            </div>
            <div class="media-icons">
                <a href="" class="lien-logo-header"><img class="img-logo" src="../img/insta.png" alt="instagram"></a>
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