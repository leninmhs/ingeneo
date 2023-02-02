-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost
-- Tiempo de generación: 02-02-2023 a las 15:01:19
-- Versión del servidor: 10.3.36-MariaDB-0+deb10u2
-- Versión de PHP: 7.2.34-37+0~20230106.78+debian10~1.gbp1ece37

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `ingeneo`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Asesores`
--

CREATE TABLE `Asesores` (
  `id` int(11) NOT NULL,
  `cedula` bigint(20) NOT NULL,
  `nombre` varchar(150) NOT NULL,
  `usuario` varchar(45) NOT NULL,
  `clave` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `Asesores`
--

INSERT INTO `Asesores` (`id`, `cedula`, `nombre`, `usuario`, `clave`) VALUES
(1, 14125632, 'Maria Valverde', 'mvalverde', '123456'),
(2, 12345645, 'Anais Castro', 'acastro', '123456'),
(3, 45678, 'Jose Suarez', 'jsuarez', '123456'),
(4, 15652365, 'Lenin Hernandez', 'leninmhs', '123456');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Casos`
--

CREATE TABLE `Casos` (
  `id` int(11) NOT NULL,
  `numero_caso` varchar(45) NOT NULL,
  `descripcion` varchar(250) NOT NULL,
  `fecha_creacion` datetime DEFAULT NULL,
  `cliente_id` int(11) NOT NULL,
  `asesor_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `Casos`
--

INSERT INTO `Casos` (`id`, `numero_caso`, `descripcion`, `fecha_creacion`, `cliente_id`, `asesor_id`) VALUES
(1, '234545', 'Asesoramiento en tramite para creación de empresa', '2023-02-09 00:00:00', 1, 1),
(2, '45678', 'Caso por espera de documentos', '2023-02-01 00:00:00', 1, 3),
(3, 'M0003', 'Solicitud acceso a internet ', '2023-01-31 00:00:00', 2, 3),
(4, 'M0004', 'El usuario dice no puede guardar la imagen le da error', '2023-02-09 00:00:00', 2, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Clientes`
--

CREATE TABLE `Clientes` (
  `id` int(11) NOT NULL,
  `cedula` bigint(20) NOT NULL,
  `nombre` varchar(150) NOT NULL,
  `direccion` varchar(150) DEFAULT NULL,
  `telefono` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `Clientes`
--

INSERT INTO `Clientes` (`id`, `cedula`, `nombre`, `direccion`, `telefono`) VALUES
(1, 16027735, 'Lenin Hernádez', 'El Poblado, Medellín', '5745215411'),
(2, 123456, 'Ana castro', 'el paraiso', '042567898');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `Asesores`
--
ALTER TABLE `Asesores`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `Casos`
--
ALTER TABLE `Casos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_Casos_Clientes_idx` (`cliente_id`),
  ADD KEY `fk_Casos_Asesores1_idx` (`asesor_id`);

--
-- Indices de la tabla `Clientes`
--
ALTER TABLE `Clientes`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `Asesores`
--
ALTER TABLE `Asesores`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `Casos`
--
ALTER TABLE `Casos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `Clientes`
--
ALTER TABLE `Clientes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `Casos`
--
ALTER TABLE `Casos`
  ADD CONSTRAINT `fk_Casos_Asesores1` FOREIGN KEY (`asesor_id`) REFERENCES `Asesores` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Casos_Clientes` FOREIGN KEY (`cliente_id`) REFERENCES `Clientes` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
