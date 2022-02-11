<?php
    include '../Modelo/EmpresaCRUD.php';
    include '../template/cabeceraAdministracion.php';
    $administracion = new EmpresaCRUD();

    $empresaListar = $administracion->readEmpresa();

    while($listar = mysqli_fetch_array($empresaListar))
    {
        echo $listar['ID_EMPRESA'].' -- '.$listar['NOM_EMPRESA'];
    }
?>