<?php

class Stagiaire{

    private $id;
    private $nom;
    private $cne;
   




    public function getId() {
        return $this->id;
    }
    public function setId($ID) {
        $this->id = $ID;
    }

    public function getNom() {
        return $this->nom;
    }
    public function setNom($NOM) {
        $this->nom = $NOM;
    }

    public function getCne() {
        return $this->cne;
    }
    public function setCne($CNE) {
        $this->cne = $CNE;
    }
}
     
?>