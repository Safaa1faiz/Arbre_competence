<?php
define('Root', dirname(__FILE__));
    error_reporting(E_ALL);


    // require_once Root . '../DB/DatabaseConnection.php';
    require_once Root . '../../../DAL/StagiaireDAO.php';
    require_once Root . '../../../BLL/StagiaireBLO.php';
    require_once Root . '../../../Entities/Stagiaire.php';