<?php

if($_POST)
{
    require_once("class/class.php");
    $coordinador=new Miembro();
    $a=$coordinador->insertar_coordinador($_POST);
}
else{
?>

<!DOCTYPE HTML>
<html>
    <head>
        <link href="estilo.css" rel="stylesheet" type="text/css" />
    	<meta http-equiv="content-type" content="text/html" />
    	<title>Agregar Coordinador</title>
    </head>

    <body>
    
        <h2>Formulario:</h2>
        
        <form action="agregar_coordinador.php" name="datos_coordinador" method="POST">
        
        <p>
        <td>Nombre</td>
        <input maxlength="20" type="text" name="nombre" value=""/>
        </p>
        
        <p>
        <td>Rol USM</td>
        <input maxlength="20" type="text" name="rol" value="" /> 
        </p>
        
        <p>
        <td>Rut</td>
        <input maxlength="20" type="text" name="rut" value=""/>
        </p>
        
        <p>
        <td>Area</td>
        <input maxlength="20" type="text" name="area" value=""/>
        </p>
        
        <p>
        <td>Telefono</td>
        <input maxlength="10" type="text" name="telefono" value=""/>
        </p>
        
        <p>
        <td>Talla Polera</td>
        <input maxlength="10" type="text" name="talla" value=""/>
        </p>
        
        <p>
        <td>Carrera</td>
        <input maxlength="20" type="text" name="carrera" value=""/></label>
        </p>
        
        <p>
        <td>Correo</td>
        <input maxlength="20" type="text" name="correo" value=""/>
        </p>
        
        <p>
        <td>Contraseña</td>
        <input maxlength="20" type="password" name="contrasena" value=""/>
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