<?php

    //---
    //header('location:phpIncludes/coming-soon.php');
    //---

    session_start();
    include 'phpIncludes/connection.php';
    /*if (!isset($_SESSION['login'])) {
        header('location:login-required.php');
    }*/
?>
<!doctype html>
<html class="no-js" lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Copias</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <!-- Place favicon.ico in the root directory -->
    <link rel="shortcut icon" type="image/x-icon" href="images/lobo.ico">
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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdf.js/1.8.349/pdf.min.js"></script>
    <script src="js/vendor/modernizr-2.8.3.min.js"></script>
</head>

<body>
    <!--[if lt IE 8]>
        <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
    <![endif]-->  

    <!-- BODY MAIN WRAPPER START -->
    <div class="wrapper fixed__footer">
        <!-- *********************************************************************************** -->
        <?php
            include 'phpIncludes/header.php';
        ?>
        <!-- *********************************************************************************** -->
        <div class="body__overlay"></div>
        <!-- Start Offset Wrapper -->
            <!-- *********************************************************************************** -->
            <?php
                include 'phpIncludes/offset-wrapper.php';
            ?>
            <!-- *********************************************************************************** -->
        <!-- End Offset Wrapper -->

        <!-- Start Product Details -->
        <section class="htc__product__details pt--120 pb--100 bg__white">
            <div class="container">
                <div class="row">
                    <div class="col-md-10 col-lg-12 col-sm-12 col-xs-12 smt-30 xmt-30">
                        <div class="filter__menu__container">
                            <div class="product-tab-list2">
                                <label>Subir Archivo<input type="file" id="pdf-upload"></label>
                                <span>|</span>
                                <a>Enviar</a>
                                <hr>
                                <canvas id="canvas" style="height:100%; width: 100%; border:1px solid #666; color:#666;">Escoje Un Archivo</canvas>
                            </div>
                        </div>
                        
                    </div>
                </div>
            </div>
        </section>
        <!-- End Product Details -->
        
        <!-- *********************************************************************************** -->
        <?php
            include 'phpIncludes/footer.php';
        ?>
        <!-- *********************************************************************************** -->
        
    </div>
    <!-- Body main wrapper end -->
    
<!-- Placed js at the end of the document so the pages load faster -->

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