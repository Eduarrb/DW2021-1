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