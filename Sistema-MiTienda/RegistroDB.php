<html>
    <head>
        <title>database</title>

        <link rel = "icon" href = "M.ico">

        <!-- Latest compiled and minified CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">

        <!-- Optional theme -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap-theme.min.css" integrity="sha384-fLW2N01lMqjakBkx3l/M9EahuwpSfeNvV63J5ezn3uZzapT0u7EYsXMjQV+0En5r" crossorigin="anonymous">

        <!-- Latest compiled and minified JavaScript -->
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
    </head>

    <body>
        <?php 
        #region LOGIN
            session_start();
            ob_start();
    
            if(isset($_POST['btn_iniciar1']))
            {
                $_SESSION['sesion_exito'] = 0;
                $user = $_POST['User'];
                $pass = $_POST['Pass'];

                if($user == '' || $pass == '')
                {
                    $_SESSION['sesion_exito'] = 2;
                }
                else
                {
                    include('db-Conexion.php');
                    $_SESSION['sesion_exito'] = 3; //DATOS INCORRECTOS
                    $resultado = mysqli_query($conexion, "SELECT *FROM $tabla2 Where User = '$user' and Pass = '$pass'");
                    while($consulta = mysqli_fetch_array($resultado))
                    {
                        $_SESSION['sesion_exito'] = 1;
                    }
                    include('db-Desconexion.php');
                }
            }
            if($_SESSION['sesion_exito']<>1)
            {
                header('Location:Login.php');
            }
        #endregion
        ?>

        <div class = 'row'>

            <div class = 'col-md-4'></div>
            <div class = 'col-md-4'>

                <center><h1>database</h1></center>

                <form method = 'POST' action="RegistroDB.php">

                    <div class = 'form-group'>
                        <label for="ident">Identificacion:</label>
                        <input type="text" name = "ident" class = 'form-control' placeholder = 'Identificacion' id = "ident">
                    </div>

                    <div class = 'form-group'>
                        <label for="nombre">Nombre:</label>
                        <input type="text" name = 'nombre' class = 'form-control' placeholder = 'Nombre' id = "nombre">
                    </div>

                    <div class = 'form-group'>
                        <label for="direccion">DIreccion:</label>
                        <input type="text" name = "direccion" class = 'form-control' placeholder = 'Direccion' id = "direccion">
                    </div>

                    <div class = 'form-group'>
                        <label for="telefono">Telefono:</label>
                        <input type="text" name = "telefono" class = 'form-control' placeholder = 'Telefono' id = "telefono">
                    </div>

                    <center>
                        <input type="submit" value = "Insertar" class = "btn btn-success" name = 'btnInsertar'>
                        <input type="submit" value = "Eliminar" class = "btn btn-danger" name = "btnEliminar">
                        <input type="submit" value = "Listar" class = "btn bnt-dark"name="btnListar">
                        <input type="submit" value = "Modificar" class = 'btn btn-info' name = 'btnModificar'>
                        <input type="submit" value = "Consultar" class = 'btn btn-primary' name = 'btnConsultar'>
                    </center>

                </form>

                <?php 
                
                include('db-Conexion.php');

                #region INSERTAR REGISTRO
                    if(isset($_POST['btnInsertar']))
                    {
                        include("db-Conexion.php");

                        $id = $_POST['ident'];
                        $nombre = $_POST['nombre'];
                        $direccion = $_POST['direccion'];
                        $telefono = $_POST['telefono'];

                        mysqli_query($conexion, "INSERT INTO $tabla1(Identificacion, Nombre, Direccion, Telefono) values('$id', '$nombre', '$direccion', '$telefono')");
                        echo 'Registro INSERTADO con exito';
                    }
                #endregion

                #region ELIMINAR REGISTRO
                    if(isset($_POST['btnEliminar']))
                    {
                        include("db-Conexion.php");
                        $id = $_POST['ident'];
                        $existe = 0;

                        if($id == "")
                        {
                            echo "Debe ingresar dato en el campo IDENTIFICACION para eliminar registro";
                        }
                        else
                        {
                            $resultado = mysqli_query($conexion, "SELECT *FROM $tabla1 where Identificacion = '$id'");
                            while($consulta = mysqli_fetch_array($resultado))
                            {
                                $existe++;
                            }
                            if($existe == 0)
                            {
                                echo "El registro no exite";
                            }
                            else
                            {
                                $_DELETE_SQL = "DELETE FROM $tabla1 where Identificacion = '$id'";
                                mysqli_query($conexion, $_DELETE_SQL);
                                echo 'Registro ELIMINADO con exito';
                            }
                        }
                    }
                #endregion
                
                #region MODIFICAR REGISTRO
                    if(isset($_POST['btnModificar']))
                    {
                        $id = $_POST['ident'];
                        $nombre = $_POST['nombre'];
                        $direccion = $_POST['direccion'];
                        $telefono = $_POST['telefono'];

                        if($id == '' || $nombre == '' || $direccion == '')
                        {
                            echo 'Los campos son obligatorios';
                        }
                        else
                        {
                            $existe = 0;

                            $resultado = mysqli_query($conexion, "SELECT *FROM $tabla1 where Identificacion = '$id'");
                            while($consulta = mysqli_fetch_array($resultado))
                            {
                                $existe++;
                            }

                            if($existe == 0)
                            {
                                echo 'El registro no existe';
                            }
                            else
                            {
                                $UPDATE = "UPDATE $tabla1 Set

                                Identificacion = '$id',
                                Nombre = '$nombre',
                                Direccion = '$direccion',
                                Telefono = '$telefono'

                                where Identificacion = '$id'";

                                mysqli_query($conexion, $UPDATE);
                                echo 'Registro MODIFICADO con exito';
                            }
                        }
                    }
                #endregion
                
                #region CONSULTAR REGISTRO
                if(isset($_POST['btnConsultar']))
                {
                    $id = $_POST['ident'];
                    $existe = 0;

                    if($id == '')
                    {
                        echo "El campo IDENTIFICACION esta vacio para realizar CONSULTA, por favor intente nuevamente";
                    }
                    else
                    {
                        $resultado = mysqli_query($conexion, "SELECT * FROM $tabla1 WHERE Identificacion = '$id'");
                        while($consulta = mysqli_fetch_array($resultado))
                        {
                            echo $consulta['identificacion'].'<br>';
                            echo $consulta['nombre'].'<br>';
                            echo $consulta['direccion'].'<br>';
                            echo $consulta['telefono'].'<br>';
                            $existe++;
                        }
                        if($existe == 0)
                        {
                            echo 'El registro no existe';
                        }
                    }
                }
                #endregion

                #region LISTAR REGISTRO
                    if(isset($_POST['btnListar']))
                    {
                        $i = 1;

                        $resultado = mysqli_query($conexion, "SELECT *FROM $tabla1");
                        while($consulta = mysqli_fetch_array($resultado))
                        {
                            echo $i++.'. '.$consulta['identificacion'].' -- '.$consulta['nombre'].' -- '.$consulta['direccion'].' -- '.$consulta['telefono'].'</br>';
                        }
                    }
                #endregion
                
                include('db-Desconexion.php');
                /*
                Para los metodos Listar y Consultar es necesario que los campos de nuestra db
                sean iguales en nuestro program...
                */
                ?>

            </div>
        </div>
    </body>
</html>