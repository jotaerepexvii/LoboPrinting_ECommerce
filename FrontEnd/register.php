<?php
  session_start();
  include 'phpIncludes/connection.php';
  if (isset($_SESSION['login'])) {
    header('location:index.php');
  }
?>
<!doctype html>
<html class="no-js" lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Registrarse</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <?php
        include 'phpIncludes/stylesheets.php';
    ?>
</head>
<body>    
    <?php
        include 'phpIncludes/connection.php';
        include 'phpIncludes/functions.php';
        $register_err = $email = '';
        if(isset($_POST['register']))
        {
            if(empty($_POST['name']) || empty($_POST['lastname']) || empty($_POST['email']) || empty($_POST['password']) || empty($_POST['password2']))
            {
                $register_err = 'Llenar Campos Obligatorios';
            }
            else
            {
                if($_POST['user_id'] == '')
                {
                    $student = 0;
                    $userID = rand(111111111,getrandmax());
                }
                else
                {
                    $student = 1;
                    $userID = $_POST['user_id'];
                }
                   
                $nombre = $_POST['name'];
                $apellidos = $_POST['lastname'];
                $password = $_POST['password'];
                $password2 = $_POST['password2'];
                $email = $_POST['email'];
                $phone = '';

                if($password != $password2){
                    $register_err ='Las Contraseñas no coinciden';
                }
                else if(strlen($password)<8) {
                    $register_err ='La contraseña debe ser de 8 caracteres o más';
                }
                else
                {
                    /* Query Para buscar si el email ya existe */
                    $query = mysqli_query($dbc, "SELECT * FROM Users WHERE email = '$email' ");
                    $result = mysqli_fetch_Array($query);
                    
                    if($result > 0){
                        $register_err = 'El Correo Electronico ya está registrado';
                    }
                    else{
                        $response = recaptcha();
                        if ($response->success)
                        {
                            $cryptPass = encrypt($password);
                            $nombre = ucwords($nombre);
                            $apellidos = ucwords($apellidos);
                            $email = strtolower($email);
                            $query_insert = mysqli_query($dbc, "INSERT INTO Users(user_id, name, lastname, email, password, phone, student)
                                        VALUES('$userID','$nombre','$apellidos','$email','$cryptPass', '$phone', '$student')");
                        
                            if($query_insert)
                            {
                                $_SESSION['success'] = 'Usuario Registrado';
                                login($email, $cryptPass);
                                echo "<script>location.href='phpIncludes/success.php'</script>";
                                $register_err = 'Usuario Registrado Satisfactoriamente';
                            }
                            else
                            {
                                $register_err ='Error al crear el usuario';
                            }
                        }
                        else
                            $register_err = 'reCAPTCHA fallido<br>Intente nuevamente';

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
                                    <img src="images/logo/lobo_printing.svg" alt="logo">
                                </a>
                            </div>
                        </div>
                        <div class="col-md-9 col-lg-8 col-sm-6 col-xs-6">
                            <nav class="mainmenu__nav hidden-xs hidden-sm">
                                <ul class="main__menu"> 
                                </ul>
                            </nav>
                        </div>
                        <div class="col-md-3 col-sm-4 col-xs-3">
                            <!-- MENU START -->
                            <nav class="mainmenu__nav hidden-xs hidden-sm">
                                <ul class="main__menu">
                                    <li class="drop"><a href="index.php">Inicio</a></li>
                                    <li class="drop"><a href="login.php">Iniciar Sesión</a></li>
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
                            <div class="row">
                                <div class="col-md-6 col-md-offset-3">
                                    <ul class="login__register__menu" role="tablist">
                                        <li role="presentation" class="login"><a href="#register" role="tab" data-toggle="tab" >Registrarse</a></li>
                                    </ul>
                                </div>
                            </div>
                            <!-- Start Login Register Content -->
                            <div class="row">
                                <div class="col-md-6 col-md-offset-3">
                                    <div class="htc__login__register__wrap">
                                        <!-- Start Single Content -->
                                        <div id="register" class="">
                                            <form class="login" method="post">
                                                <div class="tabs__checkbox">
                                                    <span class="forget__bold"><a><?php echo $register_err;?></a></span>
                                                </div>
                                                <input name="name" type="text" placeholder="Nombre*" oninvalid="this.setCustomValidity('Inserte Nombre')" title="Inserte su nombre" required>
                                                <input name="lastname" type="text" placeholder="Apellidos*" oninvalid="this.setCustomValidity('Inserte Apellidos')" title="Inserte sus apellidos" required>
                                                <input id="password" name="password" type="password" placeholder="Contraseña*" oninvalid="this.setCustomValidity('Inserte Contraseña')" title="La contraseña debe ser al menos de 8 caracteres" required>
                                                <input name="password2" type="password" placeholder="Confirma contraseña*" oninvalid="this.setCustomValidity('Confirme Contraseña')" title="Inserte nuevamente la contraseña" required>
                                                <input name="email" type="email" placeholder="Correo Electrónico*" oninvalid="this.setCustomValidity('Inserte Correo Electrónico')" title="Inserte correo electrónico" required>
                                                <input name="user_id" type="number" placeholder="ID Si Es Estudiante" title="Si es estudiante, inserte su ID de estudiante">
                                                <div class="tabs__checkbox">
                                                    <span class="forget__bold"><a><?php echo $register_err;?></a></span>
                                                </div>
                                                <div class="tabs__checkbox">
                                                    <div class="g-recaptcha" data-sitekey="6LfOd7YaAAAAAKDfXyWBTAbjZKPhhzXg-8jWqExB"></div>
                                                </div>
                                                <div class="htc__login__btn"><button name="register">Registrarse</button></div>
                                            </form>
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

    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
</body>

</html>