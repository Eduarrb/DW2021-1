
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>METODOS DE PETICIONES AL SERVIDOR</h1>
    <!-- POST  /  GET  -->
    <!-- 
        POST -> GUARDAR, BORRAR, ACTUALIZAR DATA
        GET  -> OBTENER DATA

        CRUD
        C -> CREATE
        R -> READ
        U -> UPDATE
        D -> DELETE
     -->
    <form action="008.php" method="post">
        <!-- 
            phone
            mail
            number
            text
            password
            date
         -->
        <label for="nombre">NOMBRE</label>
        <input type="text" name="name" id="nombre" required>
        <img src="" alt="">
        <br>
        <label for="password">Password</label>
        <input type="password" name="password" id="password">
        <br>
        <input type="submit" name="enviar" value="Enviar data">
    </form>
    <?php

        if(isset($_POST['enviar'])){
            // echo 'funciona';
            $nombre = $_POST['name'];
            // echo $nombre;
            $pass = $_POST['password'];
            // echo $nombre;
            // echo $pass;

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
</body>
</html>

    