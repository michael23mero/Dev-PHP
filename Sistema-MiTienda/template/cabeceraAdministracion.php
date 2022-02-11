<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SMT - Modulo Facturacion</title>

    <!--Bootstrap-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous"-->

    <!--Font Awesome-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css">

    <link rel="stylesheet" href="../css/cabeceraAdministracion.css">

</head>
<body>
    <header>
        <div class="cabeceraAdmin">
        <input type="checkbox" id="btnMenu">
            <label for="btnMenu" id="checkbtn">
                <i class="fas fa-bars"></i>  
            </label>
                
            <nav class="menuAdmin">
                <ul>
                    <li><a href="../Vista/EmpresaView.php"><i class="fas fa-home"></i> INICIO</a></li>
                    <li><a href="../Vista/E_ClienteView.php"><i class="fas fa-users"></i> CLIENTES</a></li>
                    <li><a href="../Vista/E_FacturaView.php"><i class="fas fa-file-invoice"></i> FACTURAS</a></li>
                    <li><a href="../Vista/E_ProductoView.php"><i class="fab fa-shopify"></i> PRODUCTOS</a></li>
                    <li><a href="../Vista/E_EmpleadoView.php"><i class="fas fa-user"></i> EMPLEADOS</a></li>
                    <li><a href="../config/salir.php"><i class="fas fa-power-off"></i> Salir</a></li>
                </ul>
            </nav>
        </div>
    </header>