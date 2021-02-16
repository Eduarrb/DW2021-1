<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h4>SWICTH</h4>
    <?php

        $numero = 51;

        switch($numero){
            case 50:
                echo "el numero es 50";
                break;
            case 100:
                echo "el numero es 100";
                break;
            default:
                echo "no es ninguno de los anteriores";
                break;
        }

    ?>
    <h4>WHILE</h4>
    <?php

        $contador = 0;
        while($contador <= 5){
            echo $contador;
            echo '<br>';
            $contador += 2;
            // $contador = $contador + 2;
        }
    ?>

    <h4>FOOR LOOP</h4>
    <?php

        for($i = 0; $i < 10; $i++){
            echo "contador = " . $i . '<br>';
        }

        $personajes = ['Joshi', 'mario', 'Ryu', 'Snake', 'Pacman', 'Zelda'];

        // echo $personajes.length;

        // persona.contar()

        foreach($personajes as $item){
            echo $item . '<br>';
        }

    ?>
</body>
</html>