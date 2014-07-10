<?php
require_once("class/class.php");
if($_POST)
{
    
    $noticia=new Noticias();
    $a=$noticia->insertar_noticia($_POST);
}
else{
?>

<!DOCTYPE HTML>
<html>
    <head>
        <link href="estilo.css" rel="stylesheet" type="text/css" />
    	<meta http-equiv="content-type" content="text/html" />
    	<title>Agregar Noticia</title>
        <h1>Agregar Noticia</h1>
    </head>

    <body>
    

    
        <h2>Formulario:</h2>
        
        <form action="agregar_noticia.php" name="datos_noticia" method="POST">
        
        <p>
        <td>ID NOTICIA ?? autoincremental</td>
        <input maxlength="20" type="text" name="id_noticia" value="" /> 
        </p>
            
        
        <?php 
        
        $idcarrera=new Carreras();
        $id2=$idcarrera->get_id_campus_carrera($_COOKIE["carrera"]);
        
        $ids1=new Areas();
        $id_area=$ids1->get_id_area($_COOKIE["nombre_area"],$id2);

        ?>
        
        <p>
        <input maxlength="20" type="hidden" name="id_area" value="<?php echo $id_area;?>"/>
        </p>
        
       
        <p>
        <td>Titulo</td>
        <input maxlength="20" type="text" name="titulo" value=""/>
        </p>
        
        <p>
        <textarea name="mensaje" rows="10" cols="40">Inserte Noticia</textarea>
        </p>
        
        <p>
        <td>rol oculto actualizar</td>
        <input maxlength="20" type="hidden" name="rol" value="<?php echo $_COOKIE['rol'] ?>" />
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