<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
    <div class="container">
      <a class="navbar-brand" href="./">Blog de Eduardo</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav ml-auto">

            <?php

                // $query = "SELECT * FROM categorias";
                // $query_resultado = mysqli_query($conexion, $query);

                $query = f_query("SELECT * FROM categorias");

                // if(!$query){
                //     die("Fallo en la conexion " . mysqli_error($conexion));
                // }

                f_confirmar($query);
                // $row = f_fetch_array($query);
                // print_r($row);
                // while($fila = mysqli_fetch_array($query)){
                while($fila = f_fetch_array($query)){
                    // echo $fila;
                    ?>
                    <li class="nav-item">
                        <a class="nav-link" href="#"><?php echo $fila['cat_nombre'];  ?></a>
                    </li>
                <?php }
            
            ?>
            
          <!-- <li class="nav-item active">
            <a class="nav-link" href="#">Home
              <span class="sr-only">(current)</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">About</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Services</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Contact</a>
          </li> -->

          <?php
            if(isset($_SESSION['user_rol']) && $_SESSION['user_rol'] == 'admin'){
              ?>
              
                <li class="nav-item">
                  <a class="nav-link" href="admin">ADMIN</a>
                </li>

            <?php }
          
          ?>

        </ul>
      </div>
    </div>
</nav>