<?php
require_once("class/class.php"); 
$lista=new Miembro();
$idcarrera=new Carreras();
$id2=$idcarrera->get_id_campus_carrera($_COOKIE["carrera"]);
$a=$lista->get_coordinadores($id2);
?>

<!DOCTYPE HTML>
<html>
    <head>
        <link href="estilo.css" rel="stylesheet" type="text/css" />
    	<meta http-equiv="content-type" content="text/html" />
    	<title>Coordinadores</title>
        <h1>Coordinadores</h1>
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
        <ul>
        <?php
        for($i=0;$i<sizeof($a);$i++)
        {?>
            
            <li>ROL : <?php echo $a[$i]["rol"] ;?><br /></li>
            <li>RUT : <?php echo $a[$i]["rut"] ;?><br /></li>
            <li>NOMBRE : <?php echo $a[$i]["nombre"] ;?><br /></li>
            <li>CORREO : <?php echo $a[$i]["correo"] ;?><br /></li>
            <li>TELEFONO : <?php echo $a[$i]["telefono"] ;?><br /></li>
            <li>CONTRASENA : <?php echo $a[$i]["contraseña"] ;?><br /></li>
            <li>TALLA POLERA : <?php echo $a[$i]["talla_polera"] ;?><br /></li>
            <li>CARRERA : <?php echo $a[$i]["carrera"] ;?><br /></li>
            <li>ID AREA : <?php echo $a[$i]["id_area"] ;?><br /></li>
            <li>ID CAMPUS : <?php echo $a[$i]["id_campus"] ;?><br /></li>
            <li>NOMBRE AREA : <?php echo $a[$i]["nombre_area"] ;?><br /><hr /></li>
            </ul>
            <form action="editar_coordinador.php" method="GET">
            <input type="hidden" name="rol" value="<?php echo $a[$i]["rol"] ;?>"  />
            <input type="hidden" name="rut" value="<?php echo $a[$i]["rut"] ;?>"  />
            <input type="hidden" name="nombre" value="<?php echo $a[$i]["nombre"] ;?>"  />
            <input type="hidden" name="correo" value="<?php echo $a[$i]["correo"] ;?>"  />
            <input type="hidden" name="telefono" value="<?php echo $a[$i]["telefono"] ;?>"  />
            <input type="hidden" name="contraseña" value="<?php echo $a[$i]["contraseña"] ;?>"  />
            <input type="hidden" name="talla_polera" value="<?php echo $a[$i]["talla_polera"] ;?>"  />
            <input type="hidden" name="carrera" value="<?php echo $a[$i]["carrera"] ;?>"  />
            <input type="hidden" name="id_area" value="<?php echo $a[$i]["id_area"] ;?>"  />
            <input type="hidden" name="id_campus" value="<?php echo $a[$i]["id_campus"] ;?>"  />
            <input type="hidden" name="nombre_area" value="<?php echo $a[$i]["nombre_area"] ;?>"  />
            <td><input name="editar" value="Editar" type="submit" /> </td>
            </form> 
        <?php
        }
        ?>
        
        
        <p><input type="button" value="Agregar" onclick="location.href='agregar_coordinador.php'" /></a></p>
    
    
    
    
    
    </body>
</html>