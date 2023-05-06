-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 01-05-2023 a las 18:52:10
-- Versión del servidor: 10.4.27-MariaDB
-- Versión de PHP: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `login`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `datos`
--

CREATE TABLE `datos` (
  `id` int(10) NOT NULL,
  `nombres` varchar(20) NOT NULL,
  `correo` varchar(20) NOT NULL,
  `categoria` varchar(20) NOT NULL,
  `fecha` date DEFAULT NULL,
  `consulta` varchar(20) NOT NULL,
  `nivel` varchar(20) NOT NULL,
  `estado` varchar(250) NOT NULL,
  `retraso` varchar(250) NOT NULL,
  `perdidas` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `datos`
--

INSERT INTO `datos` (`id`, `nombres`, `correo`, `categoria`, `fecha`, `consulta`, `nivel`, `estado`, `retraso`, `perdidas`) VALUES
(1, 'piero', 'asdasdiasd@sdasd.com', 'desastre', '2019-08-19', 'dfglandfgjnadkfjngkd', 'normal', 'pendiente', '2', '2'),
(2, 'piero', 'asdasdiasd@sdasd.com', 'desastre', '2019-08-16', 'dfglandfgjnadkfjngkd', 'normal', 'completado', '4', '3'),
(3, 'piero', 'assdakspowejwq@sdasd', 'desastre', '2019-08-20', 'sdffffffffffffffffff', 'urgente', 'pendiente', '7', '7'),
(4, 'piero', 'assdakspowejwq@sdasd', 'desastre', '2019-08-20', 'sdffffffffffffffffff', 'urgente', 'pendiente', '8', '9'),
(5, 'piero', 'assdakspowejwq@sdasd', 'desastre', '2019-08-16', 'sdffffffffffffffffff', 'urgente', 'cerrado', '2', '8'),
(6, 'piero', 'assdakspowejwq@sdasd', 'desastre', '2019-08-21', 'sdffffffffffffffffff', 'urgente', 'pendiente', '3', '4'),
(7, 'piero', 'assdakspowejwq@sdasd', 'desastre', '2019-08-16', 'sdffffffffffffffffff', 'urgente', 'completado', '4', '3'),
(8, 'oscar', 'assdakspowejwq@sdasd', 'menor', '2019-08-21', 'sfffffffffffffffffff', 'leve', 'cerrado', '1', '1'),
(9, 'oscar', 'sqwiejoqiwksdl@outlo', 'moderado', '2019-08-19', 'sdfnsdlkfjqiwjqiweuq', 'normal', 'pendiente', '3', '2');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rol`
--

CREATE TABLE `rol` (
  `idrol` int(11) NOT NULL,
  `rol` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `rol`
--

INSERT INTO `rol` (`idrol`, `rol`) VALUES
(1, 'Administrador'),
(2, 'Usuario');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `nombre` varchar(250) NOT NULL,
  `usuario` varchar(250) NOT NULL,
  `contraseña` blob NOT NULL,
  `id_cargo` int(11) NOT NULL,
  `foto` varchar(3000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `nombre`, `usuario`, `contraseña`, `id_cargo`, `foto`) VALUES
(1, 'Admin', 'admin@gmail.com', 0x61646d696e313233, 1, './img/admin.png'),
(2, 'Jose Ramirez', 'jose0234@gmail.com', 0x6a6f7365313233, 2, 'img/dcv.jpg');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `datos`
--
ALTER TABLE `datos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `rol`
--
ALTER TABLE `rol`
  ADD PRIMARY KEY (`idrol`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_cargo` (`id_cargo`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `datos`
--
ALTER TABLE `datos`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de la tabla `rol`
--
ALTER TABLE `rol`
  MODIFY `idrol` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD CONSTRAINT `usuarios_ibfk_1` FOREIGN KEY (`id_cargo`) REFERENCES `rol` (`idrol`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
