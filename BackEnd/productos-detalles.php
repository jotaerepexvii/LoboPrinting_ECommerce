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
  <title>Detalles Del Producto</title>
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
  <!-- Navbar -->
  <!-- /.navbar -->

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
            <h1>Detalle De Producto</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Inicio</a></li>
              <li class="breadcrumb-item active">Detalle de Producto</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <!-- left column -->
                <?php
                  $query = "SELECT * 
                              FROM Product 
                              WHERE product_id = {$_GET['product_id']}";
                  
                  $r = mysqli_query($dbc, $query);//Save & Validate Query Result
                  $row = mysqli_fetch_array($r);//Present Products
                  
                  print "
                      <div class='col-md-6'>
                        <div class='col-12'>
                          <img src='../FrontEnd/images/lobo_products/$row[image]' class='product-image' alt='Product Image'>
                        </div>
                      </div>
                      <div class='col-md-6'>
                      <!-- general form elements -->
                      <div class='card card-secondary'>
                        <div class='card-header'>
                          <h5 class='card-title'>Editar Producto</h5>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form action='productos-editar.php?product_id={$row['product_id']}' method='post'>
                          <div class='card-body'>
                            <div class='form-group'>
                                <label for='exampleInputEmail1'>ID</label>
                                <input type='text' class='form-control' id='product_id' name='product_id' value='$row[product_id]' disabled>
                            </div>
                            <div class='form-group'>
                                <label for='exampleInputPassword1'>Nombre</label>
                                <input type='text' class='form-control' id='name' name='name' value='$row[name]' disabled>
                            </div>
                            <div class='form-group'>
                                <label for='exampleInputEmail1'>Description</label>
                                <input type='text' class='form-control' id='descripion' name='description' value='$row[description]' disabled>
                            </div>
                            <div class='form-group'>
                                <label for='exampleInputPassword1'>Precio</label>
                                <input type='text' class='form-control' id='price' name='price' value='$row[price]' disabled>
                            </div>
                            <div class='form-group'>
                                <label for='exampleInputEmail1'>Costo</label>
                                <input type='text' class='form-control' id='cost' name='cost' value='$row[cost]' disabled>
                            </div>
                            <div class='form-group'>
                                <label for='exampleInputEmail1'>Cantidad Disponible</label>
                                <input type='text' class='form-control' id='in_stock' name='in_stock' value='$row[in_stock]' disabled>
                            </div>
                          </div>
                          <!-- /.card-body -->
                          <div class='card-footer'>
                            <button class='btn btn-primary btn-block'>Editar</button>
                          </div>
                        </form>
                      </div>
                  ";
                  //mysqli_close($dbc);
                ?> 
                
              </div>
            </div>
        </div>
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
