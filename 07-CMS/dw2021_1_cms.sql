-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 23-02-2021 a las 00:06:09
-- Versión del servidor: 10.4.14-MariaDB
-- Versión de PHP: 7.3.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
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
(2, 'JAVA'),
(3, 'HTML'),
(4, 'CSS');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `posts`
--

DROP TABLE IF EXISTS `posts`;
CREATE TABLE `posts` (
  `post_id` int(10) UNSIGNED NOT NULL,
  `post_cat_id` int(10) NOT NULL,
  `post_titulo` varchar(255) NOT NULL,
  `post_autor` varchar(50) NOT NULL,
  `post_fecha` date NOT NULL,
  `post_img` text NOT NULL,
  `post_contenido` text NOT NULL,
  `post_tag` varchar(255) NOT NULL,
  `post_vistas` int(11) NOT NULL,
  `post_status` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `posts`
--

INSERT INTO `posts` (`post_id`, `post_cat_id`, `post_titulo`, `post_autor`, `post_fecha`, `post_img`, `post_contenido`, `post_tag`, `post_vistas`, `post_status`) VALUES
(1, 1, 'Curso PHP', 'Jaimito', '2021-02-22', '01.png', 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Aliquid, necessitatibus aperiam? Unde placeat quibusdam distinctio sed quia minima quis nulla cum dolores voluptatum ipsam corporis beatae quidem, vero, exercitationem maiores.', 'curso, php, nuevo', 0, 'publicado'),
(2, 2, 'Curso de JAVA', 'Pepito', '2021-02-22', '02.png', 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Aliquid, necessitatibus aperiam? Unde placeat quibusdam distinctio sed quia minima quis nulla cum dolores voluptatum ipsam corporis beatae quidem, vero, exercitationem maiores.', 'curso, java, frontend', 0, 'publicado');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `categorias`
--
ALTER TABLE `categorias`
  ADD PRIMARY KEY (`cat_id`);

--
-- Indices de la tabla `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`post_id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `categorias`
--
ALTER TABLE `categorias`
  MODIFY `cat_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `posts`
--
ALTER TABLE `posts`
  MODIFY `post_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
