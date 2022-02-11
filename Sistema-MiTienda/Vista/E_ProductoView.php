<head><title>SMT- Modulo Productos</title></head>

<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">

<!--USO AJAX-->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/d3js/6.5.0/d3.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>

<link rel="stylesheet" href="../css/search.css">

<?php
    include '../template/cabeceraAdministracion.php';
    include '../Modelo/ProductoCRUD.php';
    $producto = new ProductoCRUD();
?> 

<!-- ################################################################################################################################### -->

        <!--LISTAR PRODUCTO-->
        <div class= "container">
            <div class="row">
                <div class="col-md-12">
                    <br>
                    <h2 class="text-center">LISTADO DE PRODUCTOS</h2><hr>
                        <div class="derecha">
                            <input type="search" class="form-control" id="liveSearch" placeholder="Busqueda de Producto">
                            <!--input type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalProductoCreate" value="INSERTAR"-->
                            <button class="btn btn-primary" data-toggle="modal" data-target="#modalProductoCreate">INSERTAR</button>
                        </div>
                    <div class="card-body">
                        <?php
                            $productos = $producto->readProducto();
                        ?>
                        <table class="table table-sprited">
                            <tbody id="output"></tbody>

                            <thead>
                                <tr class="table-primary">
                                    <th scope="col">COD_PRODUCTO</th>
                                    <th scope="col">NOM_PRODUCTO</th>
                                    <th scope="col">PRECIO_PRODUCTO</th>
                                    <th scope="col">STOCK_PRODUCTO</th>
                                    <th scope="col">DESC_PRODUCTO</th>
                                    <th scope="col" class=text-center>ACCIONES</th>
                                </tr>
                            </thead>

                            <?php
                                if($productos){
                                    foreach($productos as $fila){
                            ?>  
                            <tbody>
                                <tr>
                                    <td width="5%"><?php echo $fila['COD_PRODUCTO']?></td>
                                    <td width="10%"><?php echo $fila['NOM_PRODUCTO']?></td>
                                    <td width="10%"><?php echo $fila['PRECIO_PRODUCTO']?></td>
                                    <td width="10%"><?php echo $fila['STOCK_PRODUCTO']?></td>
                                    <td width="25%"><?php echo $fila['DESC_PRODUCTO']?></td>
                                                        
                                    <td width="35%"class=text-center>
                                        <button type="button" class="btn btn-success editProducto"><i class="material-icons">&#xE254;</i>EDITAR</button>
                                        <button type="button" class="btn btn-danger deleteProducto"> <i class="material-icons">&#xE872;</i>ELIMINAR</button>
                                    </td>
                                </tr>
                            </tbody>
                            <?php
                                }
                            }
                            else{
                                echo "<tr><td>Sin resgitro de productos</td></tr>";
                            }
                        ?>
                        </table>
                    </div>
                </div>
            </div>
        </div>

<!-- ################################################################################################################################### -->

        <!-- MODAL CREAR PRODUCTO -->
        <div class="container">
            <div class="modal fade" tabindex="-1" id="modalProductoCreate" role="dialog" aria-labelledby="tituloVentana" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Ingresar Producto</h5>
                                <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">

                            <p>Ingrese sus datos para registrar producto</p>
                            <form method="POST" action="../Controlador/ProductoController.php">
                            <div class = form-group>
                                <label for="idClient">Codigo</label>
                                <input type="text" class="form-control" placeholder="Codigo" name="codProducto" required="">
                            </div>
                            <div class = 'form group'>
                                <label for="nomClient">Proveedor</label>
                                <input type="text" class = 'form-control' placeholder = 'Proveedor' name = 'idProveedor' required>
                            </div>
                            <div class = form-group>
                                <label for="apeClient">Categoria</label>
                                <input type="text" class = 'form-control' placeholder = 'Categoria' name = 'idCategoria' required>
                            </div>
                            <div class = form-group>
                                <label for="dirClient">Nombre</label>
                                <input type="text" class = 'form-control' placeholder = 'Nombre Producto' name = 'nomProducto' required>
                            </div>
                            <div class = form-group>
                                <label for="telClient">Precio</label>
                                <input type="text" class = 'form-control' placeholder = 'Precio Producto' name = 'precioProducto' required>
                            </div>
                            <div class = form-group>
                                <label for="telClient">Stock</label>
                                <input type="text" class = 'form-control' placeholder = 'Stock Producto' name = 'stockProducto' required>
                            </div>
                            <div class = form-group>
                                <label for="telClient">Descripcion</label>
                                <input type="text" class = 'form-control' placeholder = 'Agrege una descripcion' name = 'descProducto' required>
                            </div>
                            <div class = form-group>
                                <label for="telClient">Imagen</label>
                                <input type="text" class = 'form-control' placeholder = 'Agrege una Url' name = 'imgProducto' required>
                            </div><br>
                                    
                            <input type="hidden" name = 'envio'>
                            <div class="modal-footer">
                                <p>
                                    <input type="submit" id = 'enviar' class = 'btn btn-success' value = 'Guardar' name = 'createProductoController'>
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                                </p>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

