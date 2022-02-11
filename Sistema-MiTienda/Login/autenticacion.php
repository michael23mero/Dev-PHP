<?php
    /*include ('../config/conexion.php');*/
    include '../Modelo/LoginCRUD.php';
    include '../Vista/LoginView.php';

    /*Class Autentificacion extends Conexion{

        /*public function buscarAutentificacion($usuario, $clave){
            $buscar = "SELECT * FROM `perfil` Where USER = '$usuario' and PASS = '$clave'";
            $result = mysqli_query($this->conect, $buscar);
            return $result;
        }*/

       /* public function buscarAutentificacion($usuario, $clave){
            $buscar = "SELECT 
                            rolempleado.COD_ROLEMP as rol, 
                            perfil.USER, 
                            perfil.PASS
                        from rolempleado INNER JOIN empleado on rolempleado.COD_ROLEMP = empleado.COD_ROLEMP 
                                         INNER JOIN perfil on empleado.ID_EMPLEADO = perfil.ID_EMPLEADO
                        where perfil.USER = '$usuario' and perfil.PASS = '$clave'";
            $result = mysqli_query($this->conect, $buscar);
            return $result;
        }
    }*/

    $autentificacion = new LoginCRUD();

    session_start();
    ob_start();
    if(isset($_POST['btn_iniciar1'])){
        $_SESSION['sesion_exito'] = 0;
        $user = $_POST['User'];
        $pass = $_POST['Pass'];

        if($user == '' || $pass == ''){
            $_SESSION['sesion_exito'] = 2;
        }
        else
        {
            include '../config/global.php';
            $_SESSION['sesion_exito'] = 3; //DATOS INCORRECTOS
            $resultado = $autentificacion->buscarAutentificacion($user, $pass);
            while($consulta = mysqli_fetch_array($resultado))
            {
                if($consulta['rol'] == 1){
                    header("Location:../Vista/EmpresaView.php");
                }

                if($consulta['rol'] == 2){
                    header("Location:../Facturacion/facturacion.php");
                }

                $_SESSION['sesion_exito'] = 1;
            }
                include('../config/desconexion.php');
        }
    }

    if($_SESSION['sesion_exito']<>1)
    {
        header('Location:http://localhost/Sistema-MiTienda/Login/login.php');
    }
?>
<br>