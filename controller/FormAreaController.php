<?php

require '../model/DAO.php';
require '../model/AnimalDAO.php';
require '../model/AreaDAO.php';

// Objet d'ajout d'une zone

class Form extends AreaDAO {
    //private $animalDAO;
    //private $areaDAO;
    // form area
    private $areaName;
    private $status;
    private $areaDeja;

    public function __construct() {
        //$this->animalDAO = new AnimalDAO();
        //$this->areaDAO = new AreaDAO();
        parent::__construct();
        // form area
        $this->areaName = htmlspecialchars($_POST['areaName']);
        $this->status = htmlspecialchars($_POST['status']);
    }

    public function insert() {
        $this->areaDeja = $this->recup_areas($this->areaName);

        if($this->areaDeja['name'] === $this->areaName) {
            $erreurArea = 'Cette zone existe déjà';
            header('Location:../index.php?erreurArea='.$erreurArea);
        } else {
            $this->insert_area($this->areaName, $this->status);
            $okArea = 'Zone ajoutée';
            header('Location:../index.php?okArea='.$okArea);
        }
    }
}

// pas bon

$test = new Form();
$test->insert();






?>