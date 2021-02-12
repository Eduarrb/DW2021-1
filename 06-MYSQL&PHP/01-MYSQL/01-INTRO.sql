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

ALTER TABLE persona DROP COLUMN per_genero

INSERT INTO persona(per_name, per_apellidos, per_genero, per_fecha_nac) VALUES
    ("Jacinto", "Perez", "Masculino", "1990-01-01")

SELECT * FROM persona

INSERT INTO persona(per_name, per_apellidos, per_genero, per_fecha_nac, per_dni) VALUES
    ("Miguelito", "Castro", "Maculino", "1970-12-12", "12345678"),
    ("Carla", "Figueroa", "Femenino", "1991-09-09", "11111111"),
    ("Roberto", "Carlos", "Masculino", "1950-04-04", "22222222")

TRUNCATE persona -- BORRA LOS DATOS DE LA TABLA Y LOS METADATOS

DELETE FROM persona

-- BORRAR TABLA
DROP TABLE persona

DROP DATABASE <NOMBRE DE LA BASE DE DATOS>

---------------------------------------------------------------
-- VARCHAR DATOS VARIABLES -> LA CANTIDAD DE CARACTERES A UTILIZAR
-- CHAR -> DATOS SON EXACTOS 
-- SPIDERMAN

CREATE TABLE peliculas(
    peli_id INT UNSIGNED PRIMARY KEY NOT NULL AUTO_INCREMENT,
    peli_nombre VARCHAR(255) NOT NULL,
    peli_genero VARCHAR(255) NOT NULL,
    peli_estreno DATE NOT NULL,
    peli_restricciones VARCHAR(10)
)

INSERT INTO peliculas (peli_nombre, peli_genero, peli_estreno, peli_restricciones) VALUES
    ('Deadpool 2', 'Ciencia Ficción', '2018-01-30', 'PG-18')

INSERT INTO peliculas (peli_nombre, peli_genero, peli_estreno, peli_restricciones) VALUES
    ('Star Wars: The last Jedi', 'Ciencia Ficción', '2019-12-12', 'PG'),
    ('Interestellar', 'Ciencia Ficción', '2015-09-09', 'PG-14'),
    ('Masacre en texas', 'Terror', '1980-10-10', 'PG-16'),
    ('Donde estan las rubias', 'Comedia' ,'2004-05-21', 'PG-14'),
    ('Back to the future', 'Ciencia Ficción', '1985-12-12', 'PG')

SELECT * FROM peliculas --> QUERIES

SELECT peli_nombre FROM peliculas

SELECT peli_nombre, peli_genero FROM peliculas

-- 🔥🔥 WHERE

SELECT * FROM peliculas WHERE peli_id = 5

SELECT * FROM peliculas WHERE peli_nombre = 'Masacre en texas'

SELECT * FROM peliculas WHERE peli_genero = 'Ciencia Ficción'

SELECT * FROM peliculas WHERE peli_genero = 'CIENCIA FICCIÓN'

SELECT * FROM peliculas WHERE peli_restricciones = 'PG'

-- 🔥🔥 ORDER BY

SELECT * FROM peliculas ORDER BY peli_id DESC

SELECT * FROM peliculas ORDER BY peli_nombre ASC
SELECT * FROM peliculas ORDER BY peli_nombre DESC
SELECT * FROM peliculas ORDER BY peli_nombre 

---------------------------------------------------------

CREATE TABLE actores (
    act_id INT UNSIGNED PRIMARY KEY NOT NULL AUTO_INCREMENT,
    act_nombre VARCHAR(100) NOT NULL,
    act_apellido VARCHAR(100) NOT NULL
)

INSERT INTO actores (act_nombre, act_apellido) VALUES
    ('Ryan', 'Reynols'),
    ('Josh', 'Brouly')

-- MOSTRAR SOLO NOMBRES Y APELLIDOS

SELECT * FROM actores

-- SELECT act_nombre + act_apellido FROM actores
SELECT act_nombre, act_apellido FROM actores


-- MOSTRAR SOLO NOMBRES Y APELLIDOS EN UNA SOLA COLUMNA

SELECT CONCAT(act_nombre, act_apellido) FROM actores

SELECT CONCAT(act_nombre, " ", act_apellido) FROM actores

-- 🔥🔥 ALIAS

SELECT CONCAT(act_nombre, " ", act_apellido) AS "NOMBRES COMPLETOS" FROM actores

