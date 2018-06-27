<?php
error_Reporting(E_ERROR);
    require 'conexion.php';
        //variable ID//
        
        //-----VARIABLES DE CONSULTA-------//
        
        $where="";
        $filtroDoc=$_POST['FDoc'];
        $filtroNom=$_POST['FNom'];
        $filtroTel=$_POST['FTel'];
        $filtroId=$_POST['FId'];
        //-------BOTON BUSCAR----------------------------//
        if(isset($_POST['buscar']))
        {
            if(($_POST['FDoc']) )
            {
                $where=" WHERE Documento like '".$filtroDoc."%' ";
            }
            else if(($_POST['FNom']) )
                {
                    $where=" WHERE Nombre like '".$filtroNom."%' ";
                }
                else if(($_POST['FTel']) )
                    {
                        $where=" WHERE Telefono like '".$filtroTel."%' ";
                    }
                    else if(($_POST['FId']) )
                        {
                            $where=" WHERE idUsuario like '".$filtroId."%' ";
                        }
            
        }
        else
        {
            
        }
        $sql="SELECT usuario.idUsuario, usuario.Documento, usuario.Nombre, usuario.Apellidos, usuario.Correo, usuario.Contrasena, usuario.Telefono, sede.Nombre_sede, tipousuario.Descripcion_user  FROM usuario 
        INNER JOIN sede ON usuario.sede_idSede = sede.idSede
        INNER JOIN tipousuario ON usuario.tipousuario_idTipoUsuario = tipousuario.idTipoUsuario
        $where ORDER BY usuario.idUsuario ASC ";
        $ejecutar_sql= $conexion->query($sql);
        if(!$ejecutar_sql){
            echo 'error en sentencia';
        }
        //------------------------------------
?>


<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <title>Usuarios Administrador</title>
           <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
        <link rel="stylesheet" href="css/styles.css">
        <link rel="stylesheet" href="css/superslides.css">
        <link rel="stylesheet" href="css/estilosUsuAdmin.css">
    </head>
    <body>
      
      <header class="header">
            <div class="contenedor">
                <h1 class="logo">Centro Electronico de Idiomas</h1>
                <span class="icon-menu" id="btn-menu"></span>
                <nav class="nav" id="nav">
                    <ul class="menu">
                        <li class="menu__item"><a class="menu__link " href="PagInicioAdmin.php">Inicio</a></li>
                        <li class="menu__item"><a class="menu__link select" href="">Usuarios</a></li>
                        <li class="menu__item"><a class="menu__link " href="TicketAdmin.php">Tickets</a></li>
                        <li class="menu__item"><a class="menu__link " href="index.php">Salir</a></li>
                    </ul>
                </nav>
            </div>
        </header>
        
       <form method="post">
           <h3 class="titFiltros">filtrar por Documento: </h3>
           <input type="text" placeholder="DOCUMENTO" name="FDoc" >
           <h3 class="titFiltros">filtrar por Nombre: </h3>
           <input type="text" placeholder="NOMBRE" name="FNom" >
           <h3 class="titFiltros">filtrar por Telefono: </h3>
           <input type="text" placeholder="TELEFONO" name="FTel" >
           <h3 class="titFiltros Fid">filtrar por ID: </h3>
           <input type="text" placeholder="ID" name="FId" class="Fid2">

           <button class="Fid3" name="buscar" type="submit" class="boton-buscar">BUSCAR</button>
        
       </form>
          
          <a href="crearUsu.php">
            <button class="boton crear">
                CREAR USUARIO
            </button>
           </a>
          
           <table>
               <tr>
                   <th>ID</th> 
                   <th>Documento</th>
                   <th>Nombre</th>
                   <th>Apellido</th>
                   <th>Correo</th>
                   <th>Contraseña</th>
                   <th>Telefono</th>
                   <th>Sede</th>
                   <th>Rol</th>
                   <th>Editar</th>
                   <th>Exportar</th>
                   <th>Estado</th>
                </tr>
                   <?php
                   
                    while($lista_ticket= $ejecutar_sql->fetch_array(MYSQLI_BOTH))
                    {
                        echo'<tr>
                                
                                      <td>'.$lista_ticket['idUsuario'].'</td>  
                                      <td>'.$lista_ticket['Documento'].'</td>
                                      <td>'.$lista_ticket['Nombre'].'</td>
                                      <td>'.$lista_ticket['Apellidos'].'</td>
                                      <td>'.$lista_ticket['Correo'].'</td>
                                      <td>'.$lista_ticket['Contrasena'].'</td>
                                      <td>'.$lista_ticket['Telefono'].'</td>
                                      <td>'.$lista_ticket['Nombre_sede'].'</td>
                                      <td>'.$lista_ticket['Descripcion_user'].'</td>

                                      <td> <a href="EditUsuario.php?id='.$lista_ticket['idUsuario'].'"><button class="fid4" type="submit"> EDITAR</button></a> </td>
                                      <td> <a href="FormularioUsu.php?id='.$lista_ticket['idUsuario'].'"><button class="fid4" type="submit"> EXPORTAR </button></a> </td>
                                      <td> <a href="EliminarUsu.php?id='.$lista_ticket['idUsuario'].'"><button class="fid4" type="submit"> Cambiar </button></a> </td>
                                
                             </tr>';   
                        
                    }
                   ?>
                   
               
           </table>
            <a href="FormularioUsuAdmin_pdf.php"><button name="buscar" type="submit" class="export">Exportar a PDF</button></a>
           
   
       
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