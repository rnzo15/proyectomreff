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
    PRECIO INT NOT NULL, -- Agregado
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

CREATE TABLE INFORMES_DIARIOS (
    ID_INFORME INT AUTO_INCREMENT,
    FECHA DATE NOT NULL,
    NUM_RESERVA INT NOT NULL,
    TOTAL_INGRESOS INT NOT NULL,
    
    PRIMARY KEY (ID_INFORME),
    FOREIGN KEY (NUM_RESERVA) REFERENCES RESERVA (ID_RESERVA)
);

CREATE TABLE Calificaciones (
    ID_Calificacion INT AUTO_INCREMENT PRIMARY KEY,
    ID_RESERVA INT NOT NULL,
    ID_Pasajero INT NOT NULL,
    Puntuacion INT NOT NULL,
    Comentario VARCHAR(255),
    PromedioCalificaciones DECIMAL(5, 2), 
    UNIQUE KEY (ID_RESERVA, ID_Pasajero),
    FOREIGN KEY (ID_RESERVA) REFERENCES RESERVA(ID_RESERVA),
    FOREIGN KEY (ID_Pasajero) REFERENCES USUARIOS(iduser)
);



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
   

-- Definicion de vistas

CREATE VIEW VistaReservasUsuario AS
SELECT R.ID_RESERVA, R.PRECIO, R.FECHA_RESERVA, RT.NOM_RUTA, P.DIRECCION_PARADA, C.NOMBRE_CIUDAD
FROM RESERVA R
INNER JOIN RUTA RT ON R.IDRUTA = RT.ID_RUTA
INNER JOIN PARADA P ON RT.ID_RUTA = P.ID_RUTA
INNER JOIN CIUDAD C ON P.ID_CIUDAD = C.ID_CIUDAD;

CREATE VIEW VistaConductoresOmnibuses AS
SELECT C.NOMBRE_CONDUCTOR, C.SERIAL_LICENCIA, O.NUMERO_IDENTIFICACION, O.CAPACIDAD_MAXIMA
FROM CONDUCTOR C
INNER JOIN OMNIBUS O ON C.ID_CONDUCTOR = O.CONDUCTORID;

CREATE VIEW VistaRutasDisponibles AS
SELECT RT.NOM_RUTA, CIUDAD_ORIGEN.NOMBRE_CIUDAD AS ORIGEN, CIUDAD_DESTINO.NOMBRE_CIUDAD AS DESTINO
FROM RUTA RT
INNER JOIN CIUDAD CIUDAD_ORIGEN ON RT.ID_CIUDAD_ORIGEN = CIUDAD_ORIGEN.ID_CIUDAD
INNER JOIN CIUDAD CIUDAD_DESTINO ON RT.ID_CIUDAD_DESTINO = CIUDAD_DESTINO.ID_CIUDAD;

-- Eventos, procedimientos y disparadores

-- PROCEDIMIENTOS
DELIMITER //
CREATE PROCEDURE EliminarUsuario(
    IN p_iduser INT
)
BEGIN
    DELETE FROM USUARIOS WHERE iduser = p_iduser;
END //
DELIMITER ;

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
  
    SELECT COUNT(*) INTO cedula_count FROM USUARIOS WHERE cedula = cedula_param;
    
    IF cedula_count > 0 THEN
        SIGNAL SQLSTATE '45000'
        SET MESSAGE_TEXT = 'La cédula ya está registrada';
    ELSE
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
CREATE PROCEDURE AgregarCiudad(
	IN nombre VARCHAR(255)
)
BEGIN
INSERT INTO CIUDAD (NOMBRE_CIUDAD)
VALUES (nombre);
END //
DELIMITER ;

DELIMITER //
CREATE PROCEDURE AgregarRuta(
	IN nomlinea VARCHAR(255),
    IN id1 INT,
    IN id2 INT
)
BEGIN
INSERT INTO RUTA (NOM_RUTA, ID_CIUDAD_ORIGEN, ID_CIUDAD_DESTINO)
VALUES (nomlinea, id1, id2);
END //
DELIMITER ;

DELIMITER //
CREATE PROCEDURE AgregarConductor(
	IN nombrechofer VARCHAR(255),
    IN seriallicencia VARCHAR(100)
)
BEGIN
INSERT INTO CONDUCTOR (NOMBRE_CONDUCTOR, SERIAL_LICENCIA)
VALUES (nombrechofer, seriallicencia);
END //
DELIMITER ;

DELIMITER //
CREATE PROCEDURE AgregarOmnibus(
	IN numid INT,
    IN capacidad INT,
    IN idchof INT
    )
