<?php require_once("../../recursos/config.php"); ?>

<?php include(TEMPLATE_BACK . DS . "head.php"); ?>
    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <?php include(TEMPLATE_BACK . DS . "sidenav.php"); ?>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <?php include(TEMPLATE_BACK . DS . "topnav.php"); ?>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <?php
                        // echo __DIR__;
                        // echo $_SERVER['REQUEST_URI'];

                        echo $_SESSION['user_rol'];

                        if($_SERVER['REQUEST_URI'] == '/dw2021-1/07-CMS/public/admin/' || $_SERVER['REQUEST_URI'] == '/dw2021-1/07-CMS/public/admin/index.php'){
                            include(TEMPLATE_BACK . DS . "dashboard.php");
                        }

                        if(isset($_GET['categorias'])){
                            include(TEMPLATE_BACK . DS . "categorias.php");
                        }
                        if(isset($_GET['posts'])){
                            include(TEMPLATE_BACK . DS . "posts.php");
                        }
                        if(isset($_GET['posts_add'])){
                            include(TEMPLATE_BACK . DS . "posts_add.php");
                        }
                        if(isset($_GET['posts_edit'])){
                            include(TEMPLATE_BACK . DS . "posts_edit.php");
                        }
                        if(isset($_GET['comentarios'])){
                            include(TEMPLATE_BACK . DS . "comentarios.php");
                        }
                    
                    ?>

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <?php include(TEMPLATE_BACK . DS . "footer.php"); ?>