<!doctype html>
<html class="no-js" lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Mi Cuenta</title>
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
                            <h2  class="bradcaump-title">Mi Cuenta</h2>
                            <nav class="bradcaump-inner">
                                <a class="breadcrumb-item" href="index.php">Inicio</a>
                                <span class="brd-separetor">/</span>
                                <span class="breadcrumb-item active">Mi Cuenta</span>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- End Bradcaump area -->
        <div class="single-portfolio-area bg__white ptb--100">
            <div class="container">
                <div class="row">
                    <div class="col-md-6">
                        <div class="portfolio-description mrg-sm">
                            <h2>Perfil</h2>
                            <?php
                                $query = "SELECT *
                                            FROM Users U, Address A, Payment_method P
                                            WHERE U.user_id={$_SESSION['login']} 
                                                AND A.user_id={$_SESSION['login']} 
                                                AND P.user_id={$_SESSION['login']}";
                                $r = mysqli_query($dbc,$query);//Make the Query
                                $row = mysqli_fetch_array($r);//Save Query Result
                            
                                print "
                                    <div class='portfolio-info'>
                                        <ul>
                                            <li><span class='breadcrumb-item active'>ID: $row[user_id]</span></li>
                                            <li><span class='breadcrumb-item active'>NAME: $row[name] $row[lastname]</span></li>
                                            <li><span class='breadcrumb-item active'>EMAIL: $row[email]</span></li>
                                            <li><span class='breadcrumb-item active'>PHONE: $row[phone]</span></li>
                                            <li><span class='breadcrumb-item active'>STUDENT: $row[student]</span></li>
                                            <li></li>
                                            <li></li>
                                            <li></li>
                                        </ul>
                                    </div>
                                    <h2>Address</h2>
                                    <div class='portfolio-info'>
                                        <ul>
                                            <li><span class='breadcrumb-item active'>ADDRESS 1: $row[address_1]</span></li>
                                            <li><span class='breadcrumb-item active'>ADDRESS 2: $row[address_2]</span></li>
                                            <li><span class='breadcrumb-item active'>ZIP CODE: $row[zip_code]</span></li>
                                            <li><span class='breadcrumb-item active'>CITY: $row[city]</span></li>
                                            <li><span class='breadcrumb-item active'>STATE: $row[state]</span></li>
                                            <li></li>
                                            <li></li>
                                            <li></li>
                                        </ul>
                                    </div>
                                    <h2>Payment Method</h2>
                                    <div class='portfolio-info'>
                                        <ul>
                                            <li><span class='breadcrumb-item active'>CARD NAME: $row[card_name]</span></li>
                                            <li><span class='breadcrumb-item active'>NUMBER: $row[card_number]</span></li>
                                            <li><span class='breadcrumb-item active'>EXP DATE: $row[exp_month]/$row[exp_year]</span></li>
                                            <li><span class='breadcrumb-item active'>CCV: $row[ccv]</span></li>
                                        </ul>
                                    </div>
                                    ";
                            ?>
                            
                            
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="portfolio-description mrg-sm">
                            <h2>Ordenes</h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>
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