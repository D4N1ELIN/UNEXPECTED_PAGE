<?php

    include 'conexion.php';
    
    
    $num_id = $_GET["id"];
        
        
        $sentencia="SELECT usuario.idUsuario, usuario.Documento, usuario.Nombre, usuario.Apellidos, usuario.Correo, usuario.Contrasena, usuario.Telefono, sede.Nombre_sede, sede.idSede FROM usuario 
        INNER JOIN sede ON usuario.sede_idSede = sede.idSede 
        WHERE idUsuario='".$num_id."' ";
        $resultado= $conexion->query($sentencia);

?>


<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <title>Editar Usuario</title>
           <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
        <link rel="stylesheet" href="css/styles.css">
        <link rel="stylesheet" href="css/superslides.css">
        <link rel="stylesheet" href="css/estilosEditUsuario.css">
    </head>
    <body>
      
      <header class="header">
            <div class="contenedor">
                <h1 class="logo">Centro Electronico de Idiomas</h1>
                <span class="icon-menu" id="btn-menu"></span>
                <nav class="nav" id="nav">
                    <ul class="menu">
                        <li class="menu__item"><a class="menu__link select" href="">Editar usuario</a></li>
                        <li class="menu__item"><a class="menu__link " href="UsuariosAdmin.php">Volver</a></li>
                    </ul>
                </nav>
            </div>
        </header>
        
        <form action="EditUsuario2.php" method="post">
        <h1>Modificar Usuario</h1>
        <?php
            while($lista= $resultado->fetch_array(MYSQLI_BOTH))
            {
                echo'<input type="hidden"  name="oldID" value="'.$lista['idUsuario'].'"><br>';
                echo'<label>Documento: </label>';
                echo'<input type="text" name="newDoc" value="'.$lista['Documento'].'"><br>';
                echo'<label>Nombre: </label>';
                echo'<input type="text" name="newNom" value="'.$lista['Nombre'].'"><br>';
                echo'<label>Apellidos: </label>';
                echo'<input type="text" name="newApe" value="'.$lista['Apellidos'].'"><br>';
                echo'<label>Correo: </label>';
                echo'<input type="text" name="newCor" value="'.$lista['Correo'].'"><br>';
                echo'<label>Contraseña: </label>';
                echo'<input type="text" name="newCon" value="'.$lista['Contrasena'].'"><br>';
                echo'<label>Telefono: </label>';
                echo'<input type="text" name="newTel" value="'.$lista['Telefono'].'"><br>';
                echo'<label>Sede: </label>';
                echo' <select name="newSed">
                        <option value="'.$lista['idSede'].'">'.$lista['Nombre_sede'].'</option>
                        <option value="1">Belmira</option>
                        <option value="2">Suba</option>
                        <option value="3">Chapinero</option>
                        <option value="4">Restrepo</option>
                        <option value="5">Normandia</option>
                        <option value="6">Plaza de las Americas</option>
                        <option value="7">Chía</option>
                     </select>';
                
            }
        ?>
        <button type="submit">Guardar</button>
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