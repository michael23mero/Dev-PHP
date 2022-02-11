<?php
    include ('../config/conexion.php');

    class EmpresaCRUD extends Conexion{

        public function readEmpresa(){
            $listar = "SELECT *FROM `empresa`";
            $result = mysqli_query($this->conect, $listar);
            return $result;
        }
    }
?>