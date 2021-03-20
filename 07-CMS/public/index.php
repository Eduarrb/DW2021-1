<?php require_once("../recursos/config.php"); ?>

<?php include(TEMPLATE_FRONT . DS . "head.php"); ?>

  <!-- Navigation -->
  <?php include(TEMPLATE_FRONT . DS . "nav.php"); ?>

  <!-- Page Content -->
  <div class="container">

    <div class="row">

      <!-- Blog Entries Column -->
      <div class="col-md-8">

        <h1 class="my-4">Bienvenido a mi blog
          <small>Posts recientes</small>
        </h1>

        <!-- Blog Post -->
        <!-- <div class="card mb-4">
          <img class="card-img-top" src="http://placehold.it/750x300" alt="Card image cap">
          <div class="card-body">
            <h2 class="card-title">Post Title</h2>
            <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Reiciendis aliquid atque, nulla? Quos cum ex quis soluta, a laboriosam. Dicta expedita corporis animi vero voluptate voluptatibus possimus, veniam magni quis!</p>
            <a href="#" class="btn btn-primary">Read More &rarr;</a>
          </div>
          <div class="card-footer text-muted">
            Posted on January 1, 2020 by
            <a href="#">Start Bootstrap</a>
          </div>
        </div> -->

        <?php f_show_posts_front(); ?>

        <!-- Pagination -->
        <!-- <ul class="pagination justify-content-center mb-4">
          <li class="page-item">
            <a class="page-link" href="#">&larr; Older</a>
          </li>
          <li class="page-item disabled">
            <a class="page-link" href="#">Newer &rarr;</a>
          </li>
        </ul> -->
        <!-- <ul class="pagination justify-content-center mb-4"> -->
          <!-- <li class="page-item"><a class="page-link" href="#">Anterior</a></li> -->
          <!-- <li class="page-item"><a class="page-link" href="#">10</a></li> -->
          <!-- <li class="page-item"><a class="page-link" href="#">11</a></li> -->
          <!-- <li class="page-item active"><a class="page-link" href="#">1</a></li> -->
          <!-- <li class="page-item"><a class="page-link" href="#">2</a></li> -->
          <!-- <li class="page-item"><a class="page-link" href="#">14</a></li> -->
          <!-- <li class="page-item"><a class="page-link" href="#">Siguiente</a></li> -->
        <!-- </ul> -->

      </div>

      <!-- Sidebar Widgets Column -->
      <?php include(TEMPLATE_FRONT . DS . "sidebar.php"); ?>

    </div>
    <!-- /.row -->

  </div>
  <!-- /.container -->

  <!-- Footer -->
  <?php include(TEMPLATE_FRONT . DS . "footer.php"); ?>