-- MOSTRAR NOMBRES Y APELLIDOS / LAS INICIALES
SELECT SUBSTRING(act_nombre,3,1) FROM actores

SELECT SUBSTRING(act_nombre,1,1), SUBSTRING(act_apellido,1,1) FROM actores

SELECT CONCAT(
    SUBSTRING(act_nombre,1,1),
    SUBSTRING(act_apellido,1,1)
    ) AS INICIALES
    FROM actores

SELECT 
    CONCAT(
        act_nombre, 
        " ", 
        act_apellido
    ) AS "NOMBRES COMPLETOS",
    CONCAT(
        SUBSTRING(act_nombre,1,1),
        SUBSTRING(act_apellido,1,1)
    ) AS INICIALES
    FROM actores

SELECT 
    CONCAT(act_nombre, " ", act_apellido) AS "NOMBRES COMPLETOS", 
    CONCAT(SUBSTRING(act_nombre,1,1), SUBSTRING(act_apellido,1,1)) AS INICIALES 
    FROM actores

-- JOHN ARROYO BAHAMONDE -> JARROYOB@CONTINENTAL.EDU.PE
-- MIGUEL MESTANZA -> MMESTANZAM@CONTINENTAL.EDU.PE

-- CREAR CORREO COORPORATIVO A LOS ACTORES
-- RRAYNOLS@CORREO.COM
-- JBROULY@CORREO.COM

SELECT
    CONCAT("NOMBRE", "@CORREO.COM")
    FROM actores

SELECT
    CONCAT(
        SUBSTRING(act_nombre,1,1),
        act_apellido,
        "@correo.com"
    ) AS CORREOS
    FROM actores

-- 🔥🔥 GROUP BY
SELECT * FROM peliculas GROUP BY peli_genero

SELECT COUNT(*) AS CANTIDAD, peli_genero FROM peliculas GROUP BY peli_genero

INSERT INTO peliculas (peli_nombre, peli_genero, peli_estreno, peli_restricciones) VALUES
    ('Mulan', "Animada", "1997-05-05", "PG"),
    ('El sexto sentido', 'Suspenso', '1990-10-10', 'PG-14')

-- cantidad de peliculas que sean PG 

SELECT 
    COUNT(*) AS CANTIDAD, peli_restricciones
    FROM peliculas 
    WHERE peli_restricciones = 'PG-14' 
    GROUP BY peli_restricciones

INSERT INTO peliculas (peli_nombre, peli_genero, peli_estreno, peli_restricciones) VALUES
    ('El Naufrago', 'Drama', '2000-01-25', 'PG_16')

-- MOSTRAR PELICULAS QUE EMPIECEN SU NOMBRE CON LA LETRA E
-- COMODINES %

SELECT * FROM peliculas WHERE peli_nombre LIKE "E%"

SELECT * FROM peliculas WHERE peli_nombre LIKE "%E"

SELECT * FROM peliculas WHERE peli_nombre NOT LIKE "%in%"

-- BETWEEN
-- MOSTRAR PELICULAS ENTRE 1997 Y 2015

SELECT * FROM peliculas WHERE peli_estreno BETWEEN "1997-01-01" AND "2015-12-31"

-- MOSTRAR PELICULAS ENTRE 2004 Y 2018
SELECT * FROM peliculas WHERE peli_estreno BETWEEN "2004-01-01" AND "2018-12-31"

-- MOSTRAR PELICULAS ENTRE 1997 - 2015 Y QUE EMPIECEN CON LA LETRA E
SELECT * 
    FROM peliculas 
    WHERE peli_estreno BETWEEN "1997-01-01" AND "2015-12-31" AND peli_nombre LIKE "e%"

-----------------------------------------------------------

CREATE TABLE personajes(
    per_act_id INT NOT NULL,
    per_peli_id INT NOT NULL,
    per_nombre VARCHAR(50)
)

INSERT INTO personajes (per_act_id, per_peli_id, per_nombre) VALUES
    (1, 1, "Deadpool"),
    (2, 1, "Cable")

INSERT INTO actores (act_nombre, act_apellido) VALUES
    ("Mark", "Hamil"),
    ("Harrison", "Ford"),
    ("Carrie", "Fisher"),
    ("Matthew", "McConaughey"),
    ("Anne", "Hathaway"),
    ("Michael", "J. Fox"),
    ("Cristopher", "Loyd"),
    ("Bruce", "Willis"),
    ("Tom", "Hanks")

