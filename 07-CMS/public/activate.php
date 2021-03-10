<?php

    require_once("../recursos/config.php");

    if(!isset($_GET['email']) || !isset($_GET['token'])){
        f_crear_msj(f_mostrar_msj_danger("Correo & Token erroneos!!"));
        f_redirigir("register.php");
    }
    else{
        f_activar_usuario();
    }
?>