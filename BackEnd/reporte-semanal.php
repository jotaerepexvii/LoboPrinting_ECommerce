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
  
    <title>Reportes Semanales</title>
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
                            <h1 class="m-0">Inicio</h1>
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
                    <div class="row">
                        <div class="col">
                            <div class="card">
                                <div class="card-header border-0">
                                    <h3 class="card-title">Reporte Semanal</h3>
                                    <div class="card-tools">
                                        <form action='reporte-semanal.php' method='post'>
                                            <p>Select a week: <input type="week" name="aweek" class="form-control" min="2020-W14">
                                            <button type="submit" name="submit" class="btn btn-primary">SOMETER</button>
                                        </form>
                                    </div>
                                </div>
                                <div class="card-body table-responsive">
                                    <table id="example1" class="table table-striped">
                                        <thead>
                                            <tr>
                                                <th class='text-center'>Week</th>
                                                <th class='text-center'>Orders</th>
                                                <th class='text-center'>Products</th>
                                                <th class='text-center'>Sales</th>
                                                <th class='text-center'>Costs</th>
                                                <th class='text-center'>Earnings</th>
                                                <th class='text-center'>Gross Profit</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                                $dtz = new DateTimeZone("America/Puerto_Rico");
                                                $dt = new DateTime("now", $dtz);
                                            
                                                if(isset($_POST['submit']))
                                                {
                                                    $myweek = $_POST['aweek'];
                                                    $dweek = new DateTime($myweek);
                                                    $week = $dweek->format('W');
                                                    
                                                    $query_day =  "SELECT COUNT(DISTINCT O.order_id) orders,
                                                                        COUNT(product_id*product_quantity) products,
                                                                        SUM(price) sales,
                                                                        SUM(cost) costs,
                                                                        SUM(price-cost) earnings,
                                                                        (SUM(price-cost)/SUM(price))*100 profit
                                                                    FROM Orders O INNER JOIN Contain C ON O.order_id = C.order_id
                                                                    WHERE WEEK(order_date,1) = $week";

                                                    if($r_day = mysqli_query($dbc, $query_day))//Save & Validate Query Results
                                                    {
                                                        $row_day=mysqli_fetch_array($r_day);//Present Users
                                                        print "
                                                            <tr>
                                                                <td class='text-center'>$week</td>
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
                                                    $ddate = "2021-5-1";
                                                    $date = new DateTime($ddate);
                                                    $start_week = $date->format("W");
                                                    $current_week = date('W');//Current Week Number
                                                    for ($i = $start_week; $i <= $current_week; $i++)
                                                    {
                                                        //Query Create Week Report
                                                        $query_day =  "SELECT COUNT(DISTINCT O.order_id) orders,
                                                                                COUNT(product_id*product_quantity) products,
                                                                                SUM(price) sales,
                                                                                SUM(cost) costs,
                                                                                SUM(price-cost) earnings,
                                                                                (SUM(price-cost)/SUM(price))*100 profit
                                                                            FROM Orders O INNER JOIN Contain C ON O.order_id = C.order_id
                                                                            WHERE WEEK(order_date,1) = $i";

                                                        if($r_day = mysqli_query($dbc, $query_day))//Save & Validate Query Results
                                                        {
                                                            $row_day=mysqli_fetch_array($r_day);//Present Users
                                                            $weekJMY = weekOfYearToJMY($i);
                                                            print "
                                                                <tr>
                                                                    <td class='text-center'>".$weekJMY['start_date']." - ".$weekJMY['end_date']."</td>
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
