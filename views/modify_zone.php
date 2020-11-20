<?php


require '../model/AreaDAO.php';
$zone = AreaDAO::recup_areas_modify($_GET['pk']);



?>




<div class='area-modify'>
    <h1>Modifier une zone</h1>

    <form action="../controller/ModifyAreaController.php?pk=<?php echo $zone['pk']; ?>" method="post">
        <p>
            <label for="name">Nom: </label>
            <input type="text" name="name" id="" value='<?php echo $zone['name']; ?>' required>
        </p>

        <p>
            <label for="status">Statut: </label>
            <select name="status" id="" value='<?php echo $zone['status']; ?>' required>
                <option value="<?php echo $zone['status'] ?>" selected><?php echo $zone['status'] ?></option>
                <option value="open">Ouvert</option>
                <option value="closed">Fermée</option>
                <option value="work">En travaux</option>
            </select>
        </p>

        <button type="submit">Ajouter</button>
    </form>
</div>