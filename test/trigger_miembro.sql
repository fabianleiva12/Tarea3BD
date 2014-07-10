CREATE OR REPLACE FUNCTION insert_member() RETURNS TRIGGER AS $miembro$
    BEGIN

	IF (TG_OP = 'INSERT') THEN
            INSERT INTO miembro VALUES(NEW.rol, NEW.rut,NEW.nombre,NEW.correo,NEW.telefono,NEW.contrasena,0,NEW.seleccionado,NEW.carrera);
            RETURN NEW;
        END IF;
    END;
$miembro$ LANGUAGE plpgsql;

CREATE TRIGGER miembro
BEFORE INSERT ON postulante
    FOR EACH ROW EXECUTE PROCEDURE insert_member();