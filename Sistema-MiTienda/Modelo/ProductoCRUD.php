<?php
        include ('../config/conexion.php');

        class ProductoCRUD extends Conexion{
            
            public function createProducto($codProducto, $idProveedor, $idCategoria, $nomProducto, $precioProducto, $stockProducto, $descProducto, $imgProducto){
                $editar = "INSERT INTO `producto` (COD_PRODUCTO, ID_PROVEEDOR, ID_CATEGORIA, NOM_PRODUCTO, PRECIO_PRODUCTO, STOCK_PRODUCTO, DESC_PRODUCTO, IMG_PRODUCTO) VALUES ($codProducto, $idProveedor, $idCategoria, '$nomProducto', $precioProducto, $stockProducto, '$descProducto', '$imgProducto')";
                $result = mysqli_query($this->conect, $editar);
                if($result){
                    return true;
                }
                else{
                    return false;
                }
            }

            public function readProducto(){
                $listar = "SELECT *FROM `producto`";
                $result = mysqli_query($this->conect, $listar);
                return $result;
            }
            

            public function elegirCategoria(){
                $categoria = "SELECT * FROM categoria";
                $result = mysqli_query($this->conect, $categoria);
                return $result;
            }
        }
?>