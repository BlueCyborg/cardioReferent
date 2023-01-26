<h1>Cardio-Plugin gestion d'un référent :</h1>
<br>
<?php
$referents = getAllReferent(); ?>
<p>Référent à modifier :</p>
<form action="https://cardio-training.eu/wp-admin/admin.php?page=administration&option=modifierReferent" method="POST">
    <select name="id_referent">
        <?php foreach ($referents as $unReferent) { ?>
            <option value='<?= $unReferent->data->ID ?>'>
                <?= $unReferent->data->user_login ?>
            </option>
        <?php } ?>
    </select>
    <button type="submit" name="gererReferent" style="display: inline-block; background-color: #154c79; border-radius: 10px; border: 4px double #cccccc; color: #eeeeee; text-align: center; width: 100px; transition: all 0.5s; cursor: pointer; margin: 5px;">
        Modifier
    </button>
</form>