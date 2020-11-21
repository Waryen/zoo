<div class='table-animals'>
    <h2>Table des animaux du parc</h2>
    <table>
        <thead>
            <tr>
                <td>Nom</td>
                <td>Race</td>
                <td>Genre</td>
                <td>Régime</td>
                <td>Actions</td>
            </tr>
        </thead>
        <tbody>
        <?php foreach($animals as $animal): ?>
            <tr>
                <td><?= $animal->get_name(); ?></td>
                <td><?= $animal->get_race(); ?></td>
                <td><?= $animal->get_gender(); ?></td>
                <td><?= $animal->eat(); ?></td>
                <td>
                    <button><a href='controller/DeleteAnimalController.php?pk-animal=<?= $animal->get_pk(); ?>'>Supprimer</a></button>
                    <button><a href="views/modify_animal.php?pk=<?= $animal->get_pk(); ?>">Modifier</a></button>
                </td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
</div>