<?php
    //session_start();
?>
<!doctype html>
<html class="no-js" lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Orden #<?php echo $_GET['order_id'];?></title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <!-- Place favicon.ico in the root directory -->
    <link rel="shortcut icon" type="image/x-icon" href="images/lobo.ico">
    <link rel="apple-touch-icon" href="apple-touch-icon.png">
    
    <?php
        include 'phpIncludes/stylesheets.php';
    ?>
</head>

<body>

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
        <section class="htc__blog__area bg__white ptb--90">
            <div class="container">
                <div class="row">
                    <div class="col-xs-12">
                        <div class="bradcaump__inner text-center">
                            <h2  class="bradcaump-title">Ordenes</h2>
                            <nav class="bradcaump-inner">
                                <a class="breadcrumb-item" href="account.php">Mi Cuenta</a>
                                <span class="brd-separetor">/</span>
                                <span class="breadcrumb-item active">Ordenes</span>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- End Bradcaump area -->
        <!-- cart-main-area start -->
        <section class="htc__product__area shop__page bg__white">
            <div class="container">
                <div class="htc__product__container">
                    <!-- Start Product Menu -->
                    <div class="row">
                        <div class="col-md-12">
                            <div class="filter__menu__container">
                                <div class="product-tab-list2">
                                    <button type="submit" onclick="history.go(-1);">< Atrás</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <div class="cart-main-area pt--50 bg__white">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <div class='table-content table-responsive'>
                            <table>
                                <thead>
                                    <tr>
                                        <th class='product-name'>ID</th>
                                        <th class='product-name'>Imagen</th>
                                        <th class='product-name'>Product</th>
                                        <th class='product-price'>Quantity</th>
                                        <th class='product-quantity'>Price</th>
                                </thead>
                                <tbody>
                                    <?php
                                        $query = "SELECT *
                                                    FROM Contain
                                                    WHERE order_id = {$_GET['order_id']}";

                                        if($r = mysqli_query($dbc,$query))//Save & Validate Query Result
                                        {
                                            while($row=mysqli_fetch_array($r))//Present Products
                                            {
                                                $query1 = "SELECT *
                                                    FROM Product
                                                    WHERE product_id = $row[product_id]";
                                                $r1 = mysqli_query($dbc,$query1);
                                                $row1=mysqli_fetch_array($r1);
                                                
                                                print "
                                                    <tr>
                                                        <td class='product-subtotal'>$row[product_id]</td>
                                                        <td class='product-thumbnail'><a href='single-product.php?product_id={$row['product_id']}'><img src='images/lobo_products/$row1[image]' alt='product img' /></a></td>
                                                        <td class='product-subtotal'>$row1[name] $row1[description]</td>
                                                        <td class='product-subtotal'>$row[product_quantity]</td>
                                                        <td class='product-subtotal'>$row[price]</td>
                                                    </tr>
                                                ";
                                            }
                                        }
                                        else
                                            print'<p style="color:red">NO SE PUEDE MOSTRAR RECORD PORQUE:'.mysqli_error($dbc).'.</P>';
                                        mysqli_close($dbc);
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <section class="htc__product__area shop__page bg__white pb--60">
                    <div class="container">
                        <div class="htc__product__container">
                            <!-- Start Product Menu -->
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="filter__menu__container">
                                        <div class="product-tab-list2">
                                            <button type="submit" onclick="history.go(-1);">< Atrás</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
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