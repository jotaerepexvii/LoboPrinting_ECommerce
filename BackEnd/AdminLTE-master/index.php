<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  
  <title>Lobo Printing | Inicio</title>
  <link rel="icon"  href="dist/img/lobo.ico" type="icon" sizes="16x16">

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- IonIcons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
</head>
<!--
`body` tag options:

  Apply one or more of the following classes to to the body tag
  to get the desired effect
  * sidebar-collapse
  * sidebar-mini
-->
<body class="hold-transition sidebar-mini">
<div class="wrapper">

  <?php
	  //include './includes/navbar.php';
  ?>
  
  <!-- Main Sidebar Container -->
  <?php
	  include './phpIncludes/sidebar.php';
  ?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
              <h1 class="m-0">Inicio</h1>
            </ul>
          </div><!-- /.col -->

          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Tablero Administrativo</a></li>
              <li class="breadcrumb-item active">Inicio</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">
          <!--box 1-->
          <div class="col-lg-3 col-6">
            <div class="small-box bg-info">
              <div class="inner">
                <h3>  <!-- articulos vendidos query-->
                  <?php
                    $result = mysqli_query($dbc, 'SELECT SUM(sold) AS totalSold FROM Product'); 
                    $row = mysqli_fetch_assoc($result); 
                    $sum = $row['totalSold'];
                    echo $sum
                  ?>
                </h3>
                <p>Artículos Vendidos</p>
              </div>
              <div class="icon">
                <i class="ion ion-bag"></i>
              </div>
              <a href="productos.php" class="small-box-footer">Mas Información <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!--box 2-->
          <div class="col-lg-3 col-6">
            <div class="small-box bg-danger">
              <div class="inner">
                <h3>
                  <?php
                    $result = mysqli_query($dbc, 'SELECT SUM(in_stock) AS totalStock FROM Product'); 
                    $row = mysqli_fetch_assoc($result); 
                    $sum = $row['totalStock'];
                    echo $sum
                  ?>
                </h3>
                <p>Artículos En Inventario</p>
              </div>
              <div class="icon">
                <i class="ion ion-grid"></i>
              </div>
              <a href="productos.php" class="small-box-footer">Mas Información <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!--box 3-->
          <div class="col-lg-3 col-6">
            <div class="small-box bg-success">
              <div class="inner">
                <?php
                  $result = mysqli_query($dbc, 'SELECT SUM(student) AS totalStudents FROM Users'); 
                  $row = mysqli_fetch_assoc($result); 
                  $sum = $row['totalStudents'];
                    print "<h3>$sum</h3>";
                  if ($sum == 1){
                    print "<p>Estudiante Registrado </p>";
                  }else{
                    print "<p>Estudiantes Registrados </p>";
                  }
                ?>
              </div>
              <div class="icon">
                <i class="ion ion-stats-bars"></i>
              </div>
              <a href="usuarios.php" class="small-box-footer">Mas Información <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!--box 4-->
          <div class="col-lg-3 col-6">
            <div class="small-box bg-warning">
              <div class="inner">
                  <?php
                    $result = mysqli_query($dbc, 'SELECT COUNT(*) AS totalUsers FROM Users'); 
                    $row = mysqli_fetch_assoc($result); 
                    $sum = $row['totalUsers'];
                      print "<h3>$sum</h3>";
                    if ($sum == 1){
                      print "<p>Usuario Registrado </p>";
                    }else{
                      print "<p>Usuarios Registrados </p>";
                    }
                  ?>
              </div>
              <div class="icon">
                <i class="ion ion-person-add"></i>
              </div>
              <a href="usuarios.php" class="small-box-footer">Mas Información <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          
        </div>

        <!-- /.row -->
        <div class="row">
          <div class="col">
            <div class="card">
              <div class="card-header border-0">
                <h3 class="card-title">Productos Más Vendidos</h3>
                <div class="card-tools">
                  <a href="#" class="btn btn-tool btn-sm">
                    <i class="fas fa-download"></i>
                  </a>
                  <a href="#" class="btn btn-tool btn-sm">
                    <i class="fas fa-bars"></i>
                  </a>
                </div>
              </div>
              <div class="card-body table-responsive p-0">
                <table class="table table-striped table-valign-middle">
                  <thead>
                    <tr>
                      <th>Producto</th>
                      <th>Precio</th>
                      <th>Ventas</th>
                      <th>More</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                      $query = "SELECT * FROM Product
                      ORDER BY sold DESC limit 8";                               
                      if($r = mysqli_query($dbc, $query))//Save & Validate Query Result
                      {
                        while($row=mysqli_fetch_array($r))//Present Products
                        {
                          print "
                            <tr>
                                <td>
                                <img src= '../../FrontEnd/LoboPrinting/images/lobo_products/$row[image]' alt='$row[image]' class='img-circle img-size-32 mr-2'>
                                  <a href='detallesProducto.php?product_id={$row['product_id']}'> $row[name] $row[description]</a>
                                </td>
                                <td>$$row[price]</td>
                                <td>$row[sold] Vendidos
                                </td>
                                <td>
                                <a href='detallesProducto.php?product_id={$row['product_id']}' class='text-muted'>
                                    <i class='fas fa-search'></i>
                                </a>
                                </td>
                            </tr>
                            ";
                        }
                      }
                      else
                          print'<p style="color:red">NO SE PUEDE MOSTRAR RECORD PORQUE:'.mysqli_error($dbc).'.</P>';
                      mysqli_close($dbc);
                    ?>
                      <!--<small class='text-success mr-1'>
                          <i class='fas fa-arrow-up'></i>12%
                      </small>*/
                      -->
                  </tbody>
                </table>
              </div>
            </div>

            <div class="card">
              <div class="card-header border-0">
                <div class="d-flex justify-content-between">
                  <h3 class="card-title">Vistas Lobo Printing Website</h3>
                  <a href="javascript:void(0);">Ver Reporte</a>
                </div>
              </div>
              <div class="card-body">
                <div class="d-flex">
                  <p class="d-flex flex-column">
                    <span class="text-bold text-lg">820</span>
                    <span>Visitors Over Time</span>
                  </p>
                  <p class="ml-auto d-flex flex-column text-right">
                    <span class="text-success">
                      <i class="fas fa-arrow-up"></i> 12.5%
                    </span>
                    <span class="text-muted">Since last week</span>
                  </p>
                </div>
                <!-- /.d-flex -->
                <div class="position-relative mb-4">
                  <canvas id="visitors-chart" height="200"></canvas>
                </div>
                <div class="d-flex flex-row justify-content-end">
                  <span class="mr-2">
                    <i class="fas fa-square text-primary"></i> This Week
                  </span>
                  <span>
                    <i class="fas fa-square text-gray"></i> Last Week
                  </span>
                </div>
              </div>
            </div>
            <!-- /.card -->
            <!-- /.card -->
          </div>
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </div>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->

  <!-- Main Footer -->
    <?php
      include './phpIncludes/footer.php';
    ?>
</div>
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->

<!-- jQuery -->
<script src="plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE -->
<script src="dist/js/adminlte.js"></script>

<!-- OPTIONAL SCRIPTS -->
<script src="plugins/chart.js/Chart.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="dist/js/demo.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="dist/js/pages/dashboard3.js"></script>
</body>
</html>
