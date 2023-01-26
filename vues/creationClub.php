<h1>Cardio-Plugin création d'un nouveau club :</h1>
<br>
<form action="https://cardio-training.eu/wp-admin/admin.php?page=administration&option=creerClub" method="POST">
    <label for="nom_club">Entrez le nom du club : </label>
    <input type="text" maxlength="50" id="nom_club" name="nom_club" placeholder="Nom du club" required>
    <br><br>
    <label for="siret_club">Entrez le SIRET du club : </label>
    <input type="text" maxlength="50" id="siret_club" name="siret_club" placeholder="SIRET du club" required>
    <br>
    <p>Séléction du référent :
        <select name="id_referent" required>
            <?php
            $users = getAllReferent();
            foreach ($users as $user) {
                echo '<option value="' . $user->ID . '">' . $user->display_name . '</option>';
            }
            ?>
        </select>
    </p>
    <button type="submit" name="creerClub" style="display: inline-block; background-color: #154c79; border-radius: 10px; border: 4px double #cccccc; color: #eeeeee; text-align: center; width: 100px; transition: all 0.5s; cursor: pointer; margin: 5px;">
        Créer
    </button>
</form>