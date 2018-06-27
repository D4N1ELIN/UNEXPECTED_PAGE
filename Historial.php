<?php
error_Reporting(E_ERROR);
    session_start();
    require 'conexion.php';
        //variable ID//
        $idUsuario = $_SESSION['usuario']['idUsuario'];
        //-----VARIABLES DE CONSULTA-------//
        
        $where="";
        $asunto=$_POST['Basunto'];
        $categoria=$_POST['Bcategoria'];
        $subcategoria=$_POST['Bsubcategoria'];
        $fecha=$_POST['Bfecha'];
        $fecha2=$_POST['Bfecha2'];
        $limitar=$_POST['Btecnico'];
        //-------BOTON BUSCAR----------------------------//
        if(isset($_POST['buscar']))
        {
            if(($_POST['Bfecha']) && ($_POST['Bfecha2']))
            {
                $where="WHERE Fecha_tick BETWEEN '$fecha' and '$fecha2' and usuario_idUsuario='$idUsuario' ";
            }
            else if(($_POST['Bsubcategoria']))
            {
                $where="WHERE Descripcion_Sub like '".$subcategoria."' and usuario_idUsuario='$idUsuario' ";
            }
            else if(empty($_POST['Bcategoria']))
            {
                $where="WHERE Asunto_tick like '".$asunto."%' and usuario_idUsuario='$idUsuario' ";
            }
            
            else if(empty($_POST['Basunto']))
            {
                $where="WHERE Descripcion_cate= '".$categoria."' and usuario_idUsuario='$idUsuario' ";
            }
            else
            {
                $where=" WHERE Asunto_tick like '".$asunto."%' and Descripcion_cate= '".$categoria."' and Descripcion_Sub = '".$subcategoria."' and usuario_idUsuario='$idUsuario' ";
            }
        }
        else
        {
            $where="WHERE usuario_idUsuario='$idUsuario' ";
        }
        //---------CONSULTA-----------------------------//
        $sql="SELECT ticket.idTicket, ticket.Asunto_tick, ticket.Fecha_tick, ticket.Descripcion_tick, categoria.Descripcion_cate, subcategoria.Descripcion_Sub, tecnico.NombreTec, estado.tip_estado FROM ticket 
        INNER JOIN categoria ON ticket.categoria_idCategoria = categoria.idCategoria
        INNER JOIN subcategoria ON ticket.SubCategoria_idSubCategoria = subcategoria.idSubCategoria
        INNER JOIN tecnico ON ticket.tecnico_idTecnico = tecnico.idTecnico
        INNER JOIN estado on ticket.Estado_idEstado = estado.idEstado
        $where $limitar ORDER BY ticket.idTicket ASC ";
        $ejecutar_sql= $conexion->query($sql);
        if(!$ejecutar_sql){
            echo 'error en sentencia';
        }
        //---------FILTRO------------------------------//
        $categoria="SELECT Descripcion_cate FROM categoria";
        $busc_cat= $conexion->query($categoria);
        //---------------subcategoria
        $subcategoria="SELECT Descripcion_Sub FROM subcategoria";
        $busc_subcat= $conexion->query($subcategoria);
        //---------------fecha y fecha 2
        $fecha="SELECT Fecha_tick FROM ticket";
        $busc_fecha= $conexion->query($fecha);

        $fecha2="SELECT Fecha_tick FROM ticket";
        $buc_fecha2= $conexion->query($fecha2);
        //------------------------------------
?>


