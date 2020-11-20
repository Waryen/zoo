<?php

require '../model/AnimalDAO.php';
require '../model/AreaDAO.php';

// Objet qui modifie un animal ou une zone

class Modify {
    private $animalDAO;
    private $areaDAO;
    private $pkAnimal;
    private $pkArea;
    //animal
    private $animalName;
    private $race;
    private $genre;
    private $regime;
    private $zone;
    //zone
    private $areaName;
    private $status;

    public function __construct() {
        $this->animalDAO = new AnimalDAO();
        $this->areaDAO = new AreaDAO();
        $this->pkAnimal = $_GET['pk-animal'];
        $this->pkArea = $_GET['pk-area'];
        //animal
        $this->animalName = htmlspecialchars($_POST['animalName']);
        $this->race = htmlspecialchars($_POST['race']);
        $this->genre = htmlspecialchars($_POST['gender']);
        $this->regime = htmlspecialchars($_POST['diet']);
        $this->zone = htmlspecialchars($_POST['zone']);
        //zone
        $this->areaName = htmlspecialchars($_POST['areaName']);
        $this->status = htmlspecialchars($_POST['status']);
    }

    public function modifyAnimal() {
        $this->animalDAO->modify_animal($this->pkAnimal, $this->animalName, $this->race, $this->genre, $this->regime, $this->zone);
    }

    public function modifyArea() {
        $this->areaDAo->modify_area($this->pkArea, $this->status);
    }
}

$test = new Modify();
$test->modifyArea();
header('Location:../index.php');