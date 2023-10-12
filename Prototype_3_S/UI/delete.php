
<?php 
include "../Managers/GestionStagiaire.php";
if (file_exists('./Entities/Stagiaire.php')) {
  include './Entities/Stagiaire.php';
} elseif (file_exists('../Entities/Stagiaire.php')) {
  
} else {
  // Neither file exists, so handle the error here
  echo "Error: Stagiaire.php not found in either directory.";
}
if (isset($_GET['id'])) {
 // Trouver tous les employés depuis la base de données 
$gestionStagiaire = new GestionStagiaire();
$id = $_GET['id'] ;
$gestionStagiaire-> SupprimerStagiaire($id) ;
header('Location: ../index.php')    ;
}



?>