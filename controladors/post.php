<?php


    //Carreguem les funcionalitats
    include 'funcionalitats.php';
    if (isset($_POST['submit'])){
        $estats_moduls = array();
        if (isset($_POST['estat_hora'])){
          $estats_moduls['estat_hora']="true";
        }else{
          $estats_moduls['estat_hora']="false";
        }

        if (isset($_POST['estat_barra'])){
          $estats_moduls['estat_barra']="true";
        }else{
          $estats_moduls['estat_barra']="false";
        }

        if (isset($_POST['estat_entrades'])){
          $estats_moduls['estat_entrades']="true";
        }else{
          $estats_moduls['estat_entrades']="false";
        }

        if (isset($_POST['estat_foto'])){
          $estats_moduls['estat_foto']="true";
        }else{
          $estats_moduls['estat_foto']="false";
        }
        guardar_estat_moduls();
    }else{
        echo "string";
    }
    //print_r($_POST);






?>
