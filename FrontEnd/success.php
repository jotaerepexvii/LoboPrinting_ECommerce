<!doctype html>
<html class="no-js" lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Lobo Printing</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <link rel="shortcut icon" type="image/x-icon" href="images/lobo.ico">
    <link rel="apple-touch-icon" href="apple-touch-icon.png">

    <!--css files included here. -->
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
    <!-- custom style -->
    <link rel="stylesheet" href="css/custom.css">

    <!-- Modernizr JS -->
    <script src="js/vendor/modernizr-2.8.3.min.js"></script>
</head>
<body class="success">   
    <section class='centerSuccess'>
        <div class='container'>
            <span>
                nm
            </span>
        </div>
    </section>

    <?php
        include 'phpIncludes/connection.php';
        include 'phpIncludes/functions.php';
        $login_err = $email = '';

        if(isset($_POST['login']))
        {
            $email = filter_input(INPUT_POST, 'email');
            $cryptPass = encrypt(filter_input(INPUT_POST, 'password'));

            $query = "SELECT user_id FROM Users WHERE email = '$email' and password = '$cryptPass'";
            $r = mysqli_query($dbc, $query);
            $row = mysqli_fetch_array($r);
            $count = mysqli_num_rows($r);
            
            if($count == 1) //If result matched $email and $cryptPass, table row must be 1 row
            {
                $response = recaptcha();
                if ($response->success)
                {
                    $_SESSION['login'] = $row['user_id'];
                    $_SESSION['cart_product'] = array();
                    $_SESSION['cart_quantity'] = array();
                    //$_SESSION['current_page'] = $_SERVER['REQUEST_URI'];
                    //header("Location: ". $_SESSION['current_page']);
                    header('location:index.php');
                }
                else
                    $login_err = 'reCAPTCHA Fallido<br>Intente nuevamente';
            }
            else
            {
                $login_err = 'Credenciales Incorrectas';
                $email = '';
            }
        }
    ?>
    <!-- Body main wrapper end -->
    
    <!--Placed js at the end of the document so the pages load faster -->
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