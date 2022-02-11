<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">

<?php
    include '../template/cabeceraAdministracion.php';
    include '../Modelo/FacturaCRUD.php';
    $factura = new FacturaCRUD();
?>  

<link rel="stylesheet" href="../css/search.css">

<!-- ################################################################################################################################### -->

<!--LISTAR CLIENTE-->
    <div class= "container">
        <div class="row">
            <div class="col-md-12">
                <br>
                    <h2 class="text-center">LISTADO DE FACTURAS</h2><hr>
                        <div class="derecha">
                            <input type="search" class="form-control" id="liveSearch" placeholder="Busqueda de Factura"><br>
                            <!--input type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalClienteCreate" value="INSERTAR"-->
                        </div>

                <div class="card-body">
                    <?php
                        $listarFactura = $factura->readFactura();
                    ?>
                    <table class="table table-sprited">

                        <tbody id="output"></tbody>

                            <thead>
                                <tr class="table-primary">
                                    <th scope="col">NUM</th>
                                    <th scope="col">FECHA</th>
                                    <th scope="col">CLIENTE</th>
                                    <th scope="col">VENDEDOR</th>
                                    <th scope="col">SUBTOTAL</th>
                                    <th scope="col">TOTAL</th>
                                    <th scope="col" class=text-center>ACCIONES</th>
                                </tr>
                            </thead>

                            <?php
                                if($listarFactura){
                                    foreach($listarFactura as $fila){
                            ?>  
                                        <tbody>
                                            <tr>
                                                <td><?php echo $fila['ID_FACTPED']?></td>
                                                <td><?php echo $fila['FECHA_FACTPED']?></td>
                                                <td><?php echo $fila['ID_CLIENTE']?></td>
                                                <td><?php echo $fila['ID_EMPLEADO']?></td>
                                                <td><?php echo $fila['SUBTOT_FACTPED']?></td>
                                                <td><?php echo $fila['TOTAL_FACTPED']?></td>
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
                                    echo "<tr><td>Sin resgitro de facturas</td></tr>";
                                }
                            ?>
                        </table>
                    </div>
                </div>
            </div>
        </div> 

