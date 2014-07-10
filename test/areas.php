<?php
require_once("class/class.php"); 

if ($_GET["id"]){
    $area=new Areas();
    $a=$area->eliminar_area($_GET["id"]);
}

else{   
    $areas=new Areas();
    $a=$areas->get_areas();

?>

<!DOCTYPE HTML>
<html>
    <head>
        <link href="estilo.css" rel="stylesheet" type="text/css" />
    	<title>Areas</title>
        <h1>Areas de la JIM</h1>
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

        <?php
        for($i=0;$i<sizeof($a);$i++)
        {?> <div>
            <form action="editar_area.php" method="GET">
            <table>
            <tr>
            <td>ID AREA :</td>  <td><?php echo $a[$i]["id_area"] ;?> <input type="hidden" name="id_area"  value="<?php echo $a[$i]["id_area"] ;?>"  /><br /></td>
            </tr>
            <tr>
            <td>ID CAMPUS :</td> <td><?php echo $a[$i]["id_campus"] ;?><input type="hidden" name="id_campus" value="<?php echo $a[$i]["id_campus"] ;?>"  /><br /></td>
            </tr>
            <tr>
            <td>NOMBRE AREA :</td> <td><?php echo $a[$i]["nombre_area"] ;?><input type="hidden" name="nombre_area" value="<?php echo $a[$i]["nombre_area"] ;?>"  /><br /></td>
            </tr>
            <tr>
            <td>COLABORADORES :</td><td><?php echo $a[$i]["numero_colaboradores"] ;?><input type="hidden" name="numero_colaboradores" value="<?php echo $a[$i]["numero_colaboradores"] ;?>"  /><br /></td>
            </tr>
            <tr>                   
            <td><input name="editar" value="Editar" type="submit" /> </td>
            <td><a href="?id=<?php echo $a[$i]["id_area"] ;?>" title="eliminar">Eliminar</a> </td>  
            </tr>
            </table>
            <hr />
            </form>
            </div>      
        <?php
        }
}
        ?>
        
        <p><input type="button" value="Agregar" onclick="location.href='agregar_area.php'" /></a></p>
    
    
    
    
    
    </body>
</html>