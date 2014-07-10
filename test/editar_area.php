<?php
require_once("class/class.php");
if($_POST)
{   $area=new Areas();
    $a=$area->editar_area($_POST);
}
if ($_GET){
?>
<!DOCTYPE HTML>
<html>
    <head>
        <link href="estilo.css" rel="stylesheet" type="text/css" />
    	<title>Editar Area</title>
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

            <form action="editar_area.php" method="POST">
            <table>
            <tr>
            <td>ID AREA :</td> <td> <input type="text" name="id_area"  value="<?php echo $_GET["id_area"] ;?>"  /><br /></td>
            </tr>
            <tr>
            <td>ID CAMPUS :</td> <td><input type="text" name="id_campus" value="<?php echo $_GET["id_campus"] ;?>"  /><br /></td>
            </tr>
            <tr>
            <td>NOMBRE AREA :</td> <td><input type="text" name="nombre_area" value="<?php echo $_GET["nombre_area"] ;?>"  /><br /></td>
            </tr>
            <tr>
            <td>COLABORADORES :</td><td> <input type="text" name="numero_colaboradores" value="<?php echo $_GET["numero_colaboradores"] ;?>"  /><br /></td>
            </tr>
            <tr>                   
            <td><input name="enviar" value="Editar" type="submit" /> </td>
              
            </tr>
            </table>
            <hr />
            </form>      
            
             
    </body>
</html>
            

<?php } ?>