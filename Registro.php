<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <title>Registro</title>
           <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
            <link rel="stylesheet" href="css/estilosRegistro.css">
        <link rel="stylesheet" href="css/styles.css">
        <script src="javaScript/validar.js"></script>
    </head>
    <body>
      
        <header class="header">
            <div class="contenedor">
                <h1 class="logo">Centro Electronico de Idiomas</h1>
                <span class="icon-menu" id="btn-menu"></span>
                <nav class="nav" id="nav">
                    <ul class="menu">
                        <li class="menu__item"><a class="menu__link" href="index.php">Inicio</a></li>
                        <li class="menu__item"><a class="menu__link" href="LogIn.php">LogIn</a></li>
                        <li class="menu__item"><a class="menu__link select" href="">Registro</a></li>
                    </ul>
                </nav>
            </div>
        </header>
        
        
        
         <h1>Registro</h1>
         <form action="RegistroBD.php" method="post" class="formulario-registro" onsubmit="return validar();">
             <h2 class="titulo-formulario">CREA TU CUENTA</h2>
             <div class="contenedor-inputs">
                 <input type="text" id="Nombre" name="Nombre" placeholder="NOMBRE" class="input-50" required>
                 <input type="text" id="Apellido" name="Apellido" placeholder="APELLIDO" class="input-50" required>
                 <input type="text" id="Documento" name="Documento" placeholder="DOCUMENTO" class="input-50" required>
                 <select name="Genero" id="Genero" class="input-50 margenGenero">
                     <option value="1">Masculino</option>
                     <option value="2">Femenino</option>
                     <option value="3">Indefinido</option>
                 </select>
                 <input type="text" id="Direccion" name="Direccion" placeholder="DIRECCIÓN" class="input-100" required>
                 <input type="email" id="Correo" name="Correo" placeholder="CORREO" class="input-100" required>
                 <input type="text" id="Telefono" name="Telefono" placeholder="TELÉFONO" class="input-50" required>
                 <input type="password" id="Contraseña" name="Contrasena" placeholder="CONTRASEÑA" class="input-50" required>
                 <select name="Sede" id="Sede" class="input-100">
                     <option value="1">Belmira</option>
                     <option value="2">Suba</option>
                     <option value="3">Chapinero</option>
                     <option value="4">Restrepo</option>
                     <option value="5">Normandia</option>
                     <option value="6">Plaza de las Americas</option>
                     <option value="7">Chía</option>
                 </select>
                 <input type="submit" value="REGISTRAR" class="boton-enviar">
                 <p class="link-login">¿Ya Tienes una Cuenta?<a href="LogIn.php">Ingresa Aqui</a></p>
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