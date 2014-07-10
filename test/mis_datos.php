<?php
require_once("class/class.php"); 
$datos=new Miembro();

$a=$datos->get_datos($_COOKIE["rol"]);

?>

<!DOCTYPE HTML>
<html>
    <head>
        <link href="estilo.css" rel="stylesheet" type="text/css" />
    	<meta http-equiv="content-type" content="text/html" />
    	<title>Mis datos</title>
    </head>

    <body>
    <table border="1" cellspacing="0" cellpadding="2" bordercolor="666633">
        <tr>     
        <td>ROL</td><td>RUT</td><td>NOMBRE</td><td>CARRERA</td><td>CORREO</td><td>TELEFONO</td><td>CONTRASENA</td> 
        <td>TALLA POLERA</td>
        
        </tr>
        
        <tr>
            <td><?php echo $a[0]['rol'] ?></td> 
            <td><?php echo $a[0]['rut'] ?></td> 
            <td><?php echo $a[0]['nombre'] ?></td> 
            <td><?php echo $a[0]['carrera'] ?></td> 
            <td><?php echo $a[0]['correo'] ?></td> 
            <td><?php echo $a[0]['telefono'] ?></td> 
            <td><?php echo $a[0]['contrasena'] ?></td> 
            <td><?php echo $a[0]['talla_polera'] ?></td> 

        </tr>
        

    </table>    
    </body>
</html>