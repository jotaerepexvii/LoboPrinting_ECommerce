<!doctype html>
<html class="no-js" lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Carrito</title>
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

    <!-- Body main wrapper start -->
    <div class="wrapper fixed__footer">
        <!-- Start Header Style -->
            <!-- *********************************************************************************** -->
            <?php
                include 'phpIncludes/header.php';
            ?>
            <!-- *********************************************************************************** -->
        <!-- End Header Style -->
        
        <div class="body__overlay"></div>

        <!-- Start Offset Wrapper -->
            <!-- *********************************************************************************** -->
            <?php
                include 'phpIncludes/offset-wrapper.php';
            ?>
            <!-- *********************************************************************************** -->
        <!-- End Offset Wrapper -->
        
        <!-- Start Bradcaump area -->
        <section class="htc__blog__area bg__white pt--90 pb--40">
            <div class="container">
                <div class="row">
                    <div class="col-xs-12">
                        <div class="bradcaump__inner text-center">
                            <h2  class="bradcaump-title">Carrito</h2>
                            <nav class="bradcaump-inner">
                                <a class="breadcrumb-item" href="index.php">Inicio</a>
                                <span class="brd-separetor">/</span>
                                <span class="breadcrumb-item active">Carrito</span>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- End Bradcaump area -->
        <!-- cart-main-area start -->
        <div class="cart-main-area ptb--100 bg__white">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <form action="#">  
                            <?php
                                function emptyCart()
                                {
                                    print "
                                    <section class='htc__choose__us__ares bg__white'>
                                        <div class='container-fluid'>
                                            <div class='row align-items-center'>
                                                <div class='col-md-6 col-lg-6 col-sm-12 col-xs-12'>
                                                    <div class='htc__choose__wrap bg__cat--4'>
                                                        <h2 class='choose__title'>El carrito está vacío</h2>
                                                        <div class='choose__container'>
                                                            <div class='single__chooose'>
                                                                <div class='choose__us'>
                                                                    <div class='choose__icon'>
                                                                        <span class='ti-search'></span>
                                                                    </div>
                                                                    <div class='choose__details'>
                                                                        <h4><a href='productos.php'>Ver Productos</h4>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class='col-md-6 col-lg-6 col-sm-12 col-xs-12'>
                                                    <div class='htc__choose__wrap bg__cat--4'>
                                                        <h2 class='choose__title'>¿No tienes cuenta? Registrate</h2>
                                                        <div class='choose__container'>
                                                            <div class='single__chooose'>
                                                                <div class='choose__us'>
                                                                    <div class='choose__icon'>
                                                                        <span class='ti-plus'></span>
                                                                    </div>
                                                                    <div class='choose__details'>
                                                                        <h4><a href='register.php'>Crear Cuenta</h4>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </section>
                                    ";
                                }
                                if (isset($_SESSION['login']))
                                {
                                    error_reporting(E_ERROR | E_PARSE);
                                    $total = 0;
                                    $max = sizeof($_SESSION['cart_product']);

                                    if ($max == 0)
                                    {
                                        emptyCart();
                                    }
                                    else{
                                        print"
                                        <div class='table-content table-responsive'>
                                            <table>
                                                <thead>
                                                    <tr>
                                                        <th class='product-thumbnail'>Image</th>
                                                        <th class='product-name'>Producto</th>
                                                        <th class='product-price'>Precio</th>
                                                        <th class='product-quantity'>Cantidad</th>
                                                        <th class='product-subtotal'>Total</th>
                                                        <th class='product-remove'>Remove</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                        ";
                                        for($i=0; $i<$max; $i++)
                                        {
                                            $p = $_SESSION['cart_product'][$i];
                                            $q =  $_SESSION['cart_quantity'][$i];
                                            
                                            $query = "SELECT * 
                                                    FROM Product 
                                                    WHERE product_id = $p";
                                        
                                            $r = mysqli_query($dbc, $query);//Save & Validate Query Result
                                            $row = mysqli_fetch_array($r);//Present Products
                                            
                                            $t = $row['price'] * $q;
                                            $total = $total + $t;
                                            print "
                                                
                                                            <tr>
                                                                <td class='product-thumbnail'><a href='#'><img src='images/lobo_products/$row[image]' alt='product img' /></a></td>
                                                                <td class='product-name'><a href='http://localhost/LoboPrinting_ECommerce/FrontEnd/single-product.php?product_id=$row[product_id]'>$row[name] $row[description]</a></td>
                                                                <td class='product-price'><span class='amount'>$row[price]</span></td>
                                                                <td class='product-quantity'><input type='number' value='$q' /></td>
                                                                <td class='product-subtotal'>$t</td>
                                                                <td class='product-remove'><a href='#'>X</a></td>
                                                            </tr>
                                                        
                                            ";
                                        }
                                        print"
                                                    </tbody>
                                                </table>
                                            </div>
                                            <div class='row'>
                                                <div class='col-md-8 col-sm-7 col-xs-12'>
                                                    <div class='buttons-cart'>
                                                        <input type='submit' value='Actualizar Carrito' />
                                                        <a href='productos.php'>Continuar Comprando</a>
                                                    </div>
                                                    <!--
                                                    <div class='coupon'>
                                                        <h3>Coupon</h3>
                                                        <p>Enter your coupon code if you have one.</p>
                                                        <input type='text' placeholder='Coupon code' />
                                                        <input type='submit' value='Apply Coupon' />
                                                    </div>
                                                    -->
                                                </div>
                                                <div class='col-md-4 col-sm-5 col-xs-12'>
                                                    <div class='cart_totals'>
                                                        <table>
                                                            <tbody>
                                                                <tr class='cart-subtotal'>
                                                                    <th>Subtotal</th>
                                                                    <td><span class='amount'>$$total</span></td>
                                                                </tr>
                                                                <tr class='shipping'>
                                                                    <th>Envío</th>
                                                                    <td>
                                                                        <ul id='shipping_method'>
                                                                            <li>
                                                                                <input type='radio' /> 
                                                                                <label>
                                                                                    Flat Rate: <span class='amount'>£7.00</span>
                                                                                </label>
                                                                            </li>
                                                                            <li>
                                                                                <input type='radio' /> 
                                                                                <label>
                                                                                    Free Shipping
                                                                                </label>
                                                                            </li>
                                                                            <li></li>
                                                                        </ul>
                                                                        <p><a class='shipping-calculator-button' href='#'>Calculate Shipping</a></p>
                                                                    </td>
                                                                </tr>
                                                                <tr class='order-total'>
                                                                    <th>Total</th>
                                                                    <td>
                                                                        <strong><span class='amount'>$$total</span></strong>
                                                                    </td>
                                                                </tr>                                           
                                                            </tbody>
                                                        </table>
                                                        <div class='wc-proceed-to-checkout'>
                                                                <a href='checkout.php?total={$total}'>Pagar</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        ";
                                    }
                                }
                                else
                                {
                                    $total = '';
                                    emptyCart();
                                }
                            ?>
                        </form> 
                    </div>
                </div>
            </div>
        </div>
        <!-- cart-main-area end -->
        <!-- Start Footer Area -->
        <?php
            include 'phpIncludes/footer.php';
        ?>
        <!-- End Footer Area -->
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