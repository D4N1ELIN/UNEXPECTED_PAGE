<?php
    require 'conexion.php';
    $id = $_POST["oldID"];
    $newEstado = $_POST["newEst"];


    $modificar="UPDATE ticket SET Estado_idEstado='".$newEstado."'
    WHERE idTicket='".$id."' ";
    $resultado = mysqli_query($conexion, $modificar);

    if(!$resultado) {
        echo '<script>
        alert ("No se pudo Actualizar");
        window.location = "TicketTecnico.php";
        </script>';
    }else{
        echo '<script>
        alert ("Actualizado Exitosamente");
        window.location = "TicketTecnico.php";
        </script>';
    }
//--------------CERRAR CONEXION---------------------------//
    mysqli_close($conexion);
    
    
?>