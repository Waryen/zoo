<?php

require '../model/AreaDAO.php';

$connection = new PDO('mysql:host=localhost;dbname=parc', 'root', 'root');

// récupération des données du POST

$name = htmlspecialchars($_POST['name']);
$status = htmlspecialchars($_POST['status']);




// vérification si la zone existe déjà

$deja = AreaDAO::recup_areas($name);



if($name === $deja['name']) {
    $erreurArea = 'Cette zone existe déjà';
} else {
    $okArea = 'Zone ajoutée';
}


// redirections

if(!empty($okArea)) {
    AreaDAO::insert_area($name, $status);
    header("Location:../index.php?okArea=".$okArea);
} else {
    header("Location:../index.php?erreurArea=".$erreurArea);
}


?>