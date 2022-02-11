<?php 
    session_start();
    ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<?php include "includes/scripts.php"; ?>
	<title>Actualizar Usuario</title>
</head>
<body>
<?php include "includes/header.php"; ?>
<section id="container">
        <div>
            <section>
                <div>
                    <h1>Actualizar Producto</h1>
                <div > <?php echo isset($alert) ? $alert : ''; ?> </div>

                <form action="" method="post">

                    <input type="hidden" name="idproducto" value="" >
                    <p>Codigo</p><input type="number" id="codigo" value="">
                    <p>Nombre </p> <input type="text" id="nombre" value="">
                    <p>Precio</p> <input type="number" id="precio" value="">
                    <p>Stock</p><input type="number" id="stock">


                    </select>
                    <input type="submit" value="Actualizar Usuario" >

                </form>
                </div>
            </section>
        </div>
</section>
</body>
</html>