<?php
include ('../config/conexion.php');

    Class LoginCRUD extends Conexion{

        public function sanitize($limpiar){
            $return = mysqli_real_escape_string($this->conect, $limpiar);
            return $return;
        }
        
        public function buscarAutentificacion($usuario, $clave){
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
    }
?>