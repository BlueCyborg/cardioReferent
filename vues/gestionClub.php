<h1>Cardio-Plugin gestion d'un club existant :</h1>
<br>
<?php $clubs = getClubDatabase(); ?>
<form action="https://cardio-training.eu/wp-admin/admin.php?page=administration&option=modifierClub" method="POST">
    <select name="id_club">
        <?php foreach ($clubs as $club) { ?>
            <option value="<?= $club->id ?>"><?= $club->nom ?></option>
        <?php } ?>
    </select>
    <button type="submit" name="gererClub" style="display: inline-block; background-color: #154c79; border-radius: 10px; border: 4px double #cccccc; color: #eeeeee; text-align: center; width: 100px; transition: all 0.5s; cursor: pointer; margin: 5px;">
        Gérer
    </button>
</form>