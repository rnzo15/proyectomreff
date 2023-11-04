DROP DATABASE IF EXISTS FBUSESUY;
CREATE DATABASE IF NOT EXISTS FBUSESUY;
USE FBUSESUY;

CREATE TABLE USUARIOS(
iduser int AUTO_INCREMENT PRIMARY KEY NOT NULL,
username varchar(255) NOT NULL,
email varchar(255) NOT NULL,
direccion varchar(255) NOT NULL, 
passwordu varchar(255) NOT NULL,
cedula varchar(10) NOT NULL,
telefono varchar(15) NOT NULL,
rango int(3) DEFAULT "1",
fechanac DATE NOT NULL
);

CREATE TABLE CIUDAD(
ID_CIUDAD int AUTO_INCREMENT PRIMARY KEY NOT NULL,
NOMBRE_CIUDAD VARCHAR(80) NOT NULL
);

CREATE TABLE CONDUCTOR(
ID_CONDUCTOR INT AUTO_INCREMENT NOT NULL,
NOMBRE_CONDUCTOR VARCHAR(80) NOT NULL,
SERIAL_LICENCIA VARCHAR(100) NOT NULL,
PRIMARY KEY (ID_CONDUCTOR)
);
CREATE TABLE OMNIBUS(
ID_OMNIBUS INT AUTO_INCREMENT NOT NULL,
CAPACIDAD_MAXIMA INT NOT NULL,
NUMERO_IDENTIFICACION INT NOT NULL,
CONDUCTORID INT NOT NULL,
PRIMARY KEY (ID_OMNIBUS),
FOREIGN KEY (CONDUCTORID) REFERENCES CONDUCTOR (ID_CONDUCTOR)
);

CREATE TABLE RUTA(
ID_RUTA INT AUTO_INCREMENT NOT NULL,
NOM_RUTA VARCHAR(255) NOT NULL,
ID_CIUDAD_ORIGEN INT NOT NULL,
ID_CIUDAD_DESTINO INT NOT NULL,
IDOMNIBUS INT NOT NULL,
PRIMARY KEY (ID_RUTA),
FOREIGN KEY (ID_CIUDAD_ORIGEN) REFERENCES CIUDAD(ID_CIUDAD),
FOREIGN KEY (ID_CIUDAD_DESTINO) REFERENCES CIUDAD(ID_CIUDAD),
FOREIGN KEY (IDOMNIBUS) REFERENCES OMNIBUS (ID_OMNIBUS)
);

CREATE TABLE PARADA(
ID_PARADA INT NOT NULL auto_increment,
DIRECCION_PARADA VARCHAR(255) NOT NULL,
HORARIO TIME NOT NULL,
ID_RUTA INT NOT NULL,
ID_CIUDAD INT NOT NULL,
PRIMARY KEY (ID_PARADA),
FOREIGN KEY (ID_RUTA) REFERENCES RUTA (ID_RUTA),
FOREIGN KEY (ID_CIUDAD) REFERENCES CIUDAD (ID_CIUDAD)
);

CREATE TABLE RESERVA(
ID_RESERVA INT NOT NULL AUTO_INCREMENT,
IDCLIENTE INT NOT NULL,
IDRUTA INT NOT NULL,
PRECIO INT NOT NULL,
FECHA_RESERVA DATETIME NOT NULL,
PRIMARY KEY (ID_RESERVA),
FOREIGN KEY (IDCLIENTE) REFERENCES USUARIOS (iduser),
FOREIGN KEY (IDRUTA) REFERENCES RUTA (ID_RUTA)
);

CREATE TABLE ASIENTO(
ID_ASIENTO INT NOT NULL PRIMARY KEY,
ESTADO BOOLEAN NOT NULL,
ID_OMNIBUS INT NOT NULL,
ID_RESERVA INT NOT NULL,
FOREIGN KEY (ID_OMNIBUS) REFERENCES OMNIBUS (ID_OMNIBUS),
FOREIGN KEY (ID_RESERVA) REFERENCES RESERVA (ID_RESERVA)
);


DELIMITER //
CREATE PROCEDURE RegistrarUsuario(
    IN username VARCHAR(50),
    IN correoElectronico VARCHAR(100),
    IN direccionu VARCHAR(255),
    IN contrasena VARCHAR(255),
    IN cedula_param VARCHAR(10),
    IN numtel VARCHAR(15),
    IN fechanac DATE
)
BEGIN
    DECLARE cedula_count INT;
    
    -- Verificar si la cédula ya está registrada
    SELECT COUNT(*) INTO cedula_count FROM USUARIOS WHERE cedula = cedula_param;
    
    IF cedula_count > 0 THEN
        SIGNAL SQLSTATE '45000'
        SET MESSAGE_TEXT = 'La cédula ya está registrada';
    ELSE
        -- Insertar el nuevo usuario
        INSERT INTO USUARIOS (username, email, direccion, passwordu, cedula, telefono, fechanac)
        VALUES (username, correoElectronico, direccionu, contrasena, cedula_param, numtel, fechanac);
    END IF;
