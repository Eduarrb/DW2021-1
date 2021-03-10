<?php require_once("../recursos/config.php"); ?>

<?php include(TEMPLATE_FRONT . DS . "head_auth.php"); ?>
<?php
    // algo que tiene que ejecutar despues de envio del formulario

?>

<body class="bg-gradient-primary">

    <div class="container">

        <!-- Outer Row -->
        <div class="row justify-content-center">

            <div class="col-xl-10 col-lg-12 col-md-9">

                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                            <div class="col-lg-6 d-none d-lg-block bg-login-image"></div>
                            <div class="col-lg-6">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4">Bienvenido otra vez!</h1>
                                    </div>
                                    <div>
                                        <?php
                                            f_mostrar_msj();

                                            f_validar_user_login();
                                        ?>
                                    </div>
                                    <form class="user" action="" method="post">
                                        <div class="form-group">
                                            <input 
                                                type="email" 
                                                class="form-control form-control-user"
                                                id="exampleInputEmail" 
                                                aria-describedby="emailHelp"
                                                placeholder="Ingresa tu correo..."
                                                name="user_email"
                                                required
                                            >
                                        </div>
                                        <div class="form-group">
                                            <input 
                                                type="text" 
                                                class="form-control form-control-user"
                                                id="exampleInputPassword" 
                                                placeholder="Contraseña"
                                                name="user_pass"
                                                required
                                            >
                                        </div>
                                        <div class="form-group">
                                            <div class="custom-control custom-checkbox small">
                                                <input type="checkbox" class="custom-control-input" id="customCheck">
                                                <label class="custom-control-label" for="customCheck">Remember
                                                    Me</label>
                                            </div>
                                        </div>
                                        <!-- <a href="index.php?nombre=juan&pass=123" class="btn btn-primary btn-user btn-block">
                                            Login
                                        </a> -->
                                        <input 
                                            type="submit" 
                                            value="Inicia Sesión" 
                                            class="btn btn-primary btn-user btn-block"
                                            name="login"
                                        >
                                        <!-- <hr>
                                        <a href="index.html" class="btn btn-google btn-user btn-block">
                                            <i class="fab fa-google fa-fw"></i> Login with Google
                                        </a>
                                        <a href="index.html" class="btn btn-facebook btn-user btn-block">
                                            <i class="fab fa-facebook-f fa-fw"></i> Login with Facebook
                                        </a> -->
                                    </form>
                                    <hr>
                                    <div class="text-center">
                                        <a class="small" href="forgot-password.php">¿Olvidaste tu contraseña?</a>
                                    </div>
                                    <div class="text-center">
                                        <a class="small" href="register.php">¡Crea una cuenta!</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>

    </div>

    <!-- Bootstrap core JavaScript-->
    <?php include(TEMPLATE_FRONT . DS . "footer_auth.php"); ?>