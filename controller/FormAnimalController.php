<?php

require '../model/AnimalDAO.php';
require '../model/AreaDAO.php';

class FormAnimal {
    private $animalDAO;
    private $areaDAO;
    private $name;
    private $race;
    private $genre;
    private $regime;
    private $zone;
    private $deja;

    public function __construct() {
        $this->animalDAO = new AnimalDAO();
        $this->areaDAO = new AreaDAO();
        $this->name = htmlspecialchars($_POST['name']);
        $this->race = htmlspecialchars($_POST['race']);
        $this->genre = htmlspecialchars($_POST['gender']);
        $this->regime = htmlspecialchars($_POST['diet']);
        $this->zone = htmlspecialchars($_POST['zone']);
    }

    public function test() {
        echo $this->name;
        echo $this->genre;
        echo $this->zone;
    }

    /*private function insert() {
        if( ($name === $deja['name']) AND ($race === $deja['race']) ) {
            $erreurAnimal = 'Cette combinaison de nom et race existe déjà';
        } else {
            $okAnimal = 'Animal ajouté';
        }



        if(!empty($okAnimal)) {
            $animalDAO->insert_animal($name, $race, $genre, $regime, $zone);
            header("Location:../index.php?okAnimal=".$okAnimal);
        } else {
            header("Location:../index.php?erreurAnimal=".$erreurAnimal);
        }
    }*/
}



/*
***** procédural *****

$connection = new PDO('mysql:host=localhost;dbname=parc', 'root', 'root');

// récupération des données du POST

$name = htmlspecialchars($_POST['name']);
$race = htmlspecialchars($_POST['race']);
$genre = htmlspecialchars($_POST['gender']);
$regime = htmlspecialchars($_POST['diet']);
$zone = htmlspecialchars($_POST['zone']);




// vérification si l'animal existe déjà

$deja = AnimalDAO::recup_animals($name, $race);

if( ($name === $deja['name']) AND ($race === $deja['race']) ) {
    $erreurAnimal = 'Cette combinaison de nom et race existe déjà';
} else {
    $okAnimal = 'Animal ajouté';
}


// redirections

if(!empty($okAnimal)) {
    AnimalDAO::insert_animal($name, $race, $genre, $regime, $zone);
    header("Location:../index.php?okAnimal=".$okAnimal);
} else {
    header("Location:../index.php?erreurAnimal=".$erreurAnimal);
}

*/
?>