<!-- *********************************************************************************** -->
<?php
    include 'phpIncludes/connection.php';
?>
<!-- *********************************************************************************** -->
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
                            <li class="drop"><a href="servicios.php">Servicios</a>
                                <ul class="dropdown">
                                    <li><a href="copias.php">Copias</a></li>
                                    <li><a href="fotos.php">Fotos</a></li>
                                    <li><a href="encuadernado.php">Encuadernados</a></li>
                                </ul>
                            </li>
                            <li class="drop"><a href="productos.php">Productos</a>
                                <ul class="dropdown">
                                    <li><a href="efectos_escolares.php">Efectos escolares</a></li>
                                    <li><a href="memorabilia.php">Memorabilia</a></li>
                                    <li><a href="ropa.php">Ropa</a></li>
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
                                        <li><a href="copias.php">Copias</a></li>
                                        <li><a href="fotos.php">Fotos</a></li>
                                        <li><a href="encuadernado.php">Encuadernados</a></li>
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
                    <ul class="menu-extra">
                        <li><a href="login-register.php"><span class="ti-user"></span></a></li>
                        <li class="cart__menu"><span class="ti-shopping-cart"></span></li>
                        <li class="toggle__menu hidden-xs hidden-sm"><span class="ti-menu"></span></li>
                    </ul>
                </div>
            </div>
            <div class="mobile-menu-area"></div>
        </div>
    </div>
     <!-- MAINMENU AREA END -->
</header>
<!-- HEADER STYLE END -->