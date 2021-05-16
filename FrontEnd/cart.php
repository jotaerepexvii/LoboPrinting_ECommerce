<?php
    session_start();
    include 'phpIncludes/connection.php';

    if (isset($_GET['action']))
    {
        if($_GET['action'] == 'delete')
        {
            foreach($_SESSION['shopping_cart'] as $keys => $values)
            {
                if($values['item_id'] == $_GET['product_id'])
                {
                    unset($_SESSION['shopping_cart'][$keys]);   //se remueve item
                    echo "<script>location.href = 'cart.php';</script>";
                }
            }
        }
    }
?>
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
        <section class="htc__blog__area bg__white">
            <div class="ht__bradcaump__area" style="background: rgba(0, 0, 0, 0) url(images/cart/cart-wallpaper2.svg) no-repeat scroll center center / cover ;">
                <div class="ht__bradcaump__wrap">
                    <div class="container">
                        <div class="row">
                            <div class="col-xs-12">
                                <div class="bradcaump__inner text-center">
                                    <h2 class="bradcaump-title">Carrito</h2>
                                    <nav class="bradcaump-inner">
                                    <a class="breadcrumb-item" href="index.php">Inicio</a>
                                    <span class="brd-separetor">/</span>
                                    <span class="breadcrumb-item active">Carrito</span>
                                    </nav>
                                </div>
                            </div>
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
                                                <div class='col-md-6 col-lg-6 col-sm-12 col-xs-12 col-md-offset-3'>
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
                                            </div>
                                        </div>
                                    </section>
                                    ";
                                }
                                
                                if (isset($_SESSION['login']))
                                {
                                    error_reporting(E_ERROR | E_PARSE);
                                    $total = 0;
                                    //$max = sizeof($_SESSION['cart_product']);
                                    //$max = $max - 1;

                                    if (empty($_SESSION["shopping_cart"]))
                                    {
                                        emptyCart();
                                    }
                                    else if (!empty($_SESSION["shopping_cart"]))
                                    {
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

                                        foreach($_SESSION["shopping_cart"] as $keys => $values)
                                        {
                                            $query = "SELECT * 
                                            FROM Product 
                                            WHERE product_id = $values[item_id]";
                                
                                            $r = mysqli_query($dbc, $query);//Save & Validate Query Result
                                            $row = mysqli_fetch_array($r);//Present Products
                                            
                                            $t = $row['price'] * $values['item_quantity'];
                                            $total = $total + $t;
                                            
                                            print "
                                            <tr>
                                                <td class='product-thumbnail'><a href='single-product.php?product_id=$values[item_id]'><img src='images/lobo_products/$row[image]' alt='product img' /></a></td>
                                                <td class='product-name'><a href='single-product.php?product_id=$values[item_id]'>$row[name] $row[description]</a></td>
                                                <td class='product-price'><span class='amount'>$row[price]</span></td>
                                                <td class='product-quantity'><input type='number' value='$values[item_quantity]'/></td>
                                                <td class='product-subtotal'>$".number_format((float)$t, 2, '.', ',')."</td>
                                                <td class='product-subtotal'><a href='cart.php?action=delete&product_id=$values[item_id]'>X</a></td>
                                            </tr>
                                            ";
                                            
                                        }
                                        //$envio = 5.00;
                                        print "
                                                                    </tbody>
                                                                </table>
                                                            </div>
                                                            <div class='row'>
                                                                <form method='post' action=cart.php>
                                                                    <div class='col-md-8 col-sm-7 col-xs-12'>
                                                                        <div class='buttons-cart'>
                                                                            <input type='submit' value='Actualizar'>
                                                                            <a href='productos.php'>Continuar Comprando</a>
                                                                        </div>
                                                                    </div>
                                                                    <div class='col-md-4 col-sm-5 col-xs-12'>
                                                                        <div class='cart_totals'>
                                                                            <table>
                                                                                <tbody>
                                                                                    <tr class='cart-subtotal'>
                                                                                        <th>SUBTOTAL</th>
                                                                                        <td><span class='amount'>$$total</span></td>
                                                                                    </tr>
                                                                                    <tr class='shipping'>
                                                                                        <th>Envío</th>
                                                                                        <td>
                                                                                            <ul id='shipping_method'>
                                                                                                <li>
                                                                                                    <input type='radio' id='envio' name='envio'  value='envio'> 
                                                                                                    <label>Envio<span class='amount'>+$5</span></label>
                                                                                                </li>
                                                                                                <li>
                                                                                                    <input type='radio' id='recogido' name='recogido' value='recogido'> 
                                                                                                    <label>Recoger<span class='amount'>+$0</span></label>
                                                                                                </li>
                                                                                            </ul>
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
                                                                </form>
                                                            </div>
                                                        </form> 
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        ";
                                    }
                                }
                                elseif(!(isset($_SESSION['login'])))
                                {
                                    //header("Location:loginRequired.php");
                                    //$total = '';
                                    //emptyCart();
                                    echo "<script>location.href = 'loginRequired.php';</script>";
                                }
                                //radio button post
                                if($_POST['Actualizar'] == 'envio')
                                {
                                    $total = $total + 5;
                                }
                            ?>
                                    
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