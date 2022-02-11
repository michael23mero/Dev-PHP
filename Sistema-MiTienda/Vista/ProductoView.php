<!--Titulo Produ--><head><title>SMT - Productos</title></head>
<!--Archivos PHP--><?php include '../template/cabecera.php';
                         include '../config/global.php';
                         include '../Controlador/CarritoController.php';
                         include '../Modelo/ProductoCRUD.php';?>
<!--Estilos css--> <link rel="stylesheet" href="../css/cabecera.css">
                   <link rel="stylesheet" href="../css/search.css">
<br>
    <div class="container">
        <?php if($mensaje != ""){?>
            <div class="alert alert-success">
        <?php echo $mensaje; ?>
            <a href="./CarritoView.php" class="badge badge-success">Ver Carrito</a>
    </div>
        <?php }?>

    <div class="row">
        <?php
            $producto = new ProductoCRUD();
            $sentencia = $producto->readProducto();
            $listarProductos = $sentencia;/*->fetchAll(PDO::FETCH_ASSOC);*/
            $categoria = $producto->elegirCategoria()
        ?>
        <select>
            <?php
                while($categ = mysqli_fetch_array($categoria)){?>
                    <option value="">
                        <?php echo $categ['NOM_CATEGORIA'].'<a href="#"></a>'; ?>
                    </option>
            <?php
                }
            ?>
        </select>

        <?php
            foreach($listarProductos as $productos){?>
                <div class="col-3"><br>
                    <div class="card">
                       <img 
                       title="<?php echo $productos['NOM_PRODUCTO'];?>"
                       alt="<?php echo $productos['NOM_PRODUCTO'];?>"
                       class="card-img-top"
                       src="<?php echo $productos['IMG_PRODUCTO'];?>"

                       data-toggle = "popover"
                       data-trigger = "hover"
                       data-content = "<?php echo $productos['DESC_PRODUCTO'];?>"
                       

                       height="250px"
                       >

                       <div class="card-body">
                           <span><?php echo $productos['NOM_PRODUCTO'];?></span>
                           <h5 class="card-title">$<?php echo $productos['PRECIO_PRODUCTO'];?></h5>
                           <!--p class="card-text">Descripcion<-?php echo $productos['DESC_PRODUCTO'];?></p-->

                        <form action="" method="POST">
                            <input type="hidden" name="id" id="id" value="<?php echo openssl_encrypt ($productos['COD_PRODUCTO'], COD, KEY);?>">
                            <input type="hidden" name="nombre" id="nombre" value="<?php echo openssl_encrypt ($productos['NOM_PRODUCTO'], COD, KEY);?>">
                            <input type="hidden" name="precio" id="precio" value="<?php echo openssl_encrypt ($productos['PRECIO_PRODUCTO'], COD, KEY);?>">
                            <input type="hidden" name="cantidad" id="cantidad" value="<?php echo openssl_encrypt( 1, COD, KEY);?>">

                            <div class="text-center">
                                <button class="btn btn-primary"
                                    name="btnAccion"
                                    value="Agregar"
                                    type="submit">
                                    AGREGAR AL CARRITO
                                </button>
                            </div>
                        </form>
                            
                       </div>
                   </div> 
                </div>
        <?php } ?>
    </div>

        <script>
            $(function () {
                $('[data-toggle="popover"]').popover()
            });
        </script>

    </div>
    <br>
    
<?php 
    include '../template/pie.php';
?>