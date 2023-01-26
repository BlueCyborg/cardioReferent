<h1>Cardio-Plugin suppression d'un référent :</h1>
<br>
<?php
$referents = getAllReferent(); ?>
<p>Référent à supprimer :</p>
<form action="https://cardio-training.eu/wp-admin/admin.php?page=administration&option=supprimerReferent" method="POST">
    <select name="id_referent">
        <?php foreach ($referents as $unReferent) { ?>
            <option value='<?= $unReferent->data->ID ?>'>
                <?= $unReferent->data->user_login ?>
            </option>
        <?php } ?>
    </select>
    <br>
    <button type="submit" name="deleteReferent" style="display: inline-block; background-color: #154c79; border-radius: 10px; border: 4px double #cccccc; color: #eeeeee; text-align: center; width: 100px; transition: all 0.5s; cursor: pointer; margin: 5px;">
        Supprimer
    </button>
</form>