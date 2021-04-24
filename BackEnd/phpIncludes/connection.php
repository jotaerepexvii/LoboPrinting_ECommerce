<?php

    $dbc = @mysqli_connect('136.145.29.193','brytacmo','brytacmo840$cuta','brytacmo_db')
        OR die('No se pudo conectar a la base de datos'.mysqli_connect_error());

    /*session_start();

    if (!isset($_SESSION['login']))//not logged in
    {
        echo '<script>alert("You have to be login!")</script>';
        header("Location:index.php");
        exit(); // NOT DIE :P
    }*/
?>