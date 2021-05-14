<?php
    session_start();
    include 'connection.php';
    if (!isset($_SESSION['loginAdmi'])) {
        header('../location:login.php');
    }
    ob_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Advertencia</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../plugins/fontawesome-free/css/all.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="../plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../dist/css/adminlte.min.css">
</head>
<body class="hold-transition login-page">
    <div class="login-box">
        <div class="login-logo">
            <a href="../index.html"><b>Advertencia</b></a>
            <img src="../../../FrontEnd/images/lobo_products/$product_id">
        </div>
        <?php
            $query = "SELECT * 
                        FROM Product 
                        WHERE product_id = {$_GET['product_id']}";
                                
            $r = mysqli_query($dbc, $query);//Save & Validate Query Result
            $row = mysqli_fetch_array($r); //Present Products

            $product_id = $_GET['product_id'];
            
            if(isset($_POST['discard']))
            {
                header("Location: ../productos-detalles.php?product_id=$product_id");
            }
            else if(isset($_POST['delete']))
            {
                mysqli_query($dbc, "DELETE FROM Product WHERE product_id = '$product_id'");
                unlink("../../FrontEnd/images/lobo_products/$product_id");
                echo("<script>location.href = '../productos.php';</script>");
            }
        ?>
        <div class="card">
            <div class="card-body login-card-body">
                <p class="login-box-msg">Está seguro que desea eliminar el producto</p>
                <form action="#" method="post">
                    <div class="row">
                        <div class="col-12">
                            <button type="submit" id="delete" name="delete" class="btn btn-danger btn-block">SI</button>
                            <button type="submit" id="discard" name="discard" class="btn btn-secondary btn-block">NO</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
<!-- jQuery -->
<script src="../plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="../dist/js/adminlte.min.js"></script>
</body>
</html>
