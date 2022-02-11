<?php

    include '../Modelo/ClienteCRUD.php';
    $crud = new ClienteCURD();

    if(isset($_POST['createUsuarioController'])){
        $idC = $crud->sanitize($_POST['idCliente']);
        $nomC =$crud->sanitize($_POST['nomCliente']);
        $apeC =$crud->sanitize($_POST['apeCliente']);
        $dirC =$crud->sanitize($_POST['dirCliente']);
        $telC =$crud->sanitize($_POST['telCliente']);

        $insertado = $crud->createClientes($idC, $nomC, $apeC, $dirC, $telC);
        if($insertado){
            echo '<div class="alert alert-success">Thank You!now please login </div>';
            header('Location:../Vista/E_ClienteView.php');
        }
        else{
            header('Location:../Vista/E_ClienteView.php');
        }
    }
    
    /************************************************************************************************************************/
    /************************************************************************************************************************/

	if(isset($_POST['editClienteController'])){
		$id = $_POST['idClienteU'];
		$nombre = $_POST['nomClienteU'];
		$apellido = $_POST['apeClienteU'];
		$direccion = $_POST['dirClienteU'];
		$telefono = $_POST['telClienteU'];

		$editado = $crud->updateClientes($nombre, $apellido, $direccion, $telefono, $id);
        if($editado){
            header('Location:../Vista/E_ClienteView.php');
        }
        else{
            header('Location:../Vista/E_ClienteView.php');
        }
    }

	/************************************************************************************************************************/
	/************************************************************************************************************************/
$eliminado;
    if(isset($_POST['deleteClienteController'])){
        $idC_D = $_POST['idClienteD'];

        $eliminado = $crud->deleteClientes($idC_D);
        if($eliminado){
            /*echo "<script> alert('Registro eliminado con exito...'); </script>";*/
            header('Location:../Vista/E_ClienteView.php');
        }
        else{
            header('Location:../Vista/E_ClienteView.php');
        }
    }

    /************************************************************************************************************************/
	/************************************************************************************************************************/

    /*if(isset($_POST['liveSearch'])){*/

        $idC_LS = $_POST['buscando'];
        $encontrado = $crud->liveSearchClientes($idC_LS);
        if(mysqli_num_rows($encontrado)>0){
            while($fila = mysqli_fetch_assoc($encontrado)){
                echo " <tr>
                            <td>".$fila['ID_CLIENTE']."</td>
                            <td>".$fila['NOM_CLIENTE']."</td>
                            <td>".$fila['APE_CLIENTE']."</td>
                            <td>".$fila['DIR_CLIENTE']."</td>
                            <td>".$fila['TELCLIENTE']."</td>
                            <td class='text-center'>
                           <button class='btn btn-danger'>".$eliminado."Eliminar</button>
                        </td>
                    </tr>";
            }
                            
            
        }
        else{
            echo "<tr><td><td>Registro NO Encontrado</td></td></tr>";
        }
    /*}*/

?>

<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>