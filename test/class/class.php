<?php

class conectar
{    
    public function con()
    {
        $cadena="host='localhost' port='5432' dbname='jim' user='postgres' password='123'";
        $con=pg_connect ($cadena) or die ('Error de conexion. Pongase en contacto con administrador');
        
        return $con;}
  
}

class Campus extends conectar
{
    
    private $t;
    
    public function _construct()
    {
        
        $this->t=array();
        
    }
    
    public function get_campus()
    {
        $sql="select nombre_campus from campus";
        $res=pg_query(parent::con(),$sql);
        
        while($reg=pg_fetch_assoc($res))
        {
            $this->t[]=$reg;
            
        }
        pg_close(parent::con());
        return $this->t;
    }
}

class Areas extends conectar
{
    
    private $t;
    
    public function _construct()
    {
        
        $this->t=array();
        
    }
    public function insertar_area($dato)
    {
        $id_area=$dato['id_area'];
        $id_campus=$dato['id_campus'];
        $nombre_area=$dato['nombre_area'];
        $colaboradores=$dato['numero_colaboradores'];

        $sql = "INSERT INTO areas (id_area, id_campus, nombre_area,  numero_colaboradores) VALUES ($id_area, $id_campus,'$nombre_area',$colaboradores);";

        $res=pg_query(parent::con(),$sql) or die ('ERROR AL INSERTAR DATOS: ' . pg_last_error().$sql);;
        
        $cmdtuples = pg_affected_rows($res);
        echo $cmdtuples . " datos registrados.\n";
        header( 'Location: http://localhost:8080/test/areas.php' ) ;
        
        // Free resultset liberar los datos
        pg_free_result($res);

        // Closing connection cerrar la conexión
        pg_close(parent::con());
        
        
    }
    
    public function eliminar_area($dato)
    {
        
        //$nombre_area=$dato['areas'];      
        $sql =  "DELETE FROM areas WHERE areas.id_area = $dato ;";
        $res=pg_query(parent::con(),$sql) or die ('ERROR AL ELIMINAR DATOS: ' . pg_last_error().$sql);;
        
        $cmdtuples = pg_affected_rows($res);
        echo $cmdtuples . " datos eliminados.\n";
        
        // Free resultset liberar los datos
        pg_free_result($res);

        // Closing connection cerrar la conexión
        pg_close(parent::con());
        
    }
        
       public function editar_area($dato)
    {
        $id_area=$dato['id_area'];
        $id_campus=$dato['id_campus'];
        $nombre_area=$dato['nombre_area'];
        $colaboradores=$dato['numero_colaboradores'];
        $sql = "UPDATE areas SET id_campus = $id_campus , nombre_area='$nombre_area', numero_colaboradores=$colaboradores  WHERE id_area = $id_area;";
        $res=pg_query(parent::con(),$sql) or die ('ERROR AL EDITAR DATOS: ' . pg_last_error().$sql);;
        
        //$cmdtuples = pg_affected_rows($res);
        //echo $cmdtuples . " datos registrados.\n";
        
        // Free resultset liberar los datos
        pg_free_result($res);

        // Closing connection cerrar la conexión
        pg_close(parent::con());
        
    }
    
    
    public function get_areas()
    {
        $sql="SELECT * FROM areas";
        $res=pg_query(parent::con(),$sql) or die ('ERROR AL SELECT DATOS: ' . pg_last_error().$sql);
        
        while($reg=pg_fetch_assoc($res))
        {
            
            $this->t[]=$reg;
            
        }
        pg_close(parent::con());
        return $this->t;
    }
    
    public function get_id_area($nombre,$campus)
    {
        $sql="SELECT id_area FROM areas where nombre_area='$nombre' AND id_campus=$campus";
        $res=pg_query(parent::con(),$sql) or die ('ERROR AL SELECT DATOS: ' . pg_last_error().$sql);

        while($reg=pg_fetch_assoc($res))
        {
            
            $this->t[]=$reg;
            
        }
        pg_close(parent::con());
        return $this->t[0]['id_area'];
    }
    
    public function get_nombre_areas()
    {
        $sql="SELECT nombre_area FROM areas";
        $res=pg_query(parent::con(),$sql) or die ('ERROR AL SELECT DATOS: ' . pg_last_error().$sql);
        
        while($reg=pg_fetch_assoc($res))
        {
            
            $this->t[]=$reg;
            
        }
        pg_close(parent::con());
        return $this->t;
    }
}

