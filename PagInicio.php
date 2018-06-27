<?php
    session_start();
    include'conexion.php';
    $nomUsuario = $_SESSION['usuario']['Nombre'];
?>
<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <title>Inicio</title>
           <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
        <link rel="stylesheet" href="css/estilosInicio.css">
        <link rel="stylesheet" href="css/styles.css">
        <link rel="stylesheet" href="css/superslides.css">
    </head>
    <body>
      
      <header class="header">
            <div class="contenedor">
                <h1 class="logo">Centro Electronico de Idiomas</h1>
                <span class="icon-menu" id="btn-menu"></span>
                <nav class="nav" id="nav">
                    <ul class="menu">
                        <li class="menu__item"><a class="menu__link select" href="">Inicio</a></li>
                        <li class="menu__item"><a class="menu__link" href="Ticket.php">Ticket</a></li>
                        <li class="menu__item"><a class="menu__link " href="Historial.php">Historial</a></li>
                        <li class="menu__item"><a class="menu__link " href="index.php">Salir</a></li>
                    </ul>
                </nav>
            </div>
        </header>
       
       <div id="slides">
           <ul class="slides-container">
               <li><img src="imagenes/FondoInicio.jpg" alt="">
                   <h1 class="titulos">BIENVENIDO</h1>
                   <h1 class="nom_usu"><?php echo $nomUsuario;?> </h1>
               </li>
               <li><img src="imagenes/FondoInicio2.jpg" alt="">
                   <h1 class="titulos">BIENVENIDO</h1>
                   <h1 class="nom_usu"><?php echo $nomUsuario;?> </h1>
               </li>
           </ul>
       </div>
       
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