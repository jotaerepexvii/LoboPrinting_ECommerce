<?php


    //---
    header('location:coming-soon.php');
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
    <title>Fotos</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <?php
        include 'phpIncludes/stylesheets.php';
    ?>
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

        <!-- Start Product Details -->
        <section class="htc__product__details pt--120 pb--100 bg__white">
            <div class="container">
                <div class="row">
                    <div class="col-md-6 col-lg-6 col-sm-12 col-xs-12 smt-30 xmt-30">
                        <div class="htc__product__details__inner">
                            <div class="pro__detl__title">
                                <h2>Black Clock</h2>
                            </div>
                            <div class="pro__dtl__rating">
                                <ul class="pro__rating">
                                    <li><span class="ti-star"></span></li>
                                    <li><span class="ti-star"></span></li>
                                    <li><span class="ti-star"></span></li>
                                    <li><span class="ti-star"></span></li>
                                    <li><span class="ti-star"></span></li>
                                </ul>
                                <span class="rat__qun">(Based on 0 Ratings)</span>
                            </div>
                            <div class="pro__details">
                                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit, sed do eiusmod temf incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, nostr exercitation ullamco laboris nisi ut aliquip ex ea. </p>
                            </div>
                            <ul class="pro__dtl__prize">
                                <li class="old__prize">$15.21</li>
                                <li>$10.00</li>
                            </ul>
                            <div class="pro__dtl__color">
                                <h2 class="title__5">Choose Colour</h2>
                                <ul class="pro__choose__color">
                                    <li class="red"><a href="#"><i class="zmdi zmdi-circle"></i></a></li>
                                    <li class="blue"><a href="#"><i class="zmdi zmdi-circle"></i></a></li>
                                    <li class="perpal"><a href="#"><i class="zmdi zmdi-circle"></i></a></li>
                                    <li class="yellow"><a href="#"><i class="zmdi zmdi-circle"></i></a></li>
                                </ul>
                            </div>
                            <div class="pro__dtl__size">
                                <h2 class="title__5">Size</h2>
                                <ul class="pro__choose__size">
                                    <li><a href="#">xl</a></li>
                                    <li><a href="#">m</a></li>
                                    <li><a href="#">ml</a></li>
                                    <li><a href="#">lm</a></li>
                                    <li><a href="#">xxl</a></li>
                                </ul>
                            </div>
                            <div class="product-action-wrap">
                                <input type="file" id="upload" hidden/>
                                <label for="upload" class="buy__now__btn">Choose file</label>
                                <div class="prodict-statas"><span>Quantity :</span></div>
                                <div class="product-quantity">
                                    <form id='myform' method='POST' action='#'>
                                        <div class="product-quantity">
                                            <div class="cart-plus-minus">
                                                <input class="cart-plus-minus-box" type="text" name="qtybutton" value="02">
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <ul class="pro__dtl__btn">
                                <li class="buy__now__btn"><a href="#">buy now</a></li>
                                <li><a href="#"><span class="ti-heart"></span></a></li>
                                <li><a href="#"><span class="ti-email"></span></a></li>
                            </ul>
                            <div class="pro__social__share">
                                <h2>Share :</h2>
                                <ul class="pro__soaial__link">
                                    <li><a href="#"><i class="zmdi zmdi-twitter"></i></a></li>
                                    <li><a href="#"><i class="zmdi zmdi-instagram"></i></a></li>
                                    <li><a href="#"><i class="zmdi zmdi-facebook"></i></a></li>
                                    <li><a href="#"><i class="zmdi zmdi-google-plus"></i></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- End Product Details -->
        <!-- Start Footer -->
            <?php
                include 'phpIncludes/footer.php';
            ?>
        <!-- End Footer -->
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