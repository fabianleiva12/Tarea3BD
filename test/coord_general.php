<?php


?>

<!DOCTYPE HTML>
<html>
    <head>
        <link href="estilo.css" rel="stylesheet" type="text/css" />
    	<meta http-equiv="content-type" content="text/html" />
    	<title>Coordinador General</title>
        <h1>Bienvenido Coordinador General: <?php echo $_COOKIE['user'] ?> </h1>
    </head>

    <body>
         <!-- Menú de navegación del sitio -->
        <div id="navegador">
        <ul>
        <?php if(($_COOKIE['user'])){
          echo  '<li><a href="ciudad.html">Salir</a>';
          echo  '<li><a href="mis_datos.php">Ver Mi Perfil</a>';
        }
        else{
         echo '<li><a href="inicio.php">Iniciar Sesión</a>';
         echo '<li><a href="meditaciones.html">Registrarse</a>';
        }
        ?>
        </ul>
        </div>
    
    
        <p><input type="button" value="Mis datos" onclick="location.href='mis_datos.php'" /></a></p>
        
        <p><input type="button" value="Areas" onclick="location.href='areas.php'" /></a></p>
        
        <p><input type="button" value="Coordinadores de Area" onclick="location.href='coordinadores.php'" /></a></p>
        
        <p><input type="button" value="Noticias" onclick="location.href='noticias.php'" /></a></p>
        
        <p><input type="button" value="Postulantes" onclick="location.href='postulantes.php'" /></a></p>
        
        <p><input type="button" value="Colaboradores Seleccionados" onclick="location.href='test.php'" /></a></p>
        
        <p><input type="button" value="Cerrar Sesion" onclick="location.href='login.php'" /></a></p>
    
    </body>
</html>