<?php
    include '../Modelo/LoginCRUD.php';
    include '../Vista/LoginView.php';

    $autentificacion = new LoginCRUD();

    session_start();
    ob_start();
    if(isset($_POST['btn_iniciar1'])){
        $_SESSION['sesion_exito'] = 0;
        $user = $autentificacion->sanitize($_POST['User']);
        $pass = $autentificacion->sanitize($_POST['Pass']);

        if($user == '' || $pass == ''){
            $_SESSION['sesion_exito'] = 2;
        }
        else
        {
            /*include '../config/global.php';*/
            $_SESSION['sesion_exito'] = 3; //DATOS INCORRECTOS
            $resultado = $autentificacion->buscarAutentificacion($user, $pass);
            while($consulta = mysqli_fetch_array($resultado))
            {
                if($consulta['rol'] == 1){
                    header("Location:../Vista/EmpresaView.php");
                }

                if($consulta['rol'] == 2){
                    header("Location:../Vista/FacturacionView.php");
                }

                $_SESSION['sesion_exito'] = 1;
            }
            /*include('../config/desconexion.php');*/
        }
    }

    if($_SESSION['sesion_exito']<>1)
    {
        header('Location:http://localhost/Sistema-MiTienda/Vista/LoginView.php');
    }
?>
<br>