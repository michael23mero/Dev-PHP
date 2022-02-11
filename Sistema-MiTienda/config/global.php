<?php
    define("KEY","Yrpj0693");
    define("COD","AES-128-ECB");

    $host = "localhost";
    $database = "db-MiTienda";
    $usuario = "root";
    $clave = "";

    $conexion = new mysqli($host, $usuario, $clave, $database);

    if($conexion->connect_errno){
        echo "Fallo inseperado, Asegurese de conectar la database";
        exit();
    }
?>