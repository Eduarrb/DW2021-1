<?php include "conexion.php"; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LOGIN</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.0/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <h1 class="text-center">CRUD</h1>
                <form action="login.php" method="post">
                    <div class="form-group">
                        <label for="nickname">Nombre de usuario</label>
                        <input type="text" class="form-control" name="nickname" id="nickname">
                    </div>
                    <div class="form-group">
                        <label for="pass">Contraseña</label>
                        <input type="password" name="password" id="pass" class="form-control">
                    </div>
                    <div class="form-group">
                        <input type="submit" value="Crear" class="btn btn-success" name="crear">
                        <input type="submit" value="Ver Usuarios" class="btn btn-primary" name="ver_usuarios">
                    </div>
                </form>
                <?php

                    if(isset($_POST['crear'])){
                        // echo 'funciona';
                        $nickname = $_POST['nickname'];
                        $pass = $_POST['password'];

                        // echo $nickname . $pass;

                        // 🔥🔥 QUERYS
                        $query = "INSERT INTO usuarios (user_nickname, user_pass) VALUES ('{$nickname}', '{$pass}')";
                        $query_resultado = mysqli_query($conexion, $query);

                        if(!$query_resultado){
                            die("Fallo en la conexión " .  mysqli_error($conexion));
                        }
                    }

                ?>
            </div>
            <div class="col-md-4">
                <h2 class="text-center">Resultados</h2>
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <td>ID</td>
                            <td>Nickname</td>
                            <td>Password</td>
                        </tr>
                    </thead>
                    <tbody>
                        <?php

                            if(isset($_POST['ver_usuarios'])){
                                // echo 'funciona';
                                $query = "SELECT * FROM usuarios";
                                $query_resultado = mysqli_query($conexion, $query);

                                if(!$query_resultado){
                                    die("Fallo en la conexión " . mysqli_error($conexion));
                                }

                                while($fila = mysqli_fetch_array($query_resultado)){
                                    // echo $fila;
                                    // print_r($fila);
                                    ?>
                                        <tr>
                                            <td><?php echo $fila['user_id']; ?></td>
                                            <td><?php echo $fila['user_nickname']; ?></td>
                                            <td><?php echo $fila['user_pass']; ?></td>
                                            <td>
                                                <a href="#" class="btn btn-sm btn-success">editar</a>
                                            </td>
                                            <td>
                                                <a href="#" class="btn btn-sm btn-danger">borrar</a>
                                            </td>
                                        </tr>       
                                <?php }
                            }

                        ?>
                        <!-- <tr>
                            <td>1</td>
                            <td>jaimito</td>
                            <td>123</td>
                            <td>
                                <a href="#" class="btn btn-sm btn-success">editar</a>
                            </td>
                            <td>
                                <a href="#" class="btn btn-sm btn-danger">borrar</a>
                            </td>
                        </tr>
                        <tr>
                            <td>2</td>
                            <td>joshi</td>
                            <td>1232456</td>
                            <td>
                                <a href="#" class="btn btn-sm btn-success">editar</a>
                            </td>
                            <td>
                                <a href="#" class="btn btn-sm btn-danger">borrar</a>
                            </td>
                        </tr> -->
                    </tbody>
                </table>
            </div>
            <div class="col-md-4">

            </div>
        </div>
    </div>
</body>
</html>