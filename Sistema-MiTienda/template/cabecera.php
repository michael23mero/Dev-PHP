<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!--Titulo de mi Tienda Web-->
    <title>SMT - Inicio</title>

    <!--Bootstrap-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">

    <!--Font Awesome-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css">

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

</head>
<body> 
    <header class="bg-success">
        <div class="cabecera">
            <div class="imgLogo">
                <img src="https://images.vexels.com/media/users/3/202614/isolated/preview/e36f1f4f1dbeebf5cb02c49ce01544d0-icono-de-dibujos-animados-de-avatar-de-frankenstein-by-vexels.png" alt="logo-cabecera" width="100">
            </div>

            <!--INCIO MENU DE NAVEGACION-->
            <input type="checkbox" id="btnMenu">
            <label for="btnMenu" id="checkbtn">
                <i class="fas fa-bars"></i>
            </label>
            
            <nav class="menu">
                <ul>
                    <li><a class="active" href="../Vista/index.php"><i class="fas fa-home"></i> INICIO</a></li>
                    <li><a href="../Vista/LoginView.php"><i class="fas fa-user"></i> LOGIN</a></li>
                    <li><a href="../Vista/ProductoView.php"><i class="fab fa-shopify"></i> PRODUCTOS</a></li>
                    <!--li><a href="#"><i class="fas fa-gift"></i> PROMOCIONES</a></li-->
                    
                    <li>
                        <a href="../Vista/CarritoView.php">
                        <i class="fas fa-shopping-cart"></i>
                         CARRITO(<?php echo(empty($_SESSION['CARRITO']))?0:count($_SESSION['CARRITO']);?>)
                        </a>
                    </li>
                </ul>
            </nav>
            <!--FIN MENU DE NAVEGACION-->
        </div>
    </header>


   