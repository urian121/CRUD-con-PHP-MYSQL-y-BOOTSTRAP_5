-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 01-02-2022 a las 20:28:43
-- Versión del servidor: 10.4.21-MariaDB
-- Versión de PHP: 7.4.24

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `alumnos`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `table_alumnos`
--

CREATE TABLE `table_alumnos` (
  `id` int(10) NOT NULL,
  `namefull` varchar(100) DEFAULT NULL,
  `cedula` int(20) DEFAULT NULL,
  `sexo` varchar(10) DEFAULT NULL,
  `section` varchar(5) DEFAULT NULL,
  `foto` varchar(50) DEFAULT NULL,
  `fechaRegistro` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `table_alumnos`
--

INSERT INTO `table_alumnos` (`id`, `namefull`, `cedula`, `sexo`, `section`, `foto`, `fechaRegistro`) VALUES
(34, 'Urian Viera', 123456, 'M', 'B', '7c6126a0.PNG', '01-02-2022 14:27:52 PM'),
(35, 'Suscríbete a mi Canal', 11111112, 'M', 'B', 'f72be04b.PNG', '01-02-2022 14:28:22 PM');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `table_alumnos`
--
ALTER TABLE `table_alumnos`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `table_alumnos`
--
ALTER TABLE `table_alumnos`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
