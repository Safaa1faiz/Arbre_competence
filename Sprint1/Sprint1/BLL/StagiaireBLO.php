<?php
require_once('./Presentation/layout/loader.php');

class StagiaireBLO {
    
        private $stagiaireDao;
        public $errorMessage;
    public function __construct(){
        $this->stagiaireDao = new StagiaireDAO();
    }
    public function AfficherTous(){
        return $this->stagiaireDao->AfficherTous();
    }
    public function SupprimerStagiaire($Id){
        return $this->stagiaireDao->SupprimerStagiaire($Id);
    }  public function ModifierStagiaire($Id, $Nom, $CNE){
        return $this->stagiaireDao->ModifierStagiaire($Id, $Nom, $CNE);
    }  public function AjouterStagiaire($Nom, $CNE, $Ville_Id){
        return $this->stagiaireDao->AjouterStagiaire($Nom, $CNE, $Ville_Id);
    }  public function GetStagiaireById($Id){
        return $this->stagiaireDao->GetStagiaireById($Id);
    }  public function getCities(){
        return $this->stagiaireDao->getCities();
    }
    }

?>