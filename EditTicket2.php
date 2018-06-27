<?php
    require 'conexion.php';
    $id = $_POST["oldID"];
    $newCategoria = $_POST["newCate"];
    $newSubcategoria = $_POST["newSub"];
    $newTecnico = $_POST["newTec"];
    $newEstado = $_POST["newEst"];


    $modificar="UPDATE ticket SET categoria_idCategoria='".$newCategoria."', SubCategoria_idSubCategoria='".$newSubcategoria."', tecnico_idTecnico='".$newTecnico."', Estado_idEstado='".$newEstado."'
    WHERE idTicket='".$id."' ";
    $resultado = mysqli_query($conexion, $modificar);

    if(!$resultado) {
        echo '<script>
        alert ("No se pudo Actualizar");
        window.location = "TicketAdmin.php";
        </script>';
    }else{
        echo '<script>
        alert ("Actualizado Exitosamente");
        window.location = "TicketAdmin.php";
        </script>';
    }
//--------------CERRAR CONEXION---------------------------//
    mysqli_close($conexion);
    
    
?>