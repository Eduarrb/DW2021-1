-- ⚡⚡ COMANDOS INICIALES
-- MOSTRAR LAS BASES DE DATOS

-- MYSLQ -U ROOT --> XAMPP
-- MYSQL -U ROOT -P --> SERVIDOR EN LA NUBE

SHOW DATABASES;

CREATE DATABASE dw2021_1

USE dw2021_1

-- CREAR TABLAS
-- nombre, apellido, edad, f_naci......
-- 1, 2 -- UC-0000000001

-- METADATOS

CREATE TABLE persona (
    per_id INT UNSIGNED PRIMARY KEY NOT NULL AUTO_INCREMENT,
    per_nombre VARCHAR(100) NOT NULL,
    per_apellidos VARCHAR(100) NOT NULL,
    per_genero VARCHAR(10) NOT NULL,
    per_fecha_nac DATE NOT NULL
);

SHOW TABLES

DESC persona

-- AGREGAR CAMPOS
ALTER TABLE persona ADD COLUMN per_dni CHAR(8) NOT NULL

ALTER TABLE persona CHANGE COLUMN per_nombre per_name VARCHAR(100) NOT NULL

ALTER TABLE persona CHANGE COLUMN per_dni per_dni VARCHAR(10) NOT NULL



INSERT INTO persona(per_name, per_apellidos, per_genero, per_fecha_nac) VALUES
    ("Jacinto", "Perez", "Masculino", "1990-01-01")

SELECT * FROM persona

INSERT INTO persona(per_name, per_apellidos, per_genero, per_fecha_nac, per_dni) VALUES
    ("Miguelito", "Castro", "Maculino", "1970-12-12", "12345678"),
    ("Carla", "Figueroa", "Femenino", "1991-09-09", "11111111"),
    ("Roberto", "Carlos", "Masculino", "1950-04-04", "22222222")

TRUNCATE persona -- BORRA LOS DATOS DE LA TABLA Y LOS METADATOS