class Postulante extends conectar
{
    
    private $t;
    
    public function _construct()
    {
        
        $this->t=array();
        
    }
    
    public function insertar($dato)
    {   
        
        $rol=$dato['rol'];
        $rut=$dato['rut'];
        $carrera=$dato['carrera'];
        $nombre=$dato['nombre'];
        $contrasena =$dato['contrasena'];
        $correo =$dato['correo'];
        $telefono =$dato['telefono'];
        $motivo=$dato['motivo'];
        $seleccionado="FALSE";
        $area1=$dato['areas1'];
        $area2=$dato['areas2'];
        $area3=$dato['areas3'];
        
        $id_campus_carrera=new Carreras();
        $id_campus=$id_campus_carrera->get_id_campus_carrera($carrera);

        $ids1=new Areas();
        $id1=$ids1->get_id_area($area1,$id_campus);
        $ids2=new Areas();
        $id2=$ids2->get_id_area($area2,$id_campus);
        $ids3=new Areas();
        $id3=$ids3->get_id_area($area3,$id_campus);

        $sql = "INSERT INTO postulante(rol, carrera, rut,  nombre, correo, telefono,motivo_postulacion,seleccionado,contrasena) VALUES ('$rol', '$carrera','$rut','$nombre','$correo','$telefono','$motivo',$seleccionado,'$contrasena');";
        $insert1="INSERT INTO postulacionarea(rol,id_area,seleccionado) VALUES ('$rol',$id1,$seleccionado)";
        $insert2="INSERT INTO postulacionarea(rol,id_area,seleccionado) VALUES ('$rol',$id2,$seleccionado)";
        $insert3="INSERT INTO postulacionarea(rol,id_area,seleccionado) VALUES ('$rol',$id3,$seleccionado)";
        
        $res=pg_query(parent::con(),$sql) or die ('ERROR AL INSERTAR DATOS 1 : ' . pg_last_error().$sql);
        $res1=pg_query(parent::con(),$insert1) or die ('ERROR AL INSERTAR DATOS 2 : ' . pg_last_error().$sql);
        $res2=pg_query(parent::con(),$insert2) or die ('ERROR AL INSERTAR DATOS 3 : ' . pg_last_error().$sql);
        $res3=pg_query(parent::con(),$insert3) or die ('ERROR AL INSERTAR DATOS 4 : ' . pg_last_error().$sql);
        
        $cmdtuples = pg_affected_rows($res);
        echo $cmdtuples . " datos registrados.\n";
        
        $cmdtuples1 = pg_affected_rows($res1);
        echo $cmdtuples1 . " datos registrados.\n";
        
        $cmdtuples2 = pg_affected_rows($res2);
        echo $cmdtuples2 . " datos registrados.\n";
        
        $cmdtuples3 = pg_affected_rows($res3);
        echo $cmdtuples3 . " datos registrados.\n";
        
        // Free resultset liberar los datos
        pg_free_result($res);
        pg_free_result($res1);
        pg_free_result($res2);
        pg_free_result($res3);

        // Closing connection cerrar la conexión
        pg_close(parent::con());
        
    }
}



class Miembro extends conectar
{
    
    private $t;
    
    public function _construct()
    {
        
        $this->t=array();
        
    }
    
    public function get_datos($rol)
    {
        $sql="SELECT * FROM miembro WHERE rol='$rol'";
        $res=pg_query(parent::con(),$sql) or die ('ERROR AL SELECT DATOS: ' . pg_last_error().$sql);
        
        while($reg=pg_fetch_assoc($res))
        {
            
            $this->t[]=$reg;
            
        }
        pg_close(parent::con());
        return $this->t;
    }
    
    public function miembros_area($area,$id_campus)
    {
        $ids1=new Areas();
        $id1=$ids1->get_id_area($area,$id_campus);
        
        //$sql="SELECT * FROM miembro,postulacionarea,areas,carreras WHERE miembro.carrera=carreras.nombre_carrera AND postulacionarea.id_area=areas.id_area AND miembro.rol=postulacionarea.rol AND carreras.id_campus=$id_campus AND areas.id_area=$id1 order by nombre;";
        $sql="SELECT * FROM miembro,postulacionarea,areas,carreras WHERE miembro.carrera=carreras.nombre_carrera AND postulacionarea.id_area=areas.id_area AND miembro.rol=postulacionarea.rol AND carreras.id_campus=$id_campus AND areas.id_area=$id1 order by nombre;";
        $res=pg_query(parent::con(),$sql) or die ('ERROR AL SELECT DATOS: ' . pg_last_error().$sql);
        
        while($reg=pg_fetch_assoc($res))
        {
            
            $this->t[]=$reg;
            
        }
        pg_close(parent::con());
        return $this->t;
    }
    
