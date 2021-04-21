<!-- *********************************************************************************** -->
<?php
    include 'phpIncludes/connection.php';
?>
        <!-- *********************************************************************************** --> 
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index.php" class="brand-link">
      <img src="dist/img/lobo.ico" alt="Lobo Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">Menu</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
            <img src="dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
            <a href="#" class="d-block">Juan Del Town</a>
            </div>
        </div>
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
                    with font-awesome or any other icon font library -->

                <li class="nav-item menu-open">
                    <li class="nav-item">
                        <a href="./index.php" class="nav-link">
                            <i class="nav-icon fas fa-home"></i>
                            <p>Inicio</p>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="#" class="nav-link">
                            <i class="nav-icon fas fa-shopping-cart"></i>
                            <p>Productos<i class="right fas fa-angle-left"></i></p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="./productos.php" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Ver Productos</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="./productos.php" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
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
                                <a href="./productos.php" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Ver Todos</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="./productos.php" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Editar Administradores</p>
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
                                <a href="./productos.php" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Ver Todos</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="./productos.php" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Editar Usuario</p>
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