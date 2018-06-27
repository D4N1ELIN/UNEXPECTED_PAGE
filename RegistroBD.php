   <?php
    require 'conexion.php';
    $documentoBD = $_POST["Documento"];
    $nombreBD = $_POST["Nombre"];
    $apellidoBD = $_POST["Apellido"];
    $correoBD = $_POST["Correo"];
    $contrasenaBD = $_POST["Contrasena"];
    $direccionBD = $_POST["Direccion"];
    $telefonoBD = $_POST["Telefono"];
    $generoBD = $_POST["Genero"];
    $sedeBD = $_POST["Sede"];
    $tipoUsu = 3;
//--------------INSERTAR DATOS---------------------------//
    $insertar = "INSERT INTO usuario(Documento,Nombre,Apellidos,Correo,Contrasena,Direccion,Telefono,genero_idGenero,tipousuario_idTipoUsuario,sede_idSede,estado) VALUES ('$documentoBD','$nombreBD','$apellidoBD','$correoBD','$contrasenaBD','$direccionBD','$telefonoBD','$generoBD',$tipoUsu,'$sedeBD','Activo')";
//--------------EJECUTAR PROCESO-------------------------//
    $resultado = mysqli_query($conexion, $insertar);
    if(!$resultado) {
        echo '<script>
        alert ("No se pudo Registrar");
        window.location = "Registro.php";
        </script>';
    }else{
        echo '<script>
        alert ("Registrado Exitosamente");
        window.location = "LogIn.php";
        </script>';
    }
//--------------CERRAR CONEXION---------------------------//
    mysqli_close($conexion);