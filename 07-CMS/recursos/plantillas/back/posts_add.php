<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Agregar Posts</h1>
</div>
<div class="row">
    <div class="col-md-6">
        <?php f_posts_add(); ?>
        <form action="" method="post" enctype="multipart/form-data">
            <div class="form-group">
                <label for="">Título</label>
                <input type="text" class="form-control" name="post_titulo">
            </div>
            <div class="form-group">
                <label for="">Categoría</label>
                <select name="post_cat_id" id="" class="form-control">
                    <?php
                        $query = f_query("SELECT * FROM categorias");
                        f_confirmar($query);
                        while($fila = f_fetch_array($query)){
                            ?>
                                <option value="<?php echo $fila['cat_id']; ?>"><?php echo $fila['cat_nombre']; ?></option>
                        <?php }
                    ?>
                    <!-- <option value="">Javascript</option> -->
                </select>
            </div>
            <div class="form-group">
                <label for="">Autor</label>
                <input type="text" class="form-control" name="post_autor">
            </div>
            <div class="form-group">
                <label for="">Fecha</label>
                <input type="date" class="form-control" name="post_fecha">
            </div>
            <div class="form-group">
                <label for="">Imagen</label>
                <input type="file" class="form-control" name="post_img">
            </div>
            <div class="form-group">
                <label for="">Contenido</label>
                <textarea name="post_contenido" id="" cols="30" rows="5" class="form-control"></textarea>
            </div>
            <div class="form-group">
                <label for="">Tags</label>
                <input type="text" class="form-control" name="post_tags">
            </div>
            <div class="form-group">
                <label for="">Status</label>
                <select name="post_status" id="" class="form-control">
                    <option value="" selected disabled>Escoja un opción</option>
                    <option value="publicado">publicado</option>
                    <option value="pendiente">pendiente</option>
                </select>
            </div>
            <div class="form-group">
                <input type="submit" class="btn btn-success" name="guardar">
            </div>
        </form>
        
    </div>
</div>