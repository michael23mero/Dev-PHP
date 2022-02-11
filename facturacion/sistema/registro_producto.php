<?php
session_start();
include "../conexion.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<?php include "includes/scripts.php ";?>
	<title>Registro de productos</title>
</head>
<body>
<?php include "includes/header.php ";?>
	<section id="container">
                <div class="fas fa-cubes">
                    <h1><i class="fas fa-cubes"></i> Registrar Producto</h1>
                    <hr>
                    <div class="alert"><?php echo isset($alert) ? $alert : ''; ?> </div>

                <form action="" method="post"  enctype="multipart/form-data">

                  
                    <option value="1"></option>
                    <label for="producto">Producto</label>
                    <input type="text" name="producto" id="producto" placeholder="Nombre del producto">
                    <label for="precio">Precio</label>
                    <input type="number" name="precio" id="precio" placeholder="Precio del producto">
                    <label for="Cantidad">Cantidad</label>
                    <input type="number" name="cantidad" id="cantidad" placeholder="Cantidad del producto">
                    <div class="photo">
                        <label for="foto">Foto</label>
                        <div class="prevPhoto">
                            <label for="foto"></label>
                        </div>
                        <div class="">
                            <input type="file" name="foto" id="foto">
                        </div>
                        <div id="form_alert"></div>
                    </div>
                </form>
                </div>
            </section>
        </div>
    </main>
</body>

</html>
