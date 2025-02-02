<?php
    session_start();
    include 'phpIncludes/functions.php';
?>
<!doctype html>
<html class="no-js" lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Mi Cuenta</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <?php
        include 'phpIncludes/stylesheets.php';
    ?>
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
        <section class="htc__blog__area bg__white ptb--90">
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
        <div class='single-portfolio-area bg__white ptb--100'>
            <div class='container'>
                <div class='row'>
                    <?php
                        if (!isset($_SESSION['login']))
                        {
                            echo("<script>location.href = 'login-required.php?msg=$msg';</script>");
                        }
                        else 
                        {
                            error_reporting(E_ERROR | E_PARSE);
                            
                            $user_id = $_SESSION['login'];
                            
                            $query = "SELECT *
                                        FROM Users
                                        WHERE user_id = {$_SESSION['login']}";
                            $r = mysqli_query($dbc,$query);//Make the Query
                            $row = mysqli_fetch_array($r);//Save Query Result
                                
                            $query1 = "SELECT *
                                        FROM Address
                                        WHERE user_id = {$_SESSION['login']}";
                            $r1 = mysqli_query($dbc,$query1);//Make the Query
                            $row1 = mysqli_fetch_array($r1);//Save Query Result

                            $query2 = "SELECT *
                                        FROM Payment_method
                                        WHERE user_id = {$_SESSION['login']}";
                            $r2 = mysqli_query($dbc,$query2);//Make the Query
                            $row2 = mysqli_fetch_array($r2);//Save Query Result 
                        }    
                    ?>
                    <div class='col-md-6'>
                        <div class='portfolio-description'>
                            <form action="account.php" method="post">
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
                                            <li><span><input type='text' id="user_id" name="user_id" value='<?php echo $row['user_id'] ?>' disabled></span></li>
                                            <li><span><input type='text' id="name" name="name" value='<?php echo $row['name'] ?>'></span></li>
                                            <li><span><input type='text' id="lastname" name="lastname" value='<?php echo $row['lastname'] ?>'></span></li>
                                            <li><span class='lowercase'><input class='wide75' type='text' id="email" name="email" value='<?php echo $row['email'] ?>'></span></li>
                                            <li><span><input type='text' id="phone" name="phone" value='<?php echo $row['phone'] ?>'></span></li>
                                            <li><span><input type='text' id="student" name="student" value='<?php echo $row['student'] ?>'></span></li>
                                        </ul>
                                        <input type='hidden' id="password" name="password" value='<?php echo $row['password'] ?>'>
                                        <button id="editar_usuario" name="editar_usuario">Editar</button>
                                    </div>
                                </div>
                            </form>
                            <?php
                                if(isset($_POST['editar_usuario']))
                                {
                                    $errors = array();
                                    
                                    $name = filter_input(INPUT_POST, 'name');
                                    $lastname = filter_input(INPUT_POST, 'lastname');
                                    $email = filter_input(INPUT_POST, 'email');
                                    $password = filter_input(INPUT_POST, 'password');
                                    $phone = filter_input(INPUT_POST, 'phone');
                                    $student = filter_input(INPUT_POST, 'student');

                                    if  (empty($name) || ctype_alpha($name))
                                        array_push($errors, ' Verifique su nombre');
                                    if  (empty($lastname))
                                        array_push($errors, ' Verifique los apellidos');
                                    if  (empty($email))
                                        array_push($errors, ' Verifique su email');
                                    if  (empty($phone))
                                        array_push($errors, ' Verifique su número telefónico');
                                    if  (empty($student))
                                        array_push($errors, ' Verifique su email');

                                    if(count($errors) == 0)
                                    {
                                        $query_editar = "UPDATE Users SET name='$name', lastname='$lastname', email='$email',  password='$password', phone='$phone', student='$student'
                                            WHERE user_id='$user_id'";

                                        if (mysqli_query($dbc, $query_editar))
                                        {
                                            //mysqli_close($dbc);
                                            echo("<script>location.href = 'account.php?user_id=$user_id';</script>");
                                        }
                                        else
                                        {
                                            echo '<script>alert("ERROR:Query")</script>';
                                        }
                                    }
                                    else	  
                                        echo "<script>alert('ERROR:".end($errors)."')</script>";
                                }
                            ?>
                            <form action="account.php" method="post">
                                <h2>Dirección</h2>
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
                                            <li><span class='capitalize'><input type='text' id="address_1" name="address_1" value='<?php echo $row1['address_1'] ?>'></span></li>
                                            <li><span><input type='text' id="address_2" name="address_2" value='<?php echo $row1['address_2'] ?>'></span></li>
                                            <li><span><input type='text' id="zip_code" name="zip_code" value='<?php echo $row1['zip_code'] ?>'></span></li>
                                            <li><span><input type='text' id="city" name="city" value='<?php echo $row1['city'] ?>'></span></li>
                                            <li><span><input type='text' id="state" name="state" value='<?php echo $row1['state'] ?>'></span></li>
                                        </ul>
                                        <?php
                                            if($row1['user_id'] == NULL)
                                            {
                                                print "<button type='submit' id='add_address' name='add_address'>Añadir</button>";
                                            }
                                            else
                                                print "<button type='submit' id='update_address' name='update_address'>Editar</button>";
                                        ?>
                                    </div>
                                </div>
                            </form>
                            <?php
                                if(isset($_POST['update_address']))
                                {
                                    $errors = array();

                                    $address_1 = filter_input(INPUT_POST, 'address_1');
                                    $address_2 = filter_input(INPUT_POST, 'address_2');
                                    $zip_code = filter_input(INPUT_POST, 'zip_code');
                                    $city = filter_input(INPUT_POST, 'city');
                                    $state = filter_input(INPUT_POST, 'state');

                                    if  (empty($address_1))
                                        array_push($errors, ' Verifique su dirección');
                                    if  (empty($address_2))
                                        $address_2 = ' ';
                                    if  (empty($zip_code) || validateZipCode($zip_code))
                                        array_push($errors, ' Verifique su zip code');
                                    if  (empty($city))
                                        array_push($errors, ' Verifique su ciudad');
                                    if  (empty($state))
                                        array_push($errors, ' Verifique su estado');

                                    if(count($errors) == 0)
                                    {
                                        $query_editar = "UPDATE Address SET user_id = '$user_id', address_1='$address_1', address_2='$address_2', zip_code='$zip_code', city='$city',  state='$state'
                                            WHERE user_id='$user_id'";

                                        if (mysqli_query($dbc, $query_editar))
                                        {
                                            //mysqli_close($dbc);
                                            echo("<script>location.href = 'account.php?user_id=$user_id';</script>");
                                        }
                                        else
                                        {
                                            echo '<script>alert("ERROR:Query")</script>';
                                        }
                                    }
                                    else	  
                                        echo "<script>alert('ERROR:".end($errors)."')</script>";
                                }
                                if(isset($_POST['add_address']))
                                {
                                    $errors = array();

                                    $address_1 = filter_input(INPUT_POST, 'address_1');
                                    $address_2 = filter_input(INPUT_POST, 'address_2');
                                    $zip_code = filter_input(INPUT_POST, 'zip_code');
                                    $city = filter_input(INPUT_POST, 'city');
                                    $state = filter_input(INPUT_POST, 'state');

                                    if  (empty($address_1))
                                        array_push($errors, ' Verifique su dirección');
                                    if  (empty($address_2))
                                        $address_2 = ' ';
                                    if  (empty($zip_code) || validateZipCode($zip_code))
                                        array_push($errors, ' Verifique su zip code');
                                    if  (empty($city))
                                        array_push($errors, ' Verifique su ciudad');
                                    if  (empty($state))
                                        array_push($errors, ' Verifique su estado');

                                    if(count($errors) == 0)
                                    {
                                        $query_add = mysqli_query($dbc, "INSERT INTO Address (user_id, address_1, address_2, zip_code, city, state)
                                                        VALUES ('$user_id', '$address_1', '$address_2', '$zip_code', '$city', '$state')");

                                        if(mysqli_affected_rows($dbc) == 1)
                                        {
                                            //mysqli_close($dbc);
                                            echo("<script>location.href = 'account.php?user_id=$user_id';</script>");
                                        }
                                        else
                                        {
                                            echo '<script>alert("ERROR:Query")</script>';
                                        }
                                    }
                                    else	  
                                        echo "<script>alert('ERROR:".end($errors)."')</script>";
                                }
                            ?>
                            <form action="account.php" method="post">
                                <h2>Método de Pago</h2>
                                <div class='portfolio-info'>
                                    <div class='col-md-3'>
                                        <ul>
                                            <li><span class='bld'>CARD NAME</span></li>
                                            <li><span class='bld'>NUMBER</span></li>
                                            <li><span class='bld'>EXP Month</span></li>
                                            <li><span class='bld'>EXP Year</span></li>
                                            <li><span class='bld'>CCV</span></li>
                                        </ul>
                                    </div>
                                    <div class='col-md-9'>
                                        <ul>
                                            <li><span class='uppercase'><input type='text' id="card_name" name="card_name" value='<?php echo $row2['card_name'] ?>'></span></li>
                                            <li><span class='uppercase'><input type='text' id="card_number" name="card_number" value='<?php echo $row2['card_number'] ?>'></span></li>
                                            <li><span><input type='number' id="exp_month" name="exp_month" value='<?php echo $row2['exp_month'] ?>' placeholder="MM" pattern=".{0}|.{1,2}"></span></li>
                                            <li><span><input type='number' id="exp_year" name="exp_year" value='<?php echo $row2['exp_year'] ?>' placeholder="YY" pattern=".{0}|.{2,2}"></span></li>
                                            <li><span><input type='number' id="ccv" name="ccv" value='<?php echo $row2['ccv'] ?>'></span></li>
                                        </ul>
                                        <?php
                                            if($row2['user_id'] == NULL)
                                            {
                                                print "<button type='submit' id='add_payment' name='add_payment'>Añadir</button>";
                                            }
                                            else
                                                print "<button type='submit' id='update_payment' name='update_payment'>Editar</button>";
                                        ?>
                                    </div>
                                </div>
                            </form>
                            <?php
                                if(isset($_POST['update_payment']))
                                {
                                    $errors = array();

                                    $card_name = filter_input(INPUT_POST, 'card_name');
                                    $card_number = filter_input(INPUT_POST, 'card_number');
                                    $exp_month = filter_input(INPUT_POST, 'exp_month');
                                    $exp_year = filter_input(INPUT_POST, 'exp_year');
                                    $ccv = filter_input(INPUT_POST, 'ccv');

                                    if  (empty($card_name))
                                        array_push($errors, ' Nombre de la tarjeta es requerido');
                                    if  (empty($card_number) || strlen($card_number) != 16)
                                        array_push($errors, ' Verifique su número de tarjeta');
                                    if  (empty($exp_year) || ($exp_year < date('Y')) || ($exp_year > 99) )
                                        array_push($errors, ' Verifique su año de expiración');
                                    if  (empty($exp_month) || (($exp_month < 1) && ($exp_month > 12)))
                                        array_push($errors, ' Verifique su mes de expiración');
                                    if  (empty($ccv) || strlen($ccv) > 4 || strlen($ccv) < 3)
                                        array_push($errors, ' Verifique su CVV');

                                    if(count($errors) == 0)
                                    {
                                        $query_editar = "UPDATE Payment_method SET user_id = '$user_id', card_name='$card_name', card_number='$card_number', exp_month='$exp_month',  exp_year='$exp_year', ccv='$ccv'
                                            WHERE user_id='$user_id'";

                                        if (mysqli_query($dbc, $query_editar))
                                        {
                                            //mysqli_close($dbc);
                                            echo("<script>location.href = 'account.php?user_id=$user_id';</script>");
                                        }
                                        else
                                        {
                                            echo '<script>alert("ERROR:Query")</script>';
                                        }
                                    }
                                    else	  
                                        echo "<script>alert('ERROR:".end($errors)."')</script>";
                                }
                                if(isset($_POST['add_payment']))
                                {
                                    $errors = array();

                                    $card_name = filter_input(INPUT_POST, 'card_name');
                                    $card_number = filter_input(INPUT_POST, 'card_number');
                                    $exp_month = filter_input(INPUT_POST, 'exp_month');
                                    $exp_year = filter_input(INPUT_POST, 'exp_year');
                                    $ccv = filter_input(INPUT_POST, 'ccv');

                                    if  (empty($card_name))
                                        array_push($errors, ' Nombre de la tarjeta es requerido');
                                    if  (empty($card_number) || strlen($card_number) > 16)
                                        array_push($errors, ' Verifique su número de tarjeta');
                                    if  (empty($exp_year) || ($exp_year < date('Y')) || ($exp_year > 99) )
                                        array_push($errors, ' Verifique su año de expiración');
                                    if  (empty($exp_month) || (($exp_month < 1) && ($exp_month > 12)))
                                        array_push($errors, ' Verifique su mes de expiración');
                                    if  (empty($ccv) || strlen($ccv) > 4 || strlen($ccv) < 3)
                                        array_push($errors, ' Verifique su CVV');
                                    
                                    if(count($errors) == 0)
                                    {
                                        $query_add = mysqli_query($dbc, "INSERT INTO Payment_method (user_id, card_name, card_number, exp_month, exp_year, ccv)
                                                        VALUES ('$user_id', '$card_name', '$card_number', '$exp_month', '$exp_year', '$ccv')");

                                        if(mysqli_affected_rows($dbc) == 1)
                                        {
                                            //mysqli_close($dbc);
                                            echo("<script>location.href = 'account.php?user_id=$user_id';</script>");
                                        }
                                        else
                                        {
                                            echo '<script>alert("ERROR:Query")</script>';
                                        }
                                    }
                                    else	  
                                        echo "<script>alert('ERROR:".end($errors)."')</script>";
                                }
                            ?>
                        </div>
                    </div>
                    <div class='col-md-6'>
                        <div class='portfolio-description mrg-sm'>
                            <h2>Ordenes</h2>
                            <div class='table-content table-responsive'>
                                <table>
                                    <thead>
                                        <tr>
                                            <th class='product-thumbnail'>ID</th>
                                            <th class='product-name'>DATE</th>
                                            <th class='product-price'>DETALLES</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                            $query3 = "SELECT order_id, order_date
                                                    FROM Orders
                                                    WHERE user_id = {$_SESSION['login']}";

                                            if($r3 = mysqli_query($dbc,$query3))//Save & Validate Query Result
                                            {
                                                while($row3=mysqli_fetch_array($r3))//Present Products
                                                {
                                                    print "
                                                        <tr>
                                                            <td class='product-subtotal'>$row3[order_id]</td>
                                                            <td class='product-remove'>".his24togis12($row3['order_date'])."</td>
                                                            <td class='product-name'><a href='single-order.php?order_id=$row3[order_id]'>Detalles</a></td>
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
                </div>
            </div>
        </div>
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