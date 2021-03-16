<?php

    function f_query($sql){
        global $conexion;
        return mysqli_query($conexion,$sql);
    }

    // FUNCION QUE VALIDAR ERRORES EN LA CONSULTA EN MYSQL
    function f_confirmar($resultado){
        global $conexion;
        if(!$resultado){
            die("Fallo en la conexion " . mysqli_error($conexion));
        }
    }

    function f_fetch_array($resultado){
        return mysqli_fetch_array($resultado);
    }
    // EVITAR SQL INJECTIONS
    function f_escape_string($string){
        global $conexion;
        return mysqli_real_escape_string($conexion, $string);
    }

    function f_redirigir($location){
        header("Location: $location");
        // www.google.com
    }

    function f_crear_msj($msj){
        if(!empty($msj)){
            $_SESSION['mensaje'] = $msj;
            // $_SESSION['miconejito'] = $msj;
            // $_SESSION['karlita'] = "hola";
        }
        else{
            $msj = '';
        }
    }
    function f_mostrar_msj(){
        if(isset($_SESSION['mensaje'])){
            echo $_SESSION['mensaje'];
            unset($_SESSION['mensaje']);
        }
    }
    function f_mostrar_msj_success($msj){
        $msj = <<<DELIMITADOR
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>Holy guacamole!</strong> {$msj}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
DELIMITADOR;
        return $msj;
    }
    function f_mostrar_msj_danger($msj){
        $msj = <<<DELIMITADOR
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong>Holy guacamole!</strong> {$msj}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
DELIMITADOR;
        return $msj;
    }
    function f_email_existe($email){
        $query = f_query("SELECT * FROM usuarios WHERE user_email = '{$email}'");
        if(mysqli_num_rows($query) >= 1){
            return true;
        }
        return false;
    }

    // ⚡⚡ FRONT
    // $_SESSION['jaimito'] = 'jaimito';
    // $num = 1;

    function f_restablecer_pass(){
        if(!isset($_COOKIE['temp_access_code'])){
            f_crear_msj(f_mostrar_msj_danger("Lo sentimos, el tiempo de validacion ha caducado, intentelo otra vez"));
            f_redirigir("forgot-password.php");
        }
        else if(empty($_GET['email']) && empty($_GET['token'])){
            f_crear_msj(f_mostrar_msj_danger("Lo sentimos, no se pudo verificar los datos!"));
            f_redirigir("forgot-password.php");
        }
        else{
            if(isset($_POST['restablecer'])){
                // echo "funciona";
                $user_email = f_escape_string(trim($_GET['email']));
                $user_token = f_escape_string(trim($_GET['token']));

                $query = f_query("SELECT * FROM usuarios WHERE user_email = '{$user_email}' AND user_token = '{$user_token}'");
                f_confirmar($query);
                
                if(mysqli_num_rows($query) == 1){
                    $user_pass = f_escape_string(trim($_POST['user_pass']));
                    $user_pass_confirm = f_escape_string(trim($_POST['user_pass_confirm']));

                    if($user_pass != $user_pass_confirm){
                        f_crear_msj(f_mostrar_msj_danger("Las contraseñas no coinciden"));
                        // restablecer.php?email=eduardo@gmail.com&token=d91b82ff1e1adef741352a7743f7a3f5
                        f_redirigir("restablecer.php?email={$user_email}&token={$user_token}");
                    }
                    else{
                        $user_pass = password_hash($user_pass, PASSWORD_BCRYPT, array('cost' => 12));
                        $query = f_query("UPDATE usuarios SET user_pass = '{$user_pass}', user_token = '' WHERE user_email = '{$user_email}'");
                        f_confirmar($query);
                        // unset($_COOKIE['temp_access_code']);
                        setcookie("temp_access_code", "null", time());
                        f_crear_msj(f_mostrar_msj_success("Cambio de contraseñas exitoso, Inicie sesión"));
                        f_redirigir("login.php");
                    }
                }
                else{
                    f_crear_msj(f_mostrar_msj_danger("Lo sentimos, datos invalidos. Intentelo otra vez"));
                    f_redirigir('forgot-password.php');
                }

            }
        }
        // if(isset($_POST['restablecer'])){
        //     if(!isset($_GET['email']) && !isset($_GET['token'])){
        //         f_crear_msj(f_mostrar_msj_danger("Lo sentimos, no se pudo verificar los datos"));
        //         f_redirigir("forgot-password.php");
        //     }
        // }
    }
    function f_token_generador(){
        return $token = $_SESSION['token'] = md5(uniqid(mt_rand(), true));
    }
    function f_recover_password(){
        if(isset($_POST['restablecer'])){
            if(isset($_SESSION['token']) && $_SESSION['token'] == $_POST['token']){
                $user_email = f_escape_string(trim($_POST['user_email']));
                // echo $user_email;
                if(f_email_existe($user_email)){
                    // echo "el correo existe";
                    $codigo_validacion = md5($user_email . microtime());
                    // 🔥🔥 la hora del servidor esta 7 horas adelantado 
                    setcookie("temp_access_code", $codigo_validacion, time() + 300);
                    $query = f_query("UPDATE usuarios SET user_token = '{$codigo_validacion}' WHERE user_email = '{$user_email}'");
                    f_confirmar($query);
                    // f_send_email($email, $asunto, $msj, $headers=null)
                    $asunto = "RESTABLECER CONTRASEÑA";
                    $msj = "Haga click en el enlace para cambiar su contraseña <a href='http://localhost/dw2021-1/07-CMS/public/restablecer.php?email={$user_email}&token={$codigo_validacion}'>RESTABLECER CONTRASEÑA</a>";
                    $headers = "De: noreply@tudominio.com";

                    if(!f_send_email($user_email, $asunto, $msj, $headers)){
                        f_crear_msj(f_mostrar_msj_danger("El correo no se puedo enviar!"));
                        f_redirigir("forgot-password.php");
                    }
                    f_crear_msj(f_mostrar_msj_success("Se ha enviado un correo a tu cuenta, por favor verifique para restablecer su contraseña!"));
                    f_redirigir("forgot-password.php");
                }
                else{
                    f_crear_msj(f_mostrar_msj_danger("El correo no existe!"));
                    f_redirigir("forgot-password.php");
                }

            }
            else{
                // echo 'el token no es correcto';
                f_crear_msj(f_mostrar_msj_danger("Lo sentimos, no se puede completar la operación!"));
                f_redirigir("forgot-password.php");
            }
        }
    }
    function f_login_user($email, $pass){
        // algoritmo de inicio de sesion
        $query = f_query("SELECT * FROM usuarios WHERE user_email = '{$email}' AND user_status = 1");
        f_confirmar($query);

        if(mysqli_num_rows($query) == 1){
            $fila = f_fetch_array($query);
            $user_id = $fila['user_id'];
            $user_nombre = $fila['user_nombre'];
            $user_apellido = $fila['user_apellido'];
            $user_pass = $fila['user_pass'];
            $user_rol = $fila['user_rol'];

            if(password_verify($pass, $user_pass)){
                // 1) SESIONES
                $_SESSION['user_id'] = $user_id;
                $_SESSION['usuario'] = $user_nombre . " " . $user_apellido;
                $_SESSION['user_rol'] = $user_rol;
                return true;
            }
            else{
                return false;
            }
        }
        else{
            return false;
        }
    }
    function f_validar_user_login(){
        if(isset($_POST['login'])){
            // echo 'funciona';
            $user_email = f_escape_string(trim($_POST['user_email']));
            $user_pass = f_escape_string(trim($_POST['user_pass']));

            // echo $user_email . $user_pass;
            if(f_login_user($user_email, $user_pass)){
                f_redirigir('./');
            }
            else{
                f_crear_msj(f_mostrar_msj_danger('Tu correo o password son incorrectos'));
                f_redirigir("login.php");
            }
        }
    }
    function f_activar_usuario(){
        // echo 'usuario activado';
        if(isset($_GET['email']) && isset($_GET['token'])){
            $user_email = f_escape_string(trim($_GET['email']));
            $user_token = f_escape_string(trim($_GET['token']));

            $query = f_query("SELECT * FROM usuarios WHERE user_email = '{$user_email}' AND user_token = '{$user_token}'");
            f_confirmar($query);

            $fila = f_fetch_array($query);
            // key - value pair
            // user_id => 1
            $user_id = $fila['user_id'];

            if(mysqli_num_rows($query) == 1){
                $query = f_query("UPDATE usuarios SET user_status = 1, user_token = '' WHERE user_id = {$user_id}");
                f_confirmar($query);
                f_crear_msj(f_mostrar_msj_success("Su cuenta ha sido verificada, por favor inicie sesión"));
                f_redirigir("login.php");
            }
        }
    }
    function f_validar_user_reg(){
        $min = 4;
        $max = 20;

        $errores = [];

        if(isset($_POST['registrar'])){
            // echo 'funciona';
            $user_nombre = f_escape_string(trim($_POST['user_nombre']));
            $user_apellido = f_escape_string(trim($_POST['user_apellido']));
            $user_email = f_escape_string(trim($_POST['user_email']));
            $user_pass = f_escape_string(trim($_POST['user_pass']));
            $user_passConfirm = f_escape_string(trim($_POST['user_passConfirm']));

            if(strlen($user_nombre) < $min){
                // echo 'tu nombre debe tener mas de 4 caracteres!';
                $errores[] = "Tu nombre no puede ser menos de {$min} caracteres";
            }
            if(strlen($user_nombre) > $max){
                $errores[] = "Tu nombre no puede tener mas de {$max} caracteres";
            }
            if(strlen($user_apellido) < $min){
                // echo 'tu apellido debe tener mas de 4 caracteres!';
                $errores[] = "Tu apellido no puede ser menos de {$min} caracteres";
            }
            if(strlen($user_apellido) > $max){
                $errores[] = "Tu apellido no puede tener mas de {$max} caracteres";
            }
            // verdadero o falso
            if(f_email_existe($user_email)){
                $errores[] = "Lo sentimos, el correo {$user_email} ya existe!";
            }
            if($user_pass != $user_passConfirm){
                $errores[] = "Las contraseñas deben ser iguales";
            }
            if(!empty($errores)){
                foreach($errores as $error){
                    echo f_mostrar_msj_danger($error);
                }
            }
            else{
                if(f_registrar_usuario($user_nombre, $user_apellido, $user_email, $user_pass)){
                    f_crear_msj(f_mostrar_msj_success("Registro satisfactorio, revisa tu correo o cuenta de spam para la activación de tu cuenta. Esto puede tardar unos minutos!"));
                    f_redirigir("register.php");
                }
                else{
                    f_crear_msj(f_mostrar_msj_danger("Lo sentimos, no pudimos registrar tu usuario!"));
                    f_redirigir("register.php");
                }
            }
        }
    }
    function f_registrar_usuario($nombre, $apellido, $email, $pass){
        $user_nombre = f_escape_string(trim($nombre));
        $user_apellido = f_escape_string(trim($apellido));
        $user_email = f_escape_string(trim($email));
        $user_pass = f_escape_string(trim($pass));

        if(f_email_existe($user_email)){
            return false;
        }
        else{
            // 1) ENCRIPTAR PASS
            $user_pass = password_hash($user_pass, PASSWORD_BCRYPT, array('cost' => 12));
            // 2) MANDAR CORREOS PARA ACTIVACION DE USUARIO
            $user_token = md5($user_email . microtime());
            $query = f_query("INSERT INTO usuarios (user_nombre, user_apellido, user_email, user_pass, user_token, user_rol) VALUES ('{$user_nombre}', '{$user_apellido}', '{$user_email}', '{$user_pass}', '{$user_token}', 'suscriptor')");
            f_confirmar($query);
            $mensaje = "Por favor has click en el boton o en el enlace para activar tu cuenta. \n <a href='http://localhost/dw2021-1/07-CMS/public/activate.php?email={$user_email}&token={$user_token}'>Activar cuenta</a>";
            f_send_email($user_email, 'Activacion de cuenta', $mensaje);
            return true;
        }
        // return true;
    }

    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\SMTP;
    use PHPMailer\PHPMailer\Exception;

    // require '../vendor/autoload.php';

    function f_send_email($email, $asunto, $msj, $headers=null){
        $mail = new PHPMailer();
        $mail->isSMTP();
        $mail->Host = 'smtp.mailtrap.io';
        $mail->SMTPAuth = true;
        $mail->Username = '5c040c9f941e53';
        $mail->Password = '939e9aa1c7e00f';
        $mail->Port = 2525;
        $mail->SMTPSecure = 'tls';
        $mail->isHTML(true);
        $mail->CharSet = 'UTF-8';

        $mail->setFrom('registro@blogeduardo.com', 'admin');
        $mail->addAddress($email);
        $mail->Subject = $asunto;
        $mail->Body = $msj;
        if($mail->send()){
            $emailSent = true;
        }
    }

    function f_show_comentarios_front($post_id){
        $query = f_query("SELECT * FROM comentarios WHERE com_post_id = {$post_id} AND com_status = 'aprobado' ORDER BY com_id DESC");
        f_confirmar($query);
        while($fila = f_fetch_array($query)){
            $comentarios = <<<DELIMITADOR
                <div class="media mb-4">
                    <img class="d-flex mr-3 rounded-circle" src="http://placehold.it/50x50" alt="">
                    <div class="media-body">
                        <div class="d-flex justify-content-between">
                            <h5 class="mt-0">{$fila['com_nombre']}</h5>
                            <div>{$fila['com_fecha']}</div>
                        </div>
                        {$fila['com_mensaje']}
                    </div>
                </div>
DELIMITADOR;
            echo $comentarios;
        }

    }
    function f_comentarios_add($post_id){
        if(isset($_POST['guardar'])){
            // echo 'funcionaaaaaaaa';
            $com_nombre = f_escape_string(trim($_POST['com_nombre']));
            $com_email = f_escape_string(trim($_POST['com_email']));
            $com_mensaje = f_escape_string(trim($_POST['com_mensaje']));

            $query = f_query("INSERT INTO comentarios (com_post_id, com_nombre, com_email, com_mensaje, com_fecha, com_status) VALUES ({$post_id}, '{$com_nombre}', '{$com_email}', '{$com_mensaje}', NOW(), 'pendiente')");
            f_confirmar($query);
            f_redirigir("post.php?post_id={$post_id}");
        }
    }
    function f_show_posts_front(){
        $query = f_query("SELECT * FROM posts");
        f_confirmar($query);
        while($fila = f_fetch_array($query)){
            $posts = <<<DELIMITADOR

            <div class="card mb-4">
                <img class="card-img-top" src="img/{$fila['post_img']}" alt="{$fila['post_titulo']}">
                <div class="card-body">
                    <h2 class="card-title">{$fila['post_titulo']}</h2>
                    <p class="card-text">
                        {$fila['post_contenido']}
                    </p>
                    <a href="post.php?post_id={$fila['post_id']}" class="btn btn-primary">Leer más &rarr;</a>
                </div>
                <div class="card-footer text-muted">
                    Publicado el {$fila['post_fecha']} por
                    <a href="#">{$fila['post_autor']}</a>
                </div>
            </div>                
DELIMITADOR;
            echo $posts;
        }
    }

    // ⚡⚡ BACK
    function f_comentarios_aprobar(){
        if(isset($_GET['aprobar'])){
            $com_id = f_escape_string(trim($_GET['aprobar']));
            // echo $com_id;
            $query = f_query("UPDATE comentarios SET com_status = 'aprobado' WHERE com_id = {$com_id}");
            f_confirmar($query);
            f_crear_msj(f_mostrar_msj_success("Comentario aprobado correctamente!"));
            f_redirigir("index.php?comentarios");
        }
    }
    function f_show_comentarios_back(){
        $query = f_query("SELECT b.post_titulo AS titulo_post, a.* FROM comentarios a INNER JOIN posts b ON a.com_post_id = b.post_id WHERE com_status = 'pendiente'");
        f_confirmar($query);
        while($fila = f_fetch_array($query)){
            $comentarios = <<<DELIMITADOR
                <tr>
                    <td>{$fila['com_id']}</td>
                    <td>
                        <a href="../post.php?post_id={$fila['com_post_id']}" target="_blank">{$fila['titulo_post']}</a>
                    </td>
                    <td>{$fila['com_nombre']}</td>
                    <td>{$fila['com_email']}</td>
                    <td>{$fila['com_mensaje']}</td>
                    <td>{$fila['com_fecha']}</td>
                    <td>{$fila['com_status']}</td>
                    <td>
                        <a href="index.php?comentarios&aprobar={$fila['com_id']}" class="btn btn-primary">aprobar</a>
                    </td>
                    <td>
                        <a href="#" class="btn btn-danger">borrar</a>
                    </td>
                </tr>
DELIMITADOR;
            echo $comentarios;
        }
    }
    function f_posts_edit($post_id){
        if(isset($_POST['guardar'])){
            $post_titulo = f_escape_string(trim($_POST['post_titulo']));
            $post_cat_id = f_escape_string(trim($_POST['post_cat_id']));
            $post_autor = f_escape_string(trim($_POST['post_autor']));
            $post_fecha = f_escape_string(trim($_POST['post_fecha']));
            $post_contenido = f_escape_string(trim($_POST['post_contenido']));
            $post_tags = f_escape_string(trim($_POST['post_tags']));
            $post_status = f_escape_string(trim($_POST['post_status']));
            
            $post_img = f_escape_string(trim($_FILES['post_img']['name']));
            $post_img_temp = $_FILES['post_img']['tmp_name'];

            move_uploaded_file($post_img_temp, "../img/{$post_img}");

            if(empty($post_img)){
                $query = f_query("SELECT * FROM posts WHERE post_id = {$post_id}");
                f_confirmar($query);
                $fila = f_fetch_array($query);
                $post_img = $fila['post_img'];
            }

            $query = f_query("UPDATE posts SET post_titulo = '{$post_titulo}', post_cat_id = {$post_cat_id}, post_autor = '{$post_autor}', post_fecha = '{$post_fecha}', post_contenido = '{$post_contenido}', post_tags = '{$post_tags}', post_status = '{$post_status}', post_img = '{$post_img}' WHERE post_id = {$post_id}");
            f_confirmar($query);
            f_crear_msj(f_mostrar_msj_success('Post editado correctamente'));
            f_redirigir('index.php?posts');
        }
    }
    function f_posts_add(){
        if(isset($_POST['guardar'])){
            // echo 'funciona';
            $post_titulo = f_escape_string(trim($_POST['post_titulo']));
            // echo $post_titulo;
            $post_cat_id = f_escape_string(trim($_POST['post_cat_id']));
            $post_autor = f_escape_string(trim($_POST['post_autor']));
            $post_fecha = f_escape_string(trim($_POST['post_fecha']));
            $post_contenido = f_escape_string(trim($_POST['post_contenido']));
            $post_tags = f_escape_string(trim($_POST['post_tags']));
            $post_status = f_escape_string(trim($_POST['post_status']));
            
            // $post_img = $_FILES['post_img'];
            $post_img = f_escape_string(trim($_FILES['post_img']['name']));
            $post_img_temp = $_FILES['post_img']['tmp_name'];
            // print_r($post_img);
            // $post_img = f_escape_string(trim($_POST['post_img']));
            move_uploaded_file($post_img_temp, "../img/{$post_img}");

            $query = f_query("INSERT INTO posts (post_titulo, post_cat_id, post_autor, post_fecha, post_img, post_contenido, post_tags, post_status) VALUES ('{$post_titulo}', {$post_cat_id}, '{$post_autor}', '{$post_fecha}', '{$post_img}', '{$post_contenido}', '{$post_tags}', '{$post_status}')");
            f_confirmar($query);
            f_crear_msj(f_mostrar_msj_success('Post creado correctamente!!!'));
            f_redirigir('index.php?posts');
        }
    }
    function f_show_posts_admin(){
        $query = f_query("SELECT * FROM posts");
        f_confirmar($query);
        while($fila = f_fetch_array($query)){
            $posts = <<<DELIMITADOR
                <tr>
                    <td>{$fila['post_id']}</td>
                    <td>{$fila['post_cat_id']}</td>
                    <td>{$fila['post_titulo']}</td>
                    <td>{$fila['post_autor']}</td>
                    <td>{$fila['post_fecha']}</td>
                    <td>
                        <img src="../img/{$fila['post_img']}" alt="" width="150px">
                    </td>
                    <td>{$fila['post_contenido']}</td>
                    <td>{$fila['post_tags']}</td>
                    <td>{$fila['post_vistas']}</td>
                    <td>{$fila['post_status']}</td>
                    <td>
                        <a href="index.php?posts_edit={$fila['post_id']}" class="btn btn-primary">editar</a>
                    </td>
                    <td>
                        <a href="index.php?posts&delete={$fila['post_id']}" class="btn btn-danger">borrar</a>
                    </td>
                </tr>
DELIMITADOR;
            echo $posts;
        }

    }
    function f_agregar_categoria(){
        if(isset($_POST['guardar'])){
            $cat_nombre = f_escape_string(trim($_POST['cat_name']));
            $query = f_query("INSERT INTO categorias (cat_nombre) VALUES ('{$cat_nombre}')");
            f_confirmar($query);
            // header("Location: index.php?categorias");
            f_crear_msj(f_mostrar_msj_success("Categoria creada correctamente!"));
            f_redirigir("index.php?categorias");
        }
    }
    function f_show_categorias(){
        $query = f_query("SELECT * FROM categorias");
        f_confirmar($query);
        while($fila = f_fetch_array($query)){
            $categorias = <<<DELIMITADOR
                <tr>
                    <td>{$fila['cat_id']}</td>
                    <td>{$fila['cat_nombre']}</td>
                    <td>
                        <a href="index.php?categorias&edit={$fila['cat_id']}" class="btn btn-primary">editar</a>
                    </td>
                    <td>
                        <a href="index.php?categorias&delete={$fila['cat_id']}" class="btn btn-danger">borrar</a>
                    </td>
                </tr>
DELIMITADOR;
            echo $categorias;
        }
    }
    function f_categoria_edit($cat_id){
        if(isset($_POST['editar'])){
            // echo 'funciona';
            $cat_nombre = f_escape_string(trim($_POST['cat_name_edit']));
            $query = f_query("UPDATE categorias SET cat_nombre = '{$cat_nombre}' WHERE cat_id = {$cat_id}");
            f_confirmar($query);
            f_crear_msj(f_mostrar_msj_success("editada correctamente!"));
            f_redirigir("index.php?categorias");
        }
    }

?>