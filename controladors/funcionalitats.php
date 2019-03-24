<?php

    //---------------------------------WIDGET Dashboard-------------------------
    function crear_widget_dashboard() {

    	wp_add_dashboard_widget(
                     'widget_hora_dashboard',
                     'Widget Tauler de Control',
                     'funcio_widget_dashboard'
            );
    }
    add_action( 'wp_dashboard_setup', 'crear_widget_dashboard' );
    function funcio_widget_dashboard() {
    	echo pintar_cos_widgets();
    }
    //---------------------------------WIDGET Sidebar---------------------------
    add_action( 'widgets_init', function(){
    	register_widget( 'Widget_Hora' );
    });

    class Widget_Hora extends WP_Widget {

    	public function __construct() {
        $widget_ops = array(
      		'classname' => 'my_widget',
      		'description' => 'Widget per pintar la hora actual a Catalunya',
      	);
      	parent::__construct( 'my_widget', 'Widget Hora', $widget_ops );
      }

    	public function widget( $args, $instance ) {echo pintar_cos_widgets();}
    }
    //---------------------------------WIDGET Shortcode-------------------------
    function shortcode_widget_hora( $atts, $content = null ) {
    	return pintar_cos_widgets();
    }
    add_shortcode( 'widget_hora', 'shortcode_widget_hora' );
    //---------------------------------Entrades Automatiques--------------------

    //---------------------------------Imatge WP Logo---------------------------

    //---------------------------------Barra Inici------------------------------
    function pintar_barra(){
        include plugin_dir_path( __DIR__ ).'/vistes/vista_barra_inici.php';
    }
    add_action('wp_head', 'pintar_barra');
    //Funcions extra
    function pintar_cos_widgets(){
        return '<div style="text-align:center;padding:1em 0;"> <h2><a style="text-decoration:none;" href="https://www.zeitverschiebung.net/es/city/3117735"><span style="color:gray;">Hora actual a</span><br />Catalunya</a></h2> <iframe src="https://www.zeitverschiebung.net/clock-widget-iframe-v2?language=es&size=large&timezone=Europe%2FMadrid" width="100%" height="140" frameborder="0" seamless></iframe> </div>';
    }
    function comprobar_dadesPerDefecte(){
      //Comprobarem que s'hagin creat les taules corresponents per poder utilitzar el pluguin
      global $wpdb;
      //Crear taula estats_moduls
      $wpdb->get_results( "CREATE TABLE IF NOT EXISTS m09_pluguin_estats_moduls ( id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY, nom VARCHAR(255) NOT NULL, estat VARCHAR(255) default 'false' NOT NULL )" );
      //Crear taula imatge logo

      //Crear taula dades_barra
      $wpdb->get_results( "CREATE TABLE IF NOT EXISTS m09_pluguin_dades_barra ( id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY, direccio VARCHAR(255) default '-' NOT NULL, telefon VARCHAR(255) default '-' NOT NULL, correu VARCHAR(255) default '-' NOT NULL, facebook VARCHAR(255) default '#' NOT NULL, instagram VARCHAR(255) default '#' NOT NULL, twitter VARCHAR(255) default '#' NOT NULL )" );

      //S'hi no hi ha entrades de parametres creem els de per defecte
      $numParametres = $wpdb->get_row( "select count(id) numIds from m09_pluguin_estats_moduls" );
      if ($numParametres->numIds == 0){
          $wpdb->get_results( "insert into m09_pluguin_estats_moduls (nom, estat) values ('estat_canviar_foto','false')" );
          $wpdb->get_results( "insert into m09_pluguin_estats_moduls (nom, estat) values ('estat_barra_inici','false')" );
          $wpdb->get_results( "insert into m09_pluguin_estats_moduls (nom, estat) values ('estat_entrades_automatiques','false')" );
          $wpdb->get_results( "insert into m09_pluguin_estats_moduls (nom, estat) values ('estat_widget_hora','false')" );
          $wpdb->get_results( "insert into m09_pluguin_dades_barra (direccio, telefon, correu, facebook, instagram, twitter) values ('-','-','-','#','#','#')" );
      }
    }
?>
