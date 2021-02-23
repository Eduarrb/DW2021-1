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

    function f_escape_string($string){
        global $conexion;
        return mysqli_real_escape_string($conexion, $string);
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
    function f_agregar_categoria(){
        if(isset($_POST['guardar'])){
            $cat_nombre = f_escape_string(trim($_POST['cat_name']));
            $query = f_query("INSERT INTO categorias (cat_nombre) VALUES ('{$cat_nombre}')");
            f_confirmar($query);
            header("Location: index.php?categorias");
        }
    }
?>