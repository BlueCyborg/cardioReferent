<h1>Cardio-Plugin modification d'un référent :</h1>
<br>
<form action="https://cardio-training.eu/wp-admin/admin.php?page=administration&option=modifierClub" method="POST">
    <?php
    $club = getUnClub($_POST["id_club"]);
    $referents = getAllReferent();
    ?>
    <p><strong>Club : <?= $club[0]->nom ?></strong><br><br>
        <input name="id_club" type="hidden" value="<?= $_POST["id_club"] ?>">
        Nom : <input type='text' name='club_name' placeholder='Nom' value='<?= $club[0]->nom ?>' required>
        Siret : <input type='text' name='club_siret' placeholder='Siret' value='<?= $club[0]->siret ?>' required>
        Référent : <select name="id_referent">
            <?php
            foreach ($referents as $referent) {
                if ($club[0]->id_referent == $referent->data->ID) { ?>
                    <option value='<?= $referent->data->ID ?>' selected>
                        <?= $referent->data->user_login ?>
                    </option>
                <?php }
                if (is_null($club[0]->id_referent)) { ?>
                    <option value='NULL' selected> - </option>
                <?php } ?>
                <option value='<?= $referent->data->ID ?>'>
                    <?= $referent->data->user_login ?>
                </option>
            <?php } ?>
        </select>
    </p>
    <button type="submit" name="modifierClub" style="display: inline-block; background-color: #154c79; border-radius: 10px; border: 4px double #cccccc; color: #eeeeee; text-align: center; width: 100px; transition: all 0.5s; cursor: pointer; margin: 5px;">
        Modifier
    </button>
</form>