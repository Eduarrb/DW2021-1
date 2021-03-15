<?php require_once("../recursos/config.php"); ?>

<?php include(TEMPLATE_FRONT . DS . "head_auth.php"); ?>

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
                                        <h1 class="h4 text-gray-900 mb-4">¡Restablecer Contraseña!</h1>
                                    </div>
                                    <div>
                                        <?php
                                            f_mostrar_msj();

                                            f_restablecer_pass();
                                        ?>
                                    </div>
                                    <form class="user" action="" method="post">
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
                                            <input 
                                                type="text" 
                                                class="form-control form-control-user"
                                                id="exampleInputPassword" 
                                                placeholder="Confirmar Contraseña"
                                                name="user_pass_confirm"
                                                required
                                            >
                                        </div>
                                        <input 
                                            type="submit" 
                                            value="Restablecer" 
                                            class="btn btn-primary btn-user btn-block"
                                            name="restablecer"
                                        >
                                    </form>
                                    <hr>
                                    <div class="text-center">
                                        <a class="small" href="login.php">¿Ya tienes cuenta? ¡Inicia Sesión!</a>
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