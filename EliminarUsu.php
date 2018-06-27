<?php

    include 'conexion.php';
    
    
    $num_id = $_GET["id"];
        
        
        $sentencia="SELECT usuario.idUsuario, usuario.Documento, usuario.Nombre, usuario.Apellidos, usuario.Correo, usuario.Contrasena, usuario.Direccion, usuario.Telefono, sede.Nombre_sede ,genero.Descripcion_gen,usuario.estado 
        FROM usuario 
        INNER JOIN sede ON usuario.sede_idSede = sede.idSede 
        INNER JOIN genero ON usuario.genero_idGenero = genero.idGenero
        WHERE idUsuario='".$num_id."' ";
        $resultado= $conexion->query($sentencia);

?>
<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <title>Estado Usuario</title>
           <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
        <link rel="stylesheet" href="css/styles.css">
        <link rel="stylesheet" href="css/superslides.css">
        <link rel="stylesheet" href="css/cambiarUsu.css">
    </head>
    <body>
      
      <header class="header">
            <div class="contenedor">
                <h1 class="logo">Centro Electronico de Idiomas</h1>
                <span class="icon-menu" id="btn-menu"></span>
                <nav class="nav" id="nav">
                    <ul class="menu">
                        <li class="menu__item"><a class="menu__link select" href="">Eliminar</a></li>
                        <li class="menu__item"><a class="menu__link " href="UsuariosAdmin.php">Volver</a></li>
                    </ul>
                </nav>
            </div>
        </header>
        
        <form action="deleteUserAdmin.php" method="post">
            <h2>Estado Usuario</h2>
            
            <?php
            while($lista= $resultado->fetch_array(MYSQLI_BOTH))
            {
                echo'<input type="hidden"  name="oldID" value="'.$lista['idUsuario'].'"><br>';
               echo'<label>ID: </label>';
                echo'<label>'.$lista['idUsuario'].' </label><br>';
                echo'<label>Documento: </label>';
                echo'<label>'.$lista['Documento'].' </label><br>';
                echo'<label>Nombre: </label>';
                echo'<label>'.$lista['Nombre'].' </label><br>';
                echo'<label>Apellido: </label>';
                echo'<label>'.$lista['Apellidos'].' </label><br>';
                echo'<label>Correo: </label>';
                echo'<label>'.$lista['Correo'].' </label><br>';
                echo'<label>Clave: </label>';
                echo'<label>'.$lista['Contrasena'].' </label><br>';
                echo'<label>Direccion: </label>';
                echo'<label>'.$lista['Direccion'].' </label><br>';
                echo'<label>Telefono: </label>';
                echo'<label>'.$lista['Telefono'].' </label><br>';
                echo'<label>Sede: </label>';
                echo'<label>'.$lista['Nombre_sede'].' </label><br>';
                echo'<label>Genero: </label>';
                echo'<label>'.$lista['Descripcion_gen'].' </label><br>';
                echo'<label>Estado: </label>';
                echo'<label>'.$lista['estado'].' </label><br>';
                echo'<input type="hidden"  name="est" value="'.$lista['estado'].'"><br>';

                
                
            }
        ?>
           
            
            <input type="submit" value="Cambiar estado" class="boton">
        </form>
        

        <footer class="footer">
             <div class="social">
                 <a class="icon-facebook"></a>
                 <a class="icon-twitter"></a>
             </div>
             <p class="copy">&copy; CEI 2018 - Todos los derechos reservados</p>
         </footer>
        
        <script src="javaScript/jquery.js"></script>
        <script src="javaScript/jquery.superslides.js"></script>
        <script src="javaScript/menuIndex.js"></script>
    </body>
</html>