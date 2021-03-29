<?php
    ob_start();

    session_start();
    //lecura externad eplantillas
    // defined("DS") ? NULL : define("DS", DIRECTORY_SEPARATOR);
    // defined('TEMPLATE_FRONT') ? NULL : define('TEMPLATE_FRONT', __DIR__ . DS . "plantillas/front" );
    // defined('TEMPLATE_BACK') ? NULL : define('TEMPLATE_BACK',__DIR__ . DS . "plantillas/back" );
  
    // conexion abase de datos y 
    defined("DB_HOST") ? NULL : define("DB_HOST",'localhost');
    defined("DB_USER") ? NULL : define("DB_USER",'root');
    defined("DB_PASS") ? NULL : define("DB_PASS",'');
    defined("DB_NAME") ? NULL : define("DB_NAME",'dw2021_tarea');

    $conexion = mysqli_connect(DB_HOST, DB_USER, DB_PASS,DB_NAME);


    require_once("funciones.php");
?>