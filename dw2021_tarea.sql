-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 19-03-2021 a las 22:43:37
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
-- Base de datos: `dw2021_tarea`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `hora_ingreso`
--

CREATE TABLE `hora_ingreso` (
  `hi_id` int(10) UNSIGNED NOT NULL,
  `hi_fecha` datetime NOT NULL,
  `hi_id_per` int(11) NOT NULL,
  `hi_dni` varchar(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `hora_ingreso`
--

INSERT INTO `hora_ingreso` (`hi_id`, `hi_fecha`, `hi_id_per`, `hi_dni`) VALUES
(1, '2021-03-17 00:00:00', 1, '71273563'),
(2, '2021-03-17 00:00:00', 2, '20642563'),
(3, '2021-03-17 00:00:00', 3, '12345678'),
(4, '2021-03-19 16:39:23', 2, '20642563');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `hora_salida`
--

CREATE TABLE `hora_salida` (
  `hs_id` int(10) UNSIGNED NOT NULL,
  `hs_fecha` datetime NOT NULL,
  `hs_id_per` int(11) NOT NULL,
  `hs_dni` varchar(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `hora_salida`
--

INSERT INTO `hora_salida` (`hs_id`, `hs_fecha`, `hs_id_per`, `hs_dni`) VALUES
(3, '2021-03-17 21:37:35', 1, '71273563'),
(4, '2021-03-17 22:09:43', 1, '71273563'),
(5, '2021-03-17 22:10:23', 2, '20642563'),
(6, '2021-03-19 16:40:14', 2, '20642563'),
(7, '2021-03-19 16:41:08', 2, '20642563');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `personal`
--

CREATE TABLE `personal` (
  `per_id` int(10) UNSIGNED NOT NULL,
  `per_nombre` varchar(250) NOT NULL,
  `per_apellido` varchar(250) NOT NULL,
  `per_dni` varchar(8) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `personal`
--

INSERT INTO `personal` (`per_id`, `per_nombre`, `per_apellido`, `per_dni`) VALUES
(1, 'CARLOS', 'DEL CASTILLO', '71273563'),
(2, 'a1', 'a2', '20642563'),
(3, 'b1', 'b2', '12345678'),
(4, 'c1', 'c2', '12345666'),
(5, 'd1', 'd2', '12345467');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `hora_ingreso`
--
ALTER TABLE `hora_ingreso`
  ADD PRIMARY KEY (`hi_id`);

--
-- Indices de la tabla `hora_salida`
--
ALTER TABLE `hora_salida`
  ADD PRIMARY KEY (`hs_id`);

--
-- Indices de la tabla `personal`
--
ALTER TABLE `personal`
  ADD PRIMARY KEY (`per_id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `hora_ingreso`
--
ALTER TABLE `hora_ingreso`
  MODIFY `hi_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `hora_salida`
--
ALTER TABLE `hora_salida`
  MODIFY `hs_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `personal`
--
ALTER TABLE `personal`
  MODIFY `per_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
