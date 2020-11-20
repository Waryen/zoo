<?php

require '../model/AnimalDAO.php';

// récupération du post avant d'envoyer les données dans la méthode qui va modifier les données

$pk = $_GET['pk'];
$name = htmlspecialchars($_POST['name']);
$race = htmlspecialchars($_POST['race']);
$genre = htmlspecialchars($_POST['gender']);
$regime = htmlspecialchars($_POST['diet']);
$zone = htmlspecialchars($_POST['zone']);
/*
var_dump($_GET['pk']);
var_dump($name);
var_dump($race);
var_dump($genre);
var_dump($regime);
var_dump($zone);
*/

// méthode qui modifie les données du post

AnimalDAO::modify_animal($pk, $name, $race, $genre, $regime, $zone);
header('Location:../index.php');





?>