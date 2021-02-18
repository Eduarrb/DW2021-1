<?php
    // direccion servidor, usuario, pass, nombre del DB
    $conexion = mysqli_connect('localhost', 'root', '', 'dw2021_1');
    // if($conexion){
    //     echo 'conexion exitosa';
    // }
    if(!$conexion){
        die('Fallo en la conexion ' . mysqli_error($conexion));
    }
?>