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