    public function areas_que_postula($id_campus,$correo)
    {
        
        
        $sql="SELECT nombre,seleccionado,nombre_area FROM miembro,postulacionarea,areas,carreras WHERE miembro.carrera=carreras.nombre_carrera AND postulacionarea.id_area=areas.id_area AND miembro.rol=postulacionarea.rol AND carreras.id_campus=$id_campus AND correo='$correo';";
        $res=pg_query(parent::con(),$sql) or die ('ERROR AL SELECT DATOS: ' . pg_last_error().$sql);
        
        while($reg=pg_fetch_assoc($res))
        {
            
            $this->t[]=$reg;
            
        }
        pg_close(parent::con());
        return $this->t;
    }
    
    public function miembros_seleccionados($area,$id_campus)
    {
        $ids1=new Areas();
        $id1=$ids1->get_id_area($area,$id_campus);
        
        $sql="SELECT * FROM miembro,postulacionarea,areas WHERE postulacionarea.id_area=areas.id_area AND miembro.rol=postulacionarea.rol AND id_campus=$id_campus AND areas.id_area=$id1 AND seleccionado=TRUE";
        $res=pg_query(parent::con(),$sql) or die ('ERROR AL SELECT DATOS: ' . pg_last_error().$sql);
        
        while($reg=pg_fetch_assoc($res))
        {
            
            $this->t[]=$reg;
            
        }
        pg_close(parent::con());
        return $this->t;
    }
    
    
    public function get_tipo($rol)
    {
        $sql="SELECT nombre_area,coordinador,seleccionado FROM miembro,postulacionarea,areas WHERE miembro.rol=postulacionarea.rol AND postulacionarea.id_area=areas.id_area AND miembro.rol='$rol'";
        $res=pg_query(parent::con(),$sql) or die ('ERROR AL SELECT DATOS: ' . pg_last_error().$sql);
        
        while($reg=pg_fetch_assoc($res))
        {
            
            $this->t[]=$reg;
            
        }
        pg_close(parent::con());
        

        return $this->t;
    }
    
    public function comprobar($dato)
    {
        $condicion=$dato['correo'];
        $sql="SELECT * FROM miembro WHERE correo='$condicion'";
        $res=pg_query(parent::con(),$sql) or die ('ERROR AL SELECT DATOS: ' . pg_last_error().$sql);
        
        while($reg=pg_fetch_assoc($res))
        {
            
            $this->t[]=$reg;
            
        }
        $x=array();
        $x[]=$this->t[0]['nombre'];
        $x[]=$this->t[0]['carrera'];
        $x[]=$this->t[0]['rol'];
        if (($dato['correo']===$this->t[0]['correo']) and ($dato['contrasena']===$this->t[0]['contrasena']))
        {
           
            return $x;
        }
        else {
            return FALSE;
        }
        
    }
    
    public function insertar_coordinador($dato)
    {
        $rol=$dato['rol'];
        $rut=$dato['rut'];
        $carrera=$dato['carrera'];
        $nombre=$dato['nombre'];
        $contrasena =$dato['contrasena'];
        $correo =$dato['correo'];
        $telefono =$dato['telefono'];
        $talla=$dato['talla'];
        $coordinador="TRUE";
        $sql = "INSERT INTO miembro(rol, rut,  nombre, correo, telefono,talla_polera,coordinador,carrera,contrasena) VALUES ('$rol','$rut','$nombre','$correo','$telefono','$talla',$coordinador,'$carrera','$contrasena');";
        //SACAR ID AREA DEL AREA
        $sql1 = "INSERT INTO postulacionarea(rol, id_area, seleccionado) VALUES ('$rol',1,'TRUE');";
        
        $res=pg_query(parent::con(),$sql) or die ('ERROR AL INSERTAR DATOS: ' . pg_last_error().$sql);
        $res1=pg_query(parent::con(),$sql1) or die ('ERROR AL INSERTAR DATOS: ' . pg_last_error().$sql);
        
        $cmdtuples = pg_affected_rows($res);
        echo $cmdtuples . " datos registrados.\n";
        
        $cmdtuples1 = pg_affected_rows($res1);
        echo $cmdtuples1 . " datos registrados.\n";
        
        // Free resultset liberar los datos
        pg_free_result($res);
        pg_free_result($res1);
        // Closing connection cerrar la conexión
        pg_close(parent::con());
        
    }
    
