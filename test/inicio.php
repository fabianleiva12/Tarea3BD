<?php

if($_POST)
{
    require_once("class/class.php");
    $miembro=new Miembro();
    $a=$miembro->comprobar($_POST);

    if ($a!=FALSE)
    {
        setcookie("user",$a[0],time()+3600);
        setcookie("carrera",$a[1],time()+3600);
        setcookie("rol",$a[2],time()+3600);
        
        
        //header('Location:coord_general.php');
        $t1=new Miembro();
        $tipo=$t1->get_tipo($a[2]);
        
        if ($tipo[0]['nombre_area']==="coordinacion_general")
        {   
            //setcookie("coordinador",TRUE,time()+3600); 
            setcookie("nombre_area","coordinador_general",time()+3600);
            header('Location:coord_general.php');
            
        }
        else{
            
            $s='t';
            for ($i=0;$i<sizeof($tipo);$i++)
            {   
                if($tipo[$i]['coordinador']==='t' AND $tipo[$i]['seleccionado']==='t')
                {   
                    //setcookie("coordinador",TRUE,time()+3600);
                    //print_r($tipo);
                    $s='f';
                    
                    setcookie('nombre_area',$tipo[$i]['nombre_area'],time()+3600);
                    
                    header('Location:coord_area.php');
                }
            }
            
            //setcookie("coordinador",FALSE,time()+3600);

            if($s==='t')
            {
                $areaC=array();
                //si es colaborador debo saber en que areas esta
                for ($i=0;$i<sizeof($tipo);$i++)
                {
                    if($tipo[$i]['seleccionado']==='t')
                    {   //Si encuentro una area en la que esta seleccionada lo añado en la cookie
                        setcookie("areas"."$i",$tipo[$i]['nombre_area'],time()+3600);
                        //setcookie("coordinador",TRUE,time()+3600);
                        //print_r($tipo);
                    }
                    else
                    {   //si no se encuentra se deja un 0 en la cookie de ese valor
                        setcookie("areas"."$i","0",time()+3600);
                    }
                }
                

                header('Location:colaborador.php');
            }
        }
        
    }
    
    else
    {
        print_r("usuario o contrasena invalido");
    }

    
   // print_r($_COOKIE["user"]);
   //print_r($_COOKIE["carrera"]);
}
else{
?>

<!DOCTYPE HTML>
<html>
    <head>
        <link href="estilo.css" rel="stylesheet" type="text/css" />
    	<meta http-equiv="content-type" content="text/html" />
    	<title>Inicio</title>
    </head>

    <body>
    
        <h2>Formulario:</h2>
        
        <form action="inicio.php" name="datos_inicio" method="POST">
        <p >
        <td>Correo Electronico</td>
        <input maxlength="20" type="text" name="correo" value="" /> 
        </p>
        
        <p>
        <td>Contrasena</td>
        <input maxlength="20" type="password" name="contrasena" value=""/>
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