<?php
if($_GET)
{
    require_once("class/class.php");
    $area=new Areas();
    $a=$area->eliminar_area($_GET);
}
else{
?>

<!DOCTYPE HTML>
<html>
    <head>
    	<meta http-equiv="content-type" content="text/html" />
    	<title>Eliminar Area</title>
    </head>

    <body>
    
        <h2>Formulario:</h2>
        <form action="eliminar_area.php" name="eliminar" method="POST">
        <?php
        $sql='SELECT nombre_area FROM areas';
        $cadena="host='localhost' port='5432' dbname='jim' user='postgres' password='123'";
        $con=pg_connect ($cadena) or die ('Error de conexion. Pongase en contacto con administrador');
        $resultado_consulta=pg_query($con,$sql);
        echo "<select name='areas'>";
        while($fila=pg_fetch_assoc($resultado_consulta)){
            echo "<option value='".$fila['nombre_area']."'>".$fila['nombre_area']."</option>";
        }
        echo "</select>";
        ?>
        <p>
        <input type="submit" value="Terminar"/>
        </p>
        </form>
    
    
    </body>
</html>
<?php
}
?>