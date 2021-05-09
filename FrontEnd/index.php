<!doctype html>
<html class="no-js" lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Inicio | Lobo Printing</title>
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
    <script src="js/vendor/modernizr-2.8.3.min.js"></script>
</head>

<body>
    <!--[if lt IE 8]>
        <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
    <![endif]-->  

    <!-- BODY MAIN WRAPPER START -->
    <div class="wrapper fixed__footer">
        
        <!-- Start Header -->
        <?php
            include 'phpIncludes/header.php';
        ?>
        <!-- End Header -->
        <div class="body__overlay"></div>
        <!-- Start Offset Wrapper -->
        <?php
            include 'phpIncludes/offset-wrapper.php';
        ?>
        <!-- End Offset Wrapper -->

        <!--banner--
        <div class="">
            <div class="only-banner bg__white pt--50 pb--80">
                <div class="container">
                    <div class="only-banner-img">
                        <--<iframe id="4a0334d9-fce9-4ce5-83e4-6128d371e9ee" src="https://www.vectary.com/viewer/v1/?model=4a0334d9-fce9-4ce5-83e4-6128d371e9ee&env=teufelsbergground2" frameborder="0" width="100%" height="480"></iframe>-
                        <a><img src="images/place/interiorPano1.jpg" alt="new product"></a>
                    </div>
                </div>
            </div>
        </div>
        -->

        <section class="categories-slider-area bg__white pt--50 pb--80">
            <div class="container">
                <div class="row">
                    <!-- Start Left Feature -->
                    <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12 float-left-style">
                        <!-- Start Slider Area -->
                        <div class="slider__container slider--one">
                            <div class="slider__activation__wrap owl-carousel owl-theme">
                                <!-- Start Single Slide -->
                                <div class="slide slider__full--screen slider-height-inherit slider-text-right" style="background: rgba(0, 0, 0, 0) url(images/index/interiorPano1.jpg) no-repeat scroll center center / cover ;">
                                    <div class="container">
                                        <div class="row">
                                            <div class="col-md-10 col-lg-8 col-md-offset-2 col-lg-offset-4 col-sm-12 col-xs-12">
                                                <div class="slider__inner">
                                                    <h1>><span class="text--theme"> Lobo Printing</span></h1>
                                                    <div class="slider__btn">
                                                        <a class="htc__btn" href="productos.php">Comprar Ahora</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="slide slider__full--screen slider-height-inherit  slider-text-left" style="background: rgba(0, 0, 0, 0) url(images/index/interiorPano1.jpg) no-repeat scroll center center / cover ;">
                                    <div class="container">
                                        <div class="row">
                                            <div class="col-md-8 col-lg-8 col-sm-12 col-xs-12">
                                                <div class="slider__inner">
                                                    <h1>New Product <span class="text--theme">Collection</span></h1>
                                                    <div class="slider__btn">
                                                        <a class="htc__btn" href="cart.html">shop now</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--end banner-->

        <!-- Start Our Product Area -->
        <section class="htc__product__area bg__white">
            <div class="container">
                <div class="row">
                    <!--Sidebar-->
                    <div class="col-md-12">
                        <hr>
                        <div class="product-style-tab pb--50">
                            <div class="filter__menu__container">
                                <div class="product-tab-list2">
                                    <form action="index.php" method="post" enctype="multipart/form-data">
                                        <button type="submit" name="lo-ultimo">Lo último</button>
                                        <button type="submit" name="mas-vendido">Mas Vendido</button>
                                    </form>
                                </div>
                            </div>
                            <div class="tab-content another-product-style jump">
                                <div class="tab-pane active" id="home1">
                                    <div class="row">
                                        <div class="product__list another-product-style"> <!--class name for carrousel: product-slider-active owl-carousel -->
                                            <?php
                                                if(isset($_POST['lo-ultimo']))
                                                {
                                                    $query = "SELECT * FROM Product 
                                                              ORDER BY date DESC limit 3";
                                                } elseif(isset($_POST['mas-vendido'])) {
                                                    $query = "SELECT * FROM Product
                                                              ORDER BY sold DESC limit 3";
                                                } else {
                                                    $query = "SELECT * FROM Product 
                                                              ORDER BY in_stock DESC limit 3";
                                                }
                                                if($r = mysqli_query($dbc, $query))//Save & Validate Query Result
                                                {
                                                    while($row=mysqli_fetch_array($r))//Present Products
                                                    {
                                                        print "
                                                            <div class='col-md-4 single__pro col-lg-4 cat--1 col-sm-4 col-xs-12'>
                                                                <div class='product'>
                                                                    <div class='product__inner'>
                                                                        <div class='pro__thumb'>
                                                                            <a href='single-product.php?product_id={$row['product_id']}'>
                                                                                <img src='images/lobo_products/$row[image]' alt='$row[name]$row[description]'>
                                                                            </a>
                                                                        </div>
                                                                    </div>
                                                                    <div class='product__details foo'>
                                                                        <h2><a href='single-product.php?product_id={$row['product_id']}'>$row[name] $row[description]</a></h2>
                                                                        <ul class='product__price'>
                                                                            <li class='price'>$$row[price]</li>
                                                                        </ul>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        ";
                                                    }
                                                }
                                                else
                                                    print'<p style="color:red">NO SE PUEDE MOSTRAR RECORD PORQUE:'.mysqli_error($dbc).'.</P>';
                                                mysqli_close($dbc);
                                            ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- End Our Product Area -->
        <section class="htc__choose__us__ares bg__white ptb--100">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-10 col-md-offset-1">
                        <div class="htc__choose__wrap bg__cat--4">
                            <h2 class="choose__title text-center">Nuestra Tienda</h2>
                            <div class="choose__container">
                                <div class="col-6">
                                    <div class="single__chooose">
                                        <div class="choose__us">
                                            <div class="choose__icon">
                                                <span class="ti-credit-card"></span>
                                            </div>
                                            <div class="choose__details">
                                                <h4>Método De Pago</h4>
                                                <p>Pronto contaremos con los métodos de pago que usted tiene!</p>
                                            </div>
                                        </div>
                                        <div class="choose__us">
                                            <div class="choose__icon">
                                                <span class="ti-truck"></span>
                                            </div>
                                            <div class="choose__details">
                                                <h4>Envío</h4>
                                                <p>Envío por correo de memorabilia disponible a todo Puerto Rico</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="single__chooose">
                                        <div class="choose__us">
                                            <div class="choose__icon">
                                                <span class="ti-reload"></span>
                                            </div>
                                            <div class="choose__details">
                                                <h4>Devoluciones</h4>
                                                <p>Para mas información en devoluciones,</p>
                                                <div>
                                                    <a class="red-font" href="contactanos.php">
                                                    contáctanos
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="choose__us">
                                            <div class="choose__icon">
                                                <span class="ti-help-alt"></span>
                                            </div>
                                            <div class="choose__details">
                                                <h4>¿Dudas?</h4>
                                                <p>Si necesita saber mas información </p>
                                                <div>
                                                    <a class="red-font" href="contactanos.php">
                                                    contáctanos
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <a name="Noticias"></a>
        </section>

        <!-- Start Blog Area -->
        
        <section class="htc__blog__area bg__white pt--50 pb--130">
            <div class="container">
                <div class="row">
                    <div class="col-xs-12">
                        <div class="section__title section__title--2 text-center">
                            <h2 class="title__line">Últimas Noticias</h2>
                            <p>Las últimas noticias de Lobo Printing</p>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="blog__wrap clearfix mt--60 xmt-30">
                        <!-- Start Single Blog -->
                        <div class="col-md-4 col-lg-4 col-sm-6 col-xs-12">
                            <div class="blog foo">
                                <div class="blog__inner">
                                    <div class="blog__thumb">
                                        <a href="blog-details.php">
                                            <img src="images/index/newWebpage.jpeg" alt="blog images">
                                        </a>
                                        <div class="blog__post__time">
                                            <div class="post__time--inner">
                                                <span class="month">8 may</span>
                                                <span class="month">2021</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="blog__hover__info">
                                        <div class="blog__hover__action">
                                            <p class="blog__des">Lobo printing estrena su nuevo webpage.</p>
                                            <div class="blog__btn">
                                                <a class="read__more__btn" href="blog-details.php">read more</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- End Single Blog -->
                        <!-- Start Single Blog -->
                        <div class="col-md-4 col-lg-4 col-sm-6 col-xs-12">
                            <div class="blog foo">
                                <div class="blog__inner">
                                    <div class="blog__thumb">
                                        <a target="_blank" href="http://tintadigital.upra.edu/estrenan-school-suply-en-la-upra/">
                                            <img src="images/index/schoolSupplyAbre2.jpg" alt="blog images">
                                        </a>
                                        <div class="blog__post__time">
                                            <div class="post__time--inner">
                                                <span class="month">12 Feb</span>
                                                <span class="month">2019</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="blog__hover__info">
                                        <div class="blog__hover__action">
                                            <p class="blog__des">Pequeño “school supply” abre sus puertas en UPRA</p>
                                            <div class="blog__btn">
                                                <a class="read__more__btn" target="_blank" href="http://tintadigital.upra.edu/estrenan-school-suply-en-la-upra/">read more</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- End Single Blog -->
                        <!-- Start Single Blog -->
                        <div class="col-md-4 col-lg-4 hidden-sm col-xs-12">
                            <div class="blog foo">
                                <div class="blog__inner">
                                    <div class="blog__thumb">
                                        <a href="blog-details.php">
                                            <img src="images/blog/blog-img/1.jpg" alt="blog images">
                                        </a>
                                        <div class="blog__post__time">
                                            <div class="post__time--inner">
                                                <span class="date">14</span>
                                                <span class="month">sep</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="blog__hover__info">
                                        <div class="blog__hover__action">
                                            <p class="blog__des">Lorem ipsum dolor sit consectetu.</p>
                                            <div class="blog__btn">
                                                <a class="read__more__btn" href="blog-details.php">read more</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- End Single Blog -->
                    </div>
                </div>
            </div>
        </section>
        <!-- End Blog Area -->
        <!-- Start Footer Area -->
        <?php
            include 'phpIncludes/footer.php';
        ?>
        <!-- End Footer Area -->
    </div>
    <!-- Body main wrapper end -->
    <!-- QUICKVIEW PRODUCT -->
    <div id="quickview-wrapper">
        <!-- Modal -->
        <div class="modal fade" id="productModal" tabindex="-1" role="dialog">
            <div class="modal-dialog modal__container" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    </div>
                    <div class="modal-body">
                        <div class="modal-product">
                            <!-- Start product images -->
                            <div class="product-images">
                                <div class="main-image images">
                                    <img alt="big images" src="images/product/big-img/1.jpg">
                                </div>
                            </div>
                            <!-- end product images -->
                            <div class="product-info">
                                <h1>Simple Fabric Bags</h1>
                                <div class="rating__and__review">
                                    <ul class="rating">
                                        <li><span class="ti-star"></span></li>
                                        <li><span class="ti-star"></span></li>
                                        <li><span class="ti-star"></span></li>
                                        <li><span class="ti-star"></span></li>
                                        <li><span class="ti-star"></span></li>
                                    </ul>
                                    <div class="review">
                                        <a href="#">4 customer reviews</a>
                                    </div>
                                </div>
                                <div class="price-box-3">
                                    <div class="s-price-box">
                                        <span class="new-price">$17.20</span>
                                        <span class="old-price">$45.00</span>
                                    </div>
                                </div>
                                <div class="quick-desc">
                                    Designed for simplicity and made from high quality materials. Its sleek geometry and material combinations creates a modern look.
                                </div>
                                <div class="select__color">
                                    <h2>Select color</h2>
                                    <ul class="color__list">
                                        <li class="red"><a title="Red" href="#">Red</a></li>
                                        <li class="gold"><a title="Gold" href="#">Gold</a></li>
                                        <li class="orange"><a title="Orange" href="#">Orange</a></li>
                                        <li class="orange"><a title="Orange" href="#">Orange</a></li>
                                    </ul>
                                </div>
                                <div class="select__size">
                                    <h2>Select size</h2>
                                    <ul class="color__list">
                                        <li class="l__size"><a title="L" href="#">L</a></li>
                                        <li class="m__size"><a title="M" href="#">M</a></li>
                                        <li class="s__size"><a title="S" href="#">S</a></li>
                                        <li class="xl__size"><a title="XL" href="#">XL</a></li>
                                        <li class="xxl__size"><a title="XXL" href="#">XXL</a></li>
                                    </ul>
                                </div>
                                <div class="social-sharing">
                                    <div class="widget widget_socialsharing_widget">
                                        <h3 class="widget-title-modal">Share this product</h3>
                                        <ul class="social-icons">
                                            <li><a target="_blank" title="rss" href="#" class="rss social-icon"><i class="zmdi zmdi-rss"></i></a></li>
                                            <li><a target="_blank" title="Linkedin" href="#" class="linkedin social-icon"><i class="zmdi zmdi-linkedin"></i></a></li>
                                            <li><a target="_blank" title="Pinterest" href="#" class="pinterest social-icon"><i class="zmdi zmdi-pinterest"></i></a></li>
                                            <li><a target="_blank" title="Tumblr" href="#" class="tumblr social-icon"><i class="zmdi zmdi-tumblr"></i></a></li>
                                            <li><a target="_blank" title="Pinterest" href="#" class="pinterest social-icon"><i class="zmdi zmdi-pinterest"></i></a></li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="addtocart-btn">
                                    <a href="#">Add to cart</a>
                                </div>
                            </div><!-- .product-info -->
                        </div><!-- .modal-product -->
                    </div><!-- .modal-body -->
                </div><!-- .modal-content -->
            </div><!-- .modal-dialog -->
        </div>
        <!-- END Modal -->
    </div>
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