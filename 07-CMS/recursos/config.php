<?php
    ob_start();

    session_start();
    // $_SESSION['id'] = null

    // ⚡⚡ LECTURA EXTERNA DE PLANTILLAS
    defined("DS") ? NULL : define('DS', DIRECTORY_SEPARATOR);
    # ARCHIVOS . DS . CAPRTAMENOR . DS
    
    defined('TEMPLATE_FRONT') ? NULL : define('TEMPLATE_FRONT', __DIR__ . DS . "plantillas/front");
    //                                      D:\xampp\htdocs\DW2021-1\07-CMS\recursos
    defined('TEMPLATE_BACK') ? NULL : define('TEMPLATE_BACK', __DIR__ . DS . "plantillas/back");
    // echo __DIR__;

    // ⚡⚡ CONEXION A LA BASE DE DATOS

    defined("DB_HOST") ? NULL : define("DB_HOST", 'localhost');
    defined("DB_USER") ? NULL : define("DB_USER", 'root');
    defined("DB_PASS") ? NULL : define("DB_PASS", '');
    defined("DB_NAME") ? NULL : define("DB_NAME", 'dw2021_1_cms');

    $conexion = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);
    if(!$conexion){
        die("FALLO EN LA CONEXION " . mysqli_error($conexion));
    }

    require_once("funciones.php");

?>