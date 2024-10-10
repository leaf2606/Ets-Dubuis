<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://unpkg.com/leaflet/dist/leaflet.css" />
    <link rel="stylesheet" href="css/footer.css">
    <link rel="stylesheet" href="css/propos.css">
    <link rel="stylesheet" href="css/font.css">
    <title>Footer</title>
</head>

<body>

    <footer>

        <div class="container-footer">
            <h1 class="titre-footer">Ets Dubuis Entreprise de motoculture, motos et quads</h1>
            <p class="text-footer">Nos horaires &nbsp;:&nbsp; 08h30-12h / 14h-18h30 <br><br>
                Du Mardi au samedi
            </p>
            <p class="text-footer">Saint Benin d'Azy, &nbsp;&nbsp;22 Rue François Mitterand</p>
            <p class="text-footer"> 03 86 58 56 91</p>
        </div>

        <div id="footer-map"></div>

        <div class="container-mension">
            <a class="lien-mension" href="">Mension légale</a><br>
            <a class="lien-mension" href="">Mension légale</a><br>
            <a class="lien-mension" href="">Mension légale</a>
        </div>

        <!-- JS pour la map  -->

        <script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>

        <script>
        // Initialisation de la carte avec les bonnes coordonnées (latitude et longitude)
        var footerMap = L.map('footer-map').setView([47.00562552928349, 3.392275880007283],
        13); // Coordonnées exactes de votre entreprise

        // Ajout de la couche OpenStreetMap
        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            maxZoom: 18,
            attribution: '© OpenStreetMap'
        }).addTo(footerMap);

        // Ajout d'un marqueur sur l'emplacement exact de votre entreprise
        var companyMarker = L.marker([47.00562552928349, 3.392275880007283]).addTo(footerMap);
        companyMarker.bindPopup("<b>Ets Dubuis</b><br>22 Rue François Mitterand, Saint Benin d'Azy.<br>03 86 58 56 91");
        </script>

    </footer>

</body>

</html>