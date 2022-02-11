<!--Aechivos PHP--><?php include '../template/cabecera.php';?>
<!--Estilos css--> <link rel="stylesheet" href="../css/cabecera.css">

<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
</head>

<div class = 'container'>
    <br><br>
    <div class="row">
        <div class = 'col-md-2'></div>
        <div class = 'col-md-8 text-center'><h1>Sistema Frankenstein</h1><h3>- Login -</h3></div>
        <div class = 'col-md-2'></div>
    </div>
    <hr>

    <h3>
        <p class = 'bg-warning text-center'>
            <b>
                <?php
                    session_start();
                    ob_start();

                    if(isset($_SESSION['sesion_exito']))
                    {
                        if($_SESSION['sesion_exito'] == 2)
                            {echo "Los campos son OBLIGATORIOS";}
                ?>
                <p class = 'bg-danger text-center'>    
                <?php
                        if($_SESSION['sesion_exito'] == 3)
                            {echo 'Datos INCORRECTOS';}
                    }
                    else
                    {
                        $_SESSION['sesion_exito'] = 0;
                    }
                ?>
            </b>
        </p>

        <p class = 'bg-success text-center'>
            <b>
            <?php
                if($_SESSION['sesion_exito'] == 4){
                    echo "GRACIAS POR USAR NUESTRO SERVICIO";
                }
                $_SESSION['sesion_exito'] = 0;
            ?>
            </b>
        </p>
    </h3>

    <!--FORMULARIO-->
    <div class = 'row'>
        <div class = 'col-md-4'></div>
        <div class = 'col-md-4'>
            <div class = 'well'> <!--COLOR DE FONDO DE NUESTRO CONTENEDOR-->
            <center>
                <h3>INICIAR SESION</h3><br>
                <img src="img/login.png" class = 'img-circle' width = '150' height = '150'>
                <br><br><br>

                <form class ="form-inline" method = 'POST' action = './autenticacion.php' name = 'login'>
                    <div class = 'form group'>
                        <label for="usuario">USUARIO*</label>
                        <input type="text" class = 'form-control' id = 'usuario' placeholder = 'Usuario' name = 'User'>
                    </div>
                    <br><br>
                    <div class = form-group>
                        <label for="clave">CLAVE*</label>
                        <input type="password" class = 'form-control' id = clave placeholder = 'Clave' name = 'Pass'>
                    </div>
                    <br><br>

                    <input type="hidden" name = 'envio'>
                    <p>
                        <input type="submit" id = 'enviar' class = 'btn btn-success' value = 'INICIAR SESION' name = 'btn_iniciar1'>
                    </p>
                </form>
            </center>
            </div>
        </div>

        <div class = 'col-md-4'></div>

    </div>
</div>