<!-- ################################################################################################################################### -->

        <!-- MODAL EDITAR PRODUCTO -->
        <div class="container">
            <div class="modal fade" tabindex="-1" id="editProductoModal" role="dialog" aria-labelledby="tituloVentana" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="tituloVentana">Actualizar Registro</h5>
                                <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
                        </div>
                        
                        <form action="../Controlador/ProductoController.php" method="POST">
                            <div class="modal-body">

                            <p>Ingrese sus datos para registrar producto</p>
                            <form method="POST" action="../Controlador/ProductoController.php">
                            <input type="hidden" name="codProducto" id="update_codProducto">
                            <div class = form-group>
                                <label for="dirClient">Nombre</label>
                                <input type="text" class = 'form-control' placeholder = 'Nombre Producto' name = 'nomProducto' required id="nomProducto">
                            </div>
                            <div class = form-group>
                                <label for="telClient">Precio</label>
                                <input type="text" class = 'form-control' placeholder = 'Precio Producto' name = 'precioProducto' required id="precioProducto">
                            </div>
                            <div class = form-group>
                                <label for="telClient">Stock</label>
                                <input type="text" class = 'form-control' placeholder = 'Stock Producto' name = 'stockProducto' required id="stockProducto">
                            </div>
                            <div class = form-group>
                                <label for="telClient">Descripcion</label>
                                <input type="text" class = 'form-control' placeholder = 'Agrege una descripcion' name = 'descProducto' required id="descProducto">
                            </div>
                                    
                            <input type="hidden" name = 'envio'>
                            <div class="modal-footer">
                                <p>
                                    <input type="submit" id = 'enviar' class = 'btn btn-success' value = 'Guardar' name = 'createProductoController'>
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                                </p>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div-->

<!-- ################################################################################################################################### -->

        <!-- MODAL ELIMINAR PRODUCTO -->
        <div class="container">
            <div class="modal fade" tabindex="-1" id="deleteProductoModal" role="dialog" aria-labelledby="tituloVentana" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="tituloVentana">Eliminar Registro</h5>
                                <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
                        </div>
                        
                        <form action="../Controlador/ClienteController.php" method="POST">
                            <div class="modal-body">
                                <p>¿Estas seguro que quieres eliminar el registro?</p>
                                <input type="hidden" name="idClienteD" id="delete_idProducto">
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
            $('.editProducto').on('click', function(){

                $('#editProductoModal').modal('show');

                $tr = $(this).closest('tr');

                var dato = $tr.children("td").map(function(){
                    return $(this).text();
                }).get();

                console.log(dato);

                $('#update_codProducto').val(dato[0]);
                $('#nomProducto').val(dato[1]);
                $('#precioProducto').val(dato[2]);
                $('#stockProducto').val(dato[3]);
                $('#descProducto').val(dato[4]);
            });
        });
    </script>

<!-- ###################################################### -->
    <script>
        $(document).ready(function(){
            $('.deleteProducto').on('click', function(){

                $('#deleteProductoModal').modal('show');

                $tr = $(this).closest('tr');

                var dato = $tr.children("td").map(function(){
                    return $(this).text();
                }).get();

                console.log(dato);

                $('#delete_idProducto').val(dato[0]);
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
