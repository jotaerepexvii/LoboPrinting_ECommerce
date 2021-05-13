<?php
    include 'phpIncludes/connection.php';
?>
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index.php" class="brand-link">
      <img src="dist/img/person.png" alt="Lobo Logo" class="brand-image elevation-3" style="opacity: .8">
        <?php
            error_reporting(E_ERROR | E_PARSE);
            $query = "SELECT *
                        FROM Administrator
                        WHERE admin_id={$_SESSION['loginAdmi']}";
            $r = mysqli_query($dbc,$query);//Make the Query
            $row = mysqli_fetch_array($r);//Save Query Result

            print "<span class='brand-text font-weight-light'>$row[name]</span>";
        ?>
    </a>
    <!-- Sidebar -->
    <div class="sidebar">
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
                                <p>Productos Vendidos</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="./productos-nuevo.php" class="nav-link">
                                <i class="fas fa nav-icon"></i>
                                <p>Añadir Producto</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="./productos.php" class="nav-link">
                                <i class="far fa nav-icon"></i>
                                <p>Ver Todos</p>
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
                                <p>Añadir Administradores</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="./administradores.php" class="nav-link">
                                <i class="far fa nav-icon"></i>
                                <p>Ver Todos</p>
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
                                <p>Ver Estudiantes</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="./usuarios.php" class="nav-link">
                                <i class="far fa nav-icon"></i>
                                <p>Ver Todos</p>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link">
                            <i class="nav-icon fas fa-file-alt"></i>
                            <p>Reportes<i class="right fas fa-angle-left"></i></p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="#" class="nav-link">
                                <i class="far fa nav-icon"></i>
                                <p>Reporte Diario</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="#" class="nav-link">
                                <i class="far fa nav-icon"></i>
                                <p>Reporte Semanal</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="#" class="nav-link">
                                <i class="far fa nav-icon"></i>
                                <p>Reporte Anual</p>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item menu-open">
                        <li class="nav-header">Cuenta del Administrador</li>
                            <li class="nav-item">
                            <a href="phpIncludes/logout.php" class="nav-link">
                                <i class="nav-icon fas fa-times"></i>
                                <p>Cerrar Sesión</p>
                            </a>
                            </li>
                            <li class="nav-item">
                            <?php
                                print"
                                    <a href='administradores-detalles.php?admin_id={$row['admin_id']}' class='nav-link'>
                                "
                            ?>
                                <i class="nav-icon fas fa-cog"></i>
                                <p>Configuración</p>
                            </a>
                        </li>
                    </li>
                </li>
            </ul>
        </nav>
    </div>
    <!-- /.sidebar -->
</aside>