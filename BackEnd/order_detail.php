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
  
    <title>Lobo Printing | Productos</title>
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
    
<body class="hold-transition sidebar-mini">
    <div class="wrapper">
        <?php
            //include './includes/navbar.php';
        ?>

        <!-- Main Sidebar Container -->
        <aside class="main-sidebar sidebar-dark-primary elevation-4">
            <!-- Brand Logo -->
            <a href="index.php" class="brand-link">
                <img src="dist/img/lobo.ico" alt="Lobo Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
                <span class="brand-text font-weight-light">Menu</span>
            </a>
            <!-- Sidebar -->
            <?php
                include './phpIncludes/sidebar.php';
            ?>
            <!-- /.sidebar -->
        </aside>

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0">Editar Producto</h1>
                        </div><!-- /.col -->
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="index.php">Tablero Administrativo</a></li>
                                <li class="breadcrumb-item active">Detalles de Orden</li>
                            </ol>
                        </div><!-- /.col -->
                    </div><!-- /.row -->
                </div><!-- /.container-fluid -->
            </div>
            <!-- /.content-header -->
            <?php
                $query = "SELECT * 
                            FROM Orders O, Users U, Status S
                            WHERE order_id = {$_GET['order_id']} AND O.user_id = U.user_id AND O.status_id = S.status_id";
                                    
                $r = mysqli_query($dbc, $query);//Save & Validate Query Result
                $row=mysqli_fetch_array($r);//Present Products
                                
                if(isset($_POST['update']))
                {
                    if(isset($_POST['update']))
                    {
                        $errors = array();

                        $order_id = (int)$_POST['order_id'];
                        $status = $_POST['status'];

                      $query2 = "UPDATE Orders SET status_id='$status'
                                    WHERE order_id='$order_id'";

                        if(mysqli_query($dbc, $query2))
                        {
                            header('Location: orders.php');
                            mysqli_close($dbc);
                        }
                        else	  
                            print '<p style="color:red;">No se pudo actualizar la información del estudiante ya que ocurrió el error:<br />' . mysqli_error($dbc);
                    }
                }
            ?>
            <section class="content">
                <div class="container-fluid">
                    <div class="row">
                        <!-- left column -->
                        <div class="col-md-6">
                        <!-- general form elements -->
                            <div class="card card-primary">
                                <div class="card-header">
                                    <h3 class="card-title">Detalles de Orden</h3>
                                </div>
                                <!-- /.card-header -->
                                <!-- form start -->
                                <form  action="#" method="post">
                                    <div class="card-body">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">ID</label>
                                            <input type="text" class="form-control" id="product_id" name="product_id" value="<?php echo $row['order_id'] ?>" disabled>
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputPassword1">Fecha</label>
                                            <input type="text" class="form-control" id="name" name="name" value="<?php echo $row['order_date'] ?>" disabled>
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Track Number</label>
                                            <input type="text" class="form-control" id="descripion" name="description" value="<?php echo $row['track_number'] ?>" disabled>
                                        </div>
                                        <?php
                                                //Query Grains
                                            $status_query = "SELECT *
                                                            FROM Status";
                                            
                                            $status_r = mysqli_query($dbc,$status_query);//Make the Query
                                        ?>
                                        <div class="form-group">
                                            <label for="exampleInputPassword1">Status</label>
                                            <select name="status" id="status" class="custom-select rounded-0">
                                                <?php
                                                    print "<option value='$row[status_id]'> $row[status_name]</option>";//Default
                                                    while($status_row=mysqli_fetch_array($status_r))//Presents Grains
                                                    { 
                                                        print "<option value='$status_row[status_id]'> $status_row[status_name]</option>";
                                                    }
                                                ?>
                                            </select>
                                        </div>
                                    </div>
                                    <!-- /.card-body -->
                                    <div class="card-footer">
                                        <button type="submit" id="update" name="update" class="btn btn-primary">Actualizar</button>
                                        <?php
                                                print"<input type ='hidden' name='order_id' value='".$_GET['order_id']."'>"
                                        ?>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <div class="col-md-6">
                        <!-- general form elements -->
                            <div class="card card-primary">
                                <div class="card-header">
                                    <h3 class="card-title">Productos en la Orden</h3>
                                </div>
                                <!-- /.card-header -->
                                <table class="table table-striped table-valign-middle">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Nombre</th>
                                            <th>Precio</th>
                                            <th>Costo</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                            //Query Search Order
                                            $query_orders = "SELECT *
                                                        FROM Contain
                                                        WHERE order_id = {$_GET['order_id']}";

                                            if($r_orders = mysqli_query($dbc, $query_orders))//Save & Validate Query Results
                                            {
                                                while($row_orders=mysqli_fetch_array($r_orders))//Present Users
                                                {
                                                    $query_orders2 = "SELECT *
                                                                        FROM Product
                                                                        WHERE product_id = $row_orders[product_id]";
                                                    if($r_orders2 = mysqli_query($dbc, $query_orders2))
                                                    {
                                                        $row_orders2=mysqli_fetch_array($r_orders2);
                                                        print "
                                                            <tr>
                                                                <td class='text-left'>$row_orders[product_id]</td>
                                                                <td class='text-left'>$row_orders2[name] $row_orders2[description]</td>
                                                                <td class='text-left'>$row_orders2[price]</td>
                                                                <td class='text-left'>$row_orders2[cost]</td>
                                                            </tr>";
                                                    }
                                                }
                                            }
                                            else
                                                print'<p style="color:red">NO SE PUEDE MOSTRAR RECORD PORQUE:'.mysqli_error($dbc).'.</P>';
                                            //mysqli_close($dbc);
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
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
