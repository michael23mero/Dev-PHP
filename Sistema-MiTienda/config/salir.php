<?php
    @session_start();
    session_destroy();
    header('Location: http://localhost/Sistema-MiTienda/Vista/index.php');
?>