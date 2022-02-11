<!--Titulo Pag-->  <head><title>SMT - Login</title></head>
<!--Archivos PHP--><?php include '../template/cabecera.php';?>
<!--Estilos css--> <link rel="stylesheet" href="../css/cabecera.css">
                   <link rel="stylesheet" href="../css/LoginStyle.css">  

<!--Font Awesome-->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css">

  <h4>
    <p class = 'bg-warning text-center'>
      <b>
        <?php
          session_start();
          ob_start();

          if(isset($_SESSION['sesion_exito'])){
            if($_SESSION['sesion_exito'] == 2){
              echo "Los campos son OBLIGATORIOS";
            }
        ?>
      <p class = 'bg-danger text-center'>    
        <?php
          if($_SESSION['sesion_exito'] == 3){
            echo 'Datos INCORRECTOS';}
          }
          else{
            $_SESSION['sesion_exito'] = 0;
          }
        ?></b>
      </p>

      <p class = 'bg-success text-center'><b>
        <?php
          if($_SESSION['sesion_exito'] == 4){
            echo "GRACIAS POR USAR NUESTRO SERVICIO";
          }
          $_SESSION['sesion_exito'] = 0;
        ?></b>
      </p>
        </h4>

  <div class="contenedor">
    <div class="container-fluid">
      <div class="row no-gutter">
        <div class="d-none d-md-flex col-md-4 col-lg-6 bg-image"></div>
          <div class="col-md-8 col-lg-6">
            <div class="login d-flex align-items-center py-5">
              <div class="container">
                <div class="row">
                  <!--div class="col-md-9 col-lg-8 mx-auto"-->
                    <h3 class="login-heading mb-4">Bienvenidos</h3>
                    <form class ="form-inline" method = 'POST' action = '../Controlador/LoginController.php' name = 'login'>
                      <div class="entrada-Datos">
                        <i class="fas fa-user icon"></i>
                        <input type="text" name="User" id="Apellido" placeholder="Ingrese usuario">
                      </div>
                      <div class="entrada-Datos">
                        <i class="fas fa-key icon"></i>
                        <input type="password" name="Pass" id="clave" placeholder="Ingrese contraseña">
                      </div>

                      <input type="hidden" name = 'envio'-->
                        <p>
                          <input type="submit" id = 'enviar' class = 'btn btn-success' value = 'INICIAR SESION' name = 'btn_iniciar1'>
                        </p>
                      <br><h5 class="login-heading mb-4 text-center">Unete a nuestro equipo de Trabajo <a href="#">Contactanos</a></h5>
                    </form>
                      
                  <!--/div-->
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
<br>
<?php include '../template/pie.php';?>