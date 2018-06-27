 <?php
    session_start();
    $correo=$_POST['CorreoLogin'];
    $clave=$_POST['ContrasenaLogin'];

    //-----------CONEXION---------------
    require 'conexion.php';
    $consulta="SELECT * FROM usuario WHERE Correo='$correo' and Contrasena='$clave' and estado ='Activo' ";
    $resultado=mysqli_query($conexion, $consulta);
    $datosUsuario = mysqli_fetch_assoc($resultado);

    $_SESSION['usuario'] =  $datosUsuario;

    $filas=mysqli_num_rows($resultado);
if(isset($_SESSION['usuario']))
{
    if($_SESSION['usuario']['tipousuario_idTipoUsuario'] == 3)
    {
        echo '<script>
        alert ("Bienvenido Estudiante");
        window.location = "PagInicio.php";
        </script>';
    }
    else if($_SESSION['usuario']['tipousuario_idTipoUsuario'] == 2)
    {
        echo '<script>
        alert ("Bienvenido Tecnico");
        window.location = "PagInicioTecnico.php";
        </script>';
        
    }
    else if($_SESSION['usuario']['tipousuario_idTipoUsuario'] == 1)
    {
        echo '<script>
        alert ("Bienvenido Administrador");
        window.location = "PagInicioAdmin.php";
        </script>';
    }
    
}else{
         echo '<script>
        alert ("Usuario o Contraseña invalido");
        window.location = "LogIn.php";
        </script>';
      }
mysqli_free_result($resultado);
mysqli_close($conexion);