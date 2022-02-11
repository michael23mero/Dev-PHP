<?php
    include ('../config/conexion.php');

    class EmpleadoCRUD extends Conexion{

        public function readEmpleado(){
            $listar = "SELECT *FROM `empleado`";
            $result = mysqli_query($this->conect, $listar);
            return $result;
        }
    }
?>