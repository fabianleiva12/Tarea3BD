<?php
require_once("class/class.php");
$postulantes1=new Miembro();
$idcarrera=new Carreras();
$id2=$idcarrera->get_id_campus_carrera($_COOKIE["carrera"]);
$b=$postulantes1->miembros_seleccionados($_COOKIE['nombre_area'],$id2);

?>
<!DOCTYPE HTML>
<html>
    <head>
        <meta http-equiv="content-type" content="text/html" />
        <title>Colaboradores</title>
    </head>
    <body>
    
        <table border="1" cellspacing="0" cellpadding="2" bordercolor="666633">
            <tr>     
            <td>ROL</td><td>RUT</td><td>NOMBRE</td><td>CORREO</td><td>TELEFONO</td><td>CONTRASENA</td> 
            <td>TALLA POLERA</td><td>CARRERA</td><td>SELECCIONADO</td> 
    
            </tr>
        <?php
        for($i=0;$i<sizeof($b);$i++)
        {?>
        

        
            <tr>
                <td><?php echo $b[$i]["rol"] ;?></td> 
                <td><?php echo $b[$i]["rut"] ;?></td> 
                <td><?php echo $b[$i]["nombre"] ;?></td> 
                <td><?php echo $b[$i]["correo"] ;?></td> 
                <td><?php echo $b[$i]["telefono"] ;?></td> 
                <td><?php echo $b[$i]["contrasena"] ;?></td> 
                <td><?php echo $b[$i]["talla_polera"] ;?></td> 
                <td><?php echo $b[$i]["carrera"] ;?></td> 
                <td><?php echo $b[$i]["seleccionado"] ;?></td> 
            </tr>
        
        <?php
        }
        ?>
        </table>

    </body>
</html>