END //
DELIMITER ;



DELIMITER //
CREATE PROCEDURE Login(
    IN p_email VARCHAR(100),
    IN p_contrasena VARCHAR(255),
    OUT resultado INT
)
BEGIN
    DECLARE usuarioEncontrado INT;
    SET usuarioEncontrado = 0;
    
    SELECT COUNT(*) INTO usuarioEncontrado
    FROM USUARIOS
    WHERE email = p_email AND passwordu = p_contrasena;

    IF usuarioEncontrado = 1 THEN
        SET resultado = 1;
    ELSE
        SET resultado = 0;
    END IF;
END //
DELIMITER ;

DELIMITER //
CREATE PROCEDURE BuscarUsuario(IN param_busqueda VARCHAR(255))
BEGIN
    SET @param_busqueda_int = CAST(param_busqueda AS SIGNED);
    SELECT * FROM USUARIOS
    WHERE cedula = param_busqueda OR iduser = @param_busqueda_int;
END;
//
DELIMITER ;

DELIMITER //
CREATE PROCEDURE AgregarUsuario(
    IN p_username VARCHAR(255),
    IN p_email VARCHAR(255),
    IN p_direccion VARCHAR(255),
    IN p_password VARCHAR(255),
    IN p_cedula VARCHAR(10),
    IN p_telefono VARCHAR(15),
    IN p_fechanac DATE
)
BEGIN
    DECLARE existing_count INT;
    SELECT COUNT(*) INTO existing_count FROM USUARIOS WHERE cedula = p_cedula OR email = p_email;
    
    IF existing_count > 0 THEN
        SELECT 'Error: El usuario ya existe' AS mensaje;
    ELSE
        INSERT INTO USUARIOS (username, email, direccion, passwordu, cedula, telefono, fechanac)
        VALUES (p_username, p_email, p_direccion, p_password, p_cedula, p_telefono, p_fechanac);
        SELECT 'Usuario agregado con éxito' AS mensaje;
    END IF;
END;
//
DELIMITER ;



INSERT INTO USUARIOS (username, email, direccion, passwordu, cedula, telefono, fechanac)
VALUES
    ('Juan', 'usuario1@email.com', 'Ruta 3', 'contrasena1', '1234567890', '43348833', '1990-01-01'),
    ('Ricardo', 'usuario2@email.com', 'Ruta 5', 'contrasena2', '0987654321', '43349512', '1995-02-15'),
    ('Florentino', 'usuario3@email.com', 'Almirati 3', 'contrasena3', '5678901234', '099448855', '1985-05-20'),
    ('Perez', 'usuario4@email.com', 'Grucci 4', 'contrasena4', '4321098765', '094221122', '1993-11-30'),
    ('Marta', 'usuario5@email.com', 'Sarandi 5', 'contrasena5', '9876543210', '099222341', '1991-08-05'),
    ('Mirta', 'usuario6@email.com', 'Rivera 6', 'contrasena6', '3456789012', '099322122', '1997-04-10'),
    ('Miriam', 'usuario7@email.com', 'Por ahi 7', 'contrasena7', '2109876543', '210-987-6543', '2000-09-25'),
    ('Marian', 'usuario8@email.com', 'Cerquita 8', 'contrasena8', '8765432109', '876-543-2109', '1994-03-15'),
    ('Lalo', 'usuario9@email.com', 'Loma 9', 'contrasena9', '1234509876', '123-450-9876', '1986-07-20'),
    ('Landa', 'usuario10@email.com', 'Del 10', 'contrasena10', '5678904321', '5678904321', '1992-06-10'),
    ('Moter', 'usuario11@email.com', 'Club Penguin 11', 'contrasena11', '4321098765', '032218765', '1998-12-12'),
    ('Guarana', 'usuario12@email.com', 'Asi 12', 'contrasena12', '2109876543', '2109876543', '1996-10-05'),
    ('Khatic', 'usuario13@email.com', 'Lejos 13', 'contrasena13', '8765432109', '8765432109', '1987-04-01'),
    ('Energy', 'usuario14@email.com', 'Casi casi 14', 'contrasena14', '1234509876', '1234509876', '1999-02-28'),
    ('Homme', 'usuario15@email.com', 'La esquina 15', 'contrasena15', '5678904321', '5678904321', '2004-06-18'),
    ('Homero', 'usuario16@email.com', 'Rotonda 16', 'contrasena16', '4321098765', '4321098765', '1994-08-22'),
    ('Marge', 'usuario17@email.com', 'Por ahi nomas 17', 'contrasena17', '2109876543', '2109876543', '1989-03-10'),
    ('Bart', 'usuario18@email.com', 'Girando por Paraguay 18', 'contrasena18', '8765432109', '8765432109', '1997-01-14'),
    ('Lisa', 'usuario19@email.com', 'Casi por ahi nomas 19', 'contrasena19', '1234509876', '1234509876', '1995-07-08'),
    ('Maggie', 'usuario20@email.com', 'Clarito 20', 'contrasena20', '5678904321', '5267804321', '1991-04-24');
    
