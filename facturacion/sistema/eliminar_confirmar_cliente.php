<?php 
    session_start();
    ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<?php include "includes/scripts.php"; ?>
	<title>Eliminar Cliente</title>
</head>
<body>
	<?php include "includes/header.php"; ?>
	<section id="container">
		<div class="data_delete">
			<h2>¿Está seguro de eliminar el siguiente registro?</h2>
            <p>Nombre: <span><p> moi </p></span></p>
            <p>NIT: <span><p> 4564654 </p></span></p>
			<p> Telefono: <span><p> 0999999999 </p></span></p>
			<p> Direccion: <span><p> Los bajos </p></span></p>

			<form method="post" action="">
				<input type="hidden" name="idusuario" value="<?php echo $idusuario; ?>">
				<a href="lista_clientes.php" class="btn_cancel">Cancelar</a>
				<input type="submit" value="Aceptar" class="btn_ok">
			</form>
		</div>


	</section>
	<?php include "includes/footer.php"; ?>
</body>
</html>