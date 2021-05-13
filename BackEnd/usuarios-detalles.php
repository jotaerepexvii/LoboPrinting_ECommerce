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

    <!-- Main content -->
    <section class="content">
      <!-- Default box -->
      <div class="card card-solid">
        <div class="card-body">
          <div class="row">
              <?php
                $query = "SELECT * 
                            FROM Users 
                            WHERE user_id = {$_GET['user_id']}";
                
                $r = mysqli_query($dbc, $query);//Save & Validate Query Result
                $row = mysqli_fetch_array($r);//Present Products
                
                print "
                  <div class='col-12 col-sm-6'>
                    <div class='bg-gray py-2 px-3 mt-4'>
                      <h2 class='mb-0'>
                        Nombre
                      </h2>
                      <h4 class='mt-0'>
                        <small>$row[name] $row[lastname]</small>
                      </h4>
                    </div>
                    <div class='bg-gray py-2 px-3 mt-4'>
                      <h2 class='mb-0'>
                        ID
                      </h2>
                      <h4 class='mt-0'>
                        <small>$row[user_id]</small>
                      </h4>
                    </div>
                    <div class='bg-gray py-2 px-3 mt-4'>
                      <h2 class='mb-0'>
                        Email
                      </h2>
                      <h4 class='mt-0'>
                        <small>$row[email]</small>
                      </h4>
                    </div>
                    <div class='bg-gray py-2 px-3 mt-4'>
                      <h2 class='mb-0'>
                        Teléfono
                      </h2>
                      <h4 class='mt-0'>
                        <small>$row[phone]</small>
                      </h4>
                    </div>
                    <div class='bg-gray py-2 px-3 mt-4'>
                      <h2 class='mb-0'>
                        Unidades Vendidas
                      </h2>
                      <h4 class='mt-0'>
                        <small>$row[student]</small>
                      </h4>
                    </div>
                  </div>
                  <div class='col-12 col-sm-6'>
                    <h3 class='d-inline-block d-sm-none'>LOWA Men’s Renegade GTX Mid Hiking Boots Review</h3>
                    <div class='col-12 col-sm-6'>
                      <img src='../../FrontEnd/LoboPrinting/images/lobo_products/nombreImagen' alt='Product Image'>
                    </div>
                  </div>
                  
                ";
                mysqli_close($dbc);
              ?> 
          </div>
        </div>
        <!-- /.card-body -->
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
