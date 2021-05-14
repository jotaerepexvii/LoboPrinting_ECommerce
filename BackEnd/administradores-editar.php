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
  <title>Editar Administrador</title>
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
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Control sidebar content goes here -->
    <a href="index.php" class="brand-link">
        <img src="dist/img/lobo.ico" alt="Lobo Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">Menu</span>
    </a>
    <?php
      include './phpIncludes/sidebar.php';
    ?>
  </aside>
  <!-- Main Sidebar Container -->
    <!-- Main Sidebar Container -->
    
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header" id="actualizar">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Editar Administrador</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="index.php">Tablero Administrativo</a></li>
                        <li class="breadcrumb-item active">Editar Administrador</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <?php
      $query = "SELECT * 
                  FROM Admnistrator 
                  WHERE admin_id = {$_GET['admin_id']}";
                          
      $r = mysqli_query($dbc, $query);//Save & Validate Query Result
      $row = mysqli_fetch_array($r); //Present Products

      $admin_id = $_GET['admin_id'];
      
      if(isset($_POST['update']))
      {
          $errors = array();
          
          $newAdmin_id = (int)$_POST['admin_id'];
          $name = filter_input(INPUT_POST, 'name');
          $lastname = filter_input(INPUT_POST, 'lastname');
          $email = filter_input(INPUT_POST, 'email');
          $password = filter_input(INPUT_POST, 'password');

          $name = preg_replace('/[^a-zA-Z0-9 ]/', '', $name);
          $lastname = preg_replace('/[^a-zA-Z0-9 ]/', '', $lastname);

          if  (empty($admin_id))
              array_push($errors, 'admin_id is require!');
          if  (empty($name))
              array_push($errors, 'name is require!');
          if  (empty($lastname))
              array_push($errors, 'lastname is require!');
          if  (empty($email))
              array_push($errors, 'email is require!');
          if  (empty($password))
              array_push($errors, 'password is require!');
          
          if(count($errors) == 0)
          {
              $query2 = "UPDATE Administrator SET admin_id='$newAdmin_id', name='$name', lastname='$lastname', email='$email', password='$password'
              WHERE admin_id='$admin_id'";

              if (mysqli_query($dbc, $query2)){
                  mysqli_close($dbc);
                  echo("<script>location.href = 'administradores-detalles.php?admin_id=$newAdmin_id';</script>");
                  //header("Location: administradores-detalles.php?admin_id=$admin_id");
              }
              else{
                  echo "ERROR";
              }
          }
          else	  
              echo '<script>alert("ERROR:Variables")</script>';
      }
      else if(isset($_POST['discard']))
      {
          header("Location: administradores-detalles.php?admin_id=$admin_id");
      }
      else if(isset($_POST['delete']))
      {
          echo("<script>location.href = 'phpIncludes/eliminar-administrador.php?admin_id=$admin_id';</script>");
      }
    ?>
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <!-- left column -->
                <div class="col-md-6 offset-md-3">
                <!-- general form elements -->
                    <div class="card card-secondary">
                        <div class="card-header">
                            <h5 class="card-title">Edite datos del administrador</h5>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form action="#" method="post" enctype="multipart/form-data"> 
                          <div class="card-body">
                              <div class="form-group">
                                  <label for="exampleInputEmail1">Nombre</label>
                                  <input type="text" class="form-control" id="name" name="name" value="<?php echo $row['name'] ?>" required>
                              </div>
                              <div class="form-group">
                                  <label for="exampleInputPassword1">Apellidos</label>
                                  <input type="text" class="form-control" id="lastname" name="lastname" value="<?php echo $row['lastname'] ?>" required>
                              </div>
                              <div class="form-group">
                                  <label for="exampleInputEmail1">ID</label>
                                  <input type="number" class="form-control" id="admin_id" name="admin_id" value="<?php echo $row['admin_id'] ?>" min="0" step="1" required>
                              </div>
                              <div class="form-group">
                                  <label for="exampleInputEmail1">E-mail</label>
                                  <input type="email" class="form-control" id="email" name="email" value="<?php echo $row['email'] ?>" required>
                              </div>
                          </div>
                          <!-- /.card-body -->
                          <div class="card-footer">
                              <button type="submit" id="update" name="update" class="btn btn-success">Actualizar</button>
                              <button type="submit" id="discard" name="discard" class="btn btn-secondary">Descartar Cambios</button>
                              <button type="submit" id="delete" name="delete" class="btn btn-danger">Eliminar Administrador</button>
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
