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
  <title>Detalles del Administrador</title>
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
            <h1>Detalles del Administrador</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Inicio</a></li>
              <li class="breadcrumb-item active">Detalles del Administrador</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <!-- Default box -->
      <div class="container-fluid">
        <div class="row">

          <?php
            $query = "SELECT * 
                        FROM Administrator
                        WHERE admin_id = {$_GET['admin_id']}";
                        
            $r = mysqli_query($dbc, $query);//Save & Validate Query Result
            $row = mysqli_fetch_array($r);//Present Products
            
            print "
              <div class='col-md-6 offset-md-3'>
                <div class='card card-secondary'>
                  <div class='card-header'>
                    <h5 class='card-title'>Detalles del Administrador</h5>
                  </div>
                  <form action='administradores-editar.php?admin_id={$row['admin_id']}' method='post'>
                    <div class='card-body'>
                      <div class='form-group'>
                          <label for='exampleInputPassword1'>Nombre</label>
                          <input type='text' class='form-control' id='name' name='name' value='$row[name]' disabled>
                      </div>
                      <div class='form-group'>
                          <label for='exampleInputPassword1'>Apellidos</label>
                          <input type='text' class='form-control' id='lastname' name='lastname' value='$row[lastname]' disabled>
                      </div>
                      <div class='form-group'>
                          <label for='exampleInputEmail1'>ID</label>
                          <input type='text' class='form-control' id='admin_id' name='admin_id' value='$row[admin_id]' disabled>
                      </div>
                      <div class='form-group'>
                          <label for='exampleInputEmail1'>Email</label>
                          <input type='text' class='form-control' id='email' name='email' value='$row[email]' disabled>
                      </div>
                      <div class='form-group'>
                          <label for='exampleInputPassword1'>Password</label>
                          <input type='password' class='form-control' id='password' name='password' value='$row[password]' disabled>
                      </div>
                    </div>
                    <div class='card-footer'>
                        <button class='btn btn-primary btn-block'>Editar</button>
                        <button class='btn btn-secondary btn-block'><a href='administradores.php' style='color:inherit'>Ver Todos los Administradores</a></button>
                    </div>
                  </form>
                </div>
              </div>
            ";
            //mysqli_close($dbc);
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