<h1>Cardio-Plugin modification d'un référent :</h1>
<br>
<form action="https://cardio-training.eu/wp-admin/admin.php?page=gestionReferent&option=modifierReferent" method="POST">
    <?php
    $clubs = getClubDatabase();
    $referent = getUnReferent($_POST["id_referent"]);
    ?>
    <p><strong>Référent : <?= $referent->data->user_nicename ?></strong><br><br>

        <input name="id_referent" type="hidden" value="<?= $_POST["id_referent"] ?>">

        Pseuso : <input type='text' name='user_login' placeholder='User Login' value='<?= $referent->data->user_nicename ?>' required>

        Mail : <input type='text' name='user_email' placeholder='User Mail' value='<?= $referent->data->user_email ?>' required>

        Club : <select name="id_club">
            <?php foreach ($clubs as $club) {
                if ($referent->data->id_club == $club->id) { ?>
                    <option value='<?= $club->id ?>' selected>
                        <?= $club->nom ?>
                    </option>
                <?php } else { ?>
                    <option value='<?= $club->id ?>'>
                        <?= $club->nom ?>
                    </option>
            <?php }
            } ?>
        </select>
    </p>
    <button type="submit" name="modifierReferent" style="display: inline-block; background-color: #154c79; border-radius: 10px; border: 4px double #cccccc; color: #eeeeee; text-align: center; width: 100px; transition: all 0.5s; cursor: pointer; margin: 5px;">
        Modifier
    </button>
</form>