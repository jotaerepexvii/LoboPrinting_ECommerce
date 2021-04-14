<!doctype html>
<html class="no-js" lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Servicios | Lobo Printing</title>
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
        <?php
            include 'phpIncludes/header.php';
        ?>
        <div class="body__overlay"></div>

        <!-- Start Offset Wrapper -->
        <?php
            include 'phpIncludes/offset-wrapper.php';
        ?>
        <!-- End Offset Wrapper -->

        <!-- Start Bradcaump area -->
        <section class="htc__blog__area bg__white pt--80 pb--50">
            <div class="container">
                <div class="row">
                    <div class="col-xs-12">
                        <div class="bradcaump__inner text-center">
                            <h2  class="bradcaump-title">Servicios</h2>
                            <nav class="bradcaump-inner">
                                <a class="breadcrumb-item" href="index.php">Inicio</a>
                                <span class="brd-separetor">/</span>
                                <span class="breadcrumb-item active">Servicios</span>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- End Bradcaump area --> 

        <!-- SERVICES AREA START -->
        <section class="htc__blog__area bg__white pb--100">
            <div class="container">
                <div class="row">
                    <div class="blog__wrap clearfix mt--60 xmt-30">
                        <!-- SERVICE START -->
                        <div class="col-md-4 col-lg-4 col-sm-6 col-xs-12">
                            <div class="blog foo">
                                <div class="blog__inner">
                                    <div class="blog__thumb">
                                        <a href="copias.php">
                                            <img src="images/services/copies.jpg" alt="blog images">
                                        </a>
                                    </div>
                                    <div class="description">
                                        <h4><a href="copias.php">Copias</a></h4>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- SERVICE END -->
                        <!-- SERVICE START -->
                        <div class="col-md-4 col-lg-4 col-sm-6 col-xs-12">
                            <div class="blog foo">
                                <div class="blog__inner">
                                    <div class="blog__thumb">
                                        <a href="fotos.php">
                                            <img src="images/services/photo.jpg" alt="blog images">
                                        </a>
                                    </div>
                                    <div class="description">
                                        <h4><a href="fotos.php">Fotos</a></h4>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- SERVICE END -->
                        <!-- SERVICE START -->
                        <div class="col-md-4 col-lg-4 hidden-sm col-xs-12">
                            <div class="blog foo">
                                <div class="blog__inner">
                                    <div class="blog__thumb">
                                        <a href="encuadernado.php">
                                            <img src="images/services/bound.jpg" alt="blog images">
                                        </a>
                                    </div>
                                    <div class="description">
                                        <h4><a href="encuadernado.php">Encuadernado</a></h4>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- SERVICE END -->
                    </div>
                </div>
            </div>
        </section>
        <!-- SERVICES AREA END -->
        
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