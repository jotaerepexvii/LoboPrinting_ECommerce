<?php
  session_start();
?>
<!doctype html>
<html class="no-js" lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Lobo Printing</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <?php
        include 'phpIncludes/stylesheets.php';
    ?>
</head>
<body class="success">   
    <section class='centerSuccess'>
        <div class='container'>
            <span>
                <?php
                    //include 'phpIncludes/functions.php';
                    //successMsg();
                    $message = $_SESSION['success'];
                    echo $message;
                    header("refresh:1.5; url=index.php");
                ?>
                <img src='images/icons/personOk.svg' alt='product images'>
            </span>
        </div>
    </section>
    <!-- Body main wrapper end -->
    <!--Placed js at the end of the document so the pages load faster -->
    <script src="js/vendor/jquery-1.12.0.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/plugins.js"></script>
    <script src="js/slick.min.js"></script>
    <script src="js/owl.carousel.min.js"></script>
    <script src="js/waypoints.min.js"></script>
    <script src="js/main.js"></script>
</body>
</html>