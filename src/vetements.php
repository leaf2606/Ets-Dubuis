<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/font.css">
    <link rel="stylesheet" href="css/vetements.css">
    <title>Vêtements</title>
</head>

<body>

    <?php include_once("./include/navbar.php"); ?>

    <div id="news-lien-id">
        <div class="lien-news">
            <button class="lien-nouveautes" onclick="openTab('envie')">Gants</button>
            <button class="lien-nouveautes" onclick="openTab('nouveautes')">Pantalons</button>
            <button class="lien-nouveautes" onclick="openTab('offert')">Veste</button>
            <button class="lien-nouveautes" onclick="openTab('promotions')">Casque</button>
            <button class="lien-nouveautes" onclick="openTab('promotions')">Blousons</button>
        </div>
    </div>

    <!-- Le script sert à accéder aux autres liens sur la même page et à activer ou cacher les sections -->
    <script>
    function openTab(tabId) {
        console.log('Tab clicked:', tabId);
        //    Cache toute les sections
        document.querySelectorAll('.content-section').forEach(function(tab) {
            tab.classList.remove('active');
        });

        //    Affiche la section cliqué
        document.getElementById(tabId).classList.add('active');
    }

    // Affiche le premier onglet chaque fois que la page et refresh ici c'eest 'envie'
    document.addEventListener('DOMContentLoaded', function() {
        openTab('envie');
    });
    </script>

    <?php include_once("./include/footer.php"); ?>

</body>

</html>