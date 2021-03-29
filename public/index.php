<?php require_once("../recursos/config.php");?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>
    <title>Tarea</title>
</head>
<body>
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Registro de Personal</h1>
        
    </div>
    <div class="row">
        <div class="col-md-6">
            <div>
                <?php f_mostrar_msj();?>
             </div>
            <?php agrega_personal();?>
            <form action="" method="post">
                <div class="form-group">
                    <label for="per_nombre">Escribe el nombre</label>
                    <input type="text" class="form-control" id="per_nombre" name="per_nombre" require>
                    <label for="per_apellido">Escribe el apellido</label>
                    <input type="text" class="form-control" id="per_apellido" name="per_apellido" require>
                    <label for="per_dni">Escribe el DNI</label>
                    <input type="text" class="form-control" id="per_dni" name="per_dni" require>
                </div>
                <div class="form-group">
                    <input type="submit" value="Guardar" class="btn btn-primary" name="guardar">
                   
                </div>
            </form>
        </div>
        <div class="col-md-6">
        <table class="table table-hover">
            <thead> 
                <tr>
                    <td>ID</td>
                    <td>NOMBRE </td>
                    <td>APELLIDO </td>
                    <td>DNI </td>
                    <td>ID HORA ENTREDA</td>
                    
                </tr>
            </thead>
            <tbody> 
                <?php show_personal();?>
            </tbody>
    
        </table>
    </div>
    </div>
</body>
</html>