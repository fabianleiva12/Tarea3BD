<?php

if($_POST)
{
    require_once("class/class.php");
    $area=new Areas();
    $a=$area->insertar_area($_POST);
}
else{
?>

<!DOCTYPE HTML>
<html>
    <head>
        <link href="estilo.css" rel="stylesheet" type="text/css" />
    	<meta http-equiv="content-type" content="text/html" />
    	<title>Areas</title>
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
    
        <h2>Formulario:</h2>
        
        <form action="agregar_area.php" name="datos_areas" method="POST">
        <p >
        <td>id area</td>
        <input maxlength="20" type="text" name="id_area" value="" /> 
        </p>
        
        <p>
        <td>id campus</td>
        <input maxlength="20" type="text" name="id_campus" value=""/>
        </p>
        
        <p>
        <td>nombre area</td>
        <input maxlength="20" type="text" name="nombre_area" value=""/></label>
        </p>
        
        <p>
        <td>Numero colaboradores</td>
        <input maxlength="20" type="text" name="numero_colaboradores" value=""/>
        </p>
        
        <p>
        <input type="submit" value="Terminar"/>
        </p>
        </form>
    
    
    </body>
</html>
<?php
}
?>