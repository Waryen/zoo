<?php

require '../model/AreaDAO.php';

// récupération du post avant d'envoyer les données dans la méthode qui va modifier les données

$pk = $_GET['pk'];
$name = htmlspecialchars($_POST['name']);
$status = htmlspecialchars($_POST['status']);
/*
var_dump($pk);
var_dump($name);
var_dump($status);
*/

// méthode qui modifie les données du post

AreaDAO::modify_area($pk, $name, $status);
header('Location:../index.php');

?>