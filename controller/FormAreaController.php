<?php

require '../model/AnimalDAO.php';
require '../model/AreaDAO.php';

// Objet d'ajout d'une zone

class Form {
    private $connection;
    private $animalDAO;
    private $areaDAO;
    // form area
    private $areaName;
    private $status;
    private $areaDeja;

    public function __construct() {
        $this->connection = new PDO('mysql:host=localhost;dbname=parc', 'root', 'root');
        $this->animalDAO = new AnimalDAO();
        $this->areaDAO = new AreaDAO();
        // form area
        $this->areaName = htmlspecialchars($_POST['areaName']);
        $this->status = htmlspecialchars($_POST['status']);
    }

    public function insert() {
        $this->areaDeja = $this->areaDAO->recup_areas($this->areaName);

        if($this->areaDeja['name'] === $this->areaName) {
            $erreurArea = 'Cette zone existe déjà';
            header('Location:../index.php?erreurArea='.$erreurArea);
        } else {
            $this->areaDAO->insert_area($this->areaName, $this->status);
            $okArea = 'Zone ajoutée';
            header('Location:../index.php?okArea='.$okArea);
        }
    }
}

// pas bon

$test = new Form();
$test->insert();






?>