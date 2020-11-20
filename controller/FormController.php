<?php

require '../model/AnimalDAO.php';
require '../model/AreaDAO.php';

// Objet des formulaires d'ajout d'animal et zone

class Form {
    private $connection;
    private $animalDAO;
    private $areaDAO;
    // form animal
    private $animalName;
    private $race;
    private $genre;
    private $regime;
    private $zone;
    // form area
    private $areaName;
    private $status;

    public function __construct() {
        $this->connection = new PDO('mysql:host=localhost;dbname=parc', 'root', 'root');
        $this->animalDAO = new AnimalDAO();
        $this->areaDAO = new AreaDAO();
        // form animal
        $this->animalName = htmlspecialchars($_POST['animalName']);
        $this->race = htmlspecialchars($_POST['race']);
        $this->genre = htmlspecialchars($_POST['gender']);
        $this->regime = htmlspecialchars($_POST['diet']);
        $this->zone = htmlspecialchars($_POST['zone']);
        // form area
        $this->areaName = htmlspecialchars($_POST['areaName']);
        $this->status = htmlspecialchars($_POST['status']);
    }

    public function test() {
        echo $this->animalName;
        echo $this->race;
        echo $this->genre;
        echo $this->regime;
        echo $this->zone;

        echo $this->areaName;
        echo $this->status;
    }

    public function insertAnimal() {
        $animalDeja = $this->animalDAO->recup_animals($this->animalName, $this->race);

        if(($this->animalName === $this->animalDeja['name']) AND ($this->race === $this->animalDeja['race'])) {
            $erreurAnimal = 'Cet animal existe déjà';
        } else {
            $this->animalDAO->insert_animal($this->animalName, $this->race, $this->genre, $this->regime, $this->zone);
            $okAnimal = 'Animal ajouté';
        }
    }

    public function insertArea() {
        $areaDeja = $this->areaDAO->recup_areas($this->areaName);

        if($this->areaDeja['name'] === $this->areaName) {
            $erreurArea = 'Cette zone existe déjà';
        } else {
            $this->areaDAO->insert_area($this->areaName, $this->status);
            $okArea = 'Zone ajoutée';
        }
    }
}

// pas bon

$test = new Form();
//$test->insertAnimal();
$test->insertArea();
header('Location:../index.php');






?>