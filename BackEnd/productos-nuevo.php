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
  <title>Detalles Del Producto</title>
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
            <h1>Nuevo Producto</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Inicio</a></li>
              <li class="breadcrumb-item active">Nuevo Producto</li>
            </ol>
          </div>
        </div>
      </div>
    </section>
    <!-- Main content -->
    <?php           
        if(isset($_POST['add']))
        {
            $errors = array();

            $product_id = (int)$_POST['product_id'];
            $name = filter_input(INPUT_POST, 'name');
            $description = filter_input(INPUT_POST, 'description');
            $price = filter_input(INPUT_POST, 'price');
            $cost = filter_input(INPUT_POST, 'cost');
            $in_stock = filter_input(INPUT_POST, 'in_stock');
            $sold = 0;
            $dateAdded = date("Y-m-d");
            $image = "1";

            if (empty($_POST['product_id']) || empty($_POST['name']) || empty($_POST['description']) || empty($_POST['price']) || empty($_POST['cost']) || empty($_POST['in_stock']))
            {
              array_push($errors, 'Todo Los Campos Son Requeridos');
            }
            else if(count($errors) == 0)
            {
                $query_insert = mysqli_query($dbc, "INSERT INTO Product(product_id, name, description, price, cost, in_stock, sold, date, image)
                VALUES('$product_id','$name','$description','$price','$cost', '$in_stock', '$sold', '$dateAdded', $image)");

                if($query_insert)
                {
                    header("Location: productos-detalles.php?product_id=$product_id");
                    mysqli_close($dbc);
                }
                else	
                {
                    echo "Error: " . $query_insert . "<br>" . mysqli_error($dbc);
                }  
            }
            else	  
                echo '<script>alert("ERROR:Variables")</script>';
        }
        else if(isset($_POST['discard']))
        {
            header("Location: productos.php");
        }
    ?>
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <!-- left column -->
                <div class="col-md-6 offset-md-3">
                <!-- general form elements -->
                    <div class="card card-secondary">
                        <div class="card-header">
                            <h5 class="card-title">Añada el nuevo producto<br></h5>
                            <h5 class="card-title"><?php echo $errors?></h5>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start
                          action="phpIncludes/upload.php" -->
                        <form action="phpIncludes/upload.php" method="post" enctype="multipart/form-data">
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">ID (Barcode)</label>
                                    <input type="text" class="form-control" id="product_id" name="product_id" value="<?php echo $row['product_id'] ?>">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Tipo de Artículo</label>
                                    <input type="text" class="form-control" id="name" name="name">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1" id="category" name="category">Categoría</label>
                                    <select class="form-control">
                                      <option>Escolar</option>
                                      <option>Laboratorio</option>
                                      <option>Memorabilia</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Nombre</label>
                                    <input type="text" class="form-control" id="descripion" name="description" value="<?php echo $row['description'] ?>">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Precio</label>
                                    <input type="text" class="form-control" id="price" name="price" value="<?php echo $row['price'] ?>">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Costo</label>
                                    <input type="text" class="form-control" id="cost" name="cost" value="<?php echo $row['cost'] ?>">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Cantidad Disponible</label>
                                    <input type="text" class="form-control" id="in_stock" name="in_stock" value="<?php echo $row['in_stock'] ?>">
                                </div>
                                <div class="form-group" action="#">
                                  <label for="exampleInputFile">Imágen</label>
                                  <div class="input-group">
                                    <div class="custom-file">
                                      <input type="file" name="file" class="" accept="image/*">
                                      <button type="submit" name="submit" class="btn btn-secondary">Subir</button>
                                    </div>
                                  </div>
                                </div>
                            </div>
                            <!-- /.card-body -->
                            <div class="card-footer">
                                <button type="submit" id="add" name="add" class="btn btn-warning">Añadir</button>
                                <button type="submit" class='btn btn-secondary'><a href='productos.php' style='color:inherit'>Descartar</a></button>
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
