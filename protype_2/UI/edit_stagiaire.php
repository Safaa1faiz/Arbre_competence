<?php
include "../Managers/GestionStagiaire.php";

if (file_exists('./Entities/Stagiaire.php')) {
  include './Entities/Stagiaire.php';
} elseif (file_exists('../Entities/Stagiaire.php')) {
  
} else {
  // Neither file exists, so handle the error here
  echo "Error: Stagiaire.php not found in either directory.";
}

// Get the ID of the stagiaire to edit
$id = $_GET['id'];

// Create a new GestionStagiaire object
$gestionStagiaire = new GestionStagiaire();

// Get the stagiaire's data from the database
$stagiairee = $gestionStagiaire->GetStagiaireById($id);

// If the POST form is submitted, update the stagiaire in the database
if (!empty($_POST)) {
  // Get the values of the ID, name, and CNE fields
  $id = $_POST['id'];
  $nom = $_POST['nom'];
  $cne = $_POST['cne'];

  $gestionStagiaire = new GestionStagiaire();
  // Update the stagiaire in the database
  $gestionStagiaire->ModifierStagiaire($id, $nom, $cne);
  // Redirect the user to the index page
  header("Location: ../index.php");
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Edit/Add Stagiaire</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>
<body>
  <div class="container">
    <h1>Edit/Add Stagiaire</h1>

    <!-- Edit Form -->
    <form id="edit-form" action="" method="post">
      <input type="hidden" name="id" id="id" value="<?php echo $id; ?>">
      <div class="mb-3">
        <label for="nom" class="form-label">Nom</label>
        <input type="text" class="form-control" id="nom" value="<?php echo $stagiairee->getNom(); ?>" name="nom" required>
      </div>
      <div class="mb-3">
        <label for="cne" class="form-label">CNE</label>
        <input type="text" class="form-control" id="cne" value="<?php echo $stagiairee->getCne(); ?>" name="cne" required>
      </div>
      <div class="mb-3 d-flex gap-3">
        <button type="submit" class="btn btn-primary">Submit</button>
        <a  class="btn btn-secondary" href = "../index.php">anuller</a>
      </div>
    </form>
    

  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>
