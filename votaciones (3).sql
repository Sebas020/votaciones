-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1:3306
-- Tiempo de generación: 07-06-2019 a las 04:35:23
-- Versión del servidor: 5.7.24
-- Versión de PHP: 7.2.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `votaciones`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_ocupacion`
--

DROP TABLE IF EXISTS `tbl_ocupacion`;
CREATE TABLE IF NOT EXISTS `tbl_ocupacion` (
  `id` int(2) NOT NULL,
  `nombre` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `tbl_ocupacion`
--

INSERT INTO `tbl_ocupacion` (`id`, `nombre`) VALUES
(1, 'Empleado');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_tipo_usuario`
--

DROP TABLE IF EXISTS `tbl_tipo_usuario`;
CREATE TABLE IF NOT EXISTS `tbl_tipo_usuario` (
  `id` int(2) NOT NULL,
  `nombre` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `tbl_tipo_usuario`
--

INSERT INTO `tbl_tipo_usuario` (`id`, `nombre`) VALUES
(1, 'Lider'),
(2, 'Administrador');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_usuarios`
--

DROP TABLE IF EXISTS `tbl_usuarios`;
CREATE TABLE IF NOT EXISTS `tbl_usuarios` (
  `docid` int(11) NOT NULL,
  `nombre` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `apellidos` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_spanish_ci DEFAULT NULL,
  `direccion` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `barrio` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `celular` varchar(10) COLLATE utf8_spanish_ci DEFAULT NULL,
  `telefono` varchar(7) COLLATE utf8_spanish_ci DEFAULT NULL,
  `profesion` varchar(255) COLLATE utf8_spanish_ci DEFAULT NULL,
  `puesto_votacion` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `mesa_votacion` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `ocupacion` int(2) DEFAULT NULL,
  `tipo_usuario` int(2) DEFAULT NULL,
  `password` varchar(255) COLLATE utf8_spanish_ci DEFAULT NULL,
  `usuario_registra` int(11) NOT NULL,
  PRIMARY KEY (`docid`),
  KEY `FK_tbl_usuarios_tbl_tipo_usuario` (`tipo_usuario`),
  KEY `FK_tbl_usuarios_tbl_ocupacion` (`ocupacion`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `tbl_usuarios`
--

INSERT INTO `tbl_usuarios` (`docid`, `nombre`, `apellidos`, `email`, `direccion`, `barrio`, `celular`, `telefono`, `profesion`, `puesto_votacion`, `mesa_votacion`, `ocupacion`, `tipo_usuario`, `password`, `usuario_registra`) VALUES
(1038414938, 'Sebastan', 'Garcia', 'scainet020@gmail.com', 'Calle Alcala nº1 Piso 2, Puerta C', 'La dalia', '3008361028', '1234567', 'Desarrollador', 'Escuela', '16', 1, 2, '$2y$04$EdBQtgr5qKU2qrvbxP1PDuEa4iEmKuprQskQdVwg3rAZhs7rdxOua', 1026);

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `tbl_usuarios`
--
ALTER TABLE `tbl_usuarios`
  ADD CONSTRAINT `FK_tbl_usuarios_tbl_ocupacion` FOREIGN KEY (`ocupacion`) REFERENCES `tbl_ocupacion` (`id`),
  ADD CONSTRAINT `FK_tbl_usuarios_tbl_tipo_usuario` FOREIGN KEY (`tipo_usuario`) REFERENCES `tbl_tipo_usuario` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
