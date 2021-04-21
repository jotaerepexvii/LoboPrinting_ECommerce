<!doctype html>
<html class="no-js" lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Mi Cuenta</title>
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
        <section class="htc__blog__area bg__white pt--90">
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
                        <div class="portfolio-description">
                            <?php
                                error_reporting(E_ERROR | E_PARSE);
                            
                                $query = "SELECT *
                                            FROM Users
                                            WHERE user_id={$_SESSION['login']}";
                                $r = mysqli_query($dbc,$query);//Make the Query
                                $row = mysqli_fetch_array($r);//Save Query Result

                                print "
                                    <h2>Perfil</h2>
                                    <div class='portfolio-info'>
                                        <div class='col-md-3'>
                                            <ul>
                                                <li><span class='bld'>ID</span></li>
                                                <li><span class='bld'>Name</span></li>
                                                <li><span class='bld'>Last Name</span></li>
                                                <li><span class='bld'>Email</span></li>
                                                <li><span class='bld'>Phone</span></li>
                                                <li><span class='bld'>Student</span></li>
                                            </ul>
                                        </div>
                                        <div class='col-md-9'>
                                            <ul>
                                                <li><span><input value='$row[user_id]' disabled></input></span></li>
                                                <li><span><input value='$row[name]'></input></span></li>
                                                <li><span><input value='$row[lastname]'></input></span></li>
                                                <li><span class='lowercase'><input class='wide75' value='$row[email]'></input></span></li>
                                                <li><span><input value='$row[phone]'></input></span></li>
                                                <li><span><input value='$row[student]'></input></span></li>
                                            </ul>
                                        </div>
                                    </div>
                                ";
                            
                                $query1 = "SELECT *
                                            FROM Address
                                            WHERE user_id={$_SESSION['login']}";
                                $r1 = mysqli_query($dbc,$query1);//Make the Query
                                $row1 = mysqli_fetch_array($r1);//Save Query Result
                            
                                print "
                                    <h2>Address</h2>
                                    <div class='portfolio-info'>
                                        <div class='col-md-3'>
                                            <ul>
                                                <li><span class='bld'>ADDRESS 1</span></li>
                                                <li><span class='bld'>ADDRESS 2</span></li>
                                                <li><span class='bld'>ZIP CODE</span></li>
                                                <li><span class='bld'>CITY</span></li>
                                                <li><span class='bld'>STATE</span></li>
                                            </ul>
                                        </div>
                                        <div class='col-md-9'>
                                            <ul>
                                                <li><span class='capitalize'><input value='$row1[address_1]'></input></span></li>
                                                <li><span><input value='$row1[address_2]'></input></span></li>
                                                <li><span><input value='$row1[zip_code]'></input></span></li>
                                                <li><span><input value='$row1[city]'></input></span></li>
                                                <li><span><input value='$row1[state]'></input></span></li>
                                            </ul>
                                        </div>
                                    </div>
                                ";
                            
                                $query2 = "SELECT *
                                            FROM Address
                                            WHERE user_id={$_SESSION['login']}";
                                $r2 = mysqli_query($dbc,$query2);//Make the Query
                                $row2 = mysqli_fetch_array($r2);//Save Query Result    
                            
                                print "
                                    <h2>Payment Method</h2>
                                    <div class='portfolio-info'>
                                        <div class='col-md-3'>
                                            <ul>
                                                <li><span class='bld'>CARD NAME</span></li>
                                                <li><span class='bld'>NUMBER</span></li>
                                                <li><span class='bld'>EXP DATE</span></li>
                                                <li><span class='bld'>CCV</span></li>
                                            </ul>
                                        </div>
                                        <div class='col-md-9'>
                                            <ul>
                                                <li><span class='uppercase'><input value='$row2[card_name]'></input></span></li>
                                                <li><span><input value='$row2[card_number]'></input></span></li>
                                                <div class='col-md-12'>
                                                    <div class='col-md-6'>
                                                        <li><span><input class='wide100' value='$row2[exp_month]'></input></span></li>
                                                    </div>
                                                    <div class='col-md-6'>
                                                        <li><span><input class='wide100' value='$row2[exp_year]'></input></span></li>
                                                    </div>
                                                </div>
                                                <li><span><input value='$row2[ccv]'</input></span></li>
                                            </ul>
                                        </div>
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