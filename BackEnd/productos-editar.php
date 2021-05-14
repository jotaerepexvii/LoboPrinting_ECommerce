<?php
  session_start();
  include 'phpIncludes/connection.php';
  if (!isset($_SESSION['loginAdmi'])) {
    header('location:login.php');
  }
  ob_start();
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
            <div class="content-header" id="actualizar">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0">Editar Producto</h1>
                        </div><!-- /.col -->
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="index.php">Tablero Administrativo</a></li>
                                <li class="breadcrumb-item active">Editar Producto</li>
                            </ol>
                        </div><!-- /.col -->
                    </div><!-- /.row -->
                </div><!-- /.container-fluid -->
            </div>
            <!-- /.content-header -->
            <?php
                $query = "SELECT * 
                            FROM Product 
                            WHERE product_id = {$_GET['product_id']}";
                                    
                $r = mysqli_query($dbc, $query);//Save & Validate Query Result
                $row = mysqli_fetch_array($r); //Present Products

                $product_id = $_GET['product_id'];
                
                if(isset($_POST['update']))
                {
                    $errors = array();
                    
                    $newProduct_id = (int)$_POST['product_id'];
                    $name = filter_input(INPUT_POST, 'name');
                    $description = filter_input(INPUT_POST, 'description');
                    $price = filter_input(INPUT_POST, 'price');
                    $cost = filter_input(INPUT_POST, 'cost');
                    $in_stock = filter_input(INPUT_POST, 'in_stock');

                    $name = preg_replace('/[^a-zA-Z0-9 ]/', '', $name);
                    $description = preg_replace('/[^a-zA-Z0-9 ]/', '', $description);

                    if  (empty($product_id))
                        array_push($errors, 'product_id is require!');
                    if  (empty($name))
                        array_push($errors, 'name is require!');
                    if  (empty($description))
                        array_push($errors, 'description is require!');
                    if  (empty($price))
                        array_push($errors, 'price is require!');
                    if  (empty($cost))
                        array_push($errors, 'cost is require!');
                    if  (empty($in_stock))
                        array_push($errors, 'in_stock is require!');
                    
                    if(count($errors) == 0)
                    {
                        $query2 = "UPDATE Product SET product_id='$newProduct_id', name='$name', description='$description', price='$price', cost='$cost', in_stock='$in_stock'
                        WHERE product_id='$product_id'";

                        if (mysqli_query($dbc, $query2)){
                            mysqli_close($dbc);
                            echo("<script>location.href = 'productos-detalles.php?product_id=$newProduct_id';</script>");
                            //header("Location: productos-detalles.php?product_id=$product_id");
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
                    header("Location: productos-detalles.php?product_id=$product_id");
                }
                else if(isset($_POST['delete']))
                {
                    echo("<script>location.href = 'phpIncludes/eliminar-producto.php?product_id=$product_id';</script>");
                }
            ?>
            <section class="content">
                <div class="container-fluid">
                    <div class="row">
                        <!-- left column -->
                        <div class="col-md-6">
                            <div class="col-12">
                                <img src="../FrontEnd/images/lobo_products/<?php echo $row['image'] ?>" class="product-image" alt="Product Image">
                            </div>
                        </div>
                        <div class="col-md-6">
                        <!-- general form elements -->
                            <div class="card card-secondary">
                                <div class="card-header">
                                    <h5 class="card-title">Editar Producto</h5>
                                </div>
                                <!-- /.card-header -->
                                <!-- form start -->
                                <form action="#" method="post" enctype="multipart/form-data"> 
                                    <div class="card-body">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">ID (Barcode)</label>
                                            <input type="number" class="form-control" id="product_id" name="product_id" value="<?php echo $row['product_id'] ?>" min="0" step="1" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputPassword1">Tipo de Producto</label>
                                            <input type="text" class="form-control" id="name" name="name" value="<?php echo $row['name'] ?>" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Nombre de Producto</label>
                                            <input type="text" class="form-control" id="description" name="description" value="<?php echo $row['description'] ?>" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputPassword1">Precio</label>
                                            <input type="number" class="form-control" id="price" name="price" value="<?php echo $row['price'] ?>" min="0.01" step="0.01" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Costo de Adquisición</label>
                                            <input type="number" class="form-control" id="cost" name="cost" value="<?php echo $row['cost'] ?>" min="0.01" step="0.01">
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Cantidad Disponible</label>
                                            <input type="number" class="form-control" id="in_stock" name="in_stock" value="<?php echo $row['in_stock'] ?>" min="0" step="1" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Dia Añadido</label>
                                            <input type="readonly" class="form-control" id="date" name="date" value="<?php echo $row['date'] ?>" disabled>
                                        </div>
                                    </div>
                                    <!-- /.card-body -->
                                    <div class="card-footer">
                                        <button type="submit" id="update" name="update" class="btn btn-success">Actualizar</button>
                                        <button type="submit" id="discard" name="discard" class='btn btn-secondary'>Descartar Cambios</button>
                                        <button type="submit" id="delete" name="delete" class="btn btn-danger">Eliminar Producto</button>
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
        <aside class="control-sidebar control-sidebar-dark">
            <!-- Control sidebar content goes here -->
        </aside>
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
