   <?php
    session_start();
    require 'conexion.php';
    $asuntoBD = $_POST["Asunto"];
    $descripcionBD = $_POST["Descripcion"];
    $fechaBD = $_POST["Fecha"];
    $categoriaBD = $_POST["Categoria"];
    $subcatBD = $_POST["Subcategoria"];
    $idUsuario = $_SESSION['usuario']['idUsuario'];
    $Tecnico = $_POST['Tecnico'];
    $estado= 3;

    
//--------------INSERTAR DATOS---------------------------//
    $insertar = "INSERT INTO ticket(Asunto_tick,Descripcion_tick,Fecha_tick,categoria_idCategoria,usuario_idUsuario,tecnico_idTecnico,SubCategoria_idSubCategoria,Estado_idEstado) VALUES ('$asuntoBD','$descripcionBD','$fechaBD',$categoriaBD,$idUsuario,$Tecnico,$subcatBD,$estado)";
//--------------EJECUTAR PROCESO-------------------------//
    $resultado = mysqli_query($conexion,$insertar);
    if(!$resultado) {
        echo '<script>
        alert ("Envio Fallido");
        window.location = "Ticket.php";
        </script>';
    }else{
        echo '<script>
        alert ("Envio Exitoso");
        window.location = "PagInicio.php";
        </script>';
    }
//--------------CERRAR CONEXION---------------------------//
    mysqli_close($conexion);