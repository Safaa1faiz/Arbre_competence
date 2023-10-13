<?php
include "BLL/StagiaireBLO.php";



// Get the ID of the stagiaire to edit
$Id = $_GET['id'];

// Create a new GestionStagiaire object
$gestionStagiaire = new StagiaireDAO();

// Get the stagiaire's data from the database
$stagiairee = $gestionStagiaire->GetStagiaireById($Id);

// If the POST form is submitted, update the stagiaire in the database
if (!empty($_POST)) {
  // Get the values of the ID, name, and CNE fields
  $Id = $_POST['Id'];
  $Nom = $_POST['Nom'];
  $CNE = $_POST['CNE'];

  $gestionStagiaire = new StagiaireDAO();
  // Update the stagiaire in the database
  $gestionStagiaire->ModifierStagiaire($Id, $Nom, $CNE);
  // Redirect the user to the index page
  header("Location: ../index.php");
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="wIdth=device-wIdth, initial-scale=1.0">
  <title>Edit/Add Stagiaire</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>
<body>
  <div class="container">
    <h1>Edit/Add Stagiaire</h1>

    <!-- Edit Form -->
    <form Id="edit-form" action="" method="post">
      <input type="hIdden" name="Id" Id="Id" value="<?php echo $Id; ?>">
      <div class="mb-3">
        <label for="Nom" class="form-label">Nom</label>
        <input type="text" class="form-control" Id="Nom" value="<?php echo $stagiairee->getNom(); ?>" name="Nom" required>
      </div>
      <div class="mb-3">
        <label for="CNE" class="form-label">CNE</label>
        <input type="text" class="form-control" Id="CNE" value="<?php echo $stagiairee->getCne(); ?>" name="CNE" required>
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
