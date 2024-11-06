// JS pour gérer la description selon les catégories

document.addEventListener("DOMContentLoaded", function () {
  function hideIfEmpty(id, value) {
    const element = document.getElementById(id);
    if (!value || value.trim() === "") {
      element.style.display = "none";
    }
  }

  const ref = "<?= htmlspecialchars($item['ref']); ?>";
  const marque = "<?= htmlspecialchars($item['marque']); ?>";
  const prix = "<?= htmlspecialchars($item['prix']); ?>";
  const couleur = "<?= htmlspecialchars($item['couleur']); ?>";
  const message = "<?= htmlspecialchars($item['message']); ?>";
  const largeur_coupe = "<?= htmlspecialchars($item['largeur_coupe']); ?>";
  const moteur = "<?= htmlspecialchars($item['moteur']); ?>";
  const capacite_bac = "<?= htmlspecialchars($item['capacite_bac']); ?>";
  const coupe = "<?= htmlspecialchars($item['coupe']); ?>";
  const roue = "<?= htmlspecialchars($item['roue']); ?>";
  const divers = "<?= htmlspecialchars($item['divers']); ?>";
  const transmission = "<?= htmlspecialchars($item['transmission']); ?>";
  const cylindre = "<?= htmlspecialchars($item['cylindre']); ?>";
  const carburant = "<?= htmlspecialchars($item['carburant']); ?>";
  const poids = "<?= htmlspecialchars($item['poids']); ?>";
  const puissance = "<?= htmlspecialchars($item['puissance']); ?>";

  // Masquer les champs si les données sont vides
  hideIfEmpty("ref", ref);
  hideIfEmpty("marque", marque);
  hideIfEmpty("prix", prix);
  hideIfEmpty("couleur", couleur);
  hideIfEmpty("message", message);
  hideIfEmpty("largeur_coupe", largeur_coupe);
  hideIfEmpty("moteur", moteur);
  hideIfEmpty("capacite_bac", capacite_bac);
  hideIfEmpty("coupe", coupe);
  hideIfEmpty("roue", roue);
  hideIfEmpty("divers", divers);
  hideIfEmpty("transmission", transmission);
  hideIfEmpty("cylindre", cylindre);
  hideIfEmpty("carburant", carburant);
  hideIfEmpty("poids", poids);
  hideIfEmpty("puissance", puissance);
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
