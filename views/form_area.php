<div class='form-area'>
    <h2>Ajouter une zone</h2>

    <form action="controller/FormAreaController.php" method="post">
        <p>
            <label for="name">Nom: </label>
            <input type="text" name="name" id="" required>
        </p>

        <p>
            <label for="status">Statut: </label>
            <select name="status" id="" required>
                <option value="open">Ouvert</option>
                <option value="closed">Fermée</option>
                <option value="work">En travaux</option>
            </select>
        </p>

        <button type="submit">Ajouter</button>

        <p>
            <?php
                if(isset($_GET["okArea"])) {
                    echo $_GET["okArea"];
                } else {
                    echo $_GET['erreurArea'];
                }
            ?>
        </p>
    </form>
</div>