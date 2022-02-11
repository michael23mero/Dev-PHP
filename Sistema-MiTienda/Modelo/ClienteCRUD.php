<?php
    include ('../config/conexion.php');

    class ClienteCURD extends Conexion{

        public function sanitize($limpiar){
            $return = mysqli_real_escape_string($this->conect, $limpiar);
            return $return;
        }

        public function readClientes(){
            $listar = "SELECT *FROM `cliente`";
            $result = mysqli_query($this->conect, $listar);
            return $result;
        }

        public function createClientes($idClient, $nomCliente, $apeCliente, $dirCliente, $telCliente){
            $editar = "INSERT INTO `cliente` (ID_CLIENTE, NOM_CLIENTE, APE_CLIENTE, DIR_CLIENTE, TELCLIENTE) VALUES ($idClient, '$nomCliente', '$apeCliente', '$dirCliente', $telCliente)";
            $result = mysqli_query($this->conect, $editar);
            if($result){
                return true;
            }
            else{
                return false;
            }
        }

        public function updateClientes($nomCliente, $apeCliente, $dirCliente, $telCliente, $idClient){
            $editar = "UPDATE `cliente` SET NOM_CLIENTE ='$nomCliente', APE_CLIENTE = '$apeCliente', DIR_CLIENTE = '$dirCliente', TELCLIENTE = $telCliente WHERE ID_CLIENTE = $idClient";
            $result = mysqli_query($this->conect, $editar);
            if($result){
                return true;
            }
            else{
                return false;
            }
        }

        public function deleteClientes($idClient){
            $delete = "DELETE FROM `cliente` WHERE ID_CLIENTE = $idClient";
            $result = mysqli_query($this->conect, $delete);
            if($result){
                return true;
            }
            else{
                return false;
            }
        }

        public function liveSearchClientes($nomCliente){
            $liveSearch = "SELECT *FROM `cliente` WHERE NOM_CLIENTE LIKE '%".$nomCliente."%' ";
            $result = mysqli_query($this->conect, $liveSearch);
            return $result;
        }
    }
?>