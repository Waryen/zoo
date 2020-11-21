<?php

require '../model/AreaDAO.php';
require '../model/AnimalDAO.php';

// Objet qui supprime une zone

class Delete {
    private $areaDAO;
    private $animalDAO;
    private $area_id;

    public function __construct() {
        $this->areaDAO = new AreaDAO();
        $this->animalDAO = new AnimalDAO();
        $this->area_id = $_GET['pk-area'];
    }

    public function delete() {
        if(!empty($this->area_id)) {
            $this->areaDAO->delete_area($this->area_id);
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