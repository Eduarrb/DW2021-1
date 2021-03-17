CREATE DATABASE dw2021_1_cms

USE dw2021_1_cms

CREATE TABLE categorias(
    cat_id INT UNSIGNED PRIMARY KEY NOT NULL AUTO_INCREMENT,
    cat_nombre VARCHAR(20) NOT NULL
)

INSERT INTO categorias (cat_nombre) VALUES
    ("PHP"),
    ("JAVA"),
    ("HTML"),
    ("CSS")

DROP TABLE posts

CREATE TABLE posts(
    post_id INT UNSIGNED PRIMARY KEY NOT NULL AUTO_INCREMENT,
    post_cat_id INT(10) NOT NULL,
    post_titulo VARCHAR(255) NOT NULL,
    post_autor VARCHAR(30) NOT NULL,
    post_fecha DATE NOT NULL,
    post_img TEXT NOT NULL,
    post_contenido TEXT NOT NULL,
    post_tags VARCHAR(50),
    post_vistas INT NOT NULL DEFAULT 0,
    post_status VARCHAR(30) NOT NULL
)

INSERT INTO posts (post_cat_id, post_titulo, post_autor, post_fecha, post_img, post_contenido, post_tags, post_status) VALUES
    (1, 'Curso de PHP', 'Jaimito', '2021-01-01', '01.png', 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Nisi, maxime sint eveniet quibusdam quod distinctio illo officiis reprehenderit fugiat dolore!', 'curso, php, 2021', 'publicado')

CREATE TABLE comentarios(
    com_id INT UNSIGNED PRIMARY KEY NOT NULL AUTO_INCREMENT,
    com_post_id INT(10) NOT NULL,
    com_nombre VARCHAR(100) NOT NULL,
    com_email VARCHAR(100) NOT NULL,
    com_mensaje TEXT NOT NULL,
    com_fecha DATETIME NOT NULL,
    com_status VARCHAR(30) NOT NULL
)

SELECT b.post_titulo, a.*
    FROM comentarios a
    INNER JOIN posts b ON a.com_post_id = b.post_id
    WHERE com_status = 'pendiente'

CREATE TABLE usuarios(
    user_id INT UNSIGNED PRIMARY KEY NOT NULL AUTO_INCREMENT,
    user_nombre VARCHAR(255) NOT NULL,
    user_apellido VARCHAR(255) NOT NULL,
    user_email VARCHAR(255) NOT NULL,
    user_img TEXT,
    user_pass VARCHAR(255) NOT NULL,
    user_token TEXT,
    user_status TINYINT DEFAULT 0,
    user_rol VARCHAR(255) NOT NULL
)

SELECT MONTH(com_fecha) AS mes, COUNT(*) AS cantidad
    FROM comentarios
    WHERE YEAR(com_fecha) = YEAR(NOW())
    GROUP BY MONTH(com_fecha)