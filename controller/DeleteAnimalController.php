<?php

require '../model/DAO.php';
require '../model/AnimalDAO.php';

// Objet qui supprime un animal

class Delete {
    private $animalDAO;
    private $animal_id;

    public function __construct() {
        $this->animalDAO = new AnimalDAO();
        $this->animal_id = $_GET['pk-animal'];
    }

    public function delete() {
        if(!empty($this->animal_id)) {
            $this->animalDAO->delete_animal($this->animal_id);
            header('Location:../index.php');
        } else {
            header('Location:../index.php');
        }
    }
}

// pas bon

$test = new Delete();
$test->delete();




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