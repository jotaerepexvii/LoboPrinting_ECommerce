<!doctype html>
<html class="no-js" lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Iniciar Sesión</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <!-- Place favicon.ico in the root directory -->
    <link rel="shortcut icon" type="image/x-icon" href="dist/img/lobo.ico">
    <link rel="apple-touch-icon" href="apple-touch-icon.png">

    <!-- All css files are included here. -->
    <!-- Bootstrap fremwork main css -->
    <link rel="stylesheet" href="../FrontEnd/css/bootstrap.min.css">
    <!-- Owl Carousel main css -->
    <link rel="stylesheet" href="../FrontEnd/css/owl.carousel.min.css">
    <link rel="stylesheet" href="../FrontEnd/css/owl.theme.default.min.css">
    <!-- This core.css file contents all plugings css file. -->
    <link rel="stylesheet" href="../FrontEnd/css/core.css">
    <!-- Theme shortcodes/elements style -->
    <link rel="stylesheet" href="../FrontEnd/css/shortcode/shortcodes.css">
    <!-- Theme main style -->
    <link rel="stylesheet" href="../FrontEnd/style.css">
    <!-- Responsive css -->
    <link rel="stylesheet" href="../FrontEnd/css/responsive.css">
    <!-- User style -->
    <link rel="stylesheet" href="../FrontEnd/css/custom.css">
    
    <!-- Modernizr JS -->
    <script src="../FrontEnd/js/vendor/modernizr-2.8.3.min.js"></script>
</head>

<body>    
    <?php
        include 'phpIncludes/connection.php';
        $login_err = $email = '';
        if(isset($_POST['login']))
        {
            // username and password sent from form 
            $email = filter_input(INPUT_POST, 'email');
            $password = filter_input(INPUT_POST, 'password');
            $md5Pass = md5($password);
            $cryptPass = crypt($md5Pass, 'q/Bx');

            $query = "SELECT admin_id FROM Administrator WHERE email = '$email' and password = '$cryptPass'";
            $r = mysqli_query($dbc, $query);
            $row = mysqli_fetch_array($r);

            $count = mysqli_num_rows($r);
            
            if($count == 1) //If result matched $email and $cryptPass, table row must be 1 row
            {
                //include '../FrontEnd/phpIncludes/functions.php';
                //$response = recaptcha();
                //if ($response->success)
                //{
                    $_SESSION['login'] = $row['admin_id'];
                    //$_SESSION['cart'] = array(array("product","quantity"));
                    header('location:index.php');
                //}
                //else
                    //$login_err = 'reCAPTCHA Fallido<br>Intente nuevamente';
            }
            else
            {
                $login_err = 'Credenciales Incorrectas';
                $email = '';
            }
        }
        //include('header.php');
    ?>
    <!-- BODY MAIN WRAPPER START -->
    <div class="wrapper fixed__footer">  
        <!-- HEADER STYLE START -->
        <header id="header" class="htc-header header--3 bg__white">
            <div id="sticky-header-with-topbar" class="mainmenu__area sticky__header" style="background: #999999;">
                <div class="container">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="logo">
                                <a href="index.php">
                                    <img src="../FrontEnd/images/logo/lobo_printing.svg" alt="logo">
                                </a>
                            </div>
                        </div>
                        <div class="col-md-8 col-lg-8 col-sm-6 col-xs-6">
                        </div>
                        <div class="col-md-4 col-sm-4 col-xs-3"> 
                            <nav class="mainmenu__nav hidden-xs hidden-sm">
                                <ul class="main__menu"> 
                                    <li class="drop"><a href="#">Area De Administrador</a></li>
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
                                        <li role="presentation" class="login"><a role="tab" data-toggle="tab">Iniciar Sesión</a></li>
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
                                                <input name="email" type="text" placeholder="Correo Electrónico de Administrador*" value="<?php echo $email; ?>" oninvalid="this.setCustomValidity('Inserte Correo Electrónico de Administrador')" title="Inserte su correo electrónico" required> 
                                                <input name="password" type="password" placeholder="Contraseña de Administrador*" oninvalid="this.setCustomValidity('Inserte Contraseña de Administrador')" oninput="this.setCustomValidity('')" title="Inserte su contraseña" required>
                                                <div class="tabs__checkbox">
                                                    <span class="forget"><a href="#">¿Olvidó su contraseña?</a></span>
                                                    <span class="forget__bold"><a><?php echo $login_err;?></a></span>
                                                </div>
                                                <!--
                                                <div class="tabs__checkbox">
                                                    <div class="g-recaptcha" data-sitekey="6LfOd7YaAAAAAKDfXyWBTAbjZKPhhzXg-8jWqExB"></div>
                                                </div>
                                                -->
                                                <div class="htc__login__btn"><button class="scs" name="login">Accesar</button></div>
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
    <script src="../FrontEnd/js/vendor/jquery-1.12.0.min.js"></script>
    <!-- Bootstrap framework js -->
    <script src="../FrontEnd/js/bootstrap.min.js"></script>
    <!-- All js plugins included in this file. -->
    <script src="../FrontEnd/js/plugins.js"></script>
    <script src="../FrontEnd/js/slick.min.js"></script>
    <script src="../FrontEnd/js/owl.carousel.min.js"></script>
    <!-- Waypoints.min.js. -->
    <script src="../FrontEnd/js/waypoints.min.js"></script>
    <!-- Main js file that contents all jQuery plugins activation. -->
    <script src="../FrontEnd/js/main.js"></script>

    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
</body>

</html>