<?php
    require 'conexion.php';
    $id = $_POST["oldID"];
    $newDocumento = $_POST["newDoc"];
    $newNombre = $_POST["newNom"];
    $newApellidos = $_POST["newApe"];
    $newCorreo = $_POST["newCor"];
    $newContrasena = $_POST["newCon"];
    $newTelefono = $_POST["newTel"];
    $newSede = $_POST["newSed"];


    $modificar="UPDATE usuario SET Documento='".$newDocumento."', Nombre='".$newNombre."', Apellidos='".$newApellidos."', Correo='".$newCorreo."', Contrasena='".$newContrasena."', Telefono='".$newTelefono."', sede_idSede='".$newSede."'
    WHERE idUsuario='".$id."' ";
    $resultado = mysqli_query($conexion, $modificar);

    if(!$resultado) {
        echo '<script>
        alert ("No se pudo Actualizar");
        window.location = "UsuariosAdmin.php";
        </script>';
    }else{
        echo '<script>
        alert ("Actualizado Exitosamente");
        window.location = "UsuariosAdmin.php";
        </script>';
    }
//--------------CERRAR CONEXION---------------------------//
    mysqli_close($conexion);
    
    
?>