<?php
    session_start();
    include 'phpIncludes/connection.php';
    if (!isset($_SESSION['loginAdmi']))
    {
        header('location:login.php');
    }
?>
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
    <!-- DataTables -->
    <link rel="stylesheet" href="plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
    <link rel="stylesheet" href="plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
    <!-- IonIcons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="dist/css/adminlte.min.css">
</head>
<body class="hold-transition sidebar-mini">
    <div class="wrapper">
    <!-- Main Sidebar Container -->
    <?php
        include 'phpIncludes/sidebar.php';
    ?>
    <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
        <!-- Content Header (Page header) -->
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0">Todas las Ordenes</h1>
                        </div><!-- /.col -->
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="#">Tablero Administrativo</a></li>
                                <li class="breadcrumb-item active">Todas las Ordenes</li>
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
                            <div class="card">
                                <div class="card-header">
                                    <h3 class="card-title" style="font-weight: bold;">Haga 'click' sobre el ID de una orden para ver o editar sus detalles</h3>
                                </div>
                                <div class="card-body">
                                    <table id="example1" class="table table-striped ">
                                        <thead>
                                            <tr>
                                                <th>ID</th>
                                                <th>Track Number</th>
                                                <th>Venta</th>
                                                <th>Fecha</th>
                                                <th>Status</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                                //Query Search Order
                                                    $query_orders = "SELECT order_id
                                                                    FROM Orders
                                                                    ORDER BY YEAR(order_date), MONTH(order_date), DAY(order_date) DESC";

                                                    if($r_orders = mysqli_query($dbc, $query_orders))//Save & Validate Query Results
                                                    {
                                                        while($row_orders=mysqli_fetch_array($r_orders))//Present Users
                                                        {
                                                            $query_orders2 = "SELECT track_number, SUM(price) AS total, order_date, status_name
                                                                                FROM Orders o, Contain c, Status s
                                                                                WHERE o.status_id = s.status_id AND o.order_id = c.order_id and o.order_id = $row_orders[order_id]";
                                                            if($r_orders2 = mysqli_query($dbc, $query_orders2))
                                                            {
                                                                $row_orders2=mysqli_fetch_array($r_orders2);
                                                                print "
                                                                    <tr>
                                                                        <td class='text-left'><a href='ordenes-detalles.php?order_id={$row_orders['order_id']}'>$row_orders[order_id]</a></td>
                                                                        <td class='text-left'>$row_orders2[track_number]</td>
                                                                        <td class='text-left'>$row_orders2[total]</td>
                                                                        <td class='text-left'>$row_orders2[order_date]</td>
                                                                        <td class='text-left'>$row_orders2[status_name]</td>
                                                                        <!--
                                                                        <td>
                                                                            <a href='ordenes-detalles.php?order_id={$row_orders['order_id']}' class='text-muted'>
                                                                                <i class='fas fa-search'>Detalles</i>
                                                                            </a>
                                                                        </td>
                                                                        -->
                                                                    </tr>";
                                                            }
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
<!-- DataTables  & Plugins -->
<script src="plugins/datatables/jquery.dataTables.min.js"></script>
<script src="plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
<script src="plugins/jszip/jszip.min.js"></script>
<script src="plugins/pdfmake/pdfmake.min.js"></script>
<script src="plugins/pdfmake/vfs_fonts.js"></script>
<script src="plugins/datatables-buttons/js/buttons.html5.min.js"></script>
<script src="plugins/datatables-buttons/js/buttons.print.min.js"></script>
<script src="plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
<script src="plugins/datatables-buttons/js/buttons.download.min.js"></script>
<!-- AdminLTE -->
<script src="dist/js/adminlte.js"></script>

<!-- OPTIONAL SCRIPTS -->
<script src="plugins/chart.js/Chart.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="dist/js/demo.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="dist/js/pages/dashboard3.js"></script>
<script>
  $(function () {
    $("#example1").DataTable({
      "responsive": true, "lengthChange": false, "autoWidth": false,
      "buttons": ["down", "csv", "pdf", "print"]
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
    });
  });
</script>
</body>
</html>
