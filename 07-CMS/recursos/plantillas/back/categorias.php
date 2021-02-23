<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Categorias</h1>
</div>

<div class="row">
    <div class="col-md-6">
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
    </div>
</div>
