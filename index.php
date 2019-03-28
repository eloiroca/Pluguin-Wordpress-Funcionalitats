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
//if (get_admin_page_title()=="Funcionalitats"){
    add_action('admin_enqueue_scripts', 'encuar_estils_web');
//}



//Carreguem les funcionalitats
include_once 'controladors\funcionalitats.php';
//S'hi es la primera vegada que executa el pluguin activarem les taules a la BD
comprobarDadesPerDefecte();

//Funcio que creara els menus i submenu dins del panel dadministracio del WP
function crear_menu_pluguin_funcionalitats(){
  add_menu_page('Pluguin_M09', 'Pluguin_M09', 'manage_options', 'gestio-menus', 'crear_menu_general_funcionalitats',plugins_url( 'Pluguin_M09_Funcionalitats_WP/assets/img/icona-pluguin-petit.png' ));
  add_submenu_page( 'gestio-menus', 'Funcionalitats', 'Funcionalitats', 'manage_options', 'gestio-menu-funcionalitats', 'crear_menu_funcionalitats');
}
add_action('admin_menu', 'crear_menu_pluguin_funcionalitats');


function crear_menu_general_funcionalitats(){
    include_once 'vistes/vista_generalInformacio.php';
}
function crear_menu_funcionalitats(){
    include_once 'vistes/vista_funcionalitats.php';
}
