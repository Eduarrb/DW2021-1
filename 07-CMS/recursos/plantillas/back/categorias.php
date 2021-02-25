<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Categorias</h1>
</div>

<div class="row">
    <div class="col-md-6">
        <div>
            <!-- <div class="alert alert-warning alert-dismissible fade show" role="alert">
                <strong>Holy guacamole!</strong> You should check in on some of those fields below.
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div> -->
            <?php f_mostrar_msj(); ?>
        </div>
        <?php f_agregar_categoria(); ?>
        <form action="" method="post">
            <div class="form-group">
                <label for="cat_name">Agregar categoria</label>
                <input type="text" class="form-control" id="cat_name" name="cat_name" required>
            </div>
            <div class="form-group">
                <input type="submit" value="Guardar" class="btn btn-primary" name="guardar">
            </div>
        </form>
        
        <?php
            if(isset($_GET['edit'])){
                // echo 'funcionaaaaaaaaaaaa';
                include(TEMPLATE_BACK . DS . "categorias_edit.php");
            }
            if(isset($_GET['delete'])){
                $id_delete = f_escape_string(trim($_GET['delete']));
                $query = f_query("DELETE FROM categorias WHERE cat_id = {$id_delete}");
                f_confirmar($query);
                f_crear_msj(f_mostrar_msj_success("Categoria eliminada correctamente!"));
                f_redirigir("index.php?categorias");
            }
        
        ?>
    </div>
    <div class="col-md-6">
        <table class="table table-hover">
            <thead>
                <tr>
                    <td>ID</td>
                    <td>Nombre categoria</td>
                </tr>
            </thead>
            <tbody>
                <!-- <tr>
                    <td>1236521</td>
                    <td>Javascript</td>
                    <td>
                        <a href="#" class="btn btn-primary">editar</a>
                    </td>
                    <td>
                        <a href="#" class="btn btn-danger">borrar</a>
                    </td>
                </tr> -->
                <?php f_show_categorias(); ?>
                
            </tbody>
        </table>
    </div>
</div>
