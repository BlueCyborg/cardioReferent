<h1>Cardio-Plugin suppression d'un club :</h1>
<br>
<?php $clubs = getClubDatabase(); ?>
<form action="https://cardio-training.eu/wp-admin/admin.php?page=gestionReferent&option=supprimerClub" method="POST">
    <p><strong>Séléction du club :</strong><br>
        <select name="id_club">
            <?php
            foreach ($clubs as $club) { ?>
                <option value='<?= $club->id ?>'>
                    <?= $club->nom ?>
                </option>
            <?php } ?>
        </select>
    </p>
    <button type="submit" name="deleteClub" style="display: inline-block; background-color: #154c79; border-radius: 10px; border: 4px double #cccccc; color: #eeeeee; text-align: center; width: 100px; transition: all 0.5s; cursor: pointer; margin: 5px;">
        Supprimer
    </button>
</form>