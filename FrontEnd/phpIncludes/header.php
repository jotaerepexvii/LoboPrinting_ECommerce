<!-- Start PHP CONNECTION -->
<?php
    include 'phpIncludes/connection.php';
?>
<!-- End PHP CONNECTION -->
<!-- HEADER STYLE START -->
<header id="header" class="htc-header header--3 bg__white">
    <!-- MAINMENU AREA START -->
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
                <!-- MAINMENU ARES START -->
                <div class="col-md-8 col-lg-8 col-sm-6 col-xs-6">
                    <!-- MENU START -->
                    <nav class="mainmenu__nav hidden-xs hidden-sm">
                        <ul class="main__menu">
                            <li class="drop"><a href="index.php">Inicio</a></li>
                            <li class="drop"><a href="servicios.php">Servicios</a>
                                <ul class="dropdown">
                                    <li><a href="servicios-copias.php">Copias</a></li>
                                    <li><a href="servicios-fotos.php">Fotos</a></li>
                                    <li><a href="servicios-encuadernado.php">Encuadernados</a></li>
                                </ul>
                            </li>
                            <li class="drop"><a href="productos.php">Productos</a>
                                <ul class="dropdown">
                                    <li><a href="#">Escolar</a></li>
                                    <li><a href="#">Laboratorio</a></li>
                                    <li><a href="#">Memorabilia</a></li>
                                </ul>
                            </li>
                            <li class="drop"><a href="sobre-nosotros.php">Sobre Nosotros</a></li>
                            <li class="drop"><a href="contactanos.php">Contáctanos</a></li>
                        </ul>
                    </nav>
                    <!-- MENU END -->
                    <!-- MOBILE MENU START -->
                    <div class="mobile-menu clearfix visible-xs visible-sm">
                        <nav id="mobile_dropdown">
                            <ul>
                                <li><a href="index.php">Inicio</a></li>
                                <li><a href="services.php">Servicios</a>
                                    <ul>
                                        <li><a href="servicios-copias.php">Copias</a></li>
                                        <li><a href="servicios-fotos.php">Fotos</a></li>
                                        <li><a href="servicios-encuadernado.php">Encuadernados</a></li>
                                    </ul>
                                </li>
                                <li><a href="productos.php">Productos</a></li>
                                <li><a href="sobre-nosotros.php">Sobre Nosotros</a></li>
                                <li><a href="contactanos.php">Contáctanos</a></li>
                            </ul>
                        </nav>
                    </div>
                    <!-- MOBILE MENU END -->
                </div>
                <!-- MAINMENU ARES END -->
                <div class="col-md-2 col-sm-4 col-xs-3"> 
                    <nav class="mainmenu__nav hidden-xs hidden-sm">
                        <ul class="main__menu"> 
                            <li class="drop"><a href="#"><span class="ti-user"></span></a>
                                <ul class="dropdown">
                                    <?php
                                        if (!isset($_SESSION['login']))
                                        {
                                            print "
                                            <li><a href='login.php'>Iniciar Sección</a></li>
                                            <li><a href='register.php'>Crear Una Cuenta</a></li>
                                            ";
                                        }
                                        else 
                                        {
                                            print "
                                            <li><a href='account.php'>Cuenta del Usuario</a></li>
                                            <li><a href='phpIncludes/logout.php'>Cerrar Sección</a></li>
                                            ";
                                        }  
                                    ?>
                                </ul>
                            </li>
                            <li class="drop"><a href="cart.php"><span class="ti-shopping-cart"></span></a></li>
                        </ul>
                    </nav>
                </div>
            </div>
            <div class="mobile-menu-area"></div>
        </div>
    </div>
     <!-- MAINMENU AREA END -->
</header>
<!-- HEADER STYLE END -->