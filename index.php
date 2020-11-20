<?php
require 'controller/indexController.php';

//1 Permettre de supprimer un animal via un bouton
//2 Permettre de supprimer une zone via un bouton !Attention, vous ne pouvez supprimer une zone si des animaux sont présents dedans (contrainte dans la base de données)
//3 Permettre d'ajouter un animal via un formulaire
//4 Permettre d'ajouter une zone via un formulaire
//5 Créer une classe DAO, dont vos AnimalDAO et AreaDAO héritent et qui vous faciliteront la création de futurs DAO

//6 (bonus) Quand on crée un animal, pouvoir lui attribuer une zone parmis les zones existantes
//7 (bonus) Permettre de modifier un animal existant
//8 (bonus) Permettre de modifier une zone existante



?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel='stylesheet' href='https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css'>
    <link rel='stylesheet' href='./index.css'>
    <title>Zoo</title>
</head>
<body>
    <h1>Zoo</h1>
    <div id='wrapper'>
        <?php new IndexController(); ?>
    </div>
    <div id="copyrights">
        <p>© Jonathan Gomand</p>
    </div>
</body>
</html>

