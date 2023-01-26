<?php
/*
Plugin Name: Cardio-Référent
Plugin URI: https://github.com/bluecyborg/cardioReferent
Description: Ce plugin permet de créer un référent à un club ainsi que son club !
Version : 1.0
Author URI: https://github.com/bluecyborg/
Author: Mathys
*/

require 'contents/fonctions.php';
require 'modele/fonctionsBDD.php';

defined('ABSPATH') or die('Désolé, vous n\'avez pas l\'autorisation d\'accéder à cette page.');

define('CP_FILE_PATH', plugin_dir_path(__FILE__));

// Register a new shortcode: [cr_custom_registration]
//add_shortcode( 'cr_custom_registration', 'custom_registration_shortcode' );
//require_once 'contents/redirection.php';

add_action('admin_menu', 'add_Admin_Link', 1);

//Permet d'envoyer des mails avec le format html
function wp_mail_set_content_type()
{
    return "text/html";
}
add_filter('wp_mail_content_type', 'wp_mail_set_content_type');
