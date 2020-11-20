<?php

require '../model/AnimalDAO.php';
require '../model/AreaDAO.php';

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




?>