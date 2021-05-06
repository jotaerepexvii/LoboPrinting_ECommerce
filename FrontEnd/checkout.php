<!doctype html>
<html class="no-js" lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Checkout</title>
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
    <!--REMEMBER TO MOVE LATER TO SESSION IN PHP-->
        <?php
        //include 'phpIncludes/recaptcha.php';
        ?>
    <!--[if lt IE 8]>
        <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
    <![endif]-->  

    <!-- Body main wrapper start -->
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
        <section class="htc__blog__area bg__white pt--80 pb--50">
            <div class="container">
                <div class="row">
                    <div class="col-xs-12">
                        <div class="bradcaump__inner text-center">
                            <h2  class="bradcaump-title">Checkout</h2>
                            <nav class="bradcaump-inner">
                                <a class="breadcrumb-item" href="index.php">Inicio</a>
                                <span class="brd-separetor">/</span>
                                <span class="breadcrumb-item active">Checkout</span>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- End Bradcaump area -->
        <!-- Start Checkout Area -->
        <section class="our-checkout-area ptb--120 bg__white">
            <div class="container">
                <div class="row">
                    <form action="#" method="post">
                        <div class="col-md-8 col-lg-8">
                            <?php
                                if(isset($_POST['confirmar']))
                                {
                                    $errors = array();

                                    //Variables
                                    $name = filter_input(INPUT_POST, 'name');
                                    $lastname = filter_input(INPUT_POST, 'lastname');
                                    $email = filter_input(INPUT_POST, 'email');
                                    $phone = filter_input(INPUT_POST, 'phone');
                                    
                                    if  (empty($name))
                                        array_push($errors, 'Name is require!');
                                    if  (empty($lastname))
                                        array_push($errors, 'Lastname is require!');
                                    if  (empty($email))
                                        array_push($errors, 'Email is require!');
                                    
                                    $address_1 = filter_input(INPUT_POST, 'address_1');
                                    $address_2 = filter_input(INPUT_POST, 'address_2');
                                    $zip_code = filter_input(INPUT_POST, 'zip_code');
                                    $city = filter_input(INPUT_POST, 'city');
                                    $state = filter_input(INPUT_POST, 'state');
                                    
                                    if  (empty($address_1))
                                        array_push($errors, 'Address is require!');
                                    if  (empty($zip_code))
                                        array_push($errors, 'Zip Code is require!');
                                    if  (empty($city))
                                        array_push($errors, 'City is require!');
                                    if  (empty($state))
                                        array_push($errors, 'State is require!');
                                    
                                    $card_name = filter_input(INPUT_POST, 'card_name');
                                    $card_number = filter_input(INPUT_POST, 'card_number');
                                    $exp_month = filter_input(INPUT_POST, 'exp_month');
                                    $exp_year = filter_input(INPUT_POST, 'exp_year');
                                    $ccv = filter_input(INPUT_POST, 'ccv');
                                    
                                    if  (empty($card_name))
                                        array_push($errors, 'Card Name is require!');
                                    if  (empty($card_number))
                                        array_push($errors, 'Card Number is require!');
                                    if  (empty($exp_month))
                                        array_push($errors, 'Exp Month is require!');
                                    if  (empty($exp_year))
                                        array_push($errors, 'Exp Year is require!');
                                    if  (empty($ccv))
                                        array_push($errors, 'CCV is require!');
                                    
                                    $order_id = rand(1111111111,getrandmax());
                                    $user_id = (int)$_POST['user_id'];
                                    date_default_timezone_set('Atlantic/Bermuda');
                                    $my_date = date("Y-m-d H:i:s");
                                    $address_id = (int)$_POST['address_id'];
                                    $payment_id = (int)$_POST['payment_id'];
                                    $track_num = rand(1111111111,getrandmax());
                                    $status_id = 1;

                                    if(count($errors) == 0)
                                    {
                                        $query_order = "INSERT INTO Orders(order_id, user_id, order_date, address_id, payment_id, track_number, status_id) 
                                        VALUES('$order_id', '$user_id', '$my_date', '$address_id', '$payment_id', '$track_num', '$status_id')";
                                        
                                        if(mysqli_query($dbc,$query_order))//Validate Insert
                                        {
                                            $max = sizeof($_SESSION['cart_product']);
                                            
                                            for($i=0; $i<$max; $i++)
                                            {
                                                $p = $_SESSION['cart_product'][$i];
                                                $q =  $_SESSION['cart_quantity'][$i];

                                                $query = "SELECT price, cost
                                                        FROM Product 
                                                        WHERE product_id = $p";

                                                $r = mysqli_query($dbc, $query);//Save & Validate Query Result
                                                $row = mysqli_fetch_array($r);//Present Products
                                                
                                                $price = $row['price'];
                                                $cost = $row['cost'];
                                                
                                                $query_contain = "INSERT INTO Contain(order_id, product_id, product_quantity, price, cost) 
                                                VALUES('$order_id', '$p', '$q', '$price', '$cost')";
                                                
                                                if(mysqli_query($dbc,$query_contain))//Validate Insert
                                                {
                                                    /*if($i == $max-1)
                                                    {
                                                        mysqli_close($dbc);
                                                        header('location:account.php');
                                                    }*/
                                                    
                                                }
                                                else
                                                    echo "Error: " . $query_contain . "<br>" . mysqli_error($dbc);
                                            }
                                        }
                                        else
                                            echo "Error: " . $query_order . "<br>" . mysqli_error($dbc);
                                    }
                                     else
                                            echo '<script>alert("ERROR:Variables")</script>';
                                }
                            ?>
                            
                            <?php
                                error_reporting(E_ERROR | E_PARSE);

                                $query = "SELECT *
                                            FROM Users
                                            WHERE user_id = {$_SESSION['login']}";
                                $r = mysqli_query($dbc,$query);//Make the Query
                                $row = mysqli_fetch_array($r);
                            ?>
                                    <!-- Start Checkbox Area -->
                                    <div class='checkout-form'>
                                        <h2 class='section-title-3'>Detalles de facturación</h2>
                                        <div class='checkout-form-inner'>
                                            <div class='single-checkout-box'>
                                                <input type='text' name='name' placeholder='Nombre' value='<?php echo $row['name'] ?>'>
                                                <input type='text' name='lastname' placeholder='Número De Tarjeta*' value='<?php echo $row['lastname'] ?>'>
                                            </div>
                                            <div class='single-checkout-box'>
                                                <input type='text' name='email' placeholder='Email' value='<?php echo $row['email'] ?>'>
                                                <input type='text' name='phone' placeholder='Telefono' value='<?php echo $row['phone'] ?>'>
                                            </div>

                                        </div>
                                    </div>
                                    <!-- End Checkbox Area -->
                            <?php
                                $query1 = "SELECT *
                                            FROM Payment_method
                                            WHERE user_id = {$_SESSION['login']}";
                                $r1 = mysqli_query($dbc,$query1);//Make the Query
                                $row1 = mysqli_fetch_array($r1);
                            ?>
                                    <!-- Start Payment Box -->
                                    <div class='payment-form'>
                                        <h2 class='section-title-3'>Método de Pago</h2>
                                        <div class='payment-form-inner'>
                                            <div class='single-checkout-box'>
                                                <input type='text' name='card_name' placeholder='Nombre De Tarjeta*' value='<?php echo $row1['card_name'] ?>'>
                                                <input type='text' name='card_number' placeholder='Número De Tarjeta*' value='<?php echo $row1['card_number'] ?>'>
                                            </div>
                                            <div class='single-checkout-box'>
                                                <input type='text' name='exp_month' placeholder='EXP Month*' value='<?php echo $row1['exp_month'] ?>'>
                                                <input type='text' name='exp_year' placeholder='EXP Year*' value='<?php echo $row1['exp_year'] ?>'>
                                            </div>
                                            <div class='single-checkout-box'>
                                                <input type='text' name='ccv' placeholder='CCV*' value='<?php echo $row1['ccv'] ?>'>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- End Payment Box -->
                            <?php
                                $query2 = "SELECT *
                                            FROM Address
                                            WHERE user_id = {$_SESSION['login']}";
                                $r2 = mysqli_query($dbc,$query2);//Make the Query
                                $row2 = mysqli_fetch_array($r2);
                            ?>
                                    <!-- Start Payment Box -->
                                    <div class='payment-form'>
                                        <h2 class='section-title-3'>Direccion de Envio</h2>
                                        <div class='payment-form-inner'>
                                            <div class='single-checkout-box'>
                                                <input type='text' name='address_1' placeholder='Direccion 1*' value='<?php echo $row2['address_1'] ?>'>
                                                <input type='text' name='address_2' placeholder='Direccion 2' value='<?php echo $row2['address_2'] ?>'>
                                            </div>
                                            <div class='single-checkout-box'>
                                                <input type='text' name='zip_code' placeholder='Zip Code*' value='<?php echo $row2['zip_code'] ?>'>
                                                <input type='text' name='city' placeholder='Ciudad*' value='<?php echo $row2['city'] ?>'>
                                            </div>
                                            <div class='single-checkout-box'>
                                                <input type='text' name='state' placeholder='Estado*' value='<?php echo $row2['state'] ?>'>
                                            </div>
                                        </div>
                                        <div class='single-checkout-box'>
                                            <!--<div class='g-recaptcha' data-sitekey='6LfOd7YaAAAAAKDfXyWBTAbjZKPhhzXg-8jWqExB'></div>-->
                                        </div>
                                    </div>
                                    <div class='checkout-button'>
                                        <button class='btnCheckout' name='confirmar'>CONFIRMAR Y COMPRAR</button>
                                        <input type ='hidden' name='user_id' value='<?php echo $row['user_id'] ?>'>
                                        <input type ='hidden' name='address_id' value='<?php echo $row2['address_id'] ?>'>
                                        <input type ='hidden' name='payment_id' value='<?php echo $row1['payment_id'] ?>'>
                                    </div>
                                    <!-- End Payment Box -->
                        </div>
                    </form>
                    <div class="col-md-4 col-lg-4">
                        <div class="checkout-right-sidebar">
                            <div class="our-important-note">
                                <h2 class="section-title-3">Note : <?php echo $_GET['total'] ?></h2>
                                <p class="note-desc">Lorem ipsum dolor sit amet, consectetur adipisici elit, sed do eiusmod tempor incididunt ut laborekf et dolore magna aliqua.</p>
                                <ul class="important-note">
                                    <li><a href="#"><i class="zmdi zmdi-caret-right-circle"></i>Lorem ipsum dolor sit amet, consectetur nipabali</a></li>
                                    <li><a href="#"><i class="zmdi zmdi-caret-right-circle"></i>Lorem ipsum dolor sit amet</a></li>
                                    <li><a href="#"><i class="zmdi zmdi-caret-right-circle"></i>Lorem ipsum dolor sit amet, consectetur nipabali</a></li>
                                    <li><a href="#"><i class="zmdi zmdi-caret-right-circle"></i>Lorem ipsum dolor sit amet, consectetur nipabali</a></li>
                                    <li><a href="#"><i class="zmdi zmdi-caret-right-circle"></i>Lorem ipsum dolor sit amet</a></li>
                                </ul>
                            </div>
                            <div class="puick-contact-area mt--60">
                                <h2 class="section-title-3">Quick Contract</h2>
                                <a href="phone:+8801722889963">+012 345 678 102 </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- End Checkout Area -->
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

    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
</body>

</html>