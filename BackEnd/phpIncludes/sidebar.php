<!-- *********************************************************************************** -->
<?php
    include 'phpIncludes/connection.php';
?>
        <!-- *********************************************************************************** --> 
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index.php" class="brand-link">
      <img src="dist/img/person.svg" alt="Lobo Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
        <?php
            error_reporting(E_ERROR | E_PARSE);
            $query = "SELECT *
                        FROM Administrator
                        WHERE admin_id={$_SESSION['login']}";
            $r = mysqli_query($dbc,$query);//Make the Query
            $row = mysqli_fetch_array($r);//Save Query Result

            print"
                <span class='brand-text font-weight-light'>$row[name] $row[lastname]</span>
            ";
        ?>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) 
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="dist/img/user2-160x16.jpg" class="img-circle elevation-2" alt="">
            </div>
            <div class="info">
                <a></a>
            </div>
        </div>
        -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <li class="nav-item menu-open">
                    <li class="nav-item">
                        <a href="./index.php" class="nav-link">
                            <i class="nav-icon fas fa-home"></i>
                            <p>Inicio</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link">
                            <i class="nav-icon fas fa-box-open"></i>
                            <p>Productos<i class="right fas fa-angle-left"></i></p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="./productos.php" class="nav-link">
                                <i class="far fa nav-icon"></i>
                                <p>Inventario de Productos</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="./productos.php" class="nav-link">
                                <i class="far fa nav-icon"></i>
                                <p>Productos Vendidos</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="./nuevoProducto.php" class="nav-link">
                                <i class="fas fa nav-icon"></i>
                                <p>Añadir Producto</p>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a href="./administradores.php" class="nav-link">
                            <i class="nav-icon fas fa-user"></i>
                            <p>Administradores<i class="right fas fa-angle-left"></i></p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="./administradores.php" class="nav-link">
                                <i class="far fa nav-icon"></i>
                                <p>Ver Todos</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="./administradores.php" class="nav-link">
                                <i class="far fa nav-icon"></i>
                                <p>Añadir Administradores</p>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a href="./usuarios.php" class="nav-link">
                            <i class="nav-icon fas fa-users"></i>
                            <p>Usuarios<i class="right fas fa-angle-left"></i></p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="./usuarios.php" class="nav-link">
                                <i class="far fa nav-icon"></i>
                                <p>Ver Todos</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="./usuarios.php" class="nav-link">
                                <i class="far fa nav-icon"></i>
                                <p>Ver Estudiantes</p>
                                </a>
                            </li>
                        </ul>
                    </li>
                </li>
                <li class="nav-item menu-open">
                    <li class="nav-header">Reportes</li>
                        <li class="nav-item">
                        <a href="#" class="nav-link">
                            <i class="nav-icon fas fa-chart-line"></i>
                            <p>Ventas</p>
                        </a>
                        </li>
                        <li class="nav-item">
                        <a href="productos.php" class="nav-link">
                            <i class="nav-icon fas fa-table"></i>
                            <p>Inventario</p>
                        </a>
                        </li>
                        <li class="nav-item">
                        <a href="#" class="nav-link">
                            <i class="nav-icon fas fa-hand-holding-usd"></i>
                            <p>Ganancias</p>
                        </a>
                        </li>
                    </li>
                </li>
            </ul>
        </nav>
    </div>
    <!-- /.sidebar -->
</aside>