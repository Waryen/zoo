<?php

require '../model/AnimalDAO.php';
require '../model/AreaDAO.php';

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


?>