BEGIN 
INSERT INTO OMNIBUS (NUMERO_IDENTIFICACION, CAPACIDAD_MAXIMA, CONDUCTOR_ID)
VALUES (numid, capacidad, idchof);
END //
DELIMITER ;
SELECT * FROM CONDUCTOR;

DELIMITER //
CREATE PROCEDURE ActualizarPrecioRuta(
    IN p_idruta INT,
    IN p_nuevoprecio INT
)
BEGIN
    UPDATE RUTA SET PRECIO = p_nuevoprecio WHERE ID_RUTA = p_idruta;
END //
DELIMITER ;


-- eventos 
DELIMITER //

CREATE EVENT ActualizarEstadoAsientos
ON SCHEDULE EVERY 1 HOUR
DO
BEGIN
    UPDATE ASIENTO SET ESTADO = 0 WHERE ID_RESERVA IS NULL;
END;
//
DELIMITER ;

DELIMITER //
CREATE EVENT GenerarReporteDiario
ON SCHEDULE EVERY 1 DAY STARTS CURRENT_TIMESTAMP
DO
BEGIN
   
    DECLARE num_reservas, INGRESOS INT;
    SELECT COUNT(*) INTO num_reservas FROM RESERVA WHERE DATE(FECHA_RESERVA) = CURDATE();
	SELECT SUM(PRECIO) INTO INGRESOS FROM RESERVA WHERE DATE(FECHA_RESERVA) = CURDATE();
   
    INSERT INTO INFORMES_DIARIOS (FECHA, NUM_RESERVAS, TOTAL_INGRESOS)
    VALUES (CURDATE(), num_reservas, total_ingresos);
END;
//
DELIMITER ;

//
DELIMITER ;


-- triggers
DELIMITER //

CREATE TRIGGER ActualizarEstadoAsientoDespuesDeReserva
AFTER INSERT ON ASIENTO 
FOR EACH ROW
BEGIN
    UPDATE ASIENTO SET ESTADO = 1 WHERE ID_ASIENTO = NEW.ID_ASIENTO;
END;
//
DELIMITER ;

DELIMITER //
CREATE TRIGGER RegistrarEventoAuditoria
AFTER INSERT ON RESERVA
FOR EACH ROW
BEGIN
    INSERT INTO EVENTOS_AUDITORIA (EVENTO, FECHA) VALUES ('Nueva Reserva', NOW());
END;
//
DELIMITER ;

DELIMITER //
CREATE TRIGGER ValidarReservaParaCalificar
BEFORE INSERT ON Calificaciones
FOR EACH ROW
BEGIN
    DECLARE reserva_count INT;
    SELECT COUNT(*) INTO reserva_count FROM RESERVA WHERE ID_RESERVA = NEW.ID_RESERVA AND IDCLIENTE = NEW.ID_Pasajero;
    IF reserva_count = 0 THEN
        SIGNAL SQLSTATE '45000'
        SET MESSAGE_TEXT = 'El pasajero no ha comprado un pasaje para este servicio.';
    END IF;
END;
//
DELIMITER ;


DELIMITER //
CREATE TRIGGER EvitarCalificacionDuplicada
BEFORE INSERT ON Calificaciones
FOR EACH ROW
BEGIN
    DECLARE calificacion_count INT;
    SELECT COUNT(*) INTO calificacion_count FROM Calificaciones WHERE ID_RESERVA = NEW.ID_RESERVA AND ID_Pasajero = NEW.ID_Pasajero;
    IF calificacion_count > 0 THEN
        SIGNAL SQLSTATE '45000'
        SET MESSAGE_TEXT = 'El pasajero ya ha calificado este servicio.';
    END IF;
END;
//
DELIMITER ;

DELIMITER //
CREATE TRIGGER ActualizarPromedioCalificaciones
AFTER INSERT ON Calificaciones
FOR EACH ROW
BEGIN
    DECLARE promedio_calificaciones DECIMAL(5, 2);
    SELECT AVG(Puntuacion) INTO promedio_calificaciones FROM Calificaciones WHERE ID_RESERVA = NEW.ID_RESERVA;
    
    SET @promedio_calificaciones = promedio_calificaciones;
END;
//
DELIMITER ;

INSERT INTO Calificaciones (ID_RESERVA, ID_Pasajero, Puntuacion, Comentario)
VALUES
    (1, 1, 5, 'Excelente servicio'),
    (1, 2, 4, 'Buen servicio'),
    (2, 1, 3, 'Buen servicio'),
    (1, 1, 2, 'Otra calificación'),
    (3, 1, 4, 'Calificación sin reserva'),
    (2, 2, 5, 'Calificación duplicada');
