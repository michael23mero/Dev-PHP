<?php 
    session_start();
    ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<?php include "includes/scripts.php"; ?>
	<title>Registro producto</title>
</head>
<body>
	<?php include "includes/header.php"; ?>
	<section id="container">
            <!--<button onclick="ventana()">Agregar producto</button>-->
            <div class="bot">
                <h1>Agregar Producto</h1>
                <a href="registro_producto.php" class="btn_new" >+ Agregar Producto</a>
                <table>
                    <tr>
                        <th>Codigo</th>
                        <th>Descripción</th>
                        <th>Precio</th>
                        <th>Stock</th>
                        <th>Foto</th>
                        <th>Acciones</th>

                    </tr>
     
                    <td>1</td>
                    <td>galleta</td>
                    <td>25$</td>
                    <td>10</td>
                    <td>fo</td>
                    
                    
                    <td>
                        <a class="link_edit" href="editar_producto.php">Editar</a>
                        <a class="link_delete" href="eliminar_confirmar_producto.php">Eliminar</a>
                    </td>
                   
                
                </table>
                
            </div>
            </section>
</body>
</html>