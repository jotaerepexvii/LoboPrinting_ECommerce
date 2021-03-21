<!doctype html>
<html class="no-js" lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Iniciar Sesión / Registrarse</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <!-- Place favicon.ico in the root directory -->
    <link rel="shortcut icon" type="image/x-icon" href="images/favicon.ico">
    <link rel="apple-touch-icon" href="apple-touch-icon.png">

    <!-- All css files are included here. -->
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
    <!-- User style -->
    <link rel="stylesheet" href="css/custom.css">
    
    <!-- Modernizr JS -->
    <script src="js/vendor/modernizr-2.8.3.min.js"></script>
</head>

<body>
    <!-- BODY MAIN WRAPPER START -->
    <div class="wrapper fixed__footer">  
        <!-- HEADER STYLE START -->
        <header id="header" class="htc-header header--3 bg__white">
            <!-- MAINMENU AREA START -->
            <div id="sticky-header-with-topbar" class="mainmenu__area sticky__header" style="background: gold;">
                <div class="container">
                    <div class="row">
                        <div class="col-md-2 col-lg-2 col-sm-3 col-xs-3">
                            <div class="logo">
                                <a href="index.php">
                                    <img src="images/logo/logo.png" alt="logo">
                                </a>
                            </div>
                        </div>
                        <!-- MAINMENU ARES START -->
                        <div class="col-md-8 col-lg-8 col-sm-6 col-xs-6">
                            <!-- MENU START -->
                            <nav class="mainmenu__nav hidden-xs hidden-sm">
                                <ul class="main__menu">
                                    <li class="drop"><a href="index.php">Inicio</a></li>
                                    <li class="drop"><a href="contactanos.php">Contáctanos</a></li>
                                </ul>
                            </nav>
                            <!-- MENU END -->
                            
                            <!-- MOBILE MENU START -->
                            <div class="mobile-menu clearfix visible-xs visible-sm">
                                <nav id="mobile_dropdown">
                                    <ul>
                                        <li><a href="index.php">Inicio</a></li>
                                        <li><a href="contact_us.php">Contáctanos</a></li>
                                    </ul>
                                </nav>
                            </div>
                            <!-- MOBILE MENU END -->
                        </div>
                        <!-- MAINMENU ARES END -->
                        <div class="col-md-2 col-sm-4 col-xs-3">  
                            <ul class="menu-extra">
                                <li><a href="login-register.php"><span class="ti-user"></span></a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="mobile-menu-area"></div>
                </div>
            </div>
            <!-- MAINMENU AREA END -->
        </header>
        <!-- HEADER STYLE END -->

        <div class="body__overlay"></div>

        <!-- Start Offset Wrapper -->
        <div class="offset__wrapper">
            <!-- Start Offset Menu -->
            <!-- End Offset Wrapper -->

        <!-- SERVICES AREA START -->
        <section class="htc__blog__area bg__white pb--130">
            <div class="container">
                <div class="row align-items-center">
                    <div class="blog__wrap clearfix mt--60 xmt-30">
                        <div class="container">
                            <div class="row"> <!--space between header and form-->
                                <div class="col-md-6 col-md-offset-3"> 
                                    <ul class="login__register__menu" role="tablist">
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
                                                <input type="text" placeholder="Nombre de Usuario*">
                                                <input type="password" placeholder="Contraseña*">
                                            </form>
                                            <div class="tabs__checkbox">
                                                <input type="checkbox">
                                                <span> Recordar datos</span>
                                                <span class="forget"><a href="#">¿Olvidó su contraseña?</a></span>
                                            </div>
                                            <div class="htc__login__btn mt--30">
                                                <a href="#">Accesar</a>
                                            </div>
                                        </div>
                                        <!-- End Single Content -->
                                        <!-- Start Single Content -->
                                        <div id="register" role="tabpanel" class="single__tabs__panel tab-pane fade">
                                            <form class="login" method="post">
                                                <input type="text" placeholder="Nombre*">
                                                <input type="email" placeholder="Correo Electrónico*">
                                                <input type="password" placeholder="Contraseña*">
                                            </form>
                                            <div class="tabs__checkbox">
                                                <input type="checkbox">
                                                <span>Recordar datos</span>
                                            </div>
                                            <div class="htc__login__btn">
                                                <a href="#">Registrarse</a>
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