<?php
include "../Managers/GestionStagiaire.php";
if (file_exists('./Entities/Stagiaire.php')) {
  include './Entities/Stagiaire.php';
} elseif (file_exists('../Entities/Stagiaire.php')) {
  
} else {
  // Neither file exists, so handle the error here
  echo "Error: Stagiaire.php not found in either directory.";
}

// Trouver tous les employés depuis la base de données 
$gestionStagiaire = new GestionStagiaire();

if (!empty($_POST)) {
    $stagiaire = new   Stagiaire();
    $stagiaire->SetNom($_POST['nom']);
    $stagiaire->setCne($_POST['cne']);
    $gestionStagiaire->AjouterStagiaire($stagiaire->getNom(), $stagiaire->getCne());

	// Redirection vers la page index.php
	header("Location: ../index.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Ajouter Stagiaire</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>
<body>
  <div class="container p-3 mt-2">
    <!-- Add Form -->
    <div class="card-header">
    <h1 class="text-center">Modifier où Ajouter un stagiaire</h1>
    <form id="add-form" action="" method="post">
      <div class="mb-3">
        <label for="nom" class="form-label">Nom et prénom</label>
        <input type="text" placeholder="Nom et prénom" class="form-control" id="nom" name="nom" required>
      </div>
      <div class="mb-3">
        <label for="cne" class="form-label">CNE</label>
        <input type="text" class="form-control" placeholder="CNE" id="cne" name="cne" required>
      </div>
      <div class="mb-3 text-center gap-3">
      <button type="submit" class="btn btn-primary">Valider</button>
        <a  class="btn btn-secondary" href = "../index.php">Annuler</a>
      </div>
    </form>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>
