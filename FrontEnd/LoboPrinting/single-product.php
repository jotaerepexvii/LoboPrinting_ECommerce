<!doctype html>
<html class="no-js" lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Detalles Del Producto | Lobo Printing</title>
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
    <!--[if lt IE 8]>
        <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
    <![endif]-->  

    <!-- BODY MAIN WRAPPER START -->
    <div class="wrapper fixed__footer">
        
        <!-- Header Star-->
            <!-- *********************************************************************************** -->
            <?php
                include 'phpIncludes/header.php';
            ?>
            <!-- *********************************************************************************** -->
        <!-- Header End-->

        <div class="body__overlay"></div>

        <!-- Start Offset Wrapper -->
            <!-- *********************************************************************************** -->
            <?php
                include 'phpIncludes/offset-wrapper.php';
            ?>
            <!-- *********************************************************************************** -->
        <!-- End Offset Wrapper -->

        <!-- Start Feature Product -->
        <!-- End Feature Product -->

        <!-- Start Our Product Area -->
        <section class="htc__product__area bg__white">
            <div class="container" style="margin-top:75px">
                <div class="row">
                    <!--Sidebar-->
                    <div class="col-md-12">
                        <div class="product-style-tab">
                            <div class="tab-content another-product-style jump">
                                <div class="tab-pane active" id="home1">
                                    <div class="row">
                                        <div class="product__list another-product-style"> <!--class name for carrousel: product-slider-active owl-carousel -->
                                        <?php
                                            $query = "SELECT * FROM Product 
                                                        ORDER BY date DESC limit 1";
                                            
                                            if($r = mysqli_query($dbc, $query))//Save & Validate Query Result
                                            {
                                                while($row=mysqli_fetch_array($r))//Present Products
                                                {
                                                    print "
                                                        <div class='col-md-6 col-lg-6 col-sm-12 col-xs-12'>
                                                            <div class='product'>
                                                                <div class='product__inner'>
                                                                    <div class='pro__thumb'>
                                                                        <a href='#'>
                                                                            <img src='images/lobo_products/$row[image]' alt='product images'>
                                                                        </a>
                                                                    </div>
                                                                </div>

                                                            </div>
                                                        </div>
                                                        <div class='col-md-6 col-lg-6 col-sm-12 col-xs-12'>
                                                            <div class='product'>
                                                                <div class='product__inner'>
                                                                    <div class='htc__choose__wrap bg__cat--4'>
                                                                        <h2 class='choose__title'>$row[name] $row[description]</h2>
                                                                        <h2 class='choose__title' style='color:red;margin-top:20px'>$ $row[price] c/u</h2>
                                                                        <div class='choose__container'>
                                                                            <div class='single__chooose'>
                                                                                <div class='choose__us'>
                                                                                    <div class='choose__icon'>
                                                                                        <span class='ti-shopping-cart'></span>
                                                                                    </div>
                                                                                    <div class='choose__details'>
                                                                                        <a href='#'><h4>Añadir al Carrito</h4></a>
                                                                                        <p></p>
                                                                                    </div>
                                                                                </div>
                                                                                <div class='choose__us'>
                                                                                    <div class='choose__icon'>
                                                                                        <span class='ti-credit-card'></span>
                                                                                    </div>
                                                                                    <div class='choose__details'>
                                                                                        <h4>Método De Pago</h4>
                                                                                        <p>Lorem ipsum dolor sit amet consect adipisic elit sed do. </p>
                                                                                    </div>
                                                                                </div>
                                                                                <div class='choose__us'>
                                                                                    <div class='choose__icon'>
                                                                                        <span class='ti-truck'></span>
                                                                                    </div>
                                                                                    <div class='choose__details'>
                                                                                        <h4>Envío</h4>
                                                                                        <p>Envío disponible a Puerto Rico</p>
                                                                                    </div>
                                                                                </div>
                                                                                <div class='product_count'>
                                                                                    <input type='text' name='qty' id='sst' maxlength='12' value='' title='Quantity:' class='input-text qty'>
                                                                                        <button name='qty-up' class='increase items-count' type='submit'><i class='lnr lnr-chevron-up'></i></button>
                                                                                        <button name='qty-down' class='reduced items-count' type='submit'><i class='lnr lnr-chevron-down'></i></button>
                                                                                    </input>
                                                                                </div>
                                                                                <div class='choose__us'>
                                                                                    <div class='choose__icon'>
                                                                                        <span class='ti-heart'></span>
                                                                                    </div>
                                                                                    <div class='choose__details'>
                                                                                        <h4>Free Gift Box</h4>
                                                                                        <p>Lorem ipsum dolor sit amet consect adipisic elit sed do. </p>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
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
                        <hr style="margin-top:100px;margin-bottom:100px">
                    </div>
                </div>
            </div>
        </section>
        <!-- End Our Product Area -->

        <!-- Start Our Product Area -->
        <!-- End Our Product Area -->

        <!-- Start Our Product Area -->
        <!-- End Our Product Area -->

        <!-- Start Blog Area -->
        <section class="htc__blog__area bg__white pb--130">
            <div class="container">
                <div class="row">
                    <div class="col-xs-12">
                        <div class="section__title section__title--2 text-center">
                            <h2 class="title__line">Productos Relacionados</h2>
                            <p></p>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="blog__wrap clearfix mt--60 xmt-30">
                        <!-- Start Single Blog -->
                        <div class="col-md-4 col-lg-4 col-sm-6 col-xs-12">
                            <div class="blog ">
                                <div class="blog__inner">
                                    <div class="blog__thumb">
                                        <a href="blog-details.html">
                                            <img src="images/blog/blog-img/2.jpg" alt="blog images">
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
                                            <p class="blog__des"><a href="blog-details.html">Lorem ipsum dolor sit consectetu.</a></p>
                                            <div class="blog__btn">
                                                <a class="read__more__btn" href="blog-details.html">read more</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- End Single Blog -->
                        <!-- Start Single Blog -->
                        <div class="col-md-4 col-lg-4 col-sm-6 col-xs-12">
                            <div class="blog ">
                                <div class="blog__inner">
                                    <div class="blog__thumb">
                                        <a href="blog-details.html">
                                            <img src="images/blog/blog-img/2.jpg" alt="blog images">
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
                                            <p class="blog__des"><a href="blog-details.html">Lorem ipsum dolor sit consectetu.</a></p>
                                            <div class="blog__btn">
                                                <a class="read__more__btn" href="blog-details.html">read more</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- End Single Blog -->
                        <!-- Start Single Blog -->
                        <div class="col-md-4 col-lg-4 hidden-sm col-xs-12">
                            <div class="blog ">
                                <div class="blog__inner">
                                    <div class="blog__thumb">
                                        <a href="blog-details.html">
                                            <img src="images/blog/blog-img/3.jpg" alt="blog images">
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
                                            <p class="blog__des"><a href="blog-details.html">Lorem ipsum dolor sit consectetu.</a></p>
                                            <ul class="bl__meta">
                                                <li>By :<a href="#">Admin</a></li>
                                                <li>Product</li>
                                            </ul>
                                            <div class="blog__btn">
                                                <a class="read__more__btn" href="blog-details.html">read more</a>
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
                                    <a href="cart.php">Add to cart</a>
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