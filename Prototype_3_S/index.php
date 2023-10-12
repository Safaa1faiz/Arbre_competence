<?php

include "./Managers/GestionStagiaire.php";

// Trouver tous les employés depuis la base de données
$gestionStagiaire = new GestionStagiaire();
$stagiaires = $gestionStagiaire->AfficherTous();

?>

<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <title>Gestion des stagiaires</title>
</head>
<body>
  <div class="table-responsive">
<div class="d-grid gap-2 col-6 mx-auto ">
              <a href="./UI/add.php" class="btn btn-outline-success">Ajouter</a>
</div>
<div class="container">
    <table class="table table-dark table-hover text-center">
      <thead>
        <tr>
          <th>Nom et Prénom</th>
          <th>CNE</th>
          <th>Ville</th>
          <th>Actions</th>
        </tr>
      </thead>
      <tbody>
        <?php foreach($stagiaires as $stagiaire){ ?>
          <tr>
            <td><?= $stagiaire->getNom() ?></td>
            <td><?= $stagiaire->getCne() ?></td>
            <td><?= $stagiaire->getVille() ?></td>
            <td>
              <a href="./UI/delete.php?id=<?php echo $stagiaire->getId(); ?>" class="btn btn-danger">Supprimer</a>
              <a href="./UI/edit_stagiaire.php?id=<?php echo $stagiaire->getId(); ?>" class="btn btn-primary">Modifier</a>
            </td>
          </tr>
        <?php } ?>
      </tbody>
    </table>
<?php
try {
  // Create a PDO connection
  $pdo = new PDO("mysql:host=localhost;dbname=arbre_competence", 'root', 'admin');
  $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

  // Define the SQL query to fetch city population data
  $query = "SELECT v.Nom as city, COUNT(p.Id) as population
            FROM ville v
            INNER JOIN personne p ON v.Id = p.Ville_Id
            GROUP BY v.Nom";

  // Prepare and execute the SQL query
  $stmt = $pdo->prepare($query);
  $stmt->execute();

  // Fetch the result as an associative array
  $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

  // Display the results
  foreach ($result as $row) {
    echo "City: " . $row['city'] . ", Population: " . $row['population'] . "<br>";
  }

} catch (PDOException $e) {
  echo "Connection failed: " . $e->getMessage();
}

// If you need to store the data in separate arrays, you can do so like this:
$cities = [];
$population = [];

foreach ($result as $data) {
  $cities[] = $data['city'];
  $population[] = $data['population'];
}
?>
</div>
  </div>
<div class="container">
<div style="width: 800px;">
  <canvas id="myChart"></canvas>
</div>
</div>
<script>
  const labels = <?php echo json_encode($cities) ?>;
  const data = {
    labels: labels,
    datasets: [{
      label: 'City Population',
      data: <?php echo json_encode($population) ?>,
      backgroundColor: '#9AC8EB',
      borderColor: 'rgb(75, 192, 192)',
      borderWidth: 1
    }]
  };

  const config = {
    type: 'bar',
    data: data,
    options: {
      scales: {
        y: {
          beginAtZero: true
        }
      }
    }
  };

  // Make sure Chart.js is loaded before creating the chart
  document.addEventListener('DOMContentLoaded', function () {
    var myChart = new Chart(
      document.getElementById('myChart'),
      config
    );
  });
</script>
  </div>
<script src="https://cdn.jsdelivr.net/npm/chart.js@3.9.1/dist/chart.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

</body>
</html>