     public function editar_coordinador($dato)
    {
        $nombre=$dato['nombre'];
        $rol=$dato['rol'];
        $rut=$dato['rut'];
        //$area=$dato['area'];
        $telefono=$dato['telefono'];
        $talla=$dato['talla'];
        $carrera=$dato['carrera'];
        $correo=$dato['correo'];
        $contraseña=$dato['contrasena'];
        $sql = "UPDATE miembro SET nombre = '$nombre' , rut='$rut', area=$area  WHERE id_area = $id_area;";
        $res=pg_query(parent::con(),$sql) or die ('ERROR AL EDITAR DATOS: ' . pg_last_error().$sql);;
        
        //$cmdtuples = pg_affected_rows($res);
        //echo $cmdtuples . " datos registrados.\n";
        
        // Free resultset liberar los datos
        pg_free_result($res);

        // Closing connection cerrar la conexión
        pg_close(parent::con());
        
    }
    
    
    public function get_coordinadores($id_campus)
    {
        $sql="SELECT miembro.rol,rut,nombre,correo,telefono,talla_polera,id_carrera,contrasena,areas.id_area,carreras.id_campus,nombre_area FROM miembro,postulacionarea,areas,carreras where miembro.id_carrera=carreras.id_carrera AND miembro.rol=postulacionarea.rol AND postulacionarea.id_area=areas.id_area AND coordinador=TRUE AND seleccionado=TRUE AND nombre_area<>'coordinacion_general' AND carreras.id_campus=$id_campus ;";
        $res=pg_query(parent::con(),$sql) or die ('ERROR AL SELECT DATOS: ' . pg_last_error().$sql);
                
        while($reg=pg_fetch_assoc($res))
        {
                    
            $this->t[]=$reg;
                    
        }
        pg_close(parent::con());
        return $this->t;
    }

}



class Noticias extends conectar
{
    
    private $t;
    
    public function _construct()
    {
        
        $this->t=array();
        
    }
    
    public function insertar_noticia($dato)
    {
        $id_noticia=$dato['id_noticia'];
        $id_area=$dato['id_area'];
        $rol=$dato['rol'];
        $titulo=$dato['titulo'];
        $mensaje=$dato['mensaje'];

        $sql = "INSERT INTO noticias(id_noticia, id_area, rol, titulo,mensaje) VALUES ($id_noticia, $id_area,'$rol','$titulo','$mensaje');";

        $res=pg_query(parent::con(),$sql) or die ('ERROR AL INSERTAR DATOS: ' . pg_last_error().$sql);;
        
        $cmdtuples = pg_affected_rows($res);
        echo $cmdtuples . " datos registrados.\n";
        
        // Free resultset liberar los datos
        pg_free_result($res);

        // Closing connection cerrar la conexión
        pg_close(parent::con());
        
    }
    
    public function get_noticias_colaborador($nombre_area,$id_campus)
    {
        $sql="select * from noticias,areas where noticias.id_area=areas.id_area AND nombre_area='$nombre_area' AND id_campus=$id_campus";
        $res=pg_query(parent::con(),$sql);
        
        while($reg=pg_fetch_assoc($res))
        {
            $this->t[]=$reg;
            
        }
        pg_close(parent::con());
        return $this->t;
    }
    public function get_noticias()
    {
        $sql="select * from noticias";
        $res=pg_query(parent::con(),$sql);
        
        while($reg=pg_fetch_assoc($res))
        {
            $this->t[]=$reg;
            
        }
        pg_close(parent::con());
        return $this->t;
    }
}

class Carreras extends conectar
{
    
    private $t;
    
    public function _construct()
    {
        
        $this->t=array();
        
    }
    
    public function get_id_campus_carrera($nombre)
    {
        $sql="select id_campus from carreras where nombre_carrera='$nombre'";
        $res=pg_query(parent::con(),$sql);
        
        while($reg=pg_fetch_assoc($res))
        {
            $this->t[]=$reg;
            
        }
        pg_close(parent::con());
        return $this->t[0]['id_campus'];
    }
}
?>