INSERT INTO CONDUCTOR (NOMBRE_CONDUCTOR, SERIAL_LICENCIA)
VALUES
    ('Ned Flanders', 'QSYO221'),
    ('Apu Bin Laden', 'YQSE212'),
    ('Maxi Rodriguez', 'NSXD331'),
    ('Matias Arezo', 'LPED221');
INSERT INTO OMNIBUS (CAPACIDAD_MAXIMA, NUMERO_IDENTIFICACION, CONDUCTORID)
VALUES
    (50, 12345, 1),
    (45, 67890, 2),
    (55, 54321, 3),
    (40, 98765, 4);

INSERT INTO CIUDAD (NOMBRE_CIUDAD)
VALUES
    ('Santa Lucia'),
    ('Canelones'),
    ('Paysandu'),
    ('Asuncion'),
    ('Madrid'),
    ('Barcelona'),
    ('San Jose'),
    ('Montevideo'),
    ('Mercedes'),
    ('Salto'),
    ('Buenos Aires'),
    ('Parana');
    
INSERT INTO RUTA (NOM_RUTA, ID_CIUDAD_ORIGEN, ID_CIUDAD_DESTINO, IDOMNIBUS)
VALUES
    ('2K', 1, 2, 1),
    ('2A', 2, 3, 1),
    ('A18', 3, 4, 4),
    ('A1', 4, 8, 4),
    ('C4', 3, 7, 3),
    ('Z4', 5, 7, 2),
    ('Z3', 1, 3, 1),
    ('2L', 1, 4, 2)
    ;

INSERT INTO PARADA (ID_PARADA, DIRECCION_PARADA, HORARIO, ID_RUTA, ID_CIUDAD)
VALUES
    (1, 'Parada 1 en Ruta 1','14:30', 1, 1),
    (2, 'Parada 2 en Ruta 1','15:30', 1, 2),
    (3, 'Parada 3 en Ruta 1','14:30', 1, 3),
    (4, 'Parada 1 en Ruta 2','14:30', 2, 2),
    (5, 'Parada 2 en Ruta 2','14:30', 2, 3),
    (6, 'Parada 3 en Ruta 2','14:30', 2, 4),
    (7, 'Parada 1 en Ruta 3','14:30', 3, 3),
    (8, 'Parada 2 en Ruta 3','14:30', 3, 4),
    (9, 'Parada 3 en Ruta 3','14:30', 3, 5);

INSERT INTO RESERVA (ID_RESERVA, IDCLIENTE, IDRUTA, PRECIO, FECHA_RESERVA)
VALUES
    (1, 1, 1, 100, '2023-09-06 10:00:00'),
    (2, 2, 1, 100, '2023-09-07 11:00:00'),
    (3, 3, 2, 150, '2023-09-08 12:00:00'),
    (4, 4, 2, 150, '2023-09-09 13:00:00'),
    (5, 5, 2, 120, '2023-09-10 14:00:00'),
    (6, 6, 1, 120, '2023-09-11 15:00:00'),
    (7, 7, 1, 130, '2023-09-12 16:00:00'),
    (8, 8, 1, 130, '2023-09-13 17:00:00'),
    (9, 9, 3, 110, '2023-09-14 18:00:00'),
    (10, 10, 1, 110, '2023-09-15 19:00:00'),
    (11, 11, 2, 90, '2023-09-16 20:00:00'),
    (12, 12, 2, 90, '2023-09-17 21:00:00'),
    (13, 13, 3, 80, '2023-09-18 22:00:00'),
    (14, 14, 2, 80, '2023-09-19 23:00:00'),
    (15, 15, 3, 110, '2023-09-20 12:00:00'),
    (16, 16, 2, 110, '2023-09-21 13:00:00'),
    (17, 17, 3, 130, '2023-09-22 14:00:00'),
    (18, 18, 3, 130, '2023-09-23 15:00:00'),
    (19, 19, 3, 140, '2023-09-24 16:00:00'),
    (20, 20, 3, 140, '2023-09-25 17:00:00');
    
    
