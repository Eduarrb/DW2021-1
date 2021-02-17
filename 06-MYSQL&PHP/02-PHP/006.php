<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h4>FUNCIONES</h4>
    <?php
    
        function saludar(){
            echo "Hola a todos";
        }
        saludar();

        echo '<br>';

        function suma($num1, $num2){
            echo $num1 + $num2;
        }
        suma(2,2);

        echo '<br>';

        function decirHola(){
            saludar(); //callbacks
        }

        decirHola();

        function multi($num1, $num2){
            // $multi = $num1 * $num2;
            // return $multi;
            return $num1 * $num2;
            // sadjhsajd
            // sadjhsajkdhsa
        }

        function calc(){
            if(10 < 5){
                return '10 es mayor que 5';
            }
            if(10 === 10){
                return 'son iguales';
            }
        }

        $resultado = multi(6,2); 

        echo '<br>';
        echo $resultado;

        $num1 = 3242;

        function resta(){
            $num2 = 3;
            $num3 = 2;
            global $num1;
            return $num1 - $num2 - $num3;
        }
        echo '<br>';
        $resultadoResta = resta();
        echo $resultadoResta;
    ?>
    <h4>FUNCIONES MATEMATICAS</h4>
    <?php
        // EXPONENCIAL
        echo '<br>';
        echo pow(2,3); // 8
        echo '<br>';

        // NUMEROS ALEATORIOS
        echo rand(1,10);

        // RAIZ CUADRADA
        echo '<br>';
        echo sqrt(9); // 3
    
        // REDONDEAR DECIMALES
        echo '<br>';
        echo ceil(4.6); // 5
        echo '<br>';
        echo floor(4.6); // 4
        echo '<br>';
        echo round(4.6); // 5
        echo '<br>';
        echo round(4.3); // 4
    ?>
</body>
</html>