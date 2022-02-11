<?php
session_start();
include "../conexion.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<?php include "includes/scripts.php ";?>
	<title>Lista de Clientes</title>
</head>
<body>
<?php include "includes/header.php ";?>
	<section id="container">
		<h1>Lista de Clientes</h1>
        <a href="registro_cliente.php" class="btn_new" >Crear Cliente</a>
        <table>

        <tr>

        <th>ID </th>
        <th>RUT</th>
        <th>Nombre</th>
        <th>Telefono</th>
        <th>Direccion</th>        
        <th>Acciones</th>
        </tr>
        
                
                    <td>1</td>
                    <td>1564657</td>
                    <td>Jose</td>
                    <td>09874562</td>
                    <td>los bajos</td>
                    
                    
                    <td>
                        <a class="link_edit" href="editar_cliente.php">Editar</a>
                        <a class="link_delete" href="eliminar_confirmar_cliente.php">Eliminar</a>
                    </td>
                </tr>
                <td>2</td>
                <td>1564657</td>
                    <td>Jonathan</td>
                    <td>09874562</td>
                    <td>Manta</td>
                    
                    
                    <td>
                    <a class="link_edit" href="editar_cliente.php">Editar</a>
                        <a class="link_delete" href="eliminar_confirmar_cliente.php">Eliminar</a>
                    </td>
                </tr>
                <td>3</td>
                <td>1564657</td>
                    <td>Steven</td>
                    <td>0987f4562</td>
                    <td>los del pechiche</td>
                    
                    
                    <td>
                    <a class="link_edit" href="editar_cliente.php">Editar</a>
                        <a class="link_delete" href="eliminar_confirmar_cliente.php">Eliminar</a>
                    </td>
                </tr>
               
                
    
    
    </table>
    <div class="paginador">
        <ul>
            <li><a href="">|<<</a></li>
            <li><a href=""><<</a></li>
            <li><a href="">1</a></li>
            <li><a href="">2</a></li>
            <li><a href="">3</a></li>
            <li><a href="">4</a></li>
            <li><a href="">5</a></li>
            <li><a href="">>></a></li>
            <li><a href="">>|</a></li>
        </ul>
       </div>
	</section>

	<?php include "includes/footer.php ";?>
	
</body>
</html>