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
        $this->pdo = new PDO('mysql:host=localhost;dbname=arbre_competence', 'root', '');
    }

    public function AfficherTous()
    {
        $sql = 'SELECT id, nom, cne FROM personne';
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute();

        $stagiaires = [];
        foreach ($stmt->fetchAll(PDO::FETCH_ASSOC) as $stagiaire_data) {
            $stagiaire = new Stagiaire();
            $stagiaire->setId($stagiaire_data['id']);
            $stagiaire->setNom($stagiaire_data['nom']);
            $stagiaire->setCne($stagiaire_data['cne']);

            $stagiaires[] = $stagiaire;
        }

        return $stagiaires;
    }

    public function SupprimerStagiaire($id)
    {
        $sql = 'DELETE FROM personne WHERE id = :id';
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindValue(':id', $id);
        $stmt->execute();
    }

    public function ModifierStagiaire($id, $nom, $cne)
    {
        $sql = 'UPDATE personne SET nom = :nom, cne = :cne WHERE id = :id';
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindValue(':id', $id);
        $stmt->bindValue(':nom', $nom);
        $stmt->bindValue(':cne', $cne);
        $stmt->execute();
    }
    public function AjouterStagiaire($nom, $cne)
    {
        $sql = 'INSERT INTO personne (nom, cne) VALUES (:nom, :cne)';
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindValue(':nom', $nom);
        $stmt->bindValue(':cne', $cne);
        $stmt->execute();

        return $this->pdo->lastInsertId();
    }
    public function GetStagiaireById($id)
    {
      $sql = "SELECT * FROM personne WHERE id = :id";
      $stmt = $this->pdo->prepare($sql);
      $stmt->bindValue(':id', $id);
      $stmt->execute();
    
      $stagiaire = null;
      if ($stmt->rowCount() > 0) {
        $stagiaire_data = $stmt->fetch(PDO::FETCH_ASSOC);
    
        $stagiaire = new Stagiaire();
        $stagiaire->setId($stagiaire_data['id']);
        $stagiaire->setNom($stagiaire_data['nom']);
        $stagiaire->setCne($stagiaire_data['cne']);
      }
    
      return $stagiaire;
    }
}

?>
