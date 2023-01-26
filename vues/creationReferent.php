<?php
function createPass($longueur_pass)
{
    return substr(str_shuffle('abcdefghijklmnopqrstuvwxyzABCEFGHIJKLMNOPQRSTUVWXYZ0123456789'), 1, $longueur_pass);
}
?>
<h1>Cardio-Plugin création d'un nouveau référent :</h1>
<br>
<form action="https://cardio-training.eu/wp-admin/admin.php?page=administration&option=creerReferent" method="POST">
    <label for="nom_referent">Entrez le pseudo du référent : </label>
    <input type="text" maxlength="50" id="nom_referent" name="nom_referent" placeholder="Pseudo" required>
    <br><br>
    <label for="password_referent">Choisisez le mot de passe du référent : </label>
    <?php echo '<input type="text" value="' . createPass(12) . '" id="password_referent" name="password_referent" placeholder="Mot de passe" required>' ?>
    <br><br>
    <label for="mail_referent">Entrez le mail du référent : </label>
    <input type="mail" id="mail_referent" name="mail_referent" placeholder="Mail" required>
    <br><br>
    <button type="submit" name="creerReferent" style="display: inline-block; background-color: #154c79; border-radius: 10px; border: 4px double #cccccc; color: #eeeeee; text-align: center; width: 100px; transition: all 0.5s; cursor: pointer; margin: 5px;">
        Créer
    </button>
</form>