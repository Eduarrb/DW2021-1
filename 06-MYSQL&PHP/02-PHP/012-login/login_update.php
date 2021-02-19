<?php
    // echo $id;
    $query = "SELECT * FROM usuarios WHERE user_id = {$id}";
    $query_resultado = mysqli_query($conexion, $query);
    if(!$query_resultado){
        die("Fallo en la conexion " . mysqli_error($conexion));
    }

    $fila = mysqli_fetch_array($query_resultado);
    // print_r($fila);

?>
<h1 class="text-center">ACTUALIZAR</h1>
<form action="" method="post">
    <div class="form-group">
        <label for="nickname_update">Nombre de usuario</label>
        <input 
            type="text" 
            class="form-control" 
            name="nickname_update" 
            id="nickname_update"
            value="<?php echo $fila['user_nickname']; ?>"
        >
    </div>
    <div class="form-group">
        <label for="pass_update">Contraseña</label>
        <input 
            type="password" 
            name="password_update" 
            id="pass_update" 
            class="form-control"
            value="<?php echo $fila['user_pass']; ?>"
        >
    </div>
    <div class="form-group">
        <input type="submit" value="Editar" class="btn btn-success" name="editar">
    </div>
</form>
<?php
    if(isset($_POST['editar'])){
        // echo 'funcionaaaaaaaaaaaaaaaaaa';
        $nickname = $_POST['nickname_update'];
        $pass = $_POST['password_update'];

        // echo $nickname . $pass;

        $query = "UPDATE usuarios SET user_nickname = '{$nickname}', user_pass = '{$pass}' WHERE user_id = {$id}";
        $query_resultado = mysqli_query($conexion, $query);
        if(!$query_resultado){
            die("Fallo en la conexión " . mysqli_error($conexion));
        }
        header("Location: login.php");
    }
?>