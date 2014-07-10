<?php
require_once("class/class.php");
if($_POST)
{
    
    $miembro=new Postulante();
    $a=$miembro->insertar($_POST);
}
else{
      

?>

<!DOCTYPE HTML>
<html>
    <head>
        <link href="estilo.css" rel="stylesheet" type="text/css" />
    	<meta http-equiv="content-type" content="text/html" />
    	<title>Postular</title>
    </head>

    <body>
    
    <h2>Formulario de Postulacion :</h2>
    
        <form action="postulacion.php" name="datos" method="POST">
            <p >
            <td>Rol</td>
            <input maxlength="20" type="text" name="rol" value="" /> 
            </p>
            
            <p>
            <td>Rut</td>
            <input maxlength="20" type="text" name="rut" value=""/>
            </p>
            
            <p>
            <td>Carrera</td>
            <input maxlength="20" type="text" name="carrera" value=""/></label>
            </p>
            
            <p>
            <td>Nombre</td>
            <input maxlength="20" type="text" name="nombre" value=""/>
            </p>
            
            <p>
            <td>Contraseña</td>
            <input maxlength="20" type="password" name="contrasena" value=""/>
            </p>
            
            <p>
            <td>Correo</td>
            <input maxlength="20" type="text" name="correo" value=""/>
            </p>
            
            <p>
            <td>Telefono</td>
            <input maxlength="10" type="text" name="telefono" value=""/>
            </p>
            
            <p>
            <td>Area 1</td>
            <?php
                $areas1=new Areas();
                $lista1=$areas1->get_nombre_areas();
                
                echo "<select name='areas1'>";
                for($i=0;$i<sizeof($lista1);$i++){
                    echo "<option value='".$lista1[$i]['nombre_area']."'>".$lista1[$i]['nombre_area']."</option>";
                }
                echo "</select>";
            ?>

            </p>
            
            <p>
            <td>Area 2</td>
            <?php

                
                echo "<select name='areas2'>";
                for($i=0;$i<sizeof($lista1);$i++){
                    echo "<option value='".$lista1[$i]['nombre_area']."'>".$lista1[$i]['nombre_area']."</option>";
                }
                echo "</select>";
            ?>
            </p>
            
            <p>
            <td>Area 3</td>
            <?php
                
                echo "<select name='areas3'>";
                for($i=0;$i<sizeof($lista1);$i++){
                    echo "<option value='".$lista1[$i]['nombre_area']."'>".$lista1[$i]['nombre_area']."</option>";
                }
                echo "</select>";
            ?>
            </p>
            
            <p>
            <textarea name="motivo" rows="10" cols="40">Motivo de postulacion</textarea>
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