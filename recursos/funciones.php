<?php
    function f_crear_msj($msj){
        if(!empty($msj)){
            $_SESSION['mensaje'] = $msj;
        }
        else{
            $msj='';
        }
    }
    function f_mostrar_msj(){
        if (isset($_SESSION['mensaje'])){
            echo  $_SESSION['mensaje'];
            unset($_SESSION['mensaje']);
        }
    }
    function f_mostar_msj_success($msj){
        $msj=<<<DELIMITADOR
        <div class="alert alert-info alert-dismissible fade show" role="alert">
            <strong>Holy guacamole!</strong> {$msj}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
DELIMITADOR;
        return $msj;
    }
    function f_mostar_msj_danger($msj){
        $msj=<<<DELIMITADOR
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>Holy guacamole!</strong> {$msj}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
DELIMITADOR;
        return $msj;
    }
    function query($sql){
        global $conexion;
        return mysqli_query($conexion,$sql);

    }
    function confirmar($resultado){
        global $conexion;
        if(!$resultado){
            die("fallo".mysqli_error($conexion));
        }
    }
    function redirigir($location){
        header("Location: $location");
    }
    function fetch_array($resultado){
        return mysqli_fetch_array($resultado);
    }
    function agrega_personal(){
        if (isset($_POST['guardar'])){
            $per_nombre= trim($_POST['per_nombre']);
            $per_apellido= trim($_POST['per_apellido']);
            $per_dni= trim($_POST['per_dni']);
            
            $query_i=query("INSERT INTO personal (per_nombre,per_apellido,per_dni) VALUES ('{$per_nombre}','{$per_apellido}','{$per_dni}')");
            confirmar($query_i);
            redirigir("index.php");
            f_crear_msj(f_mostar_msj_success("Personal Agregado"));
        }
    }
    function show_personal(){
        $query_i=query("SELECT * FROM personal");
        confirmar($query_i);
        while($fila=fetch_array($query_i)){
            $impresion=<<<DELIMITADOR
            <tr>
                <td>{$fila['per_id']}</td>
                <td>{$fila['per_nombre']}</td>
                <td>{$fila['per_apellido']}</td>
                <td>{$fila['per_dni']}</td>
            
               
                <td>
                    <a href="ingreso.php?agregar={$fila['per_id']}" class="btn btn-success">Hora Entrada</a>
                </td>
                <td>
                    <a href="salida.php?agregar={$fila['per_id']}" class="btn btn-warning">Hora Salida</a>
                </td>
                <td>
                    <a href="record.php?historial={$fila['per_id']}" class="btn btn-info">Historial</a>
                </td>
            </tr>
DELIMITADOR;
            echo $impresion;
        }

    }
    function agregar_salida(){
        if (isset($_GET['agregar'])){
            $id_agregar=$_GET['agregar'];
            //echo $id_agregar;
            $query_i=query("SELECT * FROM personal WHERE per_id= {$id_agregar} ");
            confirmar($query_i);
            $fila=fetch_array($query_i);
            $dni=$fila['per_dni'];
            $id_per=$fila['per_id'];
        }
       
        if(isset($_POST['guardar'])){
            $for_dni=$_POST['hs_dni'];
            if($for_dni==$dni){
                $query_i=query("INSERT INTO hora_salida (hs_fecha,hs_id_per,hs_dni) VALUES (NOW(),{$id_per},'{$for_dni}')");
                confirmar($query_i);
                redirigir("index.php");
                f_crear_msj(f_mostar_msj_success("Hora de Salida del Personal Agregada"));
            }
        }
       
    }
    function agregar_ingreso(){
        if (isset($_GET['agregar'])){
            $id_agregar=$_GET['agregar'];
            //echo $id_agregar;
            $query_i=query("SELECT * FROM personal WHERE per_id= {$id_agregar} ");
            confirmar($query_i);
            $fila=fetch_array($query_i);
            $dni=$fila['per_dni'];
            $id_per=$fila['per_id'];
        }
       
        if(isset($_POST['guardar'])){
            $for_dni=$_POST['hi_dni'];
            if($for_dni==$dni){
                $query_i=query("INSERT INTO hora_ingreso (hi_fecha,hi_id_per,hi_dni) VALUES (NOW(),{$id_per},'{$for_dni}')");
                confirmar($query_i);
                redirigir("index.php");
                f_crear_msj(f_mostar_msj_success("Hora de Ingreso del Personal Agregada"));
            }
        }
       
    }
    function mostar_record(){
        if (isset($_GET['historial'])){
            $id_historial=$_GET['historial'];
            //echo $id_historial;
            $query_i=query("SELECT per_id,per_nombre,per_apellido,per_dni,hi_fecha FROM personal,hora_ingreso WHERE per_id=hi_id_per AND per_id={$id_historial}");
            confirmar($query_i);
            while($fila=fetch_array($query_i)){
                $impresion=<<<DELIMITADOR
            <tr>
            <td>{$fila['per_id']}</td>
            <td>{$fila['per_nombre']}</td>
            <td>{$fila['per_apellido']}</td>
            <td>{$fila['per_dni']}</td>
            <td>{$fila['hi_fecha']}</td>
                           
            </tr>
DELIMITADOR;
            echo $impresion;
            }
                    
        }  
    }
    function mostar_record2(){
        if (isset($_GET['historial'])){
            $id_historial=$_GET['historial'];
            //echo $id_historial;
            $query_i=query("SELECT per_id,per_nombre,per_apellido,per_dni,hs_fecha FROM personal,hora_salida WHERE per_id=hs_id_per AND per_id={$id_historial}");
            confirmar($query_i);
            while($fila=fetch_array($query_i)){
                $impresion=<<<DELIMITADOR
            <tr>
            <td>{$fila['per_id']}</td>
            <td>{$fila['per_nombre']}</td>
            <td>{$fila['per_apellido']}</td>
            <td>{$fila['per_dni']}</td>
            <td>{$fila['hs_fecha']}</td>
                           
            </tr>
DELIMITADOR;
            echo $impresion;
            }
                    
        }  
    }
?>