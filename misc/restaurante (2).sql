-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 21-07-2022 a las 14:21:37
-- Versión del servidor: 10.4.19-MariaDB
-- Versión de PHP: 8.0.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";

-- Elimina la base de datos si existe y la vuelve a crear
DROP DATABASE IF EXISTS `restaurante`;
CREATE DATABASE `restaurante`;

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `restaurante`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `carta`
--

CREATE TABLE `carta` (
  `id_carta` int(11) NOT NULL,
  `nombre` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `carta`
--

INSERT INTO `carta` (`id_carta`, `nombre`) VALUES
(1, 'carta1'),
(2, 'carta2');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `formato`
--

CREATE TABLE `formato` (
  `id_formato` int(11) NOT NULL,
  `nombre` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `formato`
--

INSERT INTO `formato` (`id_formato`, `nombre`) VALUES
(1, 'ración'),
(2, 'media ración'),
(3, 'tapa');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `lineas_carta`
--

CREATE TABLE `lineas_carta` (
  `id_plato` int(11) NOT NULL,
  `id_formato` int(11) NOT NULL,
  `precio` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `lineas_carta`
--

INSERT INTO `lineas_carta` (`id_plato`, `id_formato`, `precio`) VALUES
(10, 1, '17.53'),
(2, 2, '5.35'),
(3, 2, '16.91'),
(2, 1, '4.20'),
(6, 1, '5.95'),
(7, 3, '16.35'),
(4, 2, '18.93'),
(8, 1, '12.99'),
(8, 2, '15.68'),
(8, 3, '3.62');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `plato`
--

CREATE TABLE `plato` (
  `id_plato` int(11) NOT NULL,
  `nombre` varchar(20) NOT NULL,
  `descripcion` varchar(200) DEFAULT NULL,
  `id_seccion` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `plato`
--

INSERT INTO `plato` (`id_plato`, `nombre`, `descripcion`, `id_seccion`) VALUES
(1,'Lid Coffeecup 12oz D9542b', 'Mauris enim leo, rhoncus sed, vestibulum sit amet, cursus id, turpis. Integer aliquet, massa id lobortis convallis, tortor risus dapibus augue, vel accumsan tellus nisi eu orci. Mauris lacinia sapien quis libero.', 3),
(2,'Guinea Fowl', 'Curabitur at ipsum ac tellus semper interdum. Mauris ullamcorper purus sit amet nulla. Quisque arcu libero, rutrum ac, lobortis vel, dapibus at, diam.', 3),
(3,'Onions - Red', 'Suspendisse potenti. In eleifend quam a odio. In hac habitasse platea dictumst.', 3),
(4,'Lobster - Cooked', 'Duis consequat dui nec nisi volutpat eleifend. Donec ut dolor. Morbi vel lectus in quam fringilla rhoncus.', 1),
(5,'Beer - Sleemans Cream Ale', 'Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Vivamus vestibulum sagittis sapien. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus.', 2),
(6,'Quinoa', 'Etiam vel augue. Vestibulum rutrum rutrum neque. Aenean auctor gravida sem.', 3),
(7,'Cheese - Parmesan Cubes', 'Nullam porttitor lacus at turpis. Donec posuere metus vitae ipsum. Aliquam non mauris.', 2),
(8,'Tea - Grapefruit Green Tea', 'Mauris enim leo, rhoncus sed, vestibulum sit amet, cursus id, turpis. Integer aliquet, massa id lobortis convallis, tortor risus dapibus augue, vel accumsan tellus nisi eu orci. Mauris lacinia sapien quis libero.', 3),
(9,'Island Oasis - Banana Daiquiri', 'Mauris enim leo, rhoncus sed, vestibulum sit amet, cursus id, turpis. Integer aliquet, massa id lobortis convallis, tortor risus dapibus augue, vel accumsan tellus nisi eu orci. Mauris lacinia sapien quis libero.', 3),
(10,'Wine - Ruffino Chianti', 'In congue. Etiam justo. Etiam pretium iaculis justo.', 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `seccion`
--

CREATE TABLE `seccion` (
  `id_seccion` int(11) NOT NULL,
  `id_carta` int(11) NOT NULL,
  `nombre` varchar(20) NOT NULL,
  `orden` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `seccion`
--

INSERT INTO `seccion` (`id_seccion`, `id_carta`, `nombre`, `orden`) VALUES
(1, 1, 'seccion1', 1),
(2, 1, 'seccion2', 2),
(3, 2,'seccion3', 3);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `carta`
--
ALTER TABLE `carta`
  ADD PRIMARY KEY (`id_carta`);

--
-- Indices de la tabla `formato`
--
ALTER TABLE `formato`
  ADD PRIMARY KEY (`id_formato`);

--
-- Indices de la tabla `lineas_carta`
--
ALTER TABLE `lineas_carta`
  ADD PRIMARY KEY (`id_plato`,`id_formato`),
  ADD KEY `id_formato` (`id_formato`);

--
-- Indices de la tabla `plato`
--
ALTER TABLE `plato`
  ADD PRIMARY KEY (`id_plato`),
  ADD KEY `id_seccion` (`id_seccion`);

--
-- Indices de la tabla `seccion`
--
ALTER TABLE `seccion`
  ADD PRIMARY KEY (`id_seccion`),
  ADD KEY `id_carta` (`id_carta`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `carta`
--
ALTER TABLE `carta`
  MODIFY `id_carta` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `formato`
--
ALTER TABLE `formato`
  MODIFY `id_formato` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `plato`
--
ALTER TABLE `plato`
  MODIFY `id_plato` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `seccion`
--
ALTER TABLE `seccion`
  MODIFY `id_seccion` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `seccion`
--
ALTER TABLE `seccion`
  ADD CONSTRAINT `seccion_ibfk_1` FOREIGN KEY (`id_carta`) REFERENCES `carta` (`id_carta`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

--
-- Filtros para la tabla `lineas_carta`
--
ALTER TABLE `lineas_carta`
  ADD CONSTRAINT `lineas_carta_ibfk_1` FOREIGN KEY (`id_plato`) REFERENCES `plato` (`id_plato`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `lineas_carta_ibfk_2` FOREIGN KEY (`id_formato`) REFERENCES `formato` (`id_formato`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `plato`
--
ALTER TABLE `plato`
  ADD CONSTRAINT `plato_ibfk_1` FOREIGN KEY (`id_seccion`) REFERENCES `seccion` (`id_seccion`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
