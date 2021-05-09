<?php
    session_start();
    //session_destroy();
    unset($_SESSION['loginAdmi']);

    header('location: ../login.php');
?>