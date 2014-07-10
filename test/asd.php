<?php

if($_POST)
{
    
    require_once("class/class.php");
    print_r("CTM");

   
}
else{
?>

<!DOCTYPE HTML>
<html>
    <head>
    	<meta http-equiv="content-type" content="text/html" />
    	<title>Inicio</title>
    </head>

    <body>
    
        <h2>Formulario:</h2>
        
        <form action="asd.php" name="datos_inicio" method="POST">
        <p >
        <td>correo electronico</td>
        <input maxlength="20" type="text" name="correo" value="" /> 
        </p>
        
        <p>
        <td>Contrasena</td>
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