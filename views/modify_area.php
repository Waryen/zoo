<?php

require '../model/DAO.php';
require '../model/AnimalDAO.php';
require '../model/AreaDAO.php';

$areaDAO = new AreaDAO();
$area = $areaDAO->recup_areas_modify($_GET['pk']);



?>

<div class="link-accueil">
    <p><a href="../index.php">Retour à la gestion du parc</a></p>
</div>

<div class='area-modify'>
    <h1>Modifier une zone</h1>

    <form action="../controller/UpdateAreaController.php?pk-area=<?php echo $area['pk']; ?>" method="post">
        <p>
            <label for="name">Nom: </label>
            <input type="text" name="areaName" id="" value='<?php echo $area['name']; ?>' required>
        </p>

        <p>
            <label for="status">Statut: </label>
            <select name="status" id="" value='<?php echo $area['status']; ?>' required>
                <option value="<?php echo $area['status'] ?>" selected><?php echo $area['status'] ?></option>
                <option value="open">Ouvert</option>
                <option value="closed">Fermée</option>
                <option value="work">En travaux</option>
            </select>
        </p>

        <button type="submit">Ajouter</button>
    </form>
</div>