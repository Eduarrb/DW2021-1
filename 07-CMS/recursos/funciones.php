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



    // ⚡⚡ FRONT
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