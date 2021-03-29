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
        <h1 class="h3 mb-0 text-gray-800">HORA SALIDA</h1>
        
    </div>
    <div class="row">
        <div class="col-md-6">
            <div>
                <?php f_mostrar_msj();?>
             </div>
            <?php agregar_salida();?>
            <form action="" method="post">
                <div class="form-group">
                    <label for="hs_dni">Escribe DNI</label>
                    <input type="text" class="form-control" id="hs_dni" name="hs_dni" require>
                   
                   
                </div>
                <div class="form-group">
                    <input type="submit" value="Registrar" class="btn btn-success" name="guardar">
                   
                </div>
            </form>
        </div>
        
    </div>
</body>
</html>