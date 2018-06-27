<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <title>Registro</title>
           <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
        <link rel="stylesheet" href="css/styles.css">
        <link rel="stylesheet" href="css/superslides.css">
        <link rel="stylesheet" href="css/estilosNewUsu.css">
    </head>
    <body>
      
      <header class="header">
            <div class="contenedor">
                <h1 class="logo">Centro Electronico de Idiomas</h1>
                <span class="icon-menu" id="btn-menu"></span>
                <nav class="nav" id="nav">
                    <ul class="menu">
                        <li class="menu__item"><a class="menu__link select" href="">Crear</a></li>
                        <li class="menu__item"><a class="menu__link " href="UsuariosAdmin.php">Volver</a></li>
                    </ul>
                </nav>
            </div>
        </header>
        
        <form action="newUserAdmin.php" method="post">
            <h2>Registrar Usuario</h2>
            <h3>datos basicos</h3>
            <input type="text" name="NomNew" placeholder="Nombre">
            <input type="text" name="ApeNew" placeholder="Apellido">
            <input type="text" name="DocNew" placeholder="Documento">
            <input type="text" name="TelNew" placeholder="Telefono">
            <input type="text" name="DirNew" class="in100" placeholder="Direccion">
            <h3 class="w50">sede</h3>
            <h3 class="w50">genero</h3>
            <select name="SedNew" class="selectP">
                     <option value="1">Belmira</option>
                     <option value="2">Suba</option>
                     <option value="3">Chapinero</option>
                     <option value="4">Restrepo</option>
                     <option value="5">Normandia</option>
                     <option value="6">Plaza de las Americas</option>
                     <option value="7">Chía</option>
            </select>
            
            <select name="GenNew" class="selectP">
                <option value="1">Masculino</option>
                <option value="2">Femenino</option>
                <option value="3">Indefinido</option>
            </select>
            <h3>datos de usuario</h3>
            <input type="email" name="MailNew" class="in100" placeholder="Correo">
            <input type="text" name="PasNew" class="in100" placeholder="Contraseña">
            
            <select name="TipNew" class="selectP">
                <option value="1">Administrador</option>
                <option value="2">Tecnico</option>
                <option value="3">Estudiante</option>
            </select>
            
            <input type="submit" value="CREAR" class="boton">
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