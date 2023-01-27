<?php

//REFERENTS

function getAllReferent()
{
    //Prends tous les référents
    $args = array(
        'role' => 'referent',
        'orderby' => 'user_nicename',
        'order' => 'ASC',
    );
    return get_users($args);
}

function getUnReferent($ID)
{
    return get_user_by('id', $ID);
}

function creerReferent($pseudoReferent, $passwordReferent, $emailReferent)
{
    $user_id = wp_create_user($pseudoReferent, $passwordReferent, $emailReferent);
    $user_id_role = new WP_User($user_id);
    $user_id_role->set_role('referent');
}

function updateReferent($id, $pseudo, $mail, $id_club)
{
    global $wpdb;
    wp_update_user([
        'ID' => $id,
        'user_nicename' => $pseudo,
        'user_email' => $mail,
    ]);
    $wpdb->get_results("UPDATE `z00b_club` SET `id_referent`='" . $id . "' WHERE `id`='" . $id_club . "' ");
}

function deleteReferent($id_referent)
{
    global $wpdb;
    $wpdb->get_results("UPDATE `z00b_club` SET `id_referent`= NULL WHERE `id_referent` =  '" . $id_referent . "' ");
    $del = wp_delete_user($id_referent, 12);
}

//CLUB
function getClubDatabase()
{
    global $wpdb;
    return $wpdb->get_results("SELECT `id`,`siret`,`nom`,`id_referent` FROM `z00b_club` ");
}

function creerClub($club_name, $siret_club, $id_referent)
{
    // Requete préparé args :
    //     %d (integer)
    //     %f (float)
    //     %s (string)

    global $wpdb;
    $wpdb->get_results("INSERT INTO `z00b_club`(`siret`, `nom`, `id_referent`) VALUES ('" . $siret_club . "', '" . $club_name . "', '" . $id_referent . "')");
}

function getUnClub($id)
{
    global $wpdb;
    return $wpdb->get_results("SELECT `siret`, `nom`, `id_referent` FROM `z00b_club` WHERE `id` = '" . $id . "' ");
}

function updateClub($id_club, $siret, $nom, $id_referent)
{
    global $wpdb;
    $wpdb->get_results("UPDATE `z00b_club` SET `siret`='" . $siret . "',`nom`='" . $nom . "',`id_referent`='" . $id_referent . "' WHERE `id`='" . $id_club . "' ");
}

function deleteClub($id_club)
{
    global $wpdb;
    //Puis l'on supprime le club
    $wpdb->get_results("DELETE FROM `z00b_club` WHERE `id` = '" . $id_club . "' ");
}
