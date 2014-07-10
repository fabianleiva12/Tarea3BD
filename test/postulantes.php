<?php
require_once("class/class.php");

if($_POST)
{

    $postulantes=new Miembro();
    $idcarrera=new Carreras();
    $id2=$idcarrera->get_id_campus_carrera($_COOKIE["carrera"]);
    
    $a=$postulantes->miembros_area($_POST['areas1'],$id2);

    ?>
    <!DOCTYPE HTML>
    <html>
    <head>
        <link href="estilo.css" rel="stylesheet" type="text/css" />
      	<meta http-equiv="content-type" content="text/html" />
        <title>Colaboradores</title>
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
    <table border="1" cellspacing="0" cellpadding="2" bordercolor="666633">
    <tr>     
            <td>ROL</td><td>RUT</td><td>NOMBRE</td><td>CORREO</td><td>TELEFONO</td><td>CONTRASENA</td> 
            <td>TALLA POLERA</td><td>CARRERA</td><td>POSTULACIONES</td> 
    
    </tr>
    <?php
    for($i=0;$i<sizeof($a);$i++)
    {
        $areas_postula=new Miembro();
        $lista_areas=$areas_postula->areas_que_postula($id2,$b[$i]["correo"]);
        ?>
               
        <tr>
            <td><?php echo $a[$i]["rol"] ;?></td> 
            <td><?php echo $a[$i]["rut"] ;?></td> 
            <td><?php echo $a[$i]["nombre"] ;?></td> 
            <td><?php echo $a[$i]["correo"] ;?></td> 
            <td><?php echo $a[$i]["telefono"] ;?></td> 
            <td><?php echo $a[$i]["contrasena"] ;?></td> 
            <td><?php echo $a[$i]["talla_polera"] ;?></td> 
            <td><?php echo $a[$i]["carrera"] ;?></td>  
        
        
            <td>
            <?php echo "<select name='areas1'>";
                for($j=0;$j<sizeof($lista_areas);$j++){
                    if ($lista_areas[$j]["seleccionado"]==='t'){$x="seleccionado";} else {$x="no seleccionado" ;}
                    echo "<option value='".$lista_areas[$j]['nombre_area']."'>".$lista_areas[$j]['nombre_area']." ".$x."</option>";
                    //echo "<option value='".$lista_areas[$i]['seleccionado']."'>".$lista_areas[$i]['seleccionado']."</option>";
                }
                echo "</select>"; ?>
            </td>
        
        
        </tr>
    <?php
    }
    ?>
    
    </table>

    

    </body>
    </html>
<?php
}

else{ 

    if($_COOKIE["nombre_area"]==="coordinador_general")
    {
    ?>
        
        Seleccione Area
        <form action="postulantes.php" method="POST">
        <?php
        $areas=new Areas();
        $lista1=$areas->get_nombre_areas();
                    
        echo "<select name='areas1'>";
        for($i=0;$i<sizeof($lista1);$i++)
        {
            echo "<option value='".$lista1[$i]['nombre_area']."'>".$lista1[$i]['nombre_area']."</option>";
        }
        echo "</select>";
        ?>
        <p>
        <input type="submit" value="Terminar"/>
        </p>
        </form>
    <?php  
    }
    else 
    {
        
    
    $postulantes1=new Miembro();
    $idcarrera=new Carreras();
    $id2=$idcarrera->get_id_campus_carrera($_COOKIE["carrera"]);
    $b=$postulantes1->miembros_area($_COOKIE['nombre_area'],$id2);
    
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
            <td>TALLA POLERA</td><td>CARRERA</td><td>POSTULACIONES</td>
    
    </tr>
    <?php
    for($i=0;$i<sizeof($b);$i++)
    {
        $areas_postula=new Miembro();
        $lista_areas=$areas_postula->areas_que_postula($id2,$b[$i]["correo"]);
        
        ?>
        

        
        <tr>
            <td><?php echo $b[$i]["rol"] ;?></td> 
            <td><?php echo $b[$i]["rut"] ;?></td> 
            <td><?php echo $b[$i]["nombre"] ;?></td> 
            <td><?php echo $b[$i]["correo"] ;?></td> 
            <td><?php echo $b[$i]["telefono"] ;?></td> 
            <td><?php echo $b[$i]["contrasena"] ;?></td> 
            <td><?php echo $b[$i]["talla_polera"] ;?></td> 
            <td><?php echo $b[$i]["carrera"] ;?></td> 
      

            <td>
            <?php echo "<select name='areas1'>";
                for($j=0;$j<sizeof($lista_areas);$j++){
                    if ($lista_areas[$j]["seleccionado"]==='t'){$x="seleccionado";} else {$x="no seleccionado" ;}
                    echo "<option value='".$lista_areas[$j]['nombre_area']."'>".$lista_areas[$j]['nombre_area']." ".$x."</option>";
                    //echo "<option value='".$lista_areas[$i]['seleccionado']."'>".$lista_areas[$i]['seleccionado']."</option>";
                }
                echo "</select>"; ?>
            </td>
 
        </tr>
    <?php
    }
    ?>
    
    
    </table>

    </body>
    </html>

    
    <?php
    }
}
?>