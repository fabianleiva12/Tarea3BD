<?php
require_once("class/class.php"); 

$idcarrera=new Carreras();
$id2=$idcarrera->get_id_campus_carrera($_COOKIE["carrera"]);

?>

<!DOCTYPE HTML>
<html>
    <head>
    	<meta http-equiv="content-type" content="text/html" />

    
    	<title>Noticias</title>
    </head>

    <body>
        <ul>
        Estas Selecionado en:
        <ul>
        <?php
        //este for recorre las 3 posibles areas en la que esta seleccionado
        
        for($k=0;$k<3;$k++)
        {
            if ($_COOKIE["areas"."$k"]==="0"){continue;}
         ?>
            <li><?php echo $_COOKIE["areas"."$k"] ;?><br /></li>
         
         <?php
        }
        ?>
        </ul>
        
        <h1>Noticias</h1><br />
        <?php
        //este for recorre las 3 posibles areas en la que esta seleccionado
        for($j=0;$j<3;$j++){
            $noticias=new Noticias();
            $a=$noticias->get_noticias_colaborador($_COOKIE["areas"."$j"],$id2);
            //este for es para las noticias de un area
            
            for($i=0;$i<sizeof($a);$i++)
            {?>
                <li>ROL : <?php echo $a[$i]["rol"] ;?><br /></li>
                <li>TITULO : <?php echo $a[$i]["titulo"] ;?><br /></li>
                <li>CONTENIDO : <?php echo $a[$i]["mensaje"] ;?><br /><hr /></li>
    
            <?php
            }
            
        }
        ?>
        </ul>

    
    
    
    
    
    </body>
</html>