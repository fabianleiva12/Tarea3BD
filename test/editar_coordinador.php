<?php

if($_POST)
{
    require_once("class/class.php");
    $coordinador=new Miembro();
    $a=$coordinador->editar_coordinador($_POST);
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
        
        <form action="editar_coordinador.php" name="editar_coordinador" method="POST">
        
        <p>
        <td>Nombre</td>
        <input maxlength="20" type="text" name="nombre" value="<?php echo $_GET["nombre"] ;?>"/>
        </p>
        
        <p>
        <td>Rol USM</td>
        <input maxlength="20" type="text" name="rol" value="<?php echo $_GET["rol"] ;?>" /> 
        </p>
        
        <p>
        <td>Rut</td>
        <input maxlength="20" type="text" name="rut" value="<?php echo $_GET["rut"] ;?>"/>
        </p>
        
        <p>
        <td>Area</td>
        <input maxlength="20" type="text" name="area" value="<?php echo $_GET["id_area"] ;?>"/>
        </p>
        
        <p>
        <td>Telefono</td>
        <input maxlength="10" type="text" name="telefono" value="<?php echo $_GET["telefono"] ;?>"/>
        </p>
        
        <p>
        <td>Talla Polera</td>
        <input maxlength="10" type="text" name="talla" value="<?php echo $_GET["talla_polera"] ;?>"/>
        </p>
        
        <p>
        <td>Carrera</td>
        <input maxlength="20" type="text" name="carrera" value="<?php echo $_GET["carrera"] ;?>"/></label>
        </p>
        
        <p>
        <td>Correo</td>
        <input maxlength="20" type="text" name="correo" value="<?php echo $_GET["correo"] ;?>"/>
        </p>
        
        <p>
        <td>Contraseña</td>
        <input maxlength="20" type="password" name="contrasena" value="<?php echo $_GET["contraseña"] ;?>"/>
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