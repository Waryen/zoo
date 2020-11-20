<?php

require '../model/AnimalDAO.php';
require '../model/AreaDAO.php';

// Objet qui supprime un animal ou une zone

class Delete {
    private $animalDAO;
    private $areaDAO;
    private $animal_id;
    private $area_id;

    public function __construct() {
        $this->animalDAO = new AnimalDAO();
        $this->areaDAO = new AreaDAO();
        $this->animal_id = $_GET['pk-animal'];
        $this->area_id = $_GET['pk-area'];
    }

    public function test() {
        echo $this->animal_id;
        echo $this->area_id;
    }

    public function deleteAnimal() {
        $this->animalDAO->delete_animal($this->animal_id);
    }

    public function deleteArea() {
        $this->areaDAO->delete_area($this->area_id);
    }
}

// pas bon

$test = new Delete();
$test->deleteArea();
$test->deleteAnimal();
header('Location:../index.php');




/* *** procédurale ***

$animal_id = $_GET['pk-animal'];
$area_id = $_GET['pk-area'];

// vérification des pk avant de les supprimer

if(!empty($animal_id)) {
    AnimalDAO::delete_animal($animal_id);
    header('Location:../index.php');
} elseif(!empty($area_id)) {
    AreaDAO::delete_area($area_id);
    header('Location:../index.php');
} else {
    $erreur = 'Erreur';
    header('Location:../index.php?erreur='.$erreur);
}

*/


?>