<?php




?>

<div class='form-animal'>
    <h2>Ajouter un animal</h2>

    <form action="controller/FormAnimalController.php" method="post">
        <p>
            <label for="name">Nom: </label>
            <input type="text" name="animalName" id="" required>
        </p>

        <p>
            <label for="race">Race: </label>
            <input type="text" name="race" id="" required>
        </p>

        <p>
            <label for="gender">Genre: </label>
            <select name="gender" id="" required>
                <option value="male">Male</option>
                <option value="female">Female</option>
            </select>
        </p>

        <p>
            <label for="diet">Régime: </label>
            <select name="diet" id="" required>
                <option value="carnivore">Carnivore</option>
                <option value="herbivore">Herbivore</option>
                <option value="omnivore">Omnivore</option>
            </select>
        </p>

        <p>
            <label for="zone">Zone du parc: </label>
            <select name="zone" id="" required>
                <?php foreach ($areasAnimals as $zone ) { ?> 
                    <option value="<?php echo $zone['pk']; ?>"><?php echo $zone['name']; ?></option>
                <?php } ?>
            </select>
        </p>

        <button type="submit">Ajouter</button>

        <p>
            <?php
                if(isset($_GET["okAnimal"])) {
                    echo $_GET["okAnimal"];
                } elseif (isset($_GET['erreurAnimal'])) {
                    echo $_GET['erreurAnimal'];
                }
            ?>
        </p>
    </form>
</div>