<?php
  session_start();
  include 'phpIncludes/connection.php';
  if (!isset($_SESSION['login'])) {
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
            <h1>Detalle De Producto</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Inicio</a></li>
              <li class="breadcrumb-item active">Detalle de Producto</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="card card-solid">
        <div class="card-body">
          <div class="row">
            
              <?php
                $query = "SELECT * 
                            FROM Product 
                            WHERE product_id = {$_GET['product_id']}";
                
                $r = mysqli_query($dbc, $query);//Save & Validate Query Result
                $row = mysqli_fetch_array($r);//Present Products
                
                print "
                  <div class='col-12 col-sm-6'>
                    <h3 class='d-inline-block d-sm-none'>LOWA Men’s Renegade GTX Mid Hiking Boots Review</h3>
                    <div class='col-12 col-sm-6'>
                      <img src='../../FrontEnd/LoboPrinting/images/lobo_products/nombreImagen' alt='Product Image'>
                    </div>
                  </div>
                  <div class='col-12 col-sm-6'>
                    <h3 class='my-3'>$row[name] $row[description]</h3>
                    <div class='bg-gray py-2 px-3 mt-4'>
                      <h2 class='mb-0'>
                        ID
                      </h2>
                      <h4 class='mt-0'>
                        <small>$row[product_id]</small>
                      </h4>
                    </div>
                    <div class='bg-gray py-2 px-3 mt-4'>
                      <h2 class='mb-0'>
                        Precio De Venta
                      </h2>
                      <h4 class='mt-0'>
                        <small>$$row[price]</small>
                      </h4>
                    </div>
                    <div class='bg-gray py-2 px-3 mt-4'>
                      <h2 class='mb-0'>
                        Unidades Disponible
                      </h2>
                      <h4 class='mt-0'>
                        <small>$row[in_stock]</small>
                      </h4>
                    </div>
                    <div class='bg-gray py-2 px-3 mt-4'>
                      <h2 class='mb-0'>
                        Unidades Vendidas
                      </h2>
                      <h4 class='mt-0'>
                        <small>$row[sold]</small>
                      </h4>
                    </div>
                    <hr>
                    <h4>Available Colors</h4>
                    <div class='btn-group btn-group-toggle' data-toggle='buttons'>
                      <label class='btn btn-default text-center active'>
                        <input type='radio' name='color_option' id='color_option_a1' autocomplete='off' checked>
                        Green
                        <br>
                        <i class='fas fa-circle fa-2x text-green'></i>
                      </label>
                      <label class='btn btn-default text-center'>
                        <input type='radio' name='color_option' id='color_option_a2' autocomplete='off'>
                        Blue
                        <br>
                        <i class='fas fa-circle fa-2x text-blue'></i>
                      </label>
                      <label class='btn btn-default text-center'>
                        <input type='radio' name='color_option' id='color_option_a3' autocomplete='off'>
                        Purple
                        <br>
                        <i class='fas fa-circle fa-2x text-purple'></i>
                      </label>
                      <label class='btn btn-default text-center'>
                        <input type='radio' name='color_option' id='color_option_a4' autocomplete='off'>
                        Red
                        <br>
                        <i class='fas fa-circle fa-2x text-red'></i>
                      </label>
                      <label class='btn btn-default text-center'>
                        <input type='radio' name='color_option' id='color_option_a5' autocomplete='off'>
                        Orange
                        <br>
                        <i class='fas fa-circle fa-2x text-orange'></i>
                      </label>
                    </div>
                ";
                mysqli_close($dbc);
              ?> 
              
            </div>
          </div>
          <div class="row mt-4">
            <nav class="w-100">
              <div class="nav nav-tabs" id="product-tab" role="tablist">
                <a class="nav-item nav-link active" id="product-desc-tab" data-toggle="tab" href="#product-desc" role="tab" aria-controls="product-desc" aria-selected="true">Description</a>
                <a class="nav-item nav-link" id="product-comments-tab" data-toggle="tab" href="#product-comments" role="tab" aria-controls="product-comments" aria-selected="false">Comments</a>
                <a class="nav-item nav-link" id="product-rating-tab" data-toggle="tab" href="#product-rating" role="tab" aria-controls="product-rating" aria-selected="false">Rating</a>
              </div>
            </nav>
            <div class="tab-content p-3" id="nav-tabContent">
              <div class="tab-pane fade show active" id="product-desc" role="tabpanel" aria-labelledby="product-desc-tab"> Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi vitae condimentum erat. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Sed posuere, purus at efficitur hendrerit, augue elit lacinia arcu, a eleifend sem elit et nunc. Sed rutrum vestibulum est, sit amet cursus dolor fermentum vel. Suspendisse mi nibh, congue et ante et, commodo mattis lacus. Duis varius finibus purus sed venenatis. Vivamus varius metus quam, id dapibus velit mattis eu. Praesent et semper risus. Vestibulum erat erat, condimentum at elit at, bibendum placerat orci. Nullam gravida velit mauris, in pellentesque urna pellentesque viverra. Nullam non pellentesque justo, et ultricies neque. Praesent vel metus rutrum, tempus erat a, rutrum ante. Quisque interdum efficitur nunc vitae consectetur. Suspendisse venenatis, tortor non convallis interdum, urna mi molestie eros, vel tempor justo lacus ac justo. Fusce id enim a erat fringilla sollicitudin ultrices vel metus. </div>
              <div class="tab-pane fade" id="product-comments" role="tabpanel" aria-labelledby="product-comments-tab"> Vivamus rhoncus nisl sed venenatis luctus. Sed condimentum risus ut tortor feugiat laoreet. Suspendisse potenti. Donec et finibus sem, ut commodo lectus. Cras eget neque dignissim, placerat orci interdum, venenatis odio. Nulla turpis elit, consequat eu eros ac, consectetur fringilla urna. Duis gravida ex pulvinar mauris ornare, eget porttitor enim vulputate. Mauris hendrerit, massa nec aliquam cursus, ex elit euismod lorem, vehicula rhoncus nisl dui sit amet eros. Nulla turpis lorem, dignissim a sapien eget, ultrices venenatis dolor. Curabitur vel turpis at magna elementum hendrerit vel id dui. Curabitur a ex ullamcorper, ornare velit vel, tincidunt ipsum. </div>
              <div class="tab-pane fade" id="product-rating" role="tabpanel" aria-labelledby="product-rating-tab"> Cras ut ipsum ornare, aliquam ipsum non, posuere elit. In hac habitasse platea dictumst. Aenean elementum leo augue, id fermentum risus efficitur vel. Nulla iaculis malesuada scelerisque. Praesent vel ipsum felis. Ut molestie, purus aliquam placerat sollicitudin, mi ligula euismod neque, non bibendum nibh neque et erat. Etiam dignissim aliquam ligula, aliquet feugiat nibh rhoncus ut. Aliquam efficitur lacinia lacinia. Morbi ac molestie lectus, vitae hendrerit nisl. Nullam metus odio, malesuada in vehicula at, consectetur nec justo. Quisque suscipit odio velit, at accumsan urna vestibulum a. Proin dictum, urna ut varius consectetur, sapien justo porta lectus, at mollis nisi orci et nulla. Donec pellentesque tortor vel nisl commodo ullamcorper. Donec varius massa at semper posuere. Integer finibus orci vitae vehicula placerat. </div>
            </div>
          </div>
        </div>
        <!-- /.card-body -->
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
