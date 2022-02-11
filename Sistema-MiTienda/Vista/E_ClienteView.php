<head><title>SMT- Modulo Clientes</title></head>

<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">

<!--USO AJAX-->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/d3js/6.5.0/d3.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>

<link rel="stylesheet" href="../css/search.css">
        
<?php
    include '../template/cabeceraAdministracion.php';
    include '../Modelo/ClienteCRUD.php';
    $cliente = new ClienteCURD();
?>      

<!-- ################################################################################################################################### -->

        <!--LISTAR CLIENTE-->
        <div class= "container">
            <div class="row">
                <div class="col-md-12">
                    <br>
                        <h2 class="text-center">LISTADO DE CLIENTE</h2><hr>
                            <div class="derecha">
                                <input type="search" class="form-control" id="liveSearch" placeholder="Busqueda de Cliente"><br>
                                <!--input type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalClienteCreate" value="INSERTAR"-->
                                <button class="btn btn-primary" data-toggle="modal" data-target="#modalClienteCreate">INSERTAR</button>
                            </div>

                    <div class="card-body">
                        <?php
                            $listarClientes = $cliente->readClientes();
                        ?>
                        <table class="table table-sprited">
                            <tbody id="output"></tbody>

                            <thead>
                                <tr class="table-primary">
                                    <th scope="col">ID</th>
                                    <th scope="col">NOMBRES</th>
                                    <th scope="col">APELLIDOS</th>
                                    <th scope="col">DIRECCION</th>
                                    <th scope="col">TELEFONO</th>
                                    <th scope="col" class=text-center>ACCIONES</th>
                                </tr>
                            </thead>

                            <?php
                                if($listarClientes){
                                    foreach($listarClientes as $fila){
                            ?>  
                                        <tbody>
                                            <tr>
                                                <td><?php echo $fila['ID_CLIENTE']?></td>
                                                <td><?php echo $fila['NOM_CLIENTE']?></td>
                                                <td><?php echo $fila['APE_CLIENTE']?></td>
                                                <td><?php echo $fila['DIR_CLIENTE']?></td>
                                                <td><?php echo $fila['TELCLIENTE']?></td>
                                                <td class=text-center>
                                                    <!--button type="button" class="btn btn-success editCliente"><i class="material-icons">&#xE254;</i>EDITAR</button-->
                                                    <button type="button" class="btn btn-danger deleteCliente"> <i class="material-icons">&#xE872;</i>ELIMINAR</button>
                                                </td>
                                            </tr>
                                        </tbody>
                            <?php
                                    }
                                }
                                else{
                                    echo "<tr><td>Sin resgitro de clientes</td></tr>";
                                }
                            ?>
                        </table>
                    </div>
                </div>
            </div>
        </div> 

<!-- ################################################################################################################################### -->

        <!-- MODAL CREAR CLIENTE -->
        <div class="container">
            <div class="modal fade" tabindex="-1" id="modalClienteCreate" role="dialog" aria-labelledby="tituloVentana" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Ingresar Registro</h5>
                                <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
                            </div>
                        <div class="modal-body">

                            <p>Ingrese sus datos para su registro</p>
                                <form method="POST" action="../Controlador/ClienteController.php">
                                    <div class = form-group>
                                        <label for="idClient">Identificacion</label>
                                        <input type="text" class="form-control" placeholder="Identificacion" name="idCliente" required="">
                                    </div><br>
                                    <div class = 'form group'>
                                        <label for="nomClient">Nombres</label>
                                        <input type="text" class = 'form-control' placeholder = 'Nombres' name = 'nomCliente' required>
                                    </div><br>
                                    <div class = form-group>
                                        <label for="apeClient">Apellidos</label>
                                        <input type="text" class = 'form-control' placeholder = 'Apellidos' name = 'apeCliente' required>
                                    </div><br>
                                    <div class = form-group>
                                        <label for="dirClient">Direccion</label>
                                        <input type="text" class = 'form-control' placeholder = 'Direccion' name = 'dirCliente' required>
                                    </div><br>
                                    <div class = form-group>
                                        <label for="telClient">Telefono</label>
                                        <input type="text" class = 'form-control' placeholder = 'Telefono' name = 'telCliente' required>
                                    </div><br>
                            
                                    <input type="hidden" name = 'envio'>
                                        <div class="modal-footer">
                                            <p>
                                                <input type="submit" id = 'enviar' class = 'btn btn-success' value = 'Guardar' name = 'createUsuarioController'>
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                                            </p>
                                        </div>
                                </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

