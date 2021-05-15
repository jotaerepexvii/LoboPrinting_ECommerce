<?php
  session_start();
  include 'phpIncludes/connection.php';
  if (!isset($_SESSION['loginAdmi'])) {
    header('location:login.php');
  }
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Detalles del Usuario</title>
  <link rel="icon"  href="dist/img/lobo.ico" type="icon" sizes="16x16">

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
</head>
<body class="hold-transition sidebar-mini">
<!-- Site wrapper -->
<div class="wrapper">
  <!-- Main Sidebar Container -->
    <!-- Main Sidebar Container -->
    <?php
      include './phpIncludes/sidebar.php';
    ?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Detalles del Usuario</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Inicio</a></li>
              <li class="breadcrumb-item active">Detalles del Usuario</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
    <section class="content">
      <!-- Default box -->
      <div class="container-fluid">
        <div class="row">
          <?php
            $query = "SELECT * 
                      FROM Users 
                      WHERE user_id = {$_GET['user_id']}";

            $r = mysqli_query($dbc, $query);//Save & Validate Query Result
            $row = mysqli_fetch_array($r);//Present Products

            if($row['student'] == 1)
              $sdnt = 'YES';
            else
              $sdnt = 'NO';
            
            print "
              <div class='col-md-6'>
                <div class='card card-secondary'>
                  <form action='#' method='post'>
                    <div class='card-header'>
                      <h5 class='card-title'>Detalles del Usuario</h5>
                    </div>
                    <div class='card-body'>
                        <div class='form-group'>
                            <label for='exampleInputPassword1'>ID</label>
                            <input type='password' class='form-control' id='name' name='name' value='$row[user_id]' disabled>
                        </div>
                        <div class='form-group'>
                            <label for='exampleInputPassword1'>Nombre</label>
                            <input type='text' class='form-control' id='name' name='name' value='$row[name]' disabled>
                        </div>
                        <div class='form-group'>
                            <label for='exampleInputPassword1'>Apellidos</label>
                            <input type='text' class='form-control' id='name' name='name' value='$row[lastname]' disabled>
                        </div>
                        <div class='form-group'>
                            <label for='exampleInputEmail1'>Email</label>
                            <input type='text' class='form-control' id='product_id' name='product_id' value='$row[email]' disabled>
                        </div>
                        <div class='form-group'>
                            <label for='exampleInputEmail1'>Phone</label>
                            <input type='text' class='form-control' id='descripion' name='description' value='$row[phone]' disabled>
                        </div>
                        <div class='form-group'>
                            <label for='exampleInputEmail1'>Password</label>
                            <input type='password' class='form-control' id='descripion' name='description' value='$row[password]' disabled>
                        </div>
                        <div class='form-group'>
                            <label for='exampleInputEmail1'>Student</label>
                            <input type='text' class='form-control' id='descripion' name='description' value='$sdnt' disabled>
                        </div>
                    </div>
                    <!-- /.card-body -->
                    <div class='card-footer'>
                        <button type='submit' id='update' name='update' class='btn btn-success'><a href='../FrontEnd/login.php' style='color:inherit'>Editar [Front End]</a></button>
                        <button type='submit' id='update2' name='update2' class='btn btn-secondary'><a href='usuarios.php' style='color:inherit'>Todos los Usuarios</a></button>
                    </div>
                  </form>
                </div>
              </div>
              <div class='col-md-6'>
                <div class='card card-secondary'>
                    <div class='card-header'>
                      <h5 class='card-title'>Ordenes</h5>
                    </div>
              ";
                //Query Search Order
                $query_orders = "SELECT *
                                FROM Orders
                                WHERE user_id = $row[user_id]";

                if($orders_q = mysqli_query($dbc, $query_orders))//Save & Validate Query Results
                {
                    print"
                    <div>
                      <table class='table table-striped table-valign-middle'>
                        <thead>
                            <tr>
                                <th>Order ID</th>
                                <th>Order Date</th>
                                <th>Track Number</th>
                            </tr>
                        </thead>

                    ";
                    while($r_orders = mysqli_fetch_array($orders_q))//Present Query Results
                    {
                      print "
                          <tbody>
                            <tr>
                                <td class='text-left'><a href='ordenes-detalles.php?order_id={$r_orders['order_id']}'>$r_orders[order_id]</a></td>
                                <td class='text-left'>$r_orders[order_date]</td>
                                <td class='text-left'>$r_orders[track_number]</td>
                            </tr>
                          </tbody>
                        
                      ";
                    }
                }else if (empty($query_orders)){
                    print "
                    <div>
                      <table class='table table-striped table-valign-middle'>
                        <thead>
                            <tr>
                                <th>No hay órdenes que mostrar</th>
                            </tr>
                        </thead>
                        <tbody>
                          <tr>
                              <td class='text-left'></td>
                          </tr>
                        </tbody>
                      </table>
                    </div>";
                }
                print
                "  
                      </table>
                    </div>
                  </div>
                </div>
                ";
            mysqli_close($dbc);
          ?> 
        </div>
      </div>
      <!-- /.card -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
    <?php
      include './phpIncludes/footer.php';
    ?>
  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="dist/js/demo.js"></script>
<script>
  $(document).ready(function() {
    $('.product-image-thumb').on('click', function () {
      var $image_element = $(this).find('img')
      $('.product-image').prop('src', $image_element.attr('src'))
      $('.product-image-thumb.active').removeClass('active')
      $(this).addClass('active')
    })
  })
</script>
</body>
</html>
