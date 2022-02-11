<?php
session_start();
include "../conexion.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <?php include "includes/scripts.php"; ?>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nueva Venta</title>
</head>

<body>
    <?php include "includes/header.php"; ?>
    <section id="container">
        <div class="title_page">
            <h1><i class="fas fa-cube"></i>Nueva Ventana</h1>
        </div>
        <div class="datos_cliente">
            <div class="action_cliente">
                <h4>Datos del Cliente</h4>
                <a href="#" class="btn_new btn_new_cliente"><i class="fas fa-plus"></i> Nuevo Cliente</a>
            </div>
            <form action="" class="datos">
                <input type="hidden">
                <input type="hidden">
                <div class="wd30">
                    <label for="">Nit</label>
                    <input type="text" name="nit_cliente" id="nit_cliente">
                </div>
                <div class="wd30">
                    <label for="">Nombre</label>
                    <input type="text" name="nom_cliente" id="nom_cliente" disabled>
                </div>
                <div class="wd30">
                    <label for="">Telefono</label>
                    <input type="number" name="tel_cliente" id="tel_cliente" disabled>
                </div>
                <div class="wd30">
                    <label for="">Direccion</label>
                    <input type="text" name="dir_cliente" id="dir_cliente" disabled>
                </div>
                <div class="div_registro_cliente" class="wd100">
                    <button type="submit" class="btn-save"><i class="far fa-save fa-lg"></i> Guardar</button>
                </div>
            </form>
        </div>
        <div class="datos_venta">
            <h4>Datos de venta </h4>
            <div class="datos">
                <div class="wd50">
                    <label for="">Vendedor</label>
                    <p>Gaby Mendoza</p>
                </div>
                <div class="wd50">
                <label for="">Acciones</label>
                <div id="acciones_venta">
                    <a href="#" class="btn_ok textcenter" id="btn_anular_venta"> 
                    <i class="fas fas-ban"></i> Anular</a>
                    <a href="" class="btn_new textcenter"  id="btn_facturar_venta"><i class="far fa-edit" ></i>Prosesar</a>
                </div>
                </div>
            </div>
        </div>
        <table class="tbl_venta">
        <thead>
            <tr>
                <th width="100px" >Codigo</th>
                <th>Descripcion</th>
                <th>Existencia</th>
                <th width="100px" ></th>
                <th class="textright">Precio</th>
                <th class="textright">Precio Total</th>
                <th>Accion</th>
            </tr>
            <tr>
                <td > <input type="text" name="txt_cod_producto" id="txt_cod_producto" ></td>
                <td id="txt_descripcion">-</td>
                <td id="txt_existencia">-</td>
                <td><input type="text" name="txt_cant_producto" id="txt_cant_producto"
                value="0" min="1" disabled></td>
                <td id="txt_precio" class="textright" >0.00</td>
                <td id="txt_precio_total" class="textright" >0.00</td>
                <td><a href="#" id="add_product_venta" class="link_add">
                <i class="fas fa-plus"></i> Agregar</a></td>
            </tr>
            <tr>
                <th>Codigo</th>
                <th colspan="2">Descriccion</th>
                <th>Cantidad</th>
                <th class="textright">Precio</th>
                <th class="textright">Precio Total</th>
                <th>Accion</th>

            </tr>
        </thead>
        <tbody id="detalle_venta">
            <tr>
                <td>1</td>
                <td colspan="2">Mouse USB</td>
                <td class="textcenter">1</td>
                <td class="textright">100.00</td>
                <td class="textright">100.00</td>
                <td class="">
                    <a href="" class="link_delete" onclick="" >
                    <i class="far fa-trash-alt"></i>                        </a>
                </td>
            </tr>
            <tr>
                <td>21</td>
                <td colspan="2">Teclado USB</td>
                <td class="textcenter">1</td>
                <td class="textright">58.00</td>
                <td class="textright">58.00</td>
                <td class="">
                    <a href="" class="link_delete" onclick="" >
                    <i class="far fa-trash-alt"></i>                        </a>
                </td>
            </tr>
            <tr>
                <td>5</td>
                <td colspan="2">Laptop</td>
                <td class="textcenter">1</td>
                <td class="textright">895.00</td>
                <td class="textright">895.00</td>
                <td class="">
                    <a href="" class="link_delete" onclick="" >
                    <i class="far fa-trash-alt"></i>          </a>
                </td>
            </tr>
        </tbody>
        <tfoot>
            <tr>
                <th colspan="6" class="textright">SUBTOTAL Q.</th>
                <th class="textright">1053.00</th>
            </tr>
            <tr>
                <th colspan="6" class="textright">IVA (12%)</th>
                <th class="textright">126.36</th>
            </tr>
            <tr>
                <th colspan="6" class="textright">TOTAL Q.</th>
                <th class="textright">1179.36</th>
            </tr>
        </tfoot>

        </table>
    </section>
    <?php include "includes/footer.php"; ?>
</body>

</html>