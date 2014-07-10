<?php

?>

<!DOCTYPE HTML>
<html>
    <head>
    	<link href="estilo.css" rel="stylesheet" type="text/css" />
    	<meta http-equiv="content-type" content="text/html" />
    	<title>Coordinador de Área</title>
        <h1>Bienvenido Coordinador de Área: <?php echo $_COOKIE['user'] ?> </h1>
    </head>

    <body>
    
    
        <p><input type="button" value="Mis datos" onclick="location.href='mis_datos.php'" /></a></p>
        
        <p><input type="button" value="Noticias" onclick="location.href='noticias.php'" /></a></p>
        
        <p><input type="button" value="Postulantes" onclick="location.href='postulantes.php'" /></a></p>
        
        <p><input type="button" value="Colaboradores Seleccionados" onclick="location.href='colaborador_seleccionado.php'" /></a></p>
        
        <p><input type="button" value="Cerrar Sesion" onclick="location.href='login.php'" /></a></p>
    
    </body>
</html>