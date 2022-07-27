-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 27-07-2022 a las 10:56:39
-- Versión del servidor: 10.4.19-MariaDB
-- Versión de PHP: 8.0.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";

-- Elimina la base de datos si existe y la vuelve a crear
DROP DATABASE IF EXISTS `camioneros`;
CREATE DATABASE `camioneros`;

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `camioneros`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `camion`
--

CREATE TABLE `camion` (
  `matricula` varchar(50) NOT NULL,
  `modelo` varchar(50) NOT NULL,
  `tipo` varchar(50) NOT NULL,
  `potencia` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `camionero`
--

CREATE TABLE `camionero` (
  `dni` varchar(15) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `tel` varchar(50) NOT NULL,
  `direccion` varchar(50) NOT NULL,
  `salario` double NOT NULL,
  `poblacion` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `conduce`
--

CREATE TABLE `conduce` (
  `id` int(11) NOT NULL,
  `id_camionero` varchar(50) NOT NULL,
  `id_camion` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `paquete`
--

CREATE TABLE `paquete` (
  `cod` int(11) NOT NULL,
  `descripcion` varchar(50) NOT NULL,
  `destinatario` varchar(50) NOT NULL,
  `direccion_destinatario` varchar(50) NOT NULL,
  `id_camionero` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `provincia`
--

CREATE TABLE `provincia` (
  `cod` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `camion`
--
ALTER TABLE `camion`
  ADD PRIMARY KEY (`matricula`);

--
-- Indices de la tabla `camionero`
--
ALTER TABLE `camionero`
  ADD PRIMARY KEY (`dni`);

--
-- Indices de la tabla `conduce`
--
ALTER TABLE `conduce`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_camionero` (`id_camionero`,`id_camion`),
  ADD KEY `id_camion` (`id_camion`);

--
-- Indices de la tabla `paquete`
--
ALTER TABLE `paquete`
  ADD PRIMARY KEY (`cod`),
  ADD KEY `id_camionero` (`id_camionero`);

--
-- Indices de la tabla `provincia`
--
ALTER TABLE `provincia`
  ADD PRIMARY KEY (`cod`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `conduce`
--
ALTER TABLE `conduce`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `paquete`
--
ALTER TABLE `paquete`
  MODIFY `cod` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `provincia`
--
ALTER TABLE `provincia`
  MODIFY `cod` int(11) NOT NULL AUTO_INCREMENT;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `conduce`
--
ALTER TABLE `conduce`
  ADD CONSTRAINT `conduce_ibfk_1` FOREIGN KEY (`id_camionero`) REFERENCES `camionero` (`dni`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `conduce_ibfk_2` FOREIGN KEY (`id_camion`) REFERENCES `camion` (`matricula`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `paquete`
--
ALTER TABLE `paquete`
  ADD CONSTRAINT `paquete_ibfk_1` FOREIGN KEY (`id_camionero`) REFERENCES `camionero` (`dni`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
