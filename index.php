<?php
/*
Plugin Name: M09_Funcionalitats_WP
Plugin URI:
Description: Pluguin que augmentarà les funcionalitats del wordpress
Version: 1.0
Author: EloiRoca
Author URI:
License:
License URI:
*/

//Encuarem els estils, JS, etc dins del wordpress
function encuar_estils_web(){
  $versio = "1.0.0";

  wp_enqueue_style( 'style_funcionalitats_pluguin', plugins_url( 'Pluguin_M09_Funcionalitats_WP/assets/css/estil.css'), array(), $versio);
  wp_enqueue_style( 'style_funcionalitats_pluguin_bootstrap', plugins_url( 'Pluguin_M09_Funcionalitats_WP/assets/css/bootstrap.css'), array(), $versio);
  wp_enqueue_script('script_funcionalitats_pluguin', plugins_url( 'Pluguin_M09_Funcionalitats_WP/assets/js/codi.js'), array('jquery'), $versio);
}
add_action('wp_enqueue_scripts', 'encuar_estils_web');
add_action('admin_enqueue_scripts', 'encuar_estils_web');

//Importarem el jQuery per poder utilitzar el fitxer
//echo '<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>';

//Carreguem les funcionalitats
include 'controladors\funcionalitats.php';
//S'hi es la primera vegada que executa el pluguin activarem les taules a la BD
comprobar_dadesPerDefecte();

//Funcio que creara els menus i submenu dins del panel dadministracio del WP
function crear_menu_pluguin(){
  add_menu_page('Pluguin_M09', 'Pluguin_M09', 'manage_options', 'gestio-menu', 'crear_menu_general',plugins_url( 'Pluguin_M09_Funcionalitats_WP/assets/img/icona-pluguin-petit.png' ));
  add_submenu_page( 'gestio-menu', 'Funcionalitats', 'Funcionalitats', 'manage_options', 'gestio-menu-funcionalitats', 'crear_menu_funcionalitats');
}
add_action('admin_menu', 'crear_menu_pluguin');


function crear_menu_general(){
    include 'vistes/vista_generalInformacio.php';
}
function crear_menu_funcionalitats(){
    include 'vistes/vista_funcionalitats.php';
}
