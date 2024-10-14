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

  // Masquer les champs si les données sont vides
  hideIfEmpty("ref", ref);
  hideIfEmpty("marque", marque);
  hideIfEmpty("prix", prix);
  hideIfEmpty("couleur", couleur);
  hideIfEmpty("message", message);
});
