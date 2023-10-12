<?php

class Stagiaire{

    private $Id;
    private $Nom;
    private $CNE;
    private $Ville_Id;
    private $Ville_Nom;

   




    public function getId() {
        return $this->Id;
    }
    public function setId($ID) {
        $this->Id = $ID;
    }

    public function getNom() {
        return $this->Nom;
    }
    public function setNom($NOM) {
        $this->Nom = $NOM;
    }

    public function getCne() {
        return $this->CNE;
    }
    public function setCne($CNE) {
        $this->CNE = $CNE;
    }
 
    public function getVilleId() {
        return $this->Id;
    }
    public function setVilleId($Ville_Id) {
        $this->Id = $Ville_Id;
    }
    public function getVille() {
        return $this->Ville_Nom;
    }
    public function setVille($Ville_Nom) {
        $this->Ville_Nom = $Ville_Nom;
    }
 
 
}
     
?>