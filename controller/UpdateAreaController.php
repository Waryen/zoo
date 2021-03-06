<?php

require '../model/DAO.php';
require '../model/AnimalDAO.php';
require '../model/AreaDAO.php';

// Objet qui modifie une zone

class Modify extends AreaDAO {
    //private $animalDAO;
    //private $areaDAO;
    private $pkArea;
    //zone
    private $areaName;
    private $status;

    public function __construct() {
        //$this->animalDAO = new AnimalDAO();
        //$this->areaDAO = new AreaDAO();
        parent::__construct();
        $this->pkArea = $_GET['pk-area'];
        //zone
        $this->areaName = htmlspecialchars($_POST['areaName']);
        $this->status = htmlspecialchars($_POST['status']);
    }

    public function update() {
        $this->modify_area($this->pkArea, $this->areaName, $this->status);
        header('Location:../index.php');
    }
}

$test = new Modify();
$test->update();