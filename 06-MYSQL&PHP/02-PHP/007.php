<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h4>FUNCIONES CON ARRAYS</h4>
    <?php
        $lista = [654, 687, 6878, 36, 784, 3687];
        echo max($lista); //
        echo '<br>';
        echo min($lista);
        echo '<br>';
        sort($lista);
        print_r($lista);

        $nombres = ['Joshi', 'Juan', 'Jean', 'Almendra', 'Pepito'];
        sort($nombres);
        echo '<br>';
        print_r($nombres);
    ?>
    <h4>FUNCIONES CON STRINGS</h4>
    <?php
        $palabra = "Hola, Soy estudiante de php";
        echo strlen($palabra);
        echo '<br>';

        echo strtoupper($palabra);
        echo '<br>';
        echo strtolower($palabra);
        echo '<br>';

        print_r($nombres);
    ?>
</body>
</html>