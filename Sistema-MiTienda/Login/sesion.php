<?php
    session_start();
    ob_start();

    $_SESSION['sesion_exito'] = 4;
    header('Location: http://localhost/Sistema-MiTienda/Vista/LoginView.php');
?>
