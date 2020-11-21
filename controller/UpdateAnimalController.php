<?php

require '../model/DAO.php';
require '../model/AnimalDAO.php';
require '../model/AreaDAO.php';

// Objet qui modifie un animal

class Modify extends AnimalDAO {
    //private $animalDAO;
    //private $areaDAO;
    private $pkAnimal;
    //animal
    private $animalName;
    private $race;
    private $genre;
    private $regime;
    private $zone;

    public function __construct() {
        //$this->animalDAO = new AnimalDAO();
        //$this->areaDAO = new AreaDAO();
        parent::__construct();
        $this->pkAnimal = $_GET['pk-animal'];
        //animal
        $this->animalName = htmlspecialchars($_POST['animalName']);
        $this->race = htmlspecialchars($_POST['race']);
        $this->genre = htmlspecialchars($_POST['gender']);
        $this->regime = htmlspecialchars($_POST['diet']);
        $this->zone = htmlspecialchars($_POST['zone']);
    }

    public function update() {
        $this->modify_animal($this->pkAnimal, $this->animalName, $this->race, $this->genre, $this->regime, $this->zone);
        header('Location:../index.php');
    }
}

$test = new Modify();
$test->update();