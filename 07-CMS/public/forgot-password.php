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
                            <div class="col-lg-6 d-none d-lg-block bg-password-image"></div>
                            <div class="col-lg-6">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-2">¿OLvidaste tu contraseña?</h1>
                                        <p class="mb-4">We get it, stuff happens. Just enter your email address below
                                            and we'll send you a link to reset your password!</p>
                                    </div>
                                    <div>
                                        <?php
                                            f_mostrar_msj();
                                            
                                            f_recover_password();
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
                                        <input 
                                            type="submit" 
                                            value="Restablecer contraseña" 
                                            class="btn btn-primary btn-user btn-block" 
                                            name="restablecer"
                                        >
                                        <input 
                                            type="hidden"
                                            class="hide"
                                            name="token"
                                            value="<?php echo f_token_generador(); ?>"
                                        >
                                        <!-- <a href="login.html" class="btn btn-primary btn-user btn-block">
                                            Reset Password
                                        </a> -->
                                    </form>
                                    <hr>
                                    <div class="text-center">
                                        <a class="small" href="register.php">¡Crea una cuenta!</a>
                                    </div>
                                    <div class="text-center">
                                        <a class="small" href="login.php">¿Ya tienes una cuenta? ¡Inicia sesión!</a>
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