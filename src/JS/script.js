// JS pour gérer la description selon les catégories

document.addEventListener("DOMContentLoaded", function () {
  function hideIfEmpty(id, value) {
    const element = document.getElementById(id);
    if (!value || value.trim() === "") {
      element.style.display = "none";
    }
  }

  const marque = "<?= htmlspecialchars($item['marque']); ?>";
  const prix = "<?= htmlspecialchars($item['prix']); ?>";
  const couleur = "<?= htmlspecialchars($item['couleur']); ?>";
  const message = "<?= htmlspecialchars($item['message']); ?>";
  const type_moteur = "<?= htmlspecialchars($item['type_moteur']); ?>";
  const capacite_batterie =
    "<?= htmlspecialchars($item['capacite_batterie']); ?>";
  const type_temps = "<?= htmlspecialchars($item['type_temps']); ?>";
  const type_carburant = "<?= htmlspecialchars($item['type_carburant']); ?>";
  const tension = "<?= htmlspecialchars($item['tension']); ?>";
  const largeur_coupe = "<?= htmlspecialchars($item['largeur_coupe']); ?>";
  const type_fil = "<?= htmlspecialchars($item['type_fil']); ?>";
  const type_lame = "<?= htmlspecialchars($item['type_lame']); ?>";
  const longueur_lame = "<?= htmlspecialchars($item['longueur_lame']); ?>";
  const vitesse_coupe = "<?= htmlspecialchars($item['vitesse_coupe']); ?>";
  const poids = "<?= htmlspecialchars($item['poids']); ?>";
  const poignee = "<?= htmlspecialchars($item['poignee']); ?>";
  const vibrations = "<?= htmlspecialchars($item['vibrations']); ?>";
  const sangle = "<?= htmlspecialchars($item['sangle']); ?>";
  const type_coupe = "<?= htmlspecialchars($item['type_coupe']); ?>";
  const sonore = "<?= htmlspecialchars($item['sonore']); ?>";
  const systeme = "<?= htmlspecialchars($item['systeme']); ?>";
  const securite = "<?= htmlspecialchars($item['securite']); ?>";
  const dimension = "<?= htmlspecialchars($item['dimension']); ?>";
  const puissance = "<?= htmlspecialchars($item['puissance']); ?>";
  const capacite_reservoir =
    "<?= htmlspecialchars($item['capacite_reservoir']); ?>";
  const diametre = "<?= htmlspecialchars($item['diametre']); ?>";
  const vitesse_souffle = "<?= htmlspecialchars($item['vitesse_souffle']); ?>";
  const autonomie = "<?= htmlspecialchars($item['autonomie']); ?>";

  // Masquer les champs si les données sont vides
  hideIfEmpty("marque", marque);
  hideIfEmpty("prix", prix);
  hideIfEmpty("couleur", couleur);
  hideIfEmpty("message", message);
  hideIfEmpty("type_moteur", type_moteur);
  hideIfEmpty("capacite_batterie", capacite_batterie);
  hideIfEmpty("type_temps", type_temps);
  hideIfEmpty("type_carburant", type_carburant);
  hideIfEmpty("tension", tension);
  hideIfEmpty("largeur_coupe", largeur_coupe);
  hideIfEmpty("type_fil", type_fil);
  hideIfEmpty("type_lame", type_lame);
  hideIfEmpty("longueur_lame", longueur_lame);
  hideIfEmpty("vitesse_coupe", vitesse_coupe);
  hideIfEmpty("poids", poids);
  hideIfEmpty("poignee", poignee);
  hideIfEmpty("vibrations", vibrations);
  hideIfEmpty("sangle", sangle);
  hideIfEmpty("type_coupe", type_coupe);
  hideIfEmpty("sonore", sonore);
  hideIfEmpty("systeme", systeme);
  hideIfEmpty("securite", securite);
  hideIfEmpty("dimension", dimension);
  hideIfEmpty("puissance", puissance);
  hideIfEmpty("capacite_reservoir", capacite_reservoir);
  hideIfEmpty("diametre", diametre);
  hideIfEmpty("vitesse_souffle", vitesse_souffle);
  hideIfEmpty("autonomie", autonomie);
});

// JS pour l'animation jour / nuit

const switchThemeBtn = document.querySelector(".img-jour-nuit");
let toggleTheme;

// Vérifie si un thème est enregistré dans LocalStorage, sinon par défaut au mode jour
if (localStorage.getItem("theme") === "dark") {
  toggleTheme = 1;
} else {
  toggleTheme = 0;
}

// Fonction pour appliquer le thème
function applyTheme() {
  if (toggleTheme === 1) {
    // Mode nuit
    document.documentElement.style.setProperty("--primary-text-color", "white");
    document.documentElement.style.setProperty(
      "--secondary-text-color",
      "black"
    );
    document.documentElement.style.setProperty(
      "--background-color-main",
      "#262626"
    );
    document.documentElement.style.setProperty(
      "--background-color-secondary",
      "black"
    );
    document.documentElement.style.setProperty(
      "--background-color-tertiary",
      "#1a1a1a"
    );
    document.documentElement.style.setProperty(
      "--primary-border-solid",
      "black"
    );
    localStorage.setItem("theme", "dark");
  } else {
    // Mode jour
    document.documentElement.style.setProperty("--primary-text-color", "black");
    document.documentElement.style.setProperty(
      "--secondary-text-color",
      "white"
    );
    document.documentElement.style.setProperty(
      "--background-color-main",
      "white"
    );
    document.documentElement.style.setProperty(
      "--background-color-secondary",
      "#262626"
    );
    document.documentElement.style.setProperty(
      "--background-color-tertiary",
      "black"
    );
    document.documentElement.style.setProperty(
      "--secondary-border-solid",
      "white"
    );
    localStorage.setItem("theme", "light");
  }
}

// Applique le thème dès le chargement de la page
applyTheme();

// Changement de thème lors du clic sur le bouton
switchThemeBtn.addEventListener("click", () => {
  toggleTheme = toggleTheme === 0 ? 1 : 0;
  applyTheme();
});

//  JS pour le menu burger

const burgerMenuButton = document.querySelector(".menu-burger img");
const burgerMenu = document.querySelector(".menu-burger");
const navbar = document.querySelector(".navbar");

// Ajouter un événement de clic sur le bouton du menu burger
burgerMenuButton.onclick = function () {
  // console.log("Bouton du menu burger cliqué.");

  // Basculer la classe 'open' sur le menu burger
  burgerMenu.classList.toggle("open");
  // console.log("Classe 'open' du menu burger :", burgerMenu.classList.contains("open"));

  // Basculer la classe 'open' sur la barre de navigation
  navbar.classList.toggle("open");
  // console.log("Classe 'open' de la navbar :", navbar.classList.contains("open"));
};
