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
  <title>Añadir Administrador</title>
  <link rel="icon"  href="dist/img/lobo.ico" type="icon" sizes="16x16">

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
</head>
<body class="hold-transition sidebar-mini">
<?php
  include 'phpIncludes/functionsB.php'; 
  $register_err = $email = '';
  if(isset($_POST['register']))
  {
      if(empty($_POST['name']) || empty($_POST['lastname']) || empty($_POST['email']) || empty($_POST['password']) || empty($_POST['password2']))
      {
          $register_err = 'Llenar Campos Obligatorios';
      }
      else
      {
          //$adminID = $_POST['admin_id'];
          $nombre = $_POST['name'];
          $apellidos = $_POST['lastname'];
          $email = $_POST['email'];
          $password = $_POST['password'];
          $password2 = $_POST['password2'];

          if($password != $password2){
              $register_err ='Las Contraseñas no coinciden';
          }
          else if(strlen($password)<8) {
              $register_err ='La contraseña debe ser al menos de 8 caracteres';
          }
          else
          {   /* Query Para buscar si el email ya existe */
              $query = mysqli_query($dbc, "SELECT * FROM Administrator WHERE email = '$email' ");
              $result = mysqli_fetch_Array($query);
              
              if($result > 0){
                  $register_err = 'El Correo Electronico ya está registrado';
              }
              else{
                  //$response = recaptcha();
                  //if ($response->success)
                  //{
                      $cryptPass = encrypt($password);
                      $nombre = ucwords($nombre);
                      $apellidos = ucwords($apellidos);
                      $query_insert = mysqli_query($dbc, "INSERT INTO Administrator(name, lastname, email, password)
                                  VALUES('$nombre','$apellidos','$email','$cryptPass')");
                  //}
                  //else
                      //$register_err = 'reCAPTCHA fallido<br>Intente nuevamente';

                  if($query_insert)
                  {
                      $register_err = 'Administrador Registrado Satisfactoriamente';
                      confirm($register_err);
                      echo "<script>location.href='administradores.php'</script>";
                  }
                  else
                  {
                      $register_err ='Error al crear el usuario';
                  }
              }
          }
      }
  }
?>
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
            <h1>Añadir Administrador</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Inicio</a></li>
              <li class="breadcrumb-item active">Añadir Administrador</li>
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
                <div class="col-md-6 offset-md-3">
                <!-- general form elements -->
                    <div class="card card-secondary">
                        <div class="card-header">
                            <h5 class="card-title">Añada el nuevo administrador</h5>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form action="#" method="post" >
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Nombre</label>
                                    <input title="Inserte su nombre" type="text" class="form-control" id="name" name="name" value="<?php echo $row['name'] ?>" required>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Apellido</label>
                                    <input title="Inserte sus apellidos" type="text" class="form-control" id="lastname" name="lastname" value="<?php echo $row['lastname'] ?>" required>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Correo Electrónico</label>
                                    <input title="Inserte su correo electrónico" type="email" class="form-control" id="email" name="email" value="<?php echo $row['email'] ?>" required>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Contraseña</label>
                                    <input title="Inserte contraseña de al menos 8 caracteres" type="password" class="form-control" id="password" name="password" value="<?php echo $row['password'] ?>" required>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Confirmar Contraseña</label>
                                    <input title="Repita su contraseña" type="password" class="form-control" id="password2" name="password2" value="<?php echo $row['password2'] ?>" required>
                                </div>
                            </div>
                            <!-- /.card-body -->
                            <div class="card-footer">
                                <button type="submit" id="register" name="register" class="btn btn-success">Registrar</button>
                                <button type="submit" class='btn btn-secondary'><a href='administradores.php' style='color:inherit'>Descartar</a></button>
                            </div>
                        </form>
                    </div>
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
