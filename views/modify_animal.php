<?php

require '../model/AnimalDAO.php';
require '../model/AreaDAO.php';

$animal = AnimalDAO::recup_animals_modify($_GET['pk']);
$zones = AreaDAO::recup_areas_for_animals();


?>

<div class='mod-animal'>
    <h1>Modifier un animal</h1>

    <form action="../controller/ModifyAnimalController.php?pk=<?php echo $animal['animalPk']; ?>" method="post">
        <p>
            <label for="name">Nom: </label>
            <input type="text" name="name" id="" value='<?php echo $animal['animalName']; ?>' required>
        </p>

        <p>
            <label for="race">Race: </label>
            <input type="text" name="race" id="" value='<?php echo $animal['animalRace'] ?>' required>
        </p>

        <p>
            <label for="gender">Genre: </label>
            <select name="gender" id="" required>
                <option value="<?php echo $animal['animalGender'] ?>" selected><?php echo $animal['animalGender'] ?></option>
                <option value="male">Male</option>
                <option value="female">Femelle</option>
            </select>
        </p>

        <p>
            <label for="diet">Régime: </label>
            <select name="diet" id="" required>
                <option value="<?php echo $animal['animalDiet'] ?>" selected><?php echo $animal['animalDiet'] ?></option>
                <option value="carnivore">Carnivore</option>
                <option value="herbivore">Herbivore</option>
                <option value="omnivore">Omnivore</option>
            </select>
        </p>

        <p>
            <label for="zone">Zone du parc: </label>
            <select name="zone" id="" required>
                <option value="<?php echo $animal['areaPk'] ?>" selected><?php echo $animal['areaName'] ?></option>
                <?php foreach ($zones as $zone ) { ?> 
                    <option value="<?php echo $zone['pk']; ?>"><?php echo $zone['name']; ?></option>
                <?php } ?>
            </select>
        </p>

        <button type="submit">Modifier</button>

        <div>
            <?php
                if ( isset($_GET["erreur"]) ) {
                    echo $_GET["erreur"];
                }
            ?>
        </div>
    </form>
</div>