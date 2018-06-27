<?php
    require 'conexion.php';
    $id = $_POST["oldID"];
    $estad = $_POST["est"];


    if ($estad=='Activo'){

$modificar="UPDATE usuario SET estado='Inactivo' WHERE idUsuario='$id'";
    $resultado = mysqli_query($conexion, $modificar);

        echo '<script>
        alert ("Estado cambiado");
        window.location = "UsuariosAdmin.php";
        </script>';
    
}
else {
    $modificar="UPDATE usuario SET `estado`='Activo' WHERE idUsuario='".$id."'";
    $resultado = mysqli_query($conexion, $modificar);
        echo '<script>
        alert ("Estado cambiado");
        window.location = "UsuariosAdmin.php";
        </script>';
    
}

//--------------CERRAR CONEXION---------------------------//
    mysqli_close($conexion);
    
    
?>