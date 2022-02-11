<?php
    include ('../config/conexion.php');

    class FacturaCRUD extends Conexion{

        public function readFactura(){
            $listar = "SELECT *FROM `facturapedido`";
            $result = mysqli_query($this->conect, $listar);
            return $result;
        }

        public function numeroFactura(){
            $calcular = "SELECT count(ID_FACTPED) + 1 as numFactura
                            from `facturapedido`";
            $result = mysqli_query($this->conect, $calcular);
            return $result;
        }
    }
?>