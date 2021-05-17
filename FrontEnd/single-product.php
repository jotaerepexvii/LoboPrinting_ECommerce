<?php
    session_start();
    include 'phpIncludes/connection.php';

    $query = "SELECT * FROM Product WHERE product_id = {$_GET['product_id']}";
                                                
        $rslt = mysqli_query($dbc, $query);
        $row = mysqli_fetch_array($rslt);

    if(isset($_POST['add_to_cart']))
    {
        if (!isset($_SESSION['login']))
        {
            echo("<script>location.href = 'login-required.php?msg=$msg';</script>");
        }
        else
        {
            if(isset($_SESSION['shopping_cart']))
            {
                $item_array_id = array_column($_SESSION['shopping_cart'], "item_id");
                if(!in_array($_GET["product_id"], $item_array_id))
                {
                    $count = count($_SESSION["shopping_cart"]);
                    $item_array = array(
                        'item_id'       => $_GET['product_id'],
                        'item_name'     => $_POST['hidden_name'],
                        'item_price'    => $_POST['hidden_price'],
                        'item_quantity' => $_POST['qtybutton']
                    );
                    $_SESSION['shopping_cart'][$count] = $item_array;
                }
                echo("<script>location.href = 'cart.php';</script>");
            }
            else
            {
                $item_array = array(
                    'item_id'       => $_GET['product_id'],
                    'item_name'     => $_POST['hidden_name'],
                    'item_price'    => $_POST['hidden_price'],
                    'item_quantity' => $_POST['qtybutton']
                );
                $_SESSION['shopping_cart'][0] = $item_array;
                echo("<script>location.href = 'cart.php';</script>");
            }
        }
    }
?>
<!doctype html>
<html class="no-js" lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Detalles Del Producto | Lobo Printing</title>
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
<?php

?>

    <!--[if lt IE 8]>
        <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
    <![endif]-->  

    <!-- BODY MAIN WRAPPER START -->
    <div>
        <!-- Header Star-->
        <?php include 'phpIncludes/header.php'; ?>
        <!-- Header End-->
        <div class="body__overlay"></div>
        <!-- Start Offset Wrapper -->
        <?php include 'phpIncludes/offset-wrapper.php'; ?>
        <!-- End Offset Wrapper -->
        <!-- Start Our Product Area -->
        <?php include 'phpIncludes/back.php'; ?>
        <section class="htc__product__area bg__white">
            <div class="container">
                <div class="row">
                    <!--Sidebar-->
                    <div class="col-md-12">
                        <div class="product-style-tab">
                            <div class="tab-content another-product-style jump">
                                <div class="tab-pane active" id="home1">
                                    <div class="row">
                                        <div class="product__list another-product-style"> <!--class name for carrousel: product-slider-active owl-carousel -->
                                            <?php
                                                error_reporting(E_ERROR | E_PARSE);

                                                print "
                                                    <div class='container'>
                                                        <div class='row'>
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
                                                                <div class='htc__product__details__inner pt--100'>
                                                                    <div class='pro__detl__title'>
                                                                        <h2>$row[name]<br>$row[description]</h2>
                                                                    </div>
                                                                <div class='htc__product__details__inner'>    
                                                                    <ul class='pro__dtl__prize' >
                                                                        <li>$ $row[price] c/u</li>
                                                                    </ul>
                                                                    <form method='post' action='single-product.php?action=add&product_id=$row[product_id]'>
                                                                        <div class='product-action-wrap'>
                                                                            <div class='prodict-statas'><span>Quantity </span></div>
                                                                                <div class='product-quantity'>
                                                                                    <div class='product-quantity'>
                                                                                        <div class='cart-plus-minus'>
                                                                                            <input class='cart-plus-minus-box' type='text' name='qtybutton' value='1'>
                                                                                            <input class='cart-plus-minus-box' type='hidden' name='hidden_name' value='$row[name]'>
                                                                                            <input class='cart-plus-minus-box' type='hidden' name='hidden_price' value='$row[price]'>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <ul class='pro__dtl__btn'>
                                                                            <li class='buy__now__btn'>
                                                                                <button type='submit' name=add_to_cart value='Add'>Add To Cart</button>
                                                                            </li>
                                                                        </ul>
                                                                    </form>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <hr class='p-t-150'>
                                                </div>
                                                ";
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
        <section class="htc__product__area shop__page pt--50 bg__white">
            <div class="container">
                <div class="htc__product__container">
                    <!-- Start Product Menu -->
                    <div class="row">
                        <div class="col-md-12 col-md-offset-5 pt--30">
                            <div class="filter__menu__container">
                                <div class='pro__detl__title'>
                                    <h2>Sugerencias</h2>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="htc__product__area bg__white">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="product-style-tab pb--100">
                            <div class="tab-content another-product-style jump">
                                <div class="tab-pane active" id="home1">
                                    <div class="row">
                                        <div class="product__list another-product-style"> <!--class name for carrousel: product-slider-active owl-carousel -->
                                            <?php
                                                $query2 = "SELECT * FROM Product
                                                            WHERE product_id NOT IN ({$row['product_id']})
                                                            ORDER BY RAND() limit 4";

                                                if($r2 = mysqli_query($dbc, $query2))//Save & Validate Query Result
                                                {
                                                    while($row2=mysqli_fetch_array($r2))//Present Products
                                                    {
                                                        //3 products: col-md-4 single__pro col-lg-4 cat--1 col-sm-4 col-xs-12
                                                        print "
                                                            <div class='col-md-3 single__pro col-lg-3 cat--1 col-sm-4 col-xs-12'>
                                                                <div class='product foo'>
                                                                    <div class='product__inner'>
                                                                        <div class='pro__thumb'>
                                                                            <a href='single-product.php?product_id={$row2['product_id']}'>
                                                                                <img src='images/lobo_products/$row2[image]' alt='$row2[name]$row2[description]'>
                                                                            </a>
                                                                        </div>
                                                                    </div>
                                                                    <div class='product__details'>
                                                                        <h2><a href='single-product.php?product_id={$row2['product_id']}'>$row2[name] $row2[description]</a></h2>
                                                                        <ul class='product__price'>
                                                                            <li class='price'>$ $row2[price] c/u</li>
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