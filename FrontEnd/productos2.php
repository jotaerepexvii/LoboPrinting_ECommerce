<?php
    session_start();
    include 'phpIncludes/connection.php';

    $_GET['sort'] = '';
    
    if($_GET['sort'] == 'alpha')
    {
        if($_GET['ordr'] == 'asc'){
            $query = "SELECT *
                FROM Product ORDER BY name ASC ";
        }
        if($_GET['ordr'] == 'desc'){
            $query = "SELECT *
                FROM Product ORDER BY name DESC ";
        }
    }
    else if($_GET['sort'] == 'price')
    {
        if($_GET['ordr'] == 'asc'){
            $query = "SELECT *
                FROM Product 
                ORDER BY price ASC ";
        }
        if($_GET['ordr'] == 'desc'){
            $query = "SELECT *
                FROM Product 
                ORDER BY price DESC ";
        }
    }
    else if ($_GET['sort'] == 'time')
    {
        if($_GET['ordr'] == 'new'){
            $query = "SELECT *
                FROM Product 
                ORDER BY date DESC ";
        }
        if($_GET['ordr'] == 'old'){
            $query = "SELECT *
                FROM Product 
                ORDER BY date ASC ";
        }
    }
    else
    {
        $query = "SELECT *
            FROM Product 
            ORDER BY date DESC ";
    }

?>
<!doctype html>
<html class="no-js" lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Productos | Lobo Printing</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <?php
        include 'phpIncludes/stylesheets.php';
    ?>
</head>

<body>
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
    
        <!-- Start Bradcaump area -->
        <section class="htc__blog__area bg__white pt--90 pb--70">
            <div class="container">
                <div class="row">
                    <div class="col-xs-12">
                        <div class="bradcaump__inner text-center">
                            <h2 class="bradcaump-title">Productos</h2>
                            <nav class="bradcaump-inner">
                                <a class="breadcrumb-item" href="index.php">Inicio</a>
                                <span class="brd-separetor">/</span>
                                <span class="breadcrumb-item active">Productos</span>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- End Bradcaump area -->
    
        <!-- Start Our Product Area -->
        <section class="htc__product__area shop__page ptb--10 bg__white">
            <div class="container">
                <div class="htc__product__container">
                    <!-- Start Product Menu -->
                    <div class="row">
                        <div class="col-md-12">
                                <hr>
                            </div> 
                        <div class="col-md-9">
                            <div class="filter__menu__container">
                                <div class="product-tab-list2">
                                    <form action="productos.php" method="post" enctype="multipart/form-data">
                                        <a href="productos.php">Todo</a>
                                        <button type="submit" name="escolar">Escolar</button>
                                        <button type="submit" name="laboratorio">Laboratorio</button>
                                        <button type="submit" name="memorabilia">Memorabilia</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="product-tab-list2">
                                <button class="filter__menu float-left-style" href="#">Filtros</button>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <hr>
                        </div> 
                    </div>
                    <!-- Start Filter Menu -->
                    <div class="filter__wrap">
                        <div class="filter__cart">
                            <div class="filter__cart__inner">
                                <div class="filter__menu__close__btn">
                                    <a href="#"><i class="zmdi zmdi-close"></i></a>
                                </div>
                                <div class="filter__content">
                                    <!-- Start Single Content -->
                                    <div class="fiter__content__inner">
                                        <div class="single__filter">
                                            <h2>Ordenar Por</h2>
                                            <ul class="filter__list">
                                                <li><a href="productos.php">Todo</a></li>
                                                <li><a href="productos.php?sort=alpha&ordr=asc">Alfabeto: A-Z</a></li>
                                                <li><a href="productos.php?sort=alpha&ordr=desc">Alfabeto: Z-A</a></li>
                                                <li><a href="productos.php?sort=price&ordr=asc">Precio: Menor a Mayor</a></li>
                                                <li><a href="productos.php?sort=price&ordr=desc">Precio: Mayor a Menor</a></li>
                                                <li><a href="productos.php?sort=time&ordr=new">Lo Más Reciente</a></li>
                                                <li><a href="productos.php?sort=time&ordr=old">Lo Más Antiguo</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                    <!-- End Single Content -->
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- End Filter Menu -->
                    <!-- End Product Menu -->
                    <div class="row">
                        <div class="product__list another-product-style">
                            <?php
                                if(isset($_POST['todo']))
                                {
                                    $query = "SELECT *
                                                FROM Product ORDER BY name";
                                }
                                elseif(isset($_POST['escolar']))
                                {
                                    echo "<script>location.href='productos1.php'</script>";
                                    $query = "SELECT *
                                                    FROM Product p, Category c
                                                    WHERE p.product_id = c.product_id AND category_id = 1";
                                }
                                elseif(isset($_POST['laboratorio']))
                                {
                                    echo "<script>location.href='productos2.php'</script>";
                                    $query = "SELECT *
                                                FROM Product p, Category c
                                                WHERE p.product_id = c.product_id AND category_id = 2";
                                }
                                elseif(isset($_POST['memorabilia']))
                                {
                                    echo "<script>location.href='productos3.php'</script>";
                                    $query = "SELECT *
                                                FROM Product p, Category c
                                                WHERE p.product_id = c.product_id AND category_id = 3";
                                }
                                else
                                {
                                    $query = "SELECT *
                                                FROM Product";
                                }

                                if($r = mysqli_query($dbc, $query))//Save & Validate Query Result
                                {
                                    while($row=mysqli_fetch_array($r))//Present Products
                                    {
                                        print "
                                            <div class=''>
                                                <div class='col-md-3 single__pro col-lg-3 cat--1 col-sm-4 col-xs-12'>
                                                    <div class='product foo'>
                                                        <div class='product__inner'>
                                                            <div class='pro__thumb'>
                                                                <a href='single-product.php?product_id=$row[product_id]'>
                                                                    <img src='images/lobo_products/$row[image]' alt='product images'>
                                                                </a>
                                                            </div>
                                                        </div>
                                                        <div class='product__details'>
                                                            <h2><a href='single-product.php?product_id=$row[product_id]'>$row[name]<br/>$row[description]</a></h2>
                                                            <ul class='product__price'>
                                                                <li class='price'>$$row[price]</li>
                                                            </ul>
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
                            <!-- Start Single Product -->
                            <!-- End Single Product -->        
                        </div>
                    </div>
                </div>
            </div>
        </section>
        
        <section class="htc__blog__area bg__white ptb--80">
        </section>
        <!-- End Our Product Area -->
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