<?php

    include 'conexion.php';
    
    
    $num_id = $_GET["id"];
        
        
        $sentencia="SELECT ticket.idTicket, ticket.Asunto_tick, ticket.Fecha_tick, usuario.Nombre, categoria.idCategoria, categoria.Descripcion_cate, subcategoria.Descripcion_Sub, subcategoria.idSubCategoria, tecnico.NombreTec, tecnico.idTecnico, estado.tip_estado, estado.idEstado FROM ticket 
        INNER JOIN usuario ON ticket.usuario_idUsuario = usuario.idUsuario
        INNER JOIN categoria ON ticket.categoria_idCategoria = categoria.idCategoria
        INNER JOIN subcategoria ON ticket.SubCategoria_idSubCategoria = subcategoria.idSubCategoria
        INNER JOIN tecnico ON ticket.tecnico_idTecnico = tecnico.idTecnico
        INNER JOIN estado on ticket.Estado_idEstado = estado.idEstado
        WHERE idTicket='".$num_id."' ";
        $resultado= $conexion->query($sentencia);

?>


<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <title>Editar Ticket</title>
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
                        <li class="menu__item"><a class="menu__link select" href="">Editar Ticket</a></li>
                        <li class="menu__item"><a class="menu__link " href="TicketAdmin.php">Volver</a></li>
                    </ul>
                </nav>
            </div>
        </header>
        
        <form action="EditTicket2.php" method="post">
        <h1>Modificar Ticket</h1>
        <?php
            while($lista= $resultado->fetch_array(MYSQLI_BOTH))
            {
                echo'<input type="hidden"  name="oldID" value="'.$lista['idTicket'].'"><br>';
                echo'<label>Fecha: </label>';
                echo'<label class="fecha">'.$lista['Fecha_tick'].' </label>';
                echo'<label>Nombre usuario: </label>';
                echo'<label class="fecha">'.$lista['Nombre'].' </label>';
                echo'<label>Categoria: </label>';
                echo'<select name="newCate">
                        <option value="'.$lista['idCategoria'].'">'.$lista['Descripcion_cate'].'</option>
                        <option value="1">Software</option>
                        <option value="2">Hardware</option>
                     </select>';
                echo'<label>Subcategoria: </label>';
                echo'<select name="newSub">
                        <option value="'.$lista['idSubCategoria'].'">'.$lista['Descripcion_Sub'].'</option>
                        <option value="1">Impresora</option>
                        <option value="2">Computador</option>
                        <option value="3">Grabadora</option>
                        <option value="4">Televisor</option>
                        <option value="5">Camara</option>
                     </select>';
                echo'<label>Tecnico: </label>';
                echo'<select name="newTec">
                        <option value="'.$lista['idTecnico'].'">'.$lista['NombreTec'].'</option>
                        <option value="1">Alberto Villalva</option>
                        <option value="2">Kevin Rodriguez</option>
                        <option value="3">Erick Sanchez</option>
                        <option value="4">David Arias</option>
                     </select>';
                echo'<label>Estado: </label>';
                echo'<select name="newEst">
                        <option value="'.$lista['idEstado'].'">'.$lista['tip_estado'].'</option>
                        <option value="1">Resuelto</option>
                        <option value="2">En proceso</option>
                        <option value="3">En espera</option>
                        <option value="4">Cancelado</option>
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