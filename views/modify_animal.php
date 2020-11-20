<?php

require '../model/AnimalDAO.php';
require '../model/AreaDAO.php';

$animalModify = new AnimalDAO();
$areasAnimals = new AreaDAO();
$animalModify->recup_animals_modify($_GET['pk']);
$areasAnimals->recup_areas_for_animals();




?>



<div class='mod-animal'>
    <h1>Modifier un animal</h1>

    <form action="../controller/Modify.php?pk-animal=<?php echo $animalModify['animalPk']; ?>" method="post">
        <p>
            <label for="name">Nom: </label>
            <input type="text" name="animalName" id="" value='<?php echo $animalModify['animalName']; ?>' required>
        </p>

        <p>
            <label for="race">Race: </label>
            <input type="text" name="race" id="" value='<?php echo $animalModify['animalRace'] ?>' required>
        </p>

        <p>
            <label for="gender">Genre: </label>
            <select name="gender" id="" required>
                <option value="<?php echo $animalModify['animalGender'] ?>" selected><?php echo $animalModify['animalGender'] ?></option>
                <option value="male">Male</option>
                <option value="female">Femelle</option>
            </select>
        </p>

        <p>
            <label for="diet">Régime: </label>
            <select name="diet" id="" required>
                <option value="<?php echo $animalModify['animalDiet'] ?>" selected><?php echo $animalModify['animalDiet'] ?></option>
                <option value="carnivore">Carnivore</option>
                <option value="herbivore">Herbivore</option>
                <option value="omnivore">Omnivore</option>
            </select>
        </p>

        <p>
            <label for="zone">Zone du parc: </label>
            <select name="zone" id="" required>
                <option value="<?php echo $animalModify['areaPk'] ?>" selected><?php echo $animalModify['areaName'] ?></option>
                <?php foreach ($areasAnimals as $zone ) { ?> 
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