<!-- ################################################################################################################################### -->

        <!-- MODAL EDITAR CLIENTE -->
        <div class="container">
            <div class="modal fade" tabindex="-1" id="editClienteModal" role="dialog" aria-labelledby="tituloVentana" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="tituloVentana">Actualizar Registro</h5>
                                <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
                        </div>
                        
                        <form action="../Controlador/ClienteController.php" method="POST">
                            <div class="modal-body">

                                <p>Ingrese sus datos para su actualizacion</p>

                                <input type="hidden" name="idClienteU" id="update_idCliente">
                                <div class = 'form group'>
                                    <label>Nombres</label>
                                    <input type="text" class = 'form-control' id = "nomClienteU" placeholder = 'Nombres' name = 'nomClienteU'>
                                </div><br>
                                <div class = form-group>
                                    <label>Apellidos</label>
                                    <input type="text" class = 'form-control' id = "apeClienteU" placeholder = 'Apellidos' name = 'apeClienteU'>
                                </div><br>
                                <div class = form-group>
                                    <label>Direccion</label>
                                    <input type="text" class = 'form-control' id = "dirClienteU" placeholder = 'Direccion' name = 'dirClienteU'>
                                </div><br>
                                <div class = form-group>
                                    <label>Telefono</label>
                                    <input type="text" class = 'form-control' id = "telClienteU" placeholder = 'Telefono' name = 'telClienteU'>
                                </div><br>

                            </div>
                                    
                            <div class="modal-footer">
                                <input type="submit" class = 'btn btn-success' name = 'editClienteController' value="Actualizar">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

<!-- ################################################################################################################################### -->

        <!-- MODAL ELIMINAR CLIENTE -->
        <div class="container">
            <div class="modal fade" tabindex="-1" id="deleteClienteModal" role="dialog" aria-labelledby="tituloVentana" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="tituloVentana">Eliminar Registro</h5>
                                <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
                        </div>
                        
                        <form action="../Controlador/ClienteController.php" method="POST">
                            <div class="modal-body">
                                <p>¿Estas seguro que quieres eliminar el registro?</p>
                                <input type="hidden" name="idClienteD" id="delete_idCliente">
                            </div>
                                    
                            <div class="modal-footer">
                                <input type="submit" class = 'btn btn-danger' name = 'deleteClienteController' value="Eliminar">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

<!-- ################################################################################################################################### -->

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

        <!-- ###################################################### -->
        <script>
            $(document).ready(function(){
                $('.editCliente').on('click', function(){

                    $('#editClienteModal').modal('show');

                    $tr = $(this).closest('tr');

                    var dato = $tr.children("td").map(function(){
                        return $(this).text();
                    }).get();

                    console.log(dato);

                    $('#update_idCliente').val(dato[0]);
                    $('#nomClienteU').val(dato[1]);
                    $('#apeClienteU').val(dato[2]);
                    $('#dirClienteU').val(dato[3]);
                    $('#telClienteU').val(dato[4]);
                });
            });
        </script>

        <!-- ###################################################### -->
        <script>
            $(document).ready(function(){
                $('.deleteCliente').on('click', function(){

                    $('#deleteClienteModal').modal('show');

                    $tr = $(this).closest('tr');

                    var dato = $tr.children("td").map(function(){
                        return $(this).text();
                    }).get();

                    console.log(dato);

                    $('#delete_idCliente').val(dato[0]);
                });
            });
        </script>

        <!-- ###################################################### -->
        <script>
            $(document).ready(function(){
                $("#liveSearch").keypress(function(){
                    $.ajax({
                        type: 'POST',
                        url: '../Controlador/ClienteController.php',
                        data:{
                            buscando:$("#liveSearch").val(),
                        },
                        success:function(data){
                            $("#output").html(data);
                        }
                    });
                });
            });
        </script>