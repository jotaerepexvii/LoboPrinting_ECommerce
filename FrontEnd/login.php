<?php
  session_start();
  if (isset($_SESSION['login'])) {
    header('location:index.php');
  }
?>
<!doctype html>
<html class="no-js" lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Iniciar Sesión</title>
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
        $login_err = $email = '';

        if(isset($_POST['login']))
        {
            $email = filter_input(INPUT_POST, 'email');
            $cryptPass = encrypt(filter_input(INPUT_POST, 'password'));

            $query = "SELECT user_id FROM Users WHERE email = '$email' and password = '$cryptPass'";
            $r = mysqli_query($dbc, $query);
            $row = mysqli_fetch_array($r);
            $count = mysqli_num_rows($r);
            
            if($count == 1) //If result matched $email and $cryptPass, table row must be 1 row
            {
                $response = recaptcha();
                if ($response->success)
                {
                    $_SESSION['login'] = $row['user_id'];
                    
                    $_SESSION['success'] = 'Sesión Iniciada';
                    header('location:phpIncludes/success.php');
                }
                else
                    $login_err = 'reCAPTCHA Fallido<br>Intente nuevamente';
            }
            else
            {
                $login_err = 'Credenciales Incorrectas';
                $email = '';
            }
        }

        if (!isset($_SESSION['login']))
        {
            print "
            <!-- BODY MAIN WRAPPER START -->
            <div class='wrapper fixed__footer'>  
                <!-- HEADER STYLE START -->
                <header id='header' class='htc-header header--3 bg__white'>
                    <div id='sticky-header-with-topbar' class='mainmenu__area sticky__header' style='background: gold;'>
                        <div class='container'>
                            <div class='row'>
                                <div class='col-md-2 col-lg-2 col-sm-3 col-xs-3'>
                                    <div class='logo'>
                                        <a href='index.php'>
                                            <img src='images/logo/lobo_printing.svg' alt='logo'>
                                        </a>
                                    </div>
                                </div>
                                <div class='col-md-8 col-lg-8 col-sm-6 col-xs-5'>
                                    <nav class='mainmenu__nav hidden-xs hidden-sm'>
                                        <ul class='main__menu'>
                                        </ul>
                                    </nav>
                                </div>
                                <div class='col-md-4 col-sm-5 col-xs-4'> 
                                    <nav class='mainmenu__nav hidden-xs hidden-sm'>
                                        <ul class='main__menu'> 
                                            <li class='drop'><a href='index.php'>Inicio</a></li>
                                            <li class='drop'><a href='register.php'>Crear Nueva Cuenta</a></li>
                                        </ul>
                                    </nav>
                                </div>
                            </div>
                        </div>
                    </div>
                </header>
                <!-- HEADER STYLE END -->
                <!-- SERVICES AREA START -->
                <section class='htc__blog__area bg__white pb--130'>
                    <div class='container'>
                        <div class='row align-items-center'>
                            <div class='blog__wrap clearfix mt--60 xmt-30'>
                                <div class='container'>
                                    <div class='row'> <!--space between header and form-->
                                        <div class='col-md-6 col-md-offset-3'> 
                                            <ul class='login__register__menu' role='tablist'>
                                                <li role='presentation' class='login'><a href='#login' role='tab' data-toggle='tab'>Iniciar Sesión</a></li>
                                                <!-- <li><a href='register.php'>Registrarse</a></li> -->
                                            </ul>
                                        </div>
                                    </div>
                                    <!-- Start Login Register Content -->
                                    <div class='row'>
                                        <div class='col-md-6 col-md-offset-3'>
                                            <div class='htc__login__register__wrap'>
                                                <!-- Start Single Content -->
                                                <div id='login' role='tabpanel' class='single__tabs__panel tab-pane fade in active'>
                                                    <form class='login' method='post'>
                                                        <input name='email' type='text' placeholder='Correo Electrónico' value='$email' oninvalid='this.setCustomValidity('Inserte Correo Electrónico')' title='Inserte su correo electrónico' required> 
                                                        <input id='password' name='password' type='password' placeholder='Contraseña' oninvalid='this.setCustomValidity('Inserte Contraseña')' oninput='this.setCustomValidity('')' title='Inserte su contraseña' required>
                                                        <span toggle='#password' class='bi-eye field-icon toggle-password'></span>
                                                        <div class='tabs__checkbox'>
                                                            <span class='forget'><a href='#'>¿Olvidó su contraseña?</a></span>
                                                            <span class='forget__bold'><a>$login_err</a></span>
                                                        </div>
                                                        <div class='tabs__checkbox'>
                                                            <div class='g-recaptcha' data-sitekey='6LfOd7YaAAAAAKDfXyWBTAbjZKPhhzXg-8jWqExB'></div>
                                                        </div>
                                                        <div class='htc__login__btn'><button class='scs' name='login'>Accesar</button></div>
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
            ";
        }
    ?>
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