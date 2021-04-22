<!doctype html>
<html class="no-js" lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Iniciar Sesión / Registrarse</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <link rel="shortcut icon" type="image/x-icon" href="images/lobo.ico">
    <link rel="apple-touch-icon" href="apple-touch-icon.png">

    <!--css files included here. -->
    <!-- Bootstrap fremwork main css -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <!-- Owl Carousel main css -->
    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <link rel="stylesheet" href="css/owl.theme.default.min.css">
    <!-- This core.css file contents all plugings css file. -->
    <link rel="stylesheet" href="css/core.css">
    <!-- Theme shortcodes/elements style -->
    <link rel="stylesheet" href="css/shortcode/shortcodes.css">
    <!-- Theme main style -->
    <link rel="stylesheet" href="style.css">
    <!-- Responsive css -->
    <link rel="stylesheet" href="css/responsive.css">
    <!-- custom style -->
    <link rel="stylesheet" href="css/custom.css">

    <!-- Modernizr JS -->
    <script src="js/vendor/modernizr-2.8.3.min.js"></script>
</head>

<body>    
    <?php
        include 'phpIncludes/connection.php';
        $login_err = $register_err = $email = '';
        if(isset($_POST['login']))
        {
            // username and password sent from form 
            $email = filter_input(INPUT_POST, 'email');
            $password = filter_input(INPUT_POST, 'password');

            $query = "SELECT user_id FROM Users WHERE email = '$email' and password = '$password'";
            $r = mysqli_query($dbc, $query);
            $row = mysqli_fetch_array($r);

            $count = mysqli_num_rows($r);
            // If result matched $myusername and $mypassword, table row must be 1 row
            
            if($count == 1)
            {
                $_SESSION['login'] = $row['user_id'];
                header('location:index.php');
            }
            else
            {
                if((!empty($email)) && (!empty($password)))
                {
                    $login_err = 'Credenciales Incorrectas';
                    $email = '';
                }
                else if(empty($email) && !empty($password))
                {
                    $login_err = 'Inserte Email';
                }
                else if(!empty($email) && empty($password))
                {
                    $login_err = 'Inserte Contraseña';
                }
                else
                {
                    $login_err = 'Inserte Datos';
                }
            }
        }
        else if(isset($_POST['register']))
            {
                $register_err ='';
            if(empty($_POST['name']) || empty($_POST['lastname']) || empty($_POST['password']) 
                || empty($_POST['password2']) || empty($_POST['email']) || empty($_POST['user_id']))
            {
                $register_err ='<p class="msg_error">Todos los campos son Obligatorios</p>';
            }
            else
            {
                $nombre = $_POST['name'];
                $apellidos = $_POST['lastname'];
                $usuario = $_POST['password'];
                $password = $_POST['password2'];
                $password2 = $_POST['email'];
                $tipoCuenta = $_POST['user_id'];

                if($password != $password2){
                    $register_err ='<p class="msg_error">Las Contraseñas no coincide.</p>';
                }else
                {
                    /* Query Para buscar si el usuario ya existe */
                    $query = mysqli_query($connection, "SELECT * FROM Users WHERE usuario = '$usuario'");
                    $result = mysqli_fetch_Array($query);
                    
                    if($result > 0)
                    {
                        $register_err ='<p class="msg_error">EL Correo Electronico ya está registrado.</p>';
                    }
                    else
                    {
                        $query_insert = mysqli_query($connection, "INSERT INTO usuarios(nombre, apellidos, usuario, password, rol)
                                    VALUES('$nombre','$apellidos','$usuario','$password', '$tipoCuenta')");
                        
                        if($query_insert)
                        {
                            $register_err ='<p class="msg_save">Se ha registrado el ususario.</p>';
                            header("location: index.php");
                        }
                        else
                        {
                            $register_err ='<p class="msg_error">Error al crear el usuario.</p>';
                        }
                    }
                }
            }
        }
    ?>
    <!-- BODY MAIN WRAPPER START -->
    <div class="wrapper fixed__footer">  
        <!-- HEADER STYLE START -->
        <header id="header" class="htc-header header--3 bg__white">
            <div id="sticky-header-with-topbar" class="mainmenu__area sticky__header" style="background: gold;">
                <div class="container">
                    <div class="row">
                        <div class="col-md-2 col-lg-2 col-sm-3 col-xs-3">
                            <div class="logo">
                                <a href="index.php">
                                    <img src="images/logo/lp4.png" alt="logo">
                                </a>
                            </div>
                        </div>
                        <div class="col-md-8 col-lg-8 col-sm-6 col-xs-6">
                            <!-- MENU START -->
                            <nav class="mainmenu__nav hidden-xs hidden-sm">
                                <ul class="main__menu">
                                    <li class="drop"><a href="index.php">Inicio</a></li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </header>
        <!-- HEADER STYLE END -->
        <div class="body__overlay"></div>
        <!-- SERVICES AREA START -->
        <section class="htc__blog__area bg__white pb--130">
            <div class="container">
                <div class="row align-items-center">
                    <div class="blog__wrap clearfix mt--60 xmt-30">
                        <div class="container">
                            <div class="row"> <!--space between header and form-->
                                <div class="col-md-6 col-md-offset-3"> 
                                    <ul class="login__register__menu" role="tablist"></ul>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6 col-md-offset-3">
                                    <ul class="login__register__menu" role="tablist">
                                        <li role="presentation" class="login active"><a href="#login" role="tab" data-toggle="tab">Iniciar Sesión</a></li>
                                        <li role="presentation" class="register"><a href="#register" role="tab" data-toggle="tab">Registrarse</a></li>
                                    </ul>
                                </div>
                            </div>
                            <!-- Start Login Register Content -->
                            <div class="row">
                                <div class="col-md-6 col-md-offset-3">
                                    <div class="htc__login__register__wrap">
                                        <!-- Start Single Content -->
                                        <div id="login" role="tabpanel" class="single__tabs__panel tab-pane fade in active">
                                            <form class="login" method="post">
                                                <input name="email" type="text" placeholder="Correo Electrónico" value="<?php echo $email; ?>"> 
                                                <input name="password" type="password" placeholder="Contraseña">
                                                <div class="tabs__checkbox">
                                                    <span class="forget"><a href="#">¿Olvidó su contraseña?</a></span>
                                                    <span class="forget__bold"><?php echo $login_err; ?></span>
                                                </div>
                                                <div class="htc__login__btn">
                                                    <button name="login">Accesar</button>
                                                </div>
                                            </form>
                                        </div>
                                        <!-- End Single Content -->

                                        <!-- Start Single Content -->
                                        <div id="register" role="tabpanel" class="single__tabs__panel tab-pane fade">
                                            <form class="register" method="post">
                                                <input type="name" placeholder="Nombre*">
                                                <input type="lastname" placeholder="Apellidos*">
                                                <input type="password" placeholder="Contraseña*">
                                                <input type="password2" placeholder="Confirma contraseña*">
                                                <input type="email" placeholder="Correo Electrónico*">
                                                <input type="user_id" placeholder="ID Estudiante">
                                                <div class="tabs__checkbox">
                                                    <span class="forget__bold"><?php echo $register_err; ?></span>
                                                </div>
                                            </form>
                                            <div class="htc__login__btn">
                                                <button href="#">Registrarse</button>
                                            </div>
                                        </div>
                                        <!-- End Single Content -->
                                    </div>
                                </div>
                            </div>
                            <!-- End Login Register Content -->
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- SERVICES AREA END -->
    </div>
    <!-- Body main wrapper end -->
    
    <!--Placed js at the end of the document so the pages load faster -->

    <!-- jquery latest version -->
    <script src="js/vendor/jquery-1.12.0.min.js"></script>
    <!-- Bootstrap framework js -->
    <script src="js/bootstrap.min.js"></script>
    <!-- All js plugins included in this file. -->
    <script src="js/plugins.js"></script>
    <script src="js/slick.min.js"></script>
    <script src="js/owl.carousel.min.js"></script>
    <!-- Waypoints.min.js. -->
    <script src="js/waypoints.min.js"></script>
    <!-- Main js file that contents all jQuery plugins activation. -->
    <script src="js/main.js"></script>
</body>

</html>