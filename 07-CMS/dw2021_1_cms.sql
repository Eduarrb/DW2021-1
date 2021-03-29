-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 22-03-2021 a las 18:36:10
-- Versión del servidor: 10.4.17-MariaDB
-- Versión de PHP: 8.0.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `dw2021_1_cms`
--
CREATE DATABASE IF NOT EXISTS `dw2021_1_cms` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `dw2021_1_cms`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categorias`
--

DROP TABLE IF EXISTS `categorias`;
CREATE TABLE `categorias` (
  `cat_id` int(10) UNSIGNED NOT NULL,
  `cat_nombre` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `categorias`
--

INSERT INTO `categorias` (`cat_id`, `cat_nombre`) VALUES
(1, 'PHP'),
(2, 'JavaScript'),
(3, 'HTML'),
(4, 'CSS');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `comentarios`
--

DROP TABLE IF EXISTS `comentarios`;
CREATE TABLE `comentarios` (
  `com_id` int(10) UNSIGNED NOT NULL,
  `com_post_id` int(10) NOT NULL,
  `com_nombre` varchar(100) NOT NULL,
  `com_email` varchar(100) NOT NULL,
  `com_mensaje` text NOT NULL,
  `com_fecha` datetime NOT NULL,
  `com_status` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `comentarios`
--

INSERT INTO `comentarios` (`com_id`, `com_post_id`, `com_nombre`, `com_email`, `com_mensaje`, `com_fecha`, `com_status`) VALUES
(1, 1, 'Pepito', 'pepito@gmail.com', 'Este es el comentario de pepito', '2021-01-16 16:34:37', 'aprobado'),
(2, 1, 'Jaimito', 'jaimito@gmail.com', 'Este es el comentario de jaimito', '2021-01-16 16:35:51', 'aprobado'),
(3, 1, 'Maria', 'maria@gmail.com', 'este es el comentario de maría', '2021-01-16 16:40:36', 'aprobado'),
(4, 1, 'carlos', 'carlos@gmail.com', 'comentario de carlos', '2021-02-17 15:06:02', 'aprobado'),
(5, 1, 'Rodrigo', 'rodrigo@gmail.com', 'este es el comentario de rodrigo', '2021-02-17 15:06:36', 'aprobado'),
(6, 1, 'Sofia', 'sofia@gmail.com', 'este es el comentario de sofia', '2021-03-17 15:06:57', 'aprobado'),
(7, 1, 'Mauricio', 'mauricio@gmail.com', 'este es el comentario de mauricio', '2021-03-17 15:07:13', 'aprobado'),
(8, 1, 'Jose', 'jose@gmail.com', 'este es el comentario de jose', '2021-03-17 15:07:38', 'aprobado'),
(9, 1, 'Carla', 'carla@gmail.com', 'este es el comentario de carla', '2021-03-17 15:07:58', 'aprobado'),
(10, 1, 'Jessica', 'jessica@gmail.com', 'este es el comentario de jessica', '2021-03-17 15:08:13', 'aprobado'),
(11, 1, 'Roberto', 'roberto@gmail.com', 'este es el comentario de roberto', '2020-03-17 15:29:15', 'aprobado');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `posts`
--

DROP TABLE IF EXISTS `posts`;
CREATE TABLE `posts` (
  `post_id` int(10) UNSIGNED NOT NULL,
  `post_cat_id` int(10) NOT NULL,
  `post_titulo` varchar(255) NOT NULL,
  `post_autor` varchar(30) NOT NULL,
  `post_fecha` date NOT NULL,
  `post_img` text NOT NULL,
  `post_contenido` text NOT NULL,
  `post_tags` varchar(50) DEFAULT NULL,
  `post_vistas` int(11) NOT NULL DEFAULT 0,
  `post_status` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `posts`
--

INSERT INTO `posts` (`post_id`, `post_cat_id`, `post_titulo`, `post_autor`, `post_fecha`, `post_img`, `post_contenido`, `post_tags`, `post_vistas`, `post_status`) VALUES
(1, 1, 'Curso de PHP', 'Jaimito', '2021-01-01', '01.png', 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Nisi, maxime sint eveniet quibusdam quod distinctio illo officiis reprehenderit fugiat dolore!', 'curso, php, 2021', 32, 'publicado'),
(2, 2, 'Curso de JavaScript', 'Ken', '2021-03-16', '02.png', 'Este es el contenido del curso', 'Javascript, curso', 0, 'publicado'),
(3, 3, 'Curso de HTML5', 'Eduardo', '2021-03-18', '03.png', 'Este es el contenido del curso de HTML5', 'html5, curso', 0, 'publicado'),
(4, 1, 'Curso de MYSQL', 'Susan', '2021-03-18', '04.png', 'este es el contenido del curso de mysql', 'mysql', 0, 'publicado'),
(5, 1, 'Curso PHP Orientado a Obejtos', 'Ken', '2021-03-19', '05.png', 'Este es el contenido del curso', 'php', 0, 'publicado');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

DROP TABLE IF EXISTS `usuarios`;
CREATE TABLE `usuarios` (
  `user_id` int(10) UNSIGNED NOT NULL,
  `user_nombre` varchar(255) NOT NULL,
  `user_apellido` varchar(255) NOT NULL,
  `user_email` varchar(255) NOT NULL,
  `user_img` text DEFAULT NULL,
  `user_pass` varchar(255) NOT NULL,
  `user_token` text DEFAULT NULL,
  `user_status` tinyint(4) DEFAULT 0,
  `user_rol` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`user_id`, `user_nombre`, `user_apellido`, `user_email`, `user_img`, `user_pass`, `user_token`, `user_status`, `user_rol`) VALUES
(5, 'Eduardo', 'Arroyo', 'eduardo@gmail.com', NULL, '$2y$12$bK95AwjTlOYyX13F2p6eV.RlRRInNC0KcuMKWrMBVGAGQVomuBpSO', '', 1, 'admin'),
(6, 'Jaimito', 'Perez', 'jaimito@gmail.com', NULL, '$2y$12$lHT/ycxf6fiW2R4K3rvaBeeBPMZjgYw6F.9zxmBcQ4l4sFSbOw3KW', '', 1, 'suscriptor');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `categorias`
--
ALTER TABLE `categorias`
  ADD PRIMARY KEY (`cat_id`);

--
-- Indices de la tabla `comentarios`
--
ALTER TABLE `comentarios`
  ADD PRIMARY KEY (`com_id`);

--
-- Indices de la tabla `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`post_id`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `categorias`
--
ALTER TABLE `categorias`
  MODIFY `cat_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `comentarios`
--
ALTER TABLE `comentarios`
  MODIFY `com_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de la tabla `posts`
--
ALTER TABLE `posts`
  MODIFY `post_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `user_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