INSERT INTO personajes (per_act_id, per_peli_id, per_nombre) VALUES
    (3, 2, "Luke Skywalker"),
    (4, 2, "Han Solo"),
    (5, 2, "Leia Organa"),
    (6, 3, "Joseph Cooper"),
    (7, 3, "Amalia Brand"),
    (8, 6, "Marty McFly"),
    (9, 6, "Dr. Brown"),
    (10, 8, "Dr Malcom"),
    (11, 9, "El naufrago")

-- DATOS PELICULAS Y PERSONAJES

SELECT *
    FROM peliculas, personajes
    WHERE peliculas.peli_id = personajes.per_peli_id

SELECT *
    FROM actores, personajes
    WHERE actores.act_id = personajes.per_act_id

SELECT *
    FROM peliculas, personajes, actores
    WHERE peliculas.peli_id = personajes.per_peli_id AND actores.act_id = personajes.per_act_id

CREATE TABLE directores(
    dire_id INT UNSIGNED PRIMARY KEY NOT NULL AUTO_INCREMENT,
    dire_nombre VARCHAR(25) NOT NULL,
    dire_apellido VARCHAR(25) NOT NULL
)

-- direA  matrix
-- direA  mulan
-- direA  Batman

INSERT INTO directores (dire_nombre, dire_apellido) VALUES
    ("Tim", "Miller"),
    ("Cristopher", "Nolan"),
    ("William", "Broyles"),
    ("Robert", "Zemeckis")

ALTER TABLE peliculas ADD COLUMN peli_dire_id INT

UPDATE peliculas SET peli_dire_id = 1 WHERE peli_id = 1
UPDATE peliculas SET peli_dire_id = 2 WHERE peli_id = 3
UPDATE peliculas SET peli_dire_id = 3 WHERE peli_id = 9
UPDATE peliculas SET peli_dire_id = 4 WHERE peli_id = 6

SELECT * 
    FROM peliculas, directores
    WHERE peliculas.peli_dire_id = directores.dire_id

SELECT *
    FROM directores, peliculas
    WHERE directores.dire_id = peliculas.peli_dire_id

SELECT *
    FROM actores, peliculas, personajes, directores
    WHERE actores.act_id = personajes.per_act_id 
        AND peliculas.peli_id = personajes.per_peli_id
        AND peliculas.peli_dire_id = directores.dire_id

-- NOMBRE DE LA PELICULA Y LOS DIRECTORES

SELECT peli_nombre, dire_nombre
    FROM directores, peliculas
    WHERE directores.dire_id = peliculas.peli_dire_id
    
select peliculas.peli_nombre, directores.dire_nombre 
    from peliculas, directores 
    where directores.dire_id = peliculas.peli_dire_id

--- ALIAS PARA LAS TABLAS

SELECT p.peli_nombre, d.dire_nombre
    FROM peliculas p, directores d
    WHERE p.peli_dire_id = d.dire_id

-- NOMBRE LA PELICULA, DIRECTOR(UN SOLO CAMPO), LOS ACTORES(UN SOLO CAMPO), SUS PERSONAJES

-- MATRIX | ROBERT SEMEKICS | KEAUNU RIVES | NEO

SELECT 
    b.peli_nombre,
    CONCAT(d.dire_nombre, " ", d.dire_apellido) AS director,
    CONCAT(a.act_nombre, " ", a.act_apellido) AS actor,
    c.per_nombre
    FROM actores a, peliculas b, personajes c, directores d
    WHERE a.act_id = c.per_act_id 
        AND b.peli_id = c.per_peli_id
        AND b.peli_dire_id = d.dire_id

-- NOMBRE LA PELICULA, DIRECTOR(UN SOLO CAMPO), LOS ACTORES(UN SOLO CAMPO), SUS PERSONAJES,
-- NOMBRE DE LAS PELICULAS DEBEN ESTAR EN ORDEN DESCENDENTE

SELECT 
    b.peli_nombre,
    CONCAT(d.dire_nombre, " ", d.dire_apellido) AS director,
    CONCAT(a.act_nombre, " ", a.act_apellido) AS actor,
    c.per_nombre
    FROM actores a, peliculas b, personajes c, directores d
    WHERE a.act_id = c.per_act_id 
        AND b.peli_id = c.per_peli_id
        AND b.peli_dire_id = d.dire_id
    ORDER BY b.peli_nombre DESC

-- INNER JOIN, LEFT JOIN, RIGHT JOIN