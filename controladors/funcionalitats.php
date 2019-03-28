<?php
    //---------------------------------WIDGET Dashboard-------------------------
    function crear_widget_dashboard() {

    	wp_add_dashboard_widget(
                     'widget_hora_dashboard',
                     'Widget Tauler de Control',
                     'funcio_widget_dashboard'
            );
    }
    if (estat_modul_funcionalitats("estat_widget_hora")=="true"){
        add_action( 'wp_dashboard_setup', 'crear_widget_dashboard' );
    }
    function funcio_widget_dashboard() {
    	echo pintar_cos_widgets();
    }
    //---------------------------------WIDGET Sidebar---------------------------
    if (estat_modul_funcionalitats("estat_widget_hora")=="true"){
    	add_action( 'widgets_init', function(){
    		register_widget( 'Widget_Hora' );
    	});
	}
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
    if (estat_modul_funcionalitats("estat_widget_hora")=="true"){
        add_shortcode( 'widget_hora', 'shortcode_widget_hora' );
    }
    //---------------------------------Entrades Automatiques--------------------
    add_action( 'admin_post_formulari_entrades', 'dades_formulari_entrades');
    function dades_formulari_entrades(){

        $tipo = $_FILES['csv']['type'];
        $tamany = $_FILES['csv']['size'];
        if ($tipo=='application/vnd.ms-excel' && $tamany!=0){
            if(is_uploaded_file($_FILES['csv']['tmp_name'])){
              $registros = array();
              $fp = fopen ( $_FILES['csv']['tmp_name'] , "r" );
              while (( $data = fgetcsv ( $fp , 2048, ";")) !== false ) {
                  foreach($data as $row) {
                      $camps = explode(",",$row);
                      //Creem les entrades tantes com files hi hagi amb els camps del csv

                      $nova_entrada = array();
		                  $nova_entrada['post_title'] = 'Biografia de '.$camps[0]." ".$camps[1];

                      $nova_entrada['post_content'] = '<div style="color:black;">En <b>'.$camps[0]." ".$camps[1].'<b> es molt bona persona i viu a <b>'.$camps[2].'</b>, ha estudiat tant que ha arribat fins aqui. <table style="border: 2px solid black;">
                						<tbody>
                						<tr style="border: 2px solid black;">
                						<td><img class="wp-image-6038 aligncenter" src="https://i1.wp.com/www.franlopezcastillo.com/wp-content/uploads/2015/05/soy-el-puto-amo.png?fit=789%2C476&ssl=1" alt="" width="905" height="866" /></td>
                						<td style="border: 2px solid black;">  Ha estat creat en aquesta web perque es un crack! Quan el veguis saludal!</td>
                						</tr>
                						<tr style="border: 2px solid black;">
                						<td style="border: 2px solid black;"><img class="wp-image-6037 aligncenter" src="https://mcibarcelona.com/wp-content/uploads/2018/09/udelavida-1024x385.jpg" alt="" width="848" height="845" /></td>
                						<td>  Màster en la Universitat de la Vida</td>
                						</tr>
                						</tbody>
                						</table>
                            <div style="text-align:center; width:66%;">
                						<img style="width:100%;" src="https://ladiferenciaentre.info/wp-content/uploads/2018/05/biografia.jpg" alt="" /></div></div>';

                      $nova_entrada['post_type'] = 'post';
                		  $nova_entrada['post_status'] = 'publish';
                		  $nova_entrada['post_author'] = 1;
                		  $nova_entrada['post_category'] = array(8,39);

                      wp_insert_post( $nova_entrada );
                  }
                }
              fclose ( $fp );
            }
        }
        wp_redirect( admin_url( '/admin.php?page=gestio-menu-funcionalitats' ), 301 );
    }
    //---------------------------------Imatge WP Logo---------------------------
    add_action( 'admin_post_formulari_logo', 'dades_formulari_logo');
    function dades_formulari_logo(){

      $tipo = $_FILES['logo']['type'];
      $tamany = $_FILES['logo']['size'];

      if ($tipo=='image/jpeg' && $tamany!=0){
          if(is_uploaded_file($_FILES['logo']['tmp_name'])){
              global $wpdb;
              $foto=addslashes(file_get_contents($_FILES["logo"]["tmp_name"]));
              $wpdb->get_results( "insert into m09_pluguin_foto_logo (imatge) values ('".$foto."')" );
          }
      }
      wp_redirect( admin_url( '/admin.php?page=gestio-menu-funcionalitats' ), 301 );
    }
    function canviar_logo_login() {

      echo "<style type='text/css'>
        body.login div#login h1 a {
        background: url(data:image/png;base64,".base64_encode(recuperar_foto_logo()).") !important;
        background-size: 90px 90px !important;
        background-repeat: no-repeat !important;


        }
        </style>";

   }
   if (estat_modul_funcionalitats("estat_canviar_foto")=="true"){
   		add_action( 'login_enqueue_scripts', 'canviar_logo_login' );
	}
    function recuperar_foto_logo(){
        global $wpdb;
        $foto = $wpdb->get_row( "select imatge valorFoto from m09_pluguin_foto_logo where titol='foto_logo'" );
        return $foto->valorFoto;
    }
    function existeix_foto_logo(){
        global $wpdb;
        $foto = $wpdb->get_row( "select count(imatge) valorFoto from m09_pluguin_foto_logo where titol='foto_logo'" );
        if ($foto->valorFoto == 0){
            return "false";
        }else {
            return "true";
        }
    }
    add_action( 'admin_post_formulari_eliminar_logo', 'dades_formulari_eliminar_logo');
    function dades_formulari_eliminar_logo(){
        global $wpdb;
        $wpdb->get_results( "delete from m09_pluguin_foto_logo" );
        wp_redirect( admin_url( '/admin.php?page=gestio-menu-funcionalitats' ), 301 );
    }
    //---------------------------------Barra Inici------------------------------
    function pintar_barra(){
        include plugin_dir_path( __DIR__ ).'/vistes/vista_barra_inici.php';
    }
    if (estat_modul_funcionalitats("estat_barra_inici")=="true"){
        add_action('wp_head', 'pintar_barra');
    }
    //Funcions extra
    function pintar_cos_widgets(){
        return '<div style="text-align:center;padding:1em 0;"> <h2><a style="text-decoration:none;" href="https://www.zeitverschiebung.net/es/city/3117735"><span style="color:gray;">Hora actual a</span><br />Catalunya</a></h2> <iframe src="https://www.zeitverschiebung.net/clock-widget-iframe-v2?language=es&size=large&timezone=Europe%2FMadrid" width="100%" height="140" frameborder="0" seamless></iframe> </div>';
    }
    function comprobarDadesPerDefecte(){
      //Comprobarem que s'hagin creat les taules corresponents per poder utilitzar el pluguin
      global $wpdb;
      //Crear taula estats_moduls
      $wpdb->get_results( "CREATE TABLE IF NOT EXISTS m09_pluguin_estats_moduls ( id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY, nom VARCHAR(255) NOT NULL, estat VARCHAR(255) default 'false' NOT NULL )" );
      //Crear taula imatge logo
      $wpdb->get_results( "CREATE TABLE IF NOT EXISTS m09_pluguin_foto_logo ( id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY, imatge longblob, titol VARCHAR(255) default 'foto_logo' NOT NULL )" );
      //Crear taula dades_barra
      $wpdb->get_results( "CREATE TABLE IF NOT EXISTS m09_pluguin_dades_barra ( id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY, direccio VARCHAR(255) default '-' NOT NULL, telefon VARCHAR(255) default '-' NOT NULL, correu VARCHAR(255) default '-' NOT NULL, facebook VARCHAR(255) default '#' NOT NULL, instagram VARCHAR(255) default '#' NOT NULL, twitter VARCHAR(255) default '#' NOT NULL )" );

      //S'hi no hi ha dades de la barra creem les de per defecte
      $numParametres = $wpdb->get_row( "select count(id) numIds from m09_pluguin_estats_moduls" );
      if ($numParametres->numIds == 0){
          $wpdb->get_results( "insert into m09_pluguin_estats_moduls (nom, estat) values ('estat_canviar_foto','false')" );
          $wpdb->get_results( "insert into m09_pluguin_estats_moduls (nom, estat) values ('estat_barra_inici','false')" );
          $wpdb->get_results( "insert into m09_pluguin_estats_moduls (nom, estat) values ('estat_entrades_automatiques','false')" );
          $wpdb->get_results( "insert into m09_pluguin_estats_moduls (nom, estat) values ('estat_widget_hora','false')" );
          $wpdb->get_results( "insert into m09_pluguin_dades_barra (direccio, telefon, correu, facebook, instagram, twitter) values ('-','-','-','#','#','#')" );
      }
    }
    function estat_modul_funcionalitats($nom_modul){
          global $wpdb;
          $estat = $wpdb->get_row( "select estat esto from m09_pluguin_estats_moduls where nom='$nom_modul'" );
          return $estat->esto;
    }
    function recuperar_valor_barra($camp){
          global $wpdb;
          $valorCamp = $wpdb->get_row( "select $camp valorCamp from m09_pluguin_dades_barra where id=1" );
          return $valorCamp->valorCamp;
    }
    add_action( 'admin_post_formulari_funcionalitats', 'dades_formulari_funcionalitats');
    function dades_formulari_funcionalitats(){
        global $wpdb;

        if (isset($_POST['estat_hora'])){
          $wpdb->get_results( "update m09_pluguin_estats_moduls set estat='true' where nom='estat_widget_hora'" );
        }else{
          $wpdb->get_results( "update m09_pluguin_estats_moduls set estat='false' where nom='estat_widget_hora'" );
        }

        if (isset($_POST['estat_barra'])){
          $wpdb->get_results( "update m09_pluguin_estats_moduls set estat='true' where nom='estat_barra_inici'" );
        }else{
          $wpdb->get_results( "update m09_pluguin_estats_moduls set estat='false' where nom='estat_barra_inici'" );
        }

        if (isset($_POST['estat_entrades'])){
          $wpdb->get_results( "update m09_pluguin_estats_moduls set estat='true' where nom='estat_entrades_automatiques'" );
        }else{
          $wpdb->get_results( "update m09_pluguin_estats_moduls set estat='false' where nom='estat_entrades_automatiques'" );
        }

        if (isset($_POST['estat_foto'])){
          $wpdb->get_results( "update m09_pluguin_estats_moduls set estat='true' where nom='estat_canviar_foto'" );
        }else{
          $wpdb->get_results( "update m09_pluguin_estats_moduls set estat='false' where nom='estat_canviar_foto'" );
        }

        wp_redirect( admin_url( '/admin.php?page=gestio-menu-funcionalitats' ), 301 );
    }
    add_action( 'admin_post_formulari_barra', 'dades_formulari_barra');
    function dades_formulari_barra(){
        if ($_POST['direccio']!="" && $_POST['telefon']!="" && $_POST['correu']!="" && $_POST['facebook']!="" && $_POST['instagram']!="" && $_POST['twitter']!=""){
            global $wpdb;
            //echo $_POST['direccio'];
            $wpdb->get_results( "update m09_pluguin_dades_barra set direccio='".$_POST['direccio']."' where id=1" );
            $wpdb->get_results( "update m09_pluguin_dades_barra set telefon='".$_POST['telefon']."' where id=1" );
            $wpdb->get_results( "update m09_pluguin_dades_barra set correu='".$_POST['correu']."' where id=1" );
            $wpdb->get_results( "update m09_pluguin_dades_barra set facebook='".$_POST['facebook']."' where id=1" );
            $wpdb->get_results( "update m09_pluguin_dades_barra set instagram='".$_POST['instagram']."' where id=1" );
            $wpdb->get_results( "update m09_pluguin_dades_barra set twitter='".$_POST['twitter']."' where id=1" );
            wp_redirect( admin_url( '/admin.php?page=gestio-menu-funcionalitats' ), 301 );
        }
    }

?>