<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <title>Historial</title>
           <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
        <link rel="stylesheet" href="css/styles.css">
        <link rel="stylesheet" href="css/superslides.css">
        <link rel="stylesheet" href="css/estilosHistorial.css">
    </head>
    <body>
      
      <header class="header">
            <div class="contenedor">
                <h1 class="logo">Centro Electronico de Idiomas</h1>
                <span class="icon-menu" id="btn-menu"></span>
                <nav class="nav" id="nav">
                    <ul class="menu">
                        <li class="menu__item"><a class="menu__link " href="PagInicio.php">Inicio</a></li>
                        <li class="menu__item"><a class="menu__link " href="Ticket.php">Ticket</a></li>
                        <li class="menu__item"><a class="menu__link select" href="">Historial</a></li>
                        <li class="menu__item"><a class="menu__link " href="index.php">Salir</a></li>
                    </ul>
                </nav>
            </div>
        </header>
        
       <form method="post">
           <h3 class="margen-25">filtrar por: </h3>
           <input type="text" placeholder="ASUNTO" name="Basunto" class="margen-25 asunto">
           <select name="Bcategoria" >
               <option value="">Categoria</option>
               <?php
                while($lista_categoria= $busc_cat->fetch_array(MYSQLI_BOTH))
                {
                    echo '<option value="'.$lista_categoria['Descripcion_cate'].'"> '.$lista_categoria['Descripcion_cate'].'  </option>';
                }
               ?>
           </select>
           
           <select name="Bsubcategoria" >
               <option value="">Subcategoria</option>
               <?php
                while($lista_subcategoria= $busc_subcat->fetch_array(MYSQLI_BOTH))
                {
                    echo '<option value="'.$lista_subcategoria['Descripcion_Sub'].'"> '.$lista_subcategoria['Descripcion_Sub'].'  </option>';
                }
               ?>
           </select>
           
           <select name="Btecnico">
               <option value="">No. de Registros</option>
               <option value="limit 1">1</option>
               <option value="limit 2">2</option>
               <option value="limit 3">3</option>
           </select>
           <h3 class="tit_fechas">Desde:</h3>
           <input type="date" name="Bfecha" class="fecha1">
           <h3 class="tit_fechas">Hasta:</h3>
           <input type="date" name="Bfecha2" class="fecha1">
           

           <button name="buscar" type="submit" class="boton-buscar">BUSCAR</button>
        
       </form>
          
           <table>
               <tr>
                   <th>ID</th> 
                   <th>Asunto</th>
                   <th>Fecha</th>
                   <th>Categoria</th>
                   <th>Subcategoria</th>
                   <th>Descripción</th>
                   <th>Tecnico</th>
                   <th>Estado</th>
                   
                   <?php
                   
                    while($lista_ticket= $ejecutar_sql->fetch_array(MYSQLI_BOTH)){
                        echo'<tr>
                             <td>'.$lista_ticket['idTicket'].'</td>   
                             <td>'.utf8_decode($lista_ticket['Asunto_tick']).'</td>
                             <td>'.$lista_ticket['Fecha_tick'].'</td>
                             <td>'.$lista_ticket['Descripcion_cate'].'</td>
                             <td>'.$lista_ticket['Descripcion_Sub'].'</td>
                             <td>'.utf8_decode($lista_ticket['Descripcion_tick']).'</td>
                             <td>'.$lista_ticket['NombreTec'].'</td>';
                        
                             if($lista_ticket['tip_estado']=="En espera")
                             {
                                echo'<td class="blue">'.$lista_ticket['tip_estado'].'</td>';
                                 
                             }else if($lista_ticket['tip_estado']=="En proceso")
                                {
                                    echo'<td class="yellow">'.$lista_ticket['tip_estado'].'</td>';
                                 
                                }else if($lista_ticket['tip_estado']=="Cancelado")
                                    {
                                        echo'<td class="red">'.$lista_ticket['tip_estado'].'</td>';
                                 
                                    }else if($lista_ticket['tip_estado']=="Resuelto")
                                        {
                                            echo'<td class="green">'.$lista_ticket['tip_estado'].'</td>';
                                        }
                             else
                              echo'<td>'.$lista_ticket['tip_estado'].'</td>
                             
                             
                        </tr>';    
                    }
                   ?>
                   
               </tr>
           </table>
           
        <form action="Formulario_pdf.php" method="post">
            <button name="buscar" type="submit" class="boton">Exportar a PDF</button>
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