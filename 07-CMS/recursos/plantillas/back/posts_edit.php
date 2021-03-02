<?php
    if(isset($_GET['posts_edit'])){
        $post_id = f_escape_string(trim($_GET['posts_edit']));
        // echo $post_id;
        $query = f_query("SELECT * FROM posts WHERE post_id = {$post_id}");
        f_confirmar($query);
        $fila = f_fetch_array($query); 
        // $fila['post_cat_id'] -> 3
        // print_r($fila);
    }

?>

<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Editar Posts</h1>
</div>
<div class="row">
    <div class="col-md-6">
        <?php ?>
        <form action="" method="post" enctype="multipart/form-data">
            <div class="form-group">
                <label for="">Título</label>
                <input 
                    type="text" 
                    class="form-control" 
                    name="post_titulo"
                    value="<?php echo $fila['post_titulo']; ?>"
                >
            </div>
            <div class="form-group">
                <label for="">Categoría</label>
                <select name="post_cat_id" id="" class="form-control">
                    <?php
                        $query = f_query("SELECT * FROM categorias");
                        f_confirmar($query);
                        while($fila_categoria = f_fetch_array($query)){
                            $cat_id = f_escape_string(trim($fila_categoria['cat_id']));
                            $cat_nombre = f_escape_string(trim($fila_categoria['cat_nombre']));
                                // 3            // 3
                            if($cat_id == $fila['post_cat_id']){
                                echo "<option value='{$cat_id}' selected>{$cat_nombre}</option>";
                            }
                            else{
                                echo "<option value='{$cat_id}'>{$cat_nombre}</option>";
                            }
                        }
                    ?>
                    <!-- <option value="">Javascript</option> -->
                </select>
            </div>
            <div class="form-group">
                <label for="">Autor</label>
                <input 
                    type="text" 
                    class="form-control" 
                    name="post_autor"
                    value="<?php echo $fila['post_autor']; ?>"
                >
            </div>
            <div class="form-group">
                <label for="">Fecha</label>
                <input 
                    type="date" 
                    class="form-control" 
                    name="post_fecha"
                    value="<?php echo $fila['post_fecha']; ?>"
                >
            </div>
            <div class="form-group">
                <label for="">Imagen</label>
                <br>
                <img src="../img/<?php echo $fila['post_img']; ?>" alt="" width="350" class="mb-2">
                <input type="file" class="form-control" name="post_img">
            </div>
            <div class="form-group">
                <label for="">Contenido</label>
                <textarea name="post_contenido" id="" cols="30" rows="5" class="form-control"><?php echo $fila['post_contenido']; ?></textarea>
            </div>
            <div class="form-group">
                <label for="">Tags</label>
                <input 
                    type="text" 
                    class="form-control" 
                    name="post_tags"
                    value="<?php echo $fila['post_tags']; ?>"
                >
            </div>
            <div class="form-group">
                <label for="">Status</label>
                <select name="post_status" id="" class="form-control">
                    <option value="<?php echo $fila['post_status']; ?>" selected><?php echo $fila['post_status']; ?></option>

                    <?php
                        if($fila['post_status'] == 'publicado'){
                            ?>
                            <option value="pendiente">pendiente</option>
                        <?php }
                        else{
                            ?>
                            <option value="publicado">publicado</option>
                        <?php }
                    ?>
                </select>
            </div>
            <div class="form-group">
                <input type="submit" class="btn btn-success" name="guardar" value="Editar">
            </div>
        </form>
        <?php f_posts_edit($post_id); ?>
    </div>
</div>