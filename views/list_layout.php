
<div class='list-area'>
    <h2>Liste des zones du parc et leurs animaux</h2>

    <ol>
        <?php foreach($areas as $area): ?>
        <li>
            <ul>
                <h3>
                    <span><?= $area->get_name(); ?></span> 
                    <button><a href='controller/DeleteController.php?pk-area=<?= $area->get_pk(); ?>'>Supprimer</a></button>
                    <button><a href='views/modify_zone.php?pk=<?= $area->get_pk(); ?>'>Modifier</a></button>
                </h3>
                <div class='area-animals'>
                    <h4>Les animaux:</h4>
                    <?php foreach($area->get_animals() as $animal): ?>
                        <li><?= $animal->get_name(); ?></li>
                    <?php endforeach; ?>
                </div>
            </ul> 
        </li>  
        <?php endforeach; ?>
    </ol>
</div>