<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h2>OPERADORES DE COMPARACIÓN</h2>
    <pre>
        igual ==
        identico ===
        comparación >, <, >=, <=
        no igual !=, <>
        no identico !==
    </pre>
    <h2>OPERADORES LOGICOS</h2>
    <pre>
        and &&
        or ||
        not !
    </pre>
    <?php

        if(10 > 0){
            echo '10 es mayor que 0';
            echo '<br>';
        }
        if(10 === 10){
            echo 'son iguales';
            echo '<br>';
        }
        // true - false
        if(3 < 9 && 30 == 31){
            echo 'ambas condiciones son verdaderas';
            echo '<br>';
        }
        else{
            echo 'una o mas condiciones no son verdaderas';
            echo '<br>';
        }

        if(44 === 4 || 200 < 100){
            echo "una o ambas condiciones son verdaderas";
            echo '<br>';
        }
        else{
            echo "ambas condiones no son verdaderas";
            echo '<br>';
        }

        if(5 <> 4){
            echo "ambos son diferentes";
            echo '<br>';
        }

    ?>
</body>
</html>