
<?php 
include "DAL/StagiaireDAO.php";

if (isset($_GET['Id'])) {
 // Trouver tous les employés depuis la base de données 
$gestionStagiaire = new StagiaireDAO();
$Id = $_GET['Id'] ;
$gestionStagiaire-> SupprimerStagiaire($Id);
header('Location: ../index.php')    ;
}



?>