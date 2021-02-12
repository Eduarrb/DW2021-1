-- 🔥🔥 JOINS
-- INNER
-- LEFT
-- RIGHT

SELECT *
    FROM actores, peliculas, personajes, directores
    WHERE actores.act_id = personajes.per_act_id 
        AND peliculas.peli_id = personajes.per_peli_id
        AND peliculas.peli_dire_id = directores.dire_id

------------------------------------------------
-- INNER JOIN
SELECT *
    FROM actores a, personajes b
    WHERE a.act_id = b.per_act_id

SELECT *
    FROM actores a
    INNER JOIN personajes b
    ON a.act_id = b.per_act_id

SELECT *
    FROM directores a
    INNER JOIN peliculas b
    ON a.dire_id = b.peli_dire_id

SELECT *
    FROM personajes a
    INNER JOIN peliculas b
    ON a.per_peli_id = b.peli_id

-- ⚡⚡LEFT JOIN 

SELECT *
    FROM peliculas a
    LEFT JOIN directores b
    ON a.peli_dire_id = b.dire_id


SELECT *
    FROM directores a
    LEFT JOIN peliculas b
    ON a.dire_id = b.peli_dire_id

INSERT INTO directores (dire_nombre, dire_apellido) VALUES
    ("Eduardo", "Arroyo")

-- ⚡⚡ RIGHT JOIN

SELECT *
    FROM peliculas a
    RIGHT JOIN directores b
    ON a.peli_dire_id = b.dire_id

INSERT INTO actores (act_nombre, act_apellido) VALUES
    ('Keanu', 'Reves'),
    ('Jack', 'Nicolson')

INSERT INTO personajes (per_nombre) VALUES
    ('Batman'),
    ('Superman'),
    ('Iron Man'),
    ('Indiana Jones')

SELECT * 
    FROM actores a
    INNER JOIN personajes b
    ON a.act_id = b.per_act_id

SELECT *
    FROM actores a
    LEFT JOIN personajes b
    ON a.act_id = b.per_act_id

SELECT *
    FROM personajes a
    LEFT JOIN actores b
    ON a.per_act_id = b.act_id

SELECT *
    FROM personajes a
    RIGHT JOIN actores b
    ON a.per_act_id = b.act_id

-- PELICULAS, PERSONAJES
-- INNER JOIN
-- NOMBRE DE LA PELICULA | NOMBRE PERSONAJE

SELECT a.peli_nombre, b.per_nombre
    FROM peliculas a
    INNER JOIN personajes b
    ON a.peli_id = b.per_peli_id

SELECT a.peli_nombre, b.per_nombre
    FROM peliculas a
    LEFT JOIN personajes b
    ON a.peli_id = b.per_peli_id

SELECT a.peli_nombre, b.per_nombre
    FROM peliculas a
    RIGHT JOIN personajes b
    ON a.peli_id = b.per_peli_id

--------------------------------
-- 🔥🔥 JOINS 3 TABLAS
SELECT *
    FROM peliculas, personajes, actores
    WHERE peliculas.peli_id = personajes.per_peli_id AND actores.act_id = personajes.per_act_id

SELECT *
    FROM peliculas a
    INNER JOIN personajes b ON a.peli_id = b.per_peli_id
    INNER JOIN actores c ON b.per_act_id = c.act_id

SELECT *
    FROM peliculas a
    LEFT JOIN directores b ON a.peli_dire_id = b.dire_id
    LEFT JOIN personajes c ON a.peli_id = c.per_peli_id

SELECT *
    FROM peliculas a
    LEFT JOIN directores b ON a.peli_dire_id = b.dire_id
    RIGHT JOIN personajes c ON a.peli_id = c.per_peli_id

SELECT *
    FROM peliculas a
    INNER JOIN directores b ON a.peli_dire_id = b.dire_id
    LEFT JOIN personajes c ON a.peli_id = c.per_peli_id

SELECT *
    FROM peliculas a
    INNER JOIN directores b ON a.peli_dire_id = b.dire_id
    RIGHT JOIN personajes c ON a.peli_id = c.per_peli_id

SELECT *
    FROM actores a
    INNER JOIN personajes b ON a.act_id = b.per_act_id
    RIGHT JOIN peliculas c ON c.peli_id = b.per_peli_id