INSERT INTO ASIENTO (ID_ASIENTO, ESTADO, ID_OMNIBUS, ID_RESERVA)
VALUES
    (1, 0, 1, 1),
    (2, 0, 1, 2),
    (3, 0, 1, 3),
    (4, 0, 1, 4),
    (5, 0, 2, 5),
    (6, 0, 2, 6),
    (7, 0, 2, 7),
    (8, 0, 2, 8),
    (9, 0, 3, 9),
    (10, 0, 3, 10),
    (11, 0, 3, 11),
    (12, 0, 3, 12),
    (13, 0, 4, 13),
    (14, 0, 4, 14),
    (15, 0, 4, 15),
    (16, 0, 4, 16),
    (17, 0, 1, 17),
    (18, 0, 1, 18),
    (19, 0, 1, 19),
    (20, 0, 1, 20),
    (21, 0, 2, 2),
    (22, 0, 2, 2),
    (23, 0, 2, 3),
    (24, 0, 2, 4),
    (25, 0, 3, 5),
    (26, 0, 3, 6),
    (27, 0, 3, 17),
    (28, 0, 3, 18),
    (29, 0, 4, 19),
    (30, 0, 4, 12),
    (31, 0, 4, 14),
    (32, 0, 4, 13),
    (33, 0, 1, 15),
    (34, 0, 1, 2),
    (35, 0, 1, 9),
    (36, 0, 1, 1),
    (37, 0, 2, 9),
    (38, 0, 2, 5),
    (39, 0, 2, 3),
    (40, 0, 2, 5);


DELIMITER //
CREATE PROCEDURE EliminarUsuarioPorId(IN p_iduser INT)
BEGIN
    DELETE FROM USUARIOS WHERE iduser = p_iduser;
END;
//
DELIMITER ;


DELIMITER //

CREATE PROCEDURE ModificarUsuario(
    IN p_iduser INT,
    IN p_username VARCHAR(255),
    IN p_email VARCHAR(255),
    IN p_direccion VARCHAR(255),
    IN p_passwordu VARCHAR(255),
    IN p_cedula VARCHAR(10),
    IN p_telefono VARCHAR(15),
    IN p_rango INT,
    IN p_fechanac DATE
)
BEGIN
    UPDATE USUARIOS
    SET
        username = p_username,
        email = p_email,
        direccion = p_direccion,
        passwordu = p_passwordu,
        cedula = p_cedula,
        telefono = p_telefono,
        rango = p_rango,
        fechanac = p_fechanac
    WHERE
        iduser = p_iduser;
END;
//
DELIMITER ;

DELIMITER //
CREATE PROCEDURE CrearRuta(
    IN p_nom_ruta VARCHAR(255),
    IN p_id_ciudad_origen INT,
    IN p_id_ciudad_destino INT,
    IN p_id_omnibus INT
)
BEGIN
    INSERT INTO RUTA (NOM_RUTA, ID_CIUDAD_ORIGEN, ID_CIUDAD_DESTINO, IDOMNIBUS)
    VALUES (p_nom_ruta, p_id_ciudad_origen, p_id_ciudad_destino, p_id_omnibus);
END;
//
DELIMITER ;

DELIMITER //
CREATE PROCEDURE BuscarRutaPorID(IN p_id INT)
BEGIN
    SELECT * FROM RUTA WHERE ID_RUTA = p_id;
END;
//

DELIMITER //
CREATE PROCEDURE ModificarRuta(
    IN p_id_ruta INT,
    IN p_nombre_ruta VARCHAR(255),
    IN p_id_ciudad_origen INT,
    IN p_id_ciudad_destino INT,
    IN p_id_omnibus INT
)
BEGIN
    UPDATE RUTA
    SET
        NOM_RUTA = p_nombre_ruta,
        ID_CIUDAD_ORIGEN = p_id_ciudad_origen,
        ID_CIUDAD_DESTINO = p_id_ciudad_destino,
        IDOMNIBUS = p_id_omnibus
    WHERE ID_RUTA = p_id_ruta;
END;
//
DELIMITER ;

DELIMITER //
CREATE PROCEDURE ObtenerOmibusPorID(IN p_id_omnibus INT)
BEGIN
    SELECT * FROM OMNIBUS WHERE ID_OMNIBUS = p_id_omnibus;
END;
//
DELIMITER ;

