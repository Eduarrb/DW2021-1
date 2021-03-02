<?php require_once("../recursos/config.php"); ?>

<?php include(TEMPLATE_FRONT . DS . "head.php"); ?>

  <!-- Navigation -->
  <?php include(TEMPLATE_FRONT . DS . "nav.php"); ?>

  <?php
    if(isset($_GET['post_id'])){
      $post_id = f_escape_string(trim($_GET['post_id']));
      $query = f_query("UPDATE posts SET post_vistas = post_vistas + 1 WHERE post_id = {$post_id}");
      f_confirmar($query);

      // echo $post_id;
      $query = f_query("SELECT * FROM posts WHERE post_id = {$post_id}");
      f_confirmar($query);
      $fila = f_fetch_array($query);
      // print_r($fila);
    }
  ?>

  <!-- Page Content -->
  <div class="container">

    <div class="row">

      <!-- Post Content Column -->
      <div class="col-lg-8">

        <!-- Title -->
        <h1 class="mt-4"><?php echo $fila['post_titulo']; ?></h1>

        <!-- Author -->
        <p class="lead">
          Hecho por
          <a href="#"><?php echo $fila['post_autor']; ?></a>
        </p>

        <hr>

        <!-- Date/Time -->
        <div class="d-flex justify-content-between">
          <p>Publicado el <?php echo $fila['post_fecha']; ?></p>
          <div>
            <i class="fas fa-eye"></i>
            <span><?php echo $fila['post_vistas']; ?></span>
          </div>
        </div>

        <hr>

        <!-- Preview Image -->
        <img 
          class="img-fluid rounded" 
          src="img/<?php echo $fila['post_img']; ?>" 
          alt="<?php echo $fila['post_titulo']; ?>"
        >

        <hr>

        <!-- Post Content -->
        <p class="lead"><?php echo $fila['post_contenido']; ?></p>

        <hr>

        <!-- Comments Form -->
        <div class="card my-4">
          <h5 class="card-header">Leave a Comment:</h5>
          <div class="card-body">
            <form>
              <div class="form-group">
                <textarea class="form-control" rows="3"></textarea>
              </div>
              <button type="submit" class="btn btn-primary">Submit</button>
            </form>
          </div>
        </div>

        <!-- Single Comment -->
        <div class="media mb-4">
          <img class="d-flex mr-3 rounded-circle" src="http://placehold.it/50x50" alt="">
          <div class="media-body">
            <h5 class="mt-0">Commenter Name</h5>
            Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.
          </div>
        </div>

        <!-- Comment with nested comments -->
        <div class="media mb-4">
          <img class="d-flex mr-3 rounded-circle" src="http://placehold.it/50x50" alt="">
          <div class="media-body">
            <h5 class="mt-0">Commenter Name</h5>
            Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.

            <div class="media mt-4">
              <img class="d-flex mr-3 rounded-circle" src="http://placehold.it/50x50" alt="">
              <div class="media-body">
                <h5 class="mt-0">Commenter Name</h5>
                Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.
              </div>
            </div>

            <div class="media mt-4">
              <img class="d-flex mr-3 rounded-circle" src="http://placehold.it/50x50" alt="">
              <div class="media-body">
                <h5 class="mt-0">Commenter Name</h5>
                Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.
              </div>
            </div>

          </div>
        </div>

      </div>

      <!-- Sidebar Widgets Column -->
      <?php include(TEMPLATE_FRONT . DS . "sidebar.php"); ?>

    </div>
    <!-- /.row -->

  </div>
  <!-- /.container -->

  <!-- Footer -->
  <?php include(TEMPLATE_FRONT . DS . "footer.php"); ?>