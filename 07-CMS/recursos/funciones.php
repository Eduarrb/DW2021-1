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
                    <a href="post.php" class="btn btn-primary">Leer más &rarr;</a>
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
    function f_show_posts_admin(){
        $query = f_query("SELECT * FROM posts");
        f_confirmar($query);
        while($fila = f_fetch_array($query)){
            $posts = <<<DELIMITADOR
                <tr>
                    <td>1</td>
                    <td>1</td>
                    <td>Curso php</td>
                    <td>Jaimito</td>
                    <td>2021-01-01</td>
                    <td>IMG</td>
                    <td>Lorem ipsum dolor sit amet consectetur adipisicing elit. Mollitia illo aperiam, dolorum rem necessitatibus alias cupiditate repellat a inventore exercitationem asperiores hic consequuntur adipisci est? Illo nam dignissimos voluptatibus? Quidem.</td>
                    <td>curso, php, nuevo</td>
                    <td>0</td>
                    <td>publicado</td>
                    <td>
                        <a href="#" class="btn btn-primary">editar</a>
                    </td>
                    <td>
                        <a href="#" class="btn btn-danger">borrar</a>
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