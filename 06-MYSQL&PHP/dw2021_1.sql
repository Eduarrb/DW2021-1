-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 13-02-2021 a las 00:01:00
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
-- Base de datos: `dw2021_1`
--
CREATE DATABASE IF NOT EXISTS `dw2021_1` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `dw2021_1`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `actores`
--

DROP TABLE IF EXISTS `actores`;
CREATE TABLE `actores` (
  `act_id` int(10) UNSIGNED NOT NULL,
  `act_nombre` varchar(100) NOT NULL,
  `act_apellido` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `actores`
--

INSERT INTO `actores` (`act_id`, `act_nombre`, `act_apellido`) VALUES
(1, 'Ryan', 'Reynols'),
(2, 'Josh', 'Brouly'),
(3, 'Mark', 'Hamil'),
(4, 'Harrison', 'Ford'),
(5, 'Carrie', 'Fisher'),
(6, 'Matthew', 'McConaughey'),
(7, 'Anne', 'Hathaway'),
(8, 'Michael', 'J. Fox'),
(9, 'Cristopher', 'Loyd'),
(10, 'Bruce', 'Willis'),
(11, 'Tom', 'Hanks'),
(12, 'Keanu', 'Reves'),
(13, 'Jack', 'Nicolson');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `directores`
--

DROP TABLE IF EXISTS `directores`;
CREATE TABLE `directores` (
  `dire_id` int(10) UNSIGNED NOT NULL,
  `dire_nombre` varchar(25) NOT NULL,
  `dire_apellido` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `directores`
--

INSERT INTO `directores` (`dire_id`, `dire_nombre`, `dire_apellido`) VALUES
(1, 'Tim', 'Miller'),
(2, 'Cristopher', 'Nolan'),
(3, 'William', 'Broyles'),
(4, 'Robert', 'Zemeckis'),
(5, 'Eduardo', 'Arroyo');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `peliculas`
--

DROP TABLE IF EXISTS `peliculas`;
CREATE TABLE `peliculas` (
  `peli_id` int(10) UNSIGNED NOT NULL,
  `peli_nombre` varchar(255) NOT NULL,
  `peli_genero` varchar(255) NOT NULL,
  `peli_estreno` date NOT NULL,
  `peli_restricciones` varchar(10) DEFAULT NULL,
  `peli_dire_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `peliculas`
--

INSERT INTO `peliculas` (`peli_id`, `peli_nombre`, `peli_genero`, `peli_estreno`, `peli_restricciones`, `peli_dire_id`) VALUES
(1, 'Deadpool 2', 'Ciencia Ficción', '2018-01-30', 'PG-18', 1),
(2, 'Star Wars: The last Jedi', 'Ciencia Ficción', '2019-12-12', 'PG', NULL),
(3, 'Interestellar', 'Ciencia Ficción', '2015-09-09', 'PG-14', 2),
(4, 'Masacre en texas', 'Terror', '1980-10-10', 'PG-16', NULL),
(5, 'Donde estan las rubias', 'Comedia', '2004-05-21', 'PG-14', NULL),
(6, 'Back to the future', 'Ciencia Ficción', '1985-12-12', 'PG', 4),
(7, 'Mulan', 'Animada', '1997-05-05', 'PG', NULL),
(8, 'El sexto sentido', 'Suspenso', '1990-10-10', 'PG-14', NULL),
(9, 'El Naufrago', 'Drama', '2000-01-25', 'PG_16', 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `personajes`
--

DROP TABLE IF EXISTS `personajes`;
CREATE TABLE `personajes` (
  `per_act_id` int(11) NOT NULL,
  `per_peli_id` int(11) NOT NULL,
  `per_nombre` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `personajes`
--

INSERT INTO `personajes` (`per_act_id`, `per_peli_id`, `per_nombre`) VALUES
(1, 1, 'Deadpool'),
(2, 1, 'Cable'),
(3, 2, 'Luke Skywalker'),
(4, 2, 'Han Solo'),
(5, 2, 'Leia Organa'),
(6, 3, 'Joseph Cooper'),
(7, 3, 'Amalia Brand'),
(8, 6, 'Marty McFly'),
(9, 6, 'Dr. Brown'),
(10, 8, 'Dr Malcom'),
(11, 9, 'El naufrago'),
(0, 0, 'Batman'),
(0, 0, 'Superman'),
(0, 0, 'Iron Man'),
(0, 0, 'Indiana Jones');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `actores`
--
ALTER TABLE `actores`
  ADD PRIMARY KEY (`act_id`);

--
-- Indices de la tabla `directores`
--
ALTER TABLE `directores`
  ADD PRIMARY KEY (`dire_id`);

--
-- Indices de la tabla `peliculas`
--
ALTER TABLE `peliculas`
  ADD PRIMARY KEY (`peli_id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `actores`
--
ALTER TABLE `actores`
  MODIFY `act_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT de la tabla `directores`
--
ALTER TABLE `directores`
  MODIFY `dire_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `peliculas`
--
ALTER TABLE `peliculas`
  MODIFY `peli_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
