<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <!-- SOY UN COMENTARIO HTML -->
    <!--  -->
    <?php
        // SOY UN COMENTARIO PHP
        /* 
            SOY LA LINEA 1 DEL COMENTARIO
            SOY LA LINEA 2 DEL COMENTARIO
        */
        # TAMBIEN SOY UN COMENTARIO
        
        // 🔥🔥 VARIABLES
        $nombre = 'Eduardo Arroyo';
        $numero = 1254564867;
        $decimal = 131232.545564;
        $bool = false;

        echo $nombre;

        echo $numero;
        echo $bool;
    ?>

    <h1>Hola <?php echo $nombre; ?></h1>

    <?php

        echo $nombre . $numero;

        // OPERACIONES MATEMATICAS +, -, /, *, ETC
        echo $decimal + $numero;
        echo '<br>';
        echo 'soy otro texto';

    ?>
</body>
</html>