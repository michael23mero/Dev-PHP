<head><title>SMT- Modulo Empleados</title></head>

<!--Bootstrap-->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">

<!--USO AJAX-->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/d3js/6.5.0/d3.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>

<link rel="stylesheet" href="../css/search.css">
        

<?php
    include '../template/cabeceraAdministracion.php';
    include '../Modelo/EmpleadoCRUD.php';
    $empleado = new EmpleadoCRUD();
?>

<!--LISTAR PRODUCTO-->
<div class= "container">
    <div class="row">
        <div class="col-md-12">
            <br>
            <h2 class="text-center">LISTADO DE EMPLEADOS</h2><hr>
                <div class="derecha">
                    <input type="search" class="form-control" id="liveSearch" placeholder="Busqueda de Empleado"><br>
                    <!--input type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalClienteCreate" value="INSERTAR"-->
                    <button class="btn btn-primary" data-toggle="modal" data-target="#modalEmpleadoCreate">INSERTAR</button>
                </div>
            <div class="card-body">
                <?php
                    $listarEmpleado = $empleado->readEmpleado();
                ?>
                <table class="table table-sprited">

                    <tbody id="output"></tbody>

                    <thead>
                        <tr class="table-primary">
                            <th scope="col">ID_EMPLEADO</th>
                            <th scope="col">NOM_EMPLEADO</th>
                            <th scope="col">APE_EMPLEADO</th>
                            <th scope="col">DIR_EMPLEADO</th>
                            <th scope="col">TEL_EMPLEADO</th>
                            <th scope="col" class=text-center>ACCIONES</th>
                        </tr>
                    </thead>

                    <?php
                        if($listarEmpleado){
                            foreach($listarEmpleado as $fila){
                    ?>  
                    <tbody>
                        <tr>
                            <td><?php echo $fila['ID_EMPLEADO']?></td>
                            <td><?php echo $fila['NOM_EMPLEADO']?></td>
                            <td><?php echo $fila['APE_EMPLEADO']?></td>
                            <td><?php echo $fila['DIR_EMPLEADO']?></td>
                            <td><?php echo $fila['TEL_EMPLEADO']?></td>
                                                
                            <td class=text-center>
                                <button type="button" class="btn btn-success editProducto"></i>EDITAR</button>
                                <button type="button" class="btn btn-danger deleteProducto"></i>ELIMINAR</button>
                                <button type="button" class="btn btn-primary nuevoPerfil"><i class="fas fa-plus"></i>PERFIL</button>
                            </td>
                        </tr>
                    </tbody>
                    <?php
                        }
                    }
                    else{
                        echo "<tr><td>Sin resgitro de empleados</td></tr>";
                    }
                ?>
                </table>
            </div>
        </div>
    </div>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>