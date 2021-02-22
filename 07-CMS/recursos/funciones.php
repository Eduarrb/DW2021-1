<?php

    function f_query($sql){
        global $conexion;
        return mysqli_query($conexion,$sql);
    }

    // FUNCION QUE VALIDAR ERRORES EN LA CONSULTA EN MYSQL
    function f_confirmar($resultado){
        global $conexion;
        if(!$resultado){
            die("Fallo en la conexion " . mysqli_error($conexion));
        }
    }

    function f_fetch_array($resultado){
        return mysqli_fetch_array($resultado);
    }

?>