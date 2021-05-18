<?php
    session_start();
    include 'phpIncludes/connection.php';
    include 'phpIncludes/functionsB.php';
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
  
    <title>Reportes Diarios</title>
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
                            <h1 class="m-0">Reporte Diario</h1>
                        </div><!-- /.col -->
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="#">Tablero Administrativo</a></li>
                                <li class="breadcrumb-item active">Reporte Diario</li>
                            </ol>
                        </div><!-- /.col -->
                    </div><!-- /.row -->
                </div><!-- /.container-fluid -->
            </div>
            <!-- /.content-header -->
            <!-- Main content -->
            <div class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col">
                            <div class="card">
                                <div class="card-header border-0">
                                    <h3 class="card-title font-weight-bold"><a href="reporte-diario.php">Ver Todo&nbsp&nbsp</a></h3>
                                    <h3 class="card-title font-weight-bold">|</h3>
                                    <h3 class="card-title font-weight-bold">&nbsp&nbspSeleccione Un Dia:</h3>
                                    <div class="card-tools">
                                        <form action="reporte-diario.php" method='post'>
                                            <div class="input-group input-group-sm">
                                                <input type="date" name="aday" class="form-control" min="2020-04-01">
                                                <span class="input-group-append">
                                                    <button type="submit" name="submit" class="btn btn-info btn-flat">Someter</button>
                                                </span>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                                <div class="card-body table-responsive">
                                    <table id="example1" class="table table-striped">
                                        <thead>
                                            <tr>
                                                <th class='text-center'></th>
                                                <th class='text-center'>Dia</th>
                                                <th class='text-center'>Órdenes</th>
                                                <th class='text-center'>Productos</th>
                                                <th class='text-center'>Ventas</th>
                                                <th class='text-center'>Costos</th>
                                                <th class='text-center'>Ganancia</th>
                                                <th class='text-center'>Gross Profit</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                                $dtz = new DateTimeZone("America/Puerto_Rico");
                                                $dt = new DateTime("now", $dtz);

                                                if(isset($_POST['submit']))
                                                {
                                                    $mydate = $_POST['aday'];
                                                    $date = new DateTime($mydate);
                                                    $day = $date->format('z');

                                                    $query_day =  "SELECT COUNT(DISTINCT O.order_id) orders,
                                                                        COUNT(product_id*product_quantity) products,
                                                                        SUM(price) sales,
                                                                        SUM(cost) costs,
                                                                        SUM(price-cost) earnings,
                                                                        (SUM(price-cost)/SUM(price))*100 profit
                                                                    FROM Orders O INNER JOIN Contain C ON O.order_id = C.order_id
                                                                    WHERE DAYOFYEAR(order_date) = $day+1";

                                                    if($r_day = mysqli_query($dbc, $query_day))//Save & Validate Query Results
                                                    {
                                                        $row_day=mysqli_fetch_array($r_day);//Present Users

                                                        print "
                                                            <tr>
                                                            <td class='text-center'>".$day."</td>
                                                                <td class='text-center'>".dayOfYearToJMY($day)."</td>
                                                                <td class='text-center'>$row_day[orders]</td>
                                                                <td class='text-center'>$row_day[products]</td>
                                                                <td class='text-center'>".addUSD($row_day['sales'])."</td>
                                                                <td class='text-center'>".addUSD($row_day['costs'])."</td>
                                                                <td class='text-center'>".addUSD($row_day['earnings'])."</td>
                                                                <td class='text-center'>".numberToPercent($row_day['profit'])."</td>
                                                            </tr>
                                                        ";
                                                    }
                                                    else
                                                        print'<p style="color:red">NO SE PUEDE MOSTRAR RECORD PORQUE:'.mysqli_error($dbc).'.</P>';
                                                }
                                                else
                                                {
                                                    $ddate = "2021-5-5";
                                                    $date = new DateTime($ddate);
                                                    $start_day = $date->format("z");
                                                    $start_month = $date->format("n");
                                                    $current_day = date('z');//Current Day Number
                                                    $current_month = date('n');//Current Month Number
                                                    $current_year = date('Y');

                                                    for ($i = $start_day; $i <= $current_day; $i++)
                                                    {
                                                        //Query Create Week Report
                                                        $query_day =  "SELECT COUNT(DISTINCT O.order_id) orders,
                                                                                COUNT(product_id*product_quantity) products,
                                                                                SUM(price) sales,
                                                                                SUM(cost) costs,
                                                                                SUM(price-cost) earnings,
                                                                                (SUM(price-cost)/SUM(price))*100 profit
                                                                            FROM Orders O INNER JOIN Contain C ON O.order_id = C.order_id
                                                                            WHERE DAYOFYEAR(order_date) = $i+1";

                                                        if($r_day = mysqli_query($dbc, $query_day))//Save & Validate Query Results
                                                        {
                                                            $row_day=mysqli_fetch_array($r_day);//Present Users
                                                            print "
                                                                <tr>
                                                                    <td class='text-center'>".$i."</td>
                                                                    <td class='text-center'>".dayOfYearToJMY($i)."</td>
                                                                    <td class='text-center'>$row_day[orders]</td>
                                                                    <td class='text-center'>$row_day[products]</td>
                                                                    <td class='text-center'>".addUSD($row_day['sales'])."</td>
                                                                    <td class='text-center'>".addUSD($row_day['costs'])."</td>
                                                                    <td class='text-center'>".addUSD($row_day['earnings'])."</td>
                                                                    <td class='text-center'>".numberToPercent($row_day['profit'])."</td>
                                                                </tr>
                                                            ";
                                                        }
                                                        else
                                                            print'<p style="color:red">NO SE PUEDE MOSTRAR RECORD PORQUE:'.mysqli_error($dbc).'.</P>';
                                                    }
                                                }
                                            ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
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
