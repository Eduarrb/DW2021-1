<?php
    if(isset($_POST['enviar'])){
        // echo 'funciona';
        $nombre = $_POST['nombre'];
        $pass = $_POST['pass'];

        $max = 10;
        $min = 5;

        if(strlen($nombre) < $min){
            echo "El nombre de usuario debe tener mas de 5 caracteres";
        }
        if(strlen($nombre) > $max){
            echo "El nombre de usuario no debe ser mayor a 10 caracteres";
        }


        $usuarios = ['eduardo', 'maria', 'jaimito'];

        if(in_array($nombre, $usuarios)){
            echo 'Bienvenido ' . $nombre; 
        }
        else{
            echo 'Usuario no autorizado';
        }
    }
?>