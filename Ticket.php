<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <title>Ticket</title>
           <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
        <link rel="stylesheet" href="css/styles.css">
        <link rel="stylesheet" href="css/superslides.css">
        <link rel="stylesheet" href="css/estilosTicket.css">
        <link rel="stylesheet" href="../Proyecto/imagenes/FondoInicio2.jpg">
    </head>
    <body>
      <header class="header">
            <div class="contenedor">
                <h1 class="logo">Centro Electronico de Idiomas</h1>
                <span class="icon-menu" id="btn-menu"></span>
                <nav class="nav" id="nav">
                    <ul class="menu">
                        <li class="menu__item"><a class="menu__link " href="PagInicio.php">Inicio</a></li>
                        <li class="menu__item"><a class="menu__link select" href="">Ticket</a></li>
                        <li class="menu__item"><a class="menu__link " href="Historial.php">Historial</a></li>
                        <li class="menu__item"><a class="menu__link " href="index.php">Salir</a></li>
                    </ul>
                </nav>
            </div>
        </header>
       
          
           
    <form action="TicketBD.php" method="post">
          <h2>Envia tu Ticket</h2>
           <div class="contenedor-inputs">
                <input type="text" class="input-100 input_asunto" name="Asunto" placeholder="Asunto-Titulo (max15 Carácteres)">
                 <label class="input-100">Indica la fecha de la incidencia</label>
                 <input type="date" name="Fecha" class="input-100  t_date" required>
                 <label class="input-50 bordes">Selecciona una Categoria</label>
                 <label class="input-50 bordes">Selecciona una SubCategoria</label>
                 <select name="Categoria" class="input-50 margenGenero">
                     <option value="1">Hardware</option>
                     <option value="2">Software</option>
                 </select>
                 <select name="Subcategoria" class="input-50 margenGenero">
                     <option value="1">Impresora</option>
                     <option value="2">Computador</option>
                     <option value="3">Grabadora</option>
                     <option value="4">Televisor</option>
                     <option value="5">Cámara</option>
                 </select>
                 <label class="input-100">Selecciona un Tecnico</label>
                 <select name="Tecnico" class="s_tecnico margenGenero">
                     <option value="1">Alberto Villalva</option>
                     <option value="2">Kevin Rodriguez</option>
                     <option value="3">Erick Sanchez</option>
                     <option value="4">David Arias</option>
                 </select>
                 <textarea name="Descripcion" cols="30" rows="3"  class="input-100" placeholder="DESCRIPCION (Max100 Carácteres)" required></textarea>
                 <input type="submit" value="ENVIAR" class="boton-enviar">
             </div>
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