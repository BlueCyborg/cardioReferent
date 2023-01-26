<?php

/**
 * Gestion de l'affichage administrateur
 */

function add_Admin_Link()
{
    add_menu_page(
        __('Cardio-Management', 'textdomain'),
        'Cardio Referent',
        'manage_options',
        'administration',
        'cardioPlugin_Page_Principale'
    );

    add_submenu_page(
        'administration',
        'Création du Club',
        'Créer Club',
        'manage_options',
        'administration&option=creerClub',
        'cardioPlugin_Page_Principale'
    );

    add_submenu_page(
        'administration',
        'Gestion du Club',
        'Gestion Club',
        'manage_options',
        'administration&option=gererClub',
        'cardioPlugin_Page_Principale'
    );
    add_submenu_page(
        'administration',
        'Suppression du Club',
        'Supprimer Club',
        'manage_options',
        'administration&option=supprimerClub',
        'cardioPlugin_Page_Principale'
    );
    add_submenu_page(
        'administration',
        'Création du Référent',
        'Créer Référent',
        'manage_options',
        'administration&option=creerReferent',
        'cardioPlugin_Page_Principale'
    );

    add_submenu_page(
        'administration',
        'Gestion du Référent',
        'Gérer Référent',
        'manage_options',
        'administration&option=gererReferent',
        'cardioPlugin_Page_Principale'
    );
    add_submenu_page(
        'administration',
        'Suppression du Référent',
        'Supprimer Référent',
        'manage_options',
        'administration&option=supprimerReferent',
        'cardioPlugin_Page_Principale'
    );
}

function cardioPlugin_Page_Principale()
{
    if (!isset($_GET['option'])) {
        //L'on inclu la page d'accueil par défaut
        include CP_FILE_PATH . 'vues/main.php';
    } else {

        switch ($_GET['option']) {
                //MAIN
            case 'accueil':
                include CP_FILE_PATH . 'vues/main.php';
                break;
                
                //CLUB
            case 'creerClub':
                if (isset($_POST['creerClub'])) {
                    creerClub($_POST['nom_club'], $_POST['siret_club'], $_POST['id_referent']);
                    //Voir pour un envoie de mail au référent lors de la création du club
                    include CP_FILE_PATH . 'vues/validation.php';
                } else {
                    include CP_FILE_PATH . 'vues/creationClub.php';
                }
                break;

            case 'gererClub':
                include CP_FILE_PATH . 'vues/gestionClub.php';
                break;

            case 'modifierClub':
                if (isset($_POST['gererClub'])) {
                    include CP_FILE_PATH . 'vues/modifierClub.php';
                } elseif (isset($_POST['modifierClub'])) {
                    updateClub($_POST['id_club'], $_POST['club_name'], $_POST['club_siret'], $_POST['id_referent']);
                    include CP_FILE_PATH . 'vues/validation.php';
                }
                break;

            case 'supprimerClub':
                if (!isset($_POST['deleteClub'])) {
                    include CP_FILE_PATH . 'vues/supprimerClub.php';
                } else {
                    deleteClub($_POST['id_club']);
                    include CP_FILE_PATH . 'vues/validation.php';
                }
                break;

                //REFERENT
            case 'creerReferent':
                if (isset($_POST['creerReferent'])) {
                    creerReferent($_POST['nom_referent'], $_POST['password_referent'], $_POST['mail_referent']);
                    $to = $_POST['mail_referent'];
                    $subject = 'Création de votre compte Cardio-Training !';
                    $message = 'Bonjour ' . $_POST['nom_referent'] . ',<br><br>
                    Votre compte Cardio-Training.eu vient d\'être créé !<br>
                    Vous pouvez dès à présent vous connecter sur la page <a href="https://cardio-training.eu/login/">connexion</a> du site avec les identifiants suivants : <br>
                    <strong>Pseudo : </strong>' . $_POST['nom_referent'] . '<br>
                    <strong>Mot de passe temporaire </strong> (à changer dès la première connexion via l\'espace "Mon compte") : ' . $_POST['password_referent'] . '<br>
                    Vous pouvez aussi utiliser votre mail : ' . $_POST['mail_referent'] . ' comme User pour vous connecter.<br><br>
                    À bientôt sur <a href="https://cardio-training.eu">Cardio-Training.eu</a> !';
                    wp_mail($to, $subject, $message);
                    include CP_FILE_PATH . 'vues/validation.php';
                } else {
                    include CP_FILE_PATH . 'vues/creationReferent.php';
                }
                break;

            case 'gererReferent':
                include CP_FILE_PATH . 'vues/gestionReferent.php';
                break;

            case 'modifierReferent':
                if (isset($_POST['gererReferent'])) {
                    include CP_FILE_PATH . 'vues/modifierReferent.php';
                } elseif (isset($_POST['modifierReferent'])) {
                    updateReferent($_POST['id_referent'], $_POST['user_login'], $_POST['user_email'], $_POST['id_club']);
                    include CP_FILE_PATH . 'vues/validation.php';
                }
                break;

            case 'supprimerReferent':
                if (!isset($_POST['deleteReferent'])) {
                    include CP_FILE_PATH . 'vues/supprimerReferent.php';
                } else {
                    deleteReferent($_POST['id_referent']);
                    include CP_FILE_PATH . 'vues/validation.php';
                }
                break;

            default:
                include CP_FILE_PATH . 'vues/main.php';
                break;
        }
    }
}