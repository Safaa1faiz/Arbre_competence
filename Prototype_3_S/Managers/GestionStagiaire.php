<?php

if (file_exists('./Entities/Stagiaire.php')) {
    include './Entities/Stagiaire.php';
} elseif (file_exists('../Entities/Stagiaire.php')) {
    include '../Entities/Stagiaire.php';
} else {
    // Neither file exists, so handle the error here
    echo "Error: Stagiaire.php not found in either directory.";
}

class GestionStagiaire
{

    private $pdo;

    public function __construct()
    {
        $this->pdo = new PDO('mysql:host=localhost;dbname=arbre_competence', 'root', 'admin');
    }

    public function AfficherTous()
    {
        $sql = 'SELECT p.Id, p.Nom as personne_nom, p.CNE, v.Nom as ville_nom
            FROM personne p
            LEFT JOIN ville v ON p.Ville_Id = v.Id';
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute();

        $stagiaires = [];
        foreach ($stmt->fetchAll(PDO::FETCH_ASSOC) as $stagiaire_data) {
            $stagiaire = new Stagiaire();
            $stagiaire->setId($stagiaire_data['Id']);
            $stagiaire->setNom($stagiaire_data['personne_nom']);
            $stagiaire->setCne($stagiaire_data['CNE']);
            $stagiaire->setVille($stagiaire_data['ville_nom']);

            $stagiaires[] = $stagiaire;
        }

        return $stagiaires;
    }

    public function SupprimerStagiaire($Id)
    {
        $sql = 'DELETE FROM personne WHERE Id = :Id';
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindValue(':Id', $Id);
        $stmt->execute();
    }

    public function ModifierStagiaire($Id, $Nom, $CNE)
    {
        $sql = 'UPDATE personne SET Nom = :Nom, CNE = :CNE WHERE Id = :Id';
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindValue(':Id', $Id);
        $stmt->bindValue(':Nom', $Nom);
        $stmt->bindValue(':CNE', $CNE);
        $stmt->execute();
    }
    public function AjouterStagiaire($Nom, $CNE, $Ville_Id)
    {
        $sql = 'INSERT INTO personne (Nom, CNE,Ville_Id) VALUES (:Nom, :CNE, :Ville_Id)';
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindValue(':Nom', $Nom);
        $stmt->bindValue(':CNE', $CNE);
        $stmt->bindValue(':Ville_Id', $Ville_Id);
        $stmt->execute();

        return $this->pdo->lastInsertId();
    }
    public function GetStagiaireById($Id)
    {
      $sql = "SELECT * FROM personne WHERE Id = :Id";
      $stmt = $this->pdo->prepare($sql);
      $stmt->bindValue(':Id', $Id);
      $stmt->execute();
    
      $stagiaire = null;
      if ($stmt->rowCount() > 0) {
        $stagiaire_data = $stmt->fetch(PDO::FETCH_ASSOC);
    
        $stagiaire = new Stagiaire();
        $stagiaire->setId($stagiaire_data['Id']);
        $stagiaire->setNom($stagiaire_data['nom']);
        $stagiaire->setCne($stagiaire_data['cne']);
      }
    
      return $stagiaire;
    }
    public function getCities()
    {
        $cities = [];
        $query = $this->pdo->query("SELECT * FROM ville");

     while ($cityData = $query->fetch(PDO::FETCH_ASSOC)) {
        $cities[] = ['id' => $cityData['Id'], 'name' => $cityData['Nom']];
    }

        return $cities;
    }
    
}

?>
