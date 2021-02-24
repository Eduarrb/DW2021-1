<?php
    // $cat_id = $_GET['edit'];
    $cat_id = f_escape_string(trim($_GET['edit']));
    // echo $cat_id;
    $query = f_query("SELECT * FROM categorias WHERE cat_id = {$cat_id}");
    f_confirmar($query);
    $fila = f_fetch_array($query);
?>
<hr>
<form action="" method="post">
    <div class="form-group">
        <label for="cat_name_edit">Editar categoria</label>
        <input 
            type="text" 
            class="form-control" 
            id="cat_name_edit" 
            name="cat_name_edit" 
            required
            value="<?php echo $fila['cat_nombre']; ?>"
        >
    </div>
    <div class="form-group">
        <input type="submit" value="Editar" class="btn btn-success" name="editar">
    </div>
</form>
<?php f_categoria_edit($cat_id); ?>
