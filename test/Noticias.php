<?php
require_once("class/class.php"); 
$noticias=new Noticias();
$a=$noticias->get_noticias();
?>

<!DOCTYPE HTML>
<html>
    <head>
        <link href="estilo.css" rel="stylesheet" type="text/css" />
    	<meta http-equiv="content-type" content="text/html" />  
    	<title>Noticias</title>
        <h1>Noticias</h1>
    </head>

    <body>
        <ul>
        <?php
        
        for($i=0;$i<sizeof($a);$i++)
        {?>
            <li>ROL : <?php echo $a[$i]["rol"] ;?><br /></li>
            <li>TITULO : <?php echo $a[$i]["titulo"] ;?><br /></li>
            <li>CONTENIDO : <?php echo $a[$i]["mensaje"] ;?><br /><hr /></li>

        <?php
        }
        ?>
        </ul>
        <p><input type="button" value="Agregar" onclick="location.href='agregar_noticia.php'" /></a></p>
    
    
    
    
    
    </body>
</html>