DELIMITER //
CREATE PROCEDURE AgregarOmnibus(
    IN p_capacidad_maxima INT,
    IN p_numero_identificacion INT,
    IN p_conductor_id INT
)
BEGIN
    INSERT INTO OMNIBUS (CAPACIDAD_MAXIMA, NUMERO_IDENTIFICACION, CONDUCTORID)
    VALUES (p_capacidad_maxima, p_numero_identificacion, p_conductor_id);
END;
//
DELIMITER ;

DELIMITER //
CREATE PROCEDURE ModificarOmnibus(
    IN p_id_omnibus INT,
    IN p_capacidad_maxima INT,
    IN p_numero_identificacion INT,
    IN p_conductor_id INT
)
BEGIN
    UPDATE OMNIBUS
    SET
        CAPACIDAD_MAXIMA = p_capacidad_maxima,
        NUMERO_IDENTIFICACION = p_numero_identificacion,
        CONDUCTORID = p_conductor_id
    WHERE ID_OMNIBUS = p_id_omnibus;
END;
//
DELIMITER ;

DELIMITER //
CREATE PROCEDURE BuscarParadaPorID(IN p_id_parada INT)
BEGIN
    SELECT * FROM PARADA
    WHERE ID_PARADA = p_id_parada;
END;
//
DELIMITER ;

DELIMITER //
CREATE PROCEDURE AgregarParada(
    IN p_direccion_parada VARCHAR(255),
    IN p_horario TIME,
    IN p_id_ruta INT,
    IN p_id_ciudad INT
)
BEGIN
    INSERT INTO PARADA (DIRECCION_PARADA, HORARIO, ID_RUTA, ID_CIUDAD)
    VALUES (p_direccion_parada, p_horario, p_id_ruta, p_id_ciudad);
END;
//
DELIMITER ;

DELIMITER //
CREATE PROCEDURE ModificarParada(
    IN p_id_parada INT,
    IN p_direccion_parada VARCHAR(255),
    IN p_horario TIME,
    IN p_id_ruta INT,
    IN p_id_ciudad INT
)
BEGIN
    UPDATE PARADA
    SET
        DIRECCION_PARADA = p_direccion_parada,
        HORARIO = p_horario,
        ID_RUTA = p_id_ruta,
        ID_CIUDAD = p_id_ciudad
    WHERE ID_PARADA = p_id_parada;
END;
//
DELIMITER ;



DELIMITER //
CREATE PROCEDURE ModificarCiudad(
    IN p_id_ciudad INT,
    IN p_nombre_ciudad VARCHAR(80)
)
BEGIN
    DECLARE nombre_existe INT;

    -- Verificar si el nuevo nombre ya existe en otra ciudad
    SELECT COUNT(*) INTO nombre_existe
    FROM CIUDAD
    WHERE NOMBRE_CIUDAD = p_nombre_ciudad AND ID_CIUDAD != p_id_ciudad;

    IF nombre_existe = 0 THEN
        -- El nuevo nombre no existe en otra ciudad, realizar la actualización
        UPDATE CIUDAD
        SET
            NOMBRE_CIUDAD = p_nombre_ciudad
        WHERE ID_CIUDAD = p_id_ciudad;
        SELECT "Ciudad modificada con éxito." AS mensaje;
    ELSE
        -- El nuevo nombre ya existe en otra ciudad, no se puede actualizar
        SELECT "El nuevo nombre de ciudad ya existe en otra ciudad." AS mensaje;
    END IF;
END;
//
DELIMITER ;

DELIMITER //
CREATE PROCEDURE BuscarCiudadPorID(IN p_id_ciudad INT)
BEGIN
    SELECT * FROM CIUDAD WHERE ID_CIUDAD = p_id_ciudad;
END;
//
DELIMITER ;

DELIMITER //
CREATE PROCEDURE AgregarCiudad(
    IN p_nombre_ciudad VARCHAR(80)
)
BEGIN
    DECLARE ciudad_existente INT;
    
    SELECT COUNT(*) INTO ciudad_existente FROM CIUDAD WHERE NOMBRE_CIUDAD = p_nombre_ciudad;

    IF ciudad_existente = 0 THEN
        INSERT INTO CIUDAD (NOMBRE_CIUDAD) VALUES (p_nombre_ciudad);
    ELSE
        SIGNAL SQLSTATE '45000'
        SET MESSAGE_TEXT = 'La ciudad ya existe.';
    END IF;
END;
//
DELIMITER ;

CREATE TABLE archivos (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nombre_archivo VARCHAR(255) NOT NULL,
    archivo LONGBLOB NOT NULL
);
