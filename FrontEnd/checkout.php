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
                    <?php
                        error_reporting(E_ERROR | E_PARSE);
                                
                        $query = "SELECT *
                                    FROM Users
                                    WHERE user_id = {$_SESSION['login']}";
                        $r = mysqli_query($dbc,$query);//Make the Query
                        $row = mysqli_fetch_array($r);

                        print"
                        <div class='col-md-8 col-lg-8'>
                            <div class='ckeckout-left-sidebar'>
                                <!-- Start Checkbox Area -->
                                <div class='checkout-form'>
                                    <h2 class='section-title-3'>Detalles de facturación</h2>
                                    <div class='checkout-form-inner'>
                                        <div class='single-checkout-box'>
                                            <input type='text' placeholder='Nombre*' oninvalid='this.setCustomValidity('Inserte Nombre')' title='Inserte su nombre' value=$row[name] required>
                                            <input type='text' placeholder='Apellidos*' oninvalid='this.setCustomValidity('Inserte Apellidos')' title='Inserte sus apellidos' value=$row[lastname] required>
                                        </div>
                                        <div class='single-checkout-box'>
                                            <input type='email' placeholder='Correo Electrónico*' oninvalid='this.setCustomValidity('Inserte Correo Electrónico')' title='Inserte su correo electrónico' value=$row[email] required>
                                            <input type='text' placeholder='Teléfono*' oninvalid='this.setCustomValidity('Inserte Teléfono')' title='Inserte su número de teléfono' required>
                                        </div>
                                        <div class='single-checkout-box'>
                                            <textarea name='message' placeholder='Mensaje*' title='Si desea acompañar su orden con un mensaje, inserte un mensaje'></textarea>
                                        </div>
                                        <div class='single-checkout-box select-option mt--40'>
                                            <select oninvalid='this.setCustomValidity('Seleccione un País')' title='Seleccione el país donde recibirá su orden.\nSolo Puerto Rico está disponible por el momento' required disabled>
                                                <option selected disabled hidden>Puerto Rico*</option>
                                                <option>Puerto Rico</option>
                                                <option>United States</option>
                                            </select>
                                            <input type='text' placeholder='Zip Code*' oninvalid='this.setCustomValidity('Inserte Zip Code')' title='Inserte zip code donde recibirá su orden' required>
                                        </div>
                                        <div class='single-checkout-box'>
                                            <input type='email' placeholder='Pueblo*' oninvalid='this.setCustomValidity('Inserte pueblo')' title='Inserte el pueblo donde recibirá su orden' required>
                                        </div>
                                        <div class='single-checkout-box'>
                                            <div class='g-recaptcha' data-sitekey='6LfOd7YaAAAAAKDfXyWBTAbjZKPhhzXg-8jWqExB'></div>
                                        </div>
                                        <!--
                                        <div class='single-checkout-box checkbox'>
                                            <input id='remind-me' type='checkbox'>
                                            <label for='remind-me'><span></span>¿Crear una cuenta?</label>
                                        </div>
                                        -->
                                    </div>
                                </div>
                                <!-- End Checkbox Area -->
                                <!-- Start Payment Box -->
                                <div class='payment-form'>
                                    <h2 class='section-title-3'>Método de Pago</h2>
                                    <p></p>
                                    <div class='payment-form-inner'>
                                        <div class='single-checkout-box'>
                                            <input type='text' placeholder='Nombre De Tarjeta*'>
                                            <input type='text' placeholder='Número De Tarjeta*'>
                                        </div>
                                        <div class='single-checkout-box select-option'>
                                            <select>
                                                <option selected disabled hidden>Día*</option>
                                                <option>Día</option>
                                                <option>Día</option>
                                                <option>Día</option>
                                                <option>Día</option>
                                            </select>
                                            <input type='text' placeholder='Código de Seguridad*'>
                                        </div>
                                    </div>
                                </div>
                                <!-- End Payment Box -->
                                <!-- Start Payment Way -->
                                <div class='our-payment-sestem'>
                                    <h2 class='section-title-3'>Se acepta :</h2>
                                    <ul class='payment-menu'>
                                        <li><a href='#'><img src='images/payment/1.jpg' alt='payment-img'></a></li>
                                        <li><a href='#'><img src='images/payment/2.jpg' alt='payment-img'></a></li>
                                        <li><a href='#'><img src='images/payment/3.jpg' alt='payment-img'></a></li>
                                        <li><a href='#'><img src='images/payment/4.jpg' alt='payment-img'></a></li>
                                        <li><a href='#'><img src='images/payment/5.jpg' alt='payment-img'></a></li>
                                    </ul>
                                    <div class='checkout-button'>
                                        <button class='btnCheckout' href='#'>CONFIRMAR Y COMPRAR</button>
                                    </div>    
                                </div>
                                <!-- End Payment Way -->
                            </div>
                        </div>
                        "
                    ?>

                    <div class="col-md-4 col-lg-4">
                        <div class="checkout-right-sidebar">
                            <div class="our-important-note">
                                <h2 class="section-title-3">Note :</h2>
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