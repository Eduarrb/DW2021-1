<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php

        $array1 = [1234, 878, '456454', 'Joshi', '<h1 class="titulo">Hola mundo</h1>'];

        // echo $array1;
        print_r($array1);

        echo $array1[3];

        echo '<br>';

        // 🔥🔥 ARRAYS ASOSIATIVOS
        // KEY - VALUE PAIR
        $nombres = ["primer_nombre" => "Eduardo", "apellido" => "Arroyo"];

        echo $nombres["primer_nombre"];

        echo '<br>';
 
        echo $nombres["primer_nombre"] . " " . $nombres["apellido"];
    ?>
</body>
</html>