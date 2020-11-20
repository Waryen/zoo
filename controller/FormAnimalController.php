<?php

require '../model/AnimalDAO.php';
require '../model/AreaDAO.php';

// Objet d'ajout d'un animal

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
    private $animalDeja;

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
    }

    public function insert() {
        $this->animalDeja = $this->animalDAO->recup_animals($this->animalName, $this->race);

        if(($this->animalName === $this->animalDeja['name']) AND ($this->race === $this->animalDeja['race'])) {
            $erreurAnimal = 'Cet animal existe déjà';
            header('Location:../index.php?erreurAnimal='.$erreurAnimal);
        } else {
            $this->animalDAO->insert_animal($this->animalName, $this->race, $this->genre, $this->regime, $this->zone);
            $okAnimal = 'Animal ajouté';
            header('Location:../index.php?okAnimal='.$okAnimal);
        }
    }
}

// pas bon

$test = new Form();
$test->insert();






?>