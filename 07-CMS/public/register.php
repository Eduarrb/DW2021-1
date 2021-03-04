<?php require_once("../recursos/config.php"); ?>

<?php include(TEMPLATE_FRONT . DS . "head_auth.php"); ?>

<body class="bg-gradient-primary">

    <div class="container">

        <div class="card o-hidden border-0 shadow-lg my-5">
            <div class="card-body p-0">
                <!-- Nested Row within Card Body -->
                <div class="row">
                    <div class="col-lg-5 d-none d-lg-block bg-register-image"></div>
                    <div class="col-lg-7">
                        <div class="p-5">
                            <div class="text-center">
                                <h1 class="h4 text-gray-900 mb-4">Crear una Cuenta!</h1>
                            </div>
                            <div>
                                <?php f_mostrar_msj(); ?>
                            </div>
                            <form class="user" action="" method="post">
                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <input type="text" class="form-control form-control-user" id="exampleFirstName"
                                            placeholder="Tu nombre" name="user_nombre">
                                    </div>
                                    <div class="col-sm-6">
                                        <input type="text" class="form-control form-control-user" id="exampleLastName"
                                            placeholder="Apellido" name="user_apellido">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <input type="email" class="form-control form-control-user" id="exampleInputEmail"
                                        placeholder="Correo Electrónico" name="user_email">
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <input type="text" class="form-control form-control-user"
                                            id="exampleInputPassword" placeholder="Contraseña" name="user_pass">
                                    </div>
                                    <div class="col-sm-6">
                                        <input type="text" class="form-control form-control-user"
                                            id="exampleRepeatPassword" placeholder="Confirmar Contraseña" name="user_passConfirm">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <input type="submit" class="btn btn-primary btn-user btn-block" value="Registrate" name="registrar">
                                </div>
                                <!-- <a href="login.html" class="btn btn-primary btn-user btn-block">
                                    Register Account
                                </a> -->
                            </form>
                            <?php f_validar_user_reg(); ?>
                            <hr>
                            <div class="text-center">
                                <a class="small" href="forgot-password.php">¿Olvidate tu contraseña?</a>
                            </div>
                            <div class="text-center">
                                <a class="small" href="login.php">¿Ya tienes cuenta? Inicia Sesión!</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <!-- Bootstrap core JavaScript-->
    <?php include(TEMPLATE_FRONT . DS . "footer_auth.php"); ?>