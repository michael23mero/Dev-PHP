<!--Titulo Carr--> <head><title>SMT - Carrito</title></head>
<!--Archivos PHP--><?php include '../template/cabecera.php';
                         include '../config/global.php';
                         include '../Controlador/CarritoController.php';?>
<!--Estilos css--><link rel="stylesheet" href="../css/cabecera.css">
                  <link rel="stylesheet" href="../css/pie.css">
                  <link rel="stylesheet" href="../css/factura.css">

<!--Bootstrap-->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous"-->

<?php
    include '../Modelo/FacturaCRUD.php';
    $factura = new FacturaCRUD();
?>

<br>
<div class="container">
    <div class="8-col" colspan="3" align="right">
        <button class="btn btn-primary">Finalizar Compra</button>
        <button class="btn btn-success">Registrase</button><br><hr>
    </div>
    
    <h3 class="4-col text-center">- Frankenstein S.A -</h3><hr>
    
    <div class="contenedor">
        <div class="adentro">
            <?php
                $numFactura = $factura ->numeroFactura();
                $fila = $numFactura->fetch_assoc();
            ?>
            <h5>FACTURA: #<?php echo $fila['numFactura'];?></h5>
            <h6>Fecha: <?php echo date("d").' - '.date('F').' - '.date("Y");?></h6>
        </div>
    </div>

    <div class="contenedor">
        <div class="adentro">
        <h5>CLIENTE</h5>
            <h6>Identificacion: <input type="text" name="" id=""></h6>
            <h6>Nombres: <input type="text" name="" id=""></h6>
            <h6>Direccion: <input type="text" name="" id=""></h6>
            <h6>Telef/Cel: <input type="text" name="" id=""></h6>
        </div>
    </div><hr>

    <h3 class="4-col text-center">PRODUCTOS DEL CARRITO</h3><hr>

    <?php if(!empty($_SESSION['CARRITO'])){?>

        <table class="table table-light table-bordered">
        <tbody>
            <tr class="text-center">
                <th width="15%">Cantidad</th>
                <th width="40%">Descripcion</th>
                <th width="20%">Precio</th>
                <th width="20%">Total</th>
                <th width="5%">--</th>
            </tr>
        <?php 
            $subtotal = 0; 
            $iva = 0;
            $total = 0;
        ?>

        <?php foreach($_SESSION['CARRITO'] as $indice => $productos){ ?>

                <tr>
                    <td width="15%"><?php echo $productos['CANTIDAD']?></td>
                    <td width="40%"><?php echo $productos['NOMBRE']?></td>
                    <td width="20%"><?php echo $productos['PRECIO']?></td>
                    <td width="20%"><?php echo number_format($productos['PRECIO'] * $productos['CANTIDAD'], 2)?></td>
                    <td width="5%">
                        <form action="" method="post">
                            <input type="hidden" name="id" id="id" value="<?php echo openssl_encrypt ($productos['ID'], COD, KEY);?>">
                                <button 
                                class="btn btn-danger"
                                type="submit"
                                name="btnAccion"
                                value="Eliminar"
                                >Eliminar
                                </button>
                            </form>
                    </td>  
                </tr>
        
            <?php $subtotal = $subtotal + ($productos['PRECIO']*$productos['CANTIDAD']); 
                $iva = 0.12 * $subtotal;
                $total = $iva + $subtotal;
            ?>
            <?php } ?>

            <tr>
                <td colspan="3" align="right"><h5>Sub-Total</h5></td>
                <td align="right"><h5>$<?php echo number_format($subtotal, 2);?></h5></td>
                <td></td>
            </tr>
            <tr>
                <td colspan="3" align="right"><h5>IVA</h5></td>
                <td align="right"><h5>$<?php echo number_format($iva, 2);?></h5></td>
                <td></td>
            </tr>
            <tr>
                <td colspan="3" align="right"><h5>Total</h5></td>
                <td align="right"><h5>$<?php echo number_format($total, 2);?></h5></td>
                <td></td>
            </tr>

        </tbody>
        </table>
    <?php } else{ ?>
        <div class="alert alert-success">
            No hay productos en el CARRITO
        </div>
    <?php }?><br>
</div>

<?php include '../template/pie.php'; ?>