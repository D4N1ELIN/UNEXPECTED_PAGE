<?php
    
    include 'conexion.php';
    $nombre = $_POST["NomNew"];
    $apellido = $_POST["ApeNew"];
    $documento = $_POST["DocNew"];
    $telefono = $_POST["TelNew"];
    $direccion = $_POST["DirNew"];
    $sede = $_POST["SedNew"];
    $genero = $_POST["GenNew"];
    $mail = $_POST["MailNew"];
    $contrasena = $_POST["PasNew"];
    $tipo = $_POST["TipNew"];

    $insertar="INSERT INTO usuario (Documento,Nombre,Apellidos,Correo,Contrasena,Direccion,Telefono,genero_idGenero,tipousuario_idTipoUsuario,sede_idSede) VALUES ('$documento','$nombre','$apellido','$mail','$contrasena','$direccion','$telefono','$genero','$tipo','$sede') ";

    $resultado=mysqli_query($conexion,$insertar);

    if(!$resultado) {
        echo '<script>
        alert ("No se pudo Crear");
        window.location = "crearUsu.php";
        </script>';
    }else{
        echo '<script>
        alert ("Creado Exitosamente");
        window.location = "UsuariosAdmin.php";
        </script>';
    }

    mysqli_close($conexion);