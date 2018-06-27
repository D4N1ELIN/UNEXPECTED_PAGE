<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <title>Login</title>
           <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
            <link rel="stylesheet" href="css/estilosLogIn.css">
        <link rel="stylesheet" href="css/styles.css">
    </head>
    <body>
      
        <header class="header">
            <div class="contenedor">
                <h1 class="logo">Centro Electronico de Idiomas</h1>
                <span class="icon-menu" id="btn-menu"></span>
                <nav class="nav" id="nav">
                    <ul class="menu">
                        <li class="menu__item"><a class="menu__link" href="index.php">Inicio</a></li>
                        <li class="menu__item"><a class="menu__link select" href="">Login</a></li>
                        <li class="menu__item"><a class="menu__link" href="Registro.php">Registro</a></li>
                    </ul>
                </nav>
            </div>
        </header>
        
        
        
         <h1>Bienvenido</h1>
         <form action="ValidarLogin.php" method="post" class="formulario-login">
             <h2 class="titulo-formulario">LogIn</h2>
             <div class="contenedor-inputs">
                 <input type="email" name="CorreoLogin" placeholder="CORREO" class="input-100" required>
                 <input type="password" name="ContrasenaLogin"  placeholder="CONTRASEÑA" class="input-100" required>
                 <input type="submit" value="ENTRAR" class="boton-enviar">
                 
             </div>
         </form>
         
         <footer class="footer">
             <div class="social">
                 <a class="icon-facebook"></a>
                 <a class="icon-twitter"></a>
             </div>
             <p class="copy">&copy; CEI 2018 - Todos los derechos reservados</p>
         </footer>
         
        <script src="javaScript/menuIndex.js"></script>
    </body>
</html>