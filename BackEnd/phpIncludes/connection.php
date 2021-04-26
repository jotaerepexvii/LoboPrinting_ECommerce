<?php
    $dbc = @mysqli_connect('136.145.29.193','brytacmo','brytacmo840$cuta','brytacmo_db')
    OR die('No se pudo conectar a la base de datos'.mysqli_connect_error());

    if (session_status() === PHP_SESSION_NONE)
    {
        session_start();
    }
/*
$connection = mysqli_connect('localhost', 'root'', '', 'lobo_printing')
OR die('No se pudo conectar a la base de datos'.mysqli_connect_error());

session_start();
*/
?>