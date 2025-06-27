-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 05-06-2025 a las 19:18:40
-- Versión del servidor: 10.4.32-MariaDB
-- Versión de PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `sistema`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `datos_ambiental`
--

CREATE TABLE `datos_ambiental` (
  `id_doc` int(11) NOT NULL,
  `propiedad` varchar(25) NOT NULL,
  `propiedad_est` varchar(25) NOT NULL,
  `observacion` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `datos_ambiental`
--

INSERT INTO `datos_ambiental` (`id_doc`, `propiedad`, `propiedad_est`, `observacion`) VALUES
(20, 'Apartamento', 'Alquiler', 'pues ni idea'),
(21, 'Casa', 'Propia', 'pues ni idea'),
(22, 'Casa', 'Propia', 'pues ni idea'),
(23, 'Casa', 'Propia', 'pues ni idea'),
(25, 'Casa', 'Propia', 'pues ni idea'),
(26, 'Casa', 'Propia', 'pues ni idea');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `datos_economicos`
--

CREATE TABLE `datos_economicos` (
  `id_doc` int(11) NOT NULL,
  `nivel_ingreso` varchar(20) NOT NULL,
  `trabajo` varchar(20) NOT NULL,
  `pension` varchar(5) NOT NULL,
  `bono` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `datos_economicos`
--

INSERT INTO `datos_economicos` (`id_doc`, `nivel_ingreso`, `trabajo`, `pension`, `bono`) VALUES
(20, '33333', 'Developer', 'Si', 'Si'),
(21, '2323', 'No tiene', 'Si', 'Si'),
(22, '2323', 'No tiene', 'Si', 'Si'),
(23, '2323', 'No tiene', 'Si', 'Si'),
(25, '2323', 'No tiene', 'Si', 'Si'),
(26, '33333', 'No tiene', 'Si', 'Si');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `datos_extra`
--

CREATE TABLE `datos_extra` (
  `id_doc` int(11) NOT NULL,
  `nivel_instruc` varchar(20) NOT NULL,
  `profesion` varchar(40) NOT NULL,
  `comunidad` varchar(25) NOT NULL,
  `direc_habita` varchar(11) NOT NULL,
  `estruc_base` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `datos_extra`
--

INSERT INTO `datos_extra` (`id_doc`, `nivel_instruc`, `profesion`, `comunidad`, `direc_habita`, `estruc_base`) VALUES
(20, 'Secundaria', 'TSU en paginas web', 'Barrio bajamiro', 'calle kekek', 'Asamblea de diosdado'),
(21, 'Primaria', 'ingeniero', 'qweqweqw', 'Cuarzo', 'Asamblea de diosdado'),
(22, 'Primaria', 'ingeniero', 'qweqweqw', 'Cuarzo', 'Asamblea de diosdado'),
(23, 'Primaria', 'ingeniero', 'qweqweqw', 'Cuarzo', 'Asamblea de diosdado'),
(25, 'Primaria', 'ingeniero', 'qweqweqw', 'Cuarzo', 'Asamblea de diosdado'),
(26, 'Primaria', 'Ingeniero En Medicina', 'Barrio bajamiro', 'Cuarzo', 'Asamblea de diosdado');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `datos_import`
--

CREATE TABLE `datos_import` (
  `id_doc` int(11) NOT NULL,
  `ci_perso` int(11) NOT NULL,
  `telefono` int(40) NOT NULL,
  `codigo_patria` int(20) NOT NULL,
  `serial_patria` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `datos_import`
--

INSERT INTO `datos_import` (`id_doc`, `ci_perso`, `telefono`, `codigo_patria`, `serial_patria`) VALUES
(20, 324032, 2147483647, 2147483647, 2147483647),
(21, 232323, 2147483647, 2147483647, 2147483647),
(22, 232323, 2147483647, 2147483647, 2147483647),
(23, 232323, 2147483647, 2147483647, 2147483647),
(25, 232323, 2147483647, 2147483647, 2147483647),
(26, 34343434, 323, 34234234, 2147483647);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `datos_medicos`
--

CREATE TABLE `datos_medicos` (
  `id_doc` int(11) NOT NULL,
  `patologia` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `datos_medicos`
--

INSERT INTO `datos_medicos` (`id_doc`, `patologia`) VALUES
(20, 'Auditiva'),
(21, 'Sin familiares con patología'),
(22, 'Sin familiares con patología'),
(23, 'Sin familiares con patología'),
(25, 'Sin familiares con patología'),
(26, 'Sin familiares con patología');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `datos_personales`
--

CREATE TABLE `datos_personales` (
  `id_doc` int(11) NOT NULL,
  `nombres_apellidos` varchar(50) NOT NULL,
  `fecha_nacimiento` date NOT NULL,
  `lugar_nacimiento` varchar(25) NOT NULL,
  `edad` int(11) NOT NULL,
  `estado_civil` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `datos_personales`
--

INSERT INTO `datos_personales` (`id_doc`, `nombres_apellidos`, `fecha_nacimiento`, `lugar_nacimiento`, `edad`, `estado_civil`) VALUES
(20, 'PEDRO ELIAS AKINO', '1996-11-06', 'KARAKAS', 28, 'Casado/a'),
(21, 'markitos navaja trabaja', '2025-05-05', 'KARAKAS', 0, 'Casado/a'),
(22, 'markitos navaja trabaja', '2025-05-05', 'KARAKAS', 0, 'Casado/a'),
(23, 'markitos navaja trabaja', '2025-05-05', 'KARAKAS', 0, 'Casado/a'),
(25, 'markitos navaja trabaja', '2025-05-05', 'KARAKAS', 0, 'Casado/a'),
(26, 'PEDRO ELIAS AKINO', '2025-05-07', 'Barquisimeto Lara', 0, 'Soltero/a');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `registro_docs`
--

CREATE TABLE `registro_docs` (
  `id` int(11) NOT NULL,
  `tipo_doc` varchar(30) NOT NULL,
  `ci` int(25) NOT NULL,
  `nombre` varchar(25) NOT NULL,
  `apellido` varchar(25) NOT NULL,
  `asunto` text NOT NULL,
  `fecha` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `registro_docs`
--

INSERT INTO `registro_docs` (`id`, `tipo_doc`, `ci`, `nombre`, `apellido`, `asunto`, `fecha`) VALUES
(1, 'Consulta de buena conducta', 30420669, 'MARCO', 'CHIMENEA', 'pues que te importa', '2025-05-02 23:03:49'),
(2, 'Consulta de Soltería', 333, 'peperoni', 'cardellino', 'asdasdasd', '2025-05-02 23:16:04'),
(3, 'Consulta de buena conducta', 13264184, 'eeee', 'cuarentamil', 'asdasdasdee', '2025-05-02 23:16:52');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `reportes_entradas`
--

CREATE TABLE `reportes_entradas` (
  `id` int(11) NOT NULL,
  `ci` int(11) NOT NULL,
  `fecha_entrada` datetime NOT NULL,
  `fecha_salida` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `reportes_entradas`
--

INSERT INTO `reportes_entradas` (`id`, `ci`, `fecha_entrada`, `fecha_salida`) VALUES
(1, 123, '2025-04-22 21:33:04', '2025-04-22 21:33:11'),
(2, 123, '2025-04-22 21:33:17', '2025-04-22 21:47:09'),
(3, 123123, '2025-04-22 21:47:21', '2025-04-22 21:50:32'),
(4, 10, '2025-04-22 21:50:38', '2025-04-22 22:28:57'),
(5, 123, '2025-04-22 22:29:07', '2025-04-22 22:30:02'),
(6, 23, '2025-04-22 22:30:08', '2025-04-22 22:36:39'),
(7, 10, '2025-04-22 22:36:50', '2025-04-22 22:37:10'),
(8, 123, '2025-04-22 22:37:16', '2025-04-22 22:37:24'),
(9, 123123, '2025-04-22 22:37:31', '2025-04-22 22:37:45'),
(10, 23, '2025-04-22 22:38:03', '2025-04-22 22:41:25'),
(11, 123, '2025-04-23 12:28:03', '2025-04-24 11:17:55'),
(12, 123, '2025-04-24 11:17:55', '2025-04-26 14:12:56'),
(13, 123, '2025-04-26 14:12:56', '2025-04-30 20:02:18'),
(14, 123, '2025-04-30 20:02:18', '2025-04-30 23:02:49'),
(15, 23, '2025-04-30 23:09:46', '2025-04-30 23:20:11'),
(16, 10, '2025-04-30 23:20:36', '2025-04-30 23:22:31'),
(17, 123123, '2025-04-30 23:22:46', '2025-04-30 23:39:44'),
(18, 123, '2025-04-30 23:44:48', '2025-05-01 12:46:01'),
(19, 23, '2025-05-01 12:46:01', '2025-05-01 13:50:00'),
(20, 10, '2025-05-01 13:50:20', '2025-05-01 20:54:58'),
(21, 123, '2025-05-01 20:55:11', '2025-05-02 10:18:59'),
(22, 123, '2025-05-02 10:18:59', '2025-05-02 10:45:23'),
(23, 333, '2025-05-02 10:45:49', '2025-05-02 10:57:01'),
(24, 10, '2025-05-02 10:58:01', '2025-05-02 11:01:14'),
(25, 23, '2025-05-02 11:01:49', '2025-05-02 11:15:34'),
(26, 123123, '2025-05-02 11:16:37', '2025-05-02 11:21:22'),
(27, 123123, '2025-05-02 11:22:23', '2025-05-02 11:22:37'),
(28, 123123, '2025-05-02 11:22:50', '2025-05-02 11:23:06'),
(29, 123, '2025-05-02 11:23:16', '2025-05-02 11:24:20'),
(30, 123123, '2025-05-02 11:24:34', '2025-05-02 11:24:50'),
(31, 123, '2025-05-02 11:25:02', '2025-05-02 11:27:41'),
(32, 333, '2025-05-02 11:28:40', '2025-05-02 11:29:35'),
(33, 123, '2025-05-02 23:00:19', '2025-05-02 23:00:25'),
(34, 23, '2025-05-02 23:00:32', '2025-05-02 23:04:34'),
(35, 10, '2025-05-02 23:04:55', '2025-05-02 23:15:36'),
(36, 123, '2025-05-02 23:15:43', '2025-05-02 23:19:00'),
(37, 23, '2025-05-02 23:19:11', '2025-05-02 23:19:24'),
(38, 123, '2025-05-04 15:49:50', '2025-05-04 17:03:14'),
(39, 10, '2025-05-04 17:03:31', '2025-05-04 17:15:53'),
(40, 10, '2025-05-04 17:16:03', '2025-05-04 17:16:07'),
(41, 23, '2025-05-04 17:16:19', '2025-05-04 17:20:04'),
(42, 456, '2025-05-04 17:20:15', '2025-05-04 17:20:29'),
(43, 123, '2025-05-07 18:51:51', '2025-05-16 15:31:56'),
(44, 123, '2025-05-16 15:31:56', '2025-05-30 10:03:52'),
(45, 123, '2025-05-30 10:03:52', '2025-06-04 20:49:14'),
(46, 123, '2025-06-04 20:49:14', '2025-06-05 11:39:01'),
(47, 123, '2025-06-05 11:39:01', '2025-06-05 13:18:27');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `reportes_solicitudes`
--

CREATE TABLE `reportes_solicitudes` (
  `id` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `rol` varchar(15) NOT NULL,
  `accion` varchar(50) NOT NULL,
  `fecha` datetime NOT NULL,
  `id_doc` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `reportes_solicitudes`
--

INSERT INTO `reportes_solicitudes` (`id`, `nombre`, `rol`, `accion`, `fecha`, `id_doc`) VALUES
(1, '', 'Array', 'Creó Solicitud', '2025-05-16 17:45:15', 0),
(2, '', '3', 'Creó Solicitud', '2025-05-16 17:46:38', 0),
(3, '', '3', 'Creó Solicitud', '2025-05-16 17:48:07', 0),
(4, 'Carl', '3', 'Creó Solicitud', '2025-05-16 17:49:35', 0),
(5, 'Carl', '3', 'Creó Solicitud', '2025-05-30 10:05:59', 26),
(6, 'Carl', '3', 'Aprobó el tercer proceso', '0000-00-00 00:00:00', 24),
(7, 'Carl', '3', 'Aprobó el tercer proceso', '0000-00-00 00:00:00', 24),
(8, 'Carl', '3', 'Aprobó el tercer proceso', '0000-00-00 00:00:00', 26),
(9, 'Carl', '3', 'Reinició el proceso', '0000-00-00 00:00:00', 26),
(10, 'Carl', '3', 'Invalidó el documento', '0000-00-00 00:00:00', 26),
(11, 'Carl', '3', 'Validó el documento nuevamente', '0000-00-00 00:00:00', 26),
(12, 'Carl', '3', 'Invalidó el documento', '0000-00-00 00:00:00', 26),
(13, 'Carl', '3', 'Validó el documento nuevamente', '0000-00-00 00:00:00', 26),
(14, 'Carl', '3', 'Aprobó el primer proceso', '2025-06-05 11:52:43', 26),
(15, 'Carl', '3', 'Aprobó el segundo proceso', '2025-06-05 11:52:48', 26),
(16, 'Carl', '3', 'Aprobó el tercer proceso', '2025-06-05 11:52:53', 26),
(17, 'Carl', '3', 'Reinició el proceso', '2025-06-05 11:52:59', 26);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `system_despacho`
--

CREATE TABLE `system_despacho` (
  `id` int(11) NOT NULL,
  `id_manual` int(11) NOT NULL,
  `nombre` varchar(25) NOT NULL,
  `apellido` varchar(25) NOT NULL,
  `ci` int(11) NOT NULL,
  `telefono` int(11) NOT NULL,
  `direccion` varchar(50) NOT NULL,
  `asunto` text NOT NULL,
  `estado` varchar(45) NOT NULL,
  `razon` text NOT NULL,
  `fecha` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `system_help`
--

CREATE TABLE `system_help` (
  `id_doc` int(10) NOT NULL,
  `id_manual` int(11) NOT NULL,
  `descripcion` text NOT NULL,
  `estado` varchar(100) NOT NULL,
  `fecha_solicitud` datetime DEFAULT NULL,
  `visto` int(2) NOT NULL,
  `promotor` varchar(20) NOT NULL,
  `remitente` varchar(20) NOT NULL,
  `observaciones_ayuda` text NOT NULL,
  `categoria` varchar(50) NOT NULL,
  `razon_invalid` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `system_help`
--

INSERT INTO `system_help` (`id_doc`, `id_manual`, `descripcion`, `estado`, `fecha_solicitud`, `visto`, `promotor`, `remitente`, `observaciones_ayuda`, `categoria`, `razon_invalid`) VALUES
(20, 2323, 'Tiene sudado el estómago', 'En espera del documento físico para ser procesado 0/3', '2025-05-16 15:41:13', 1, 'Carl Johnson', 'Jose Gonzalez', 'Tiene que ser 1 patologia porque sino imaginate', 'Ayudas técnicas', ''),
(21, 2323, 'IMAGINATE SI QUIERO CORRER', 'En espera del documento físico para ser procesado 0/3', '2025-05-16 17:44:43', 1, 'Carl Johnson', 'qweqwe', 'no me quiten el perreo', 'Ayudas técnicas', ''),
(22, 2323, 'IMAGINATE SI QUIERO CORRER', 'En espera del documento físico para ser procesado 0/3', '2025-05-16 17:45:15', 1, 'Carl Johnson', 'qweqwe', 'no me quiten el perreo', 'Ayudas técnicas', ''),
(23, 2323, 'IMAGINATE SI QUIERO CORRER', 'En espera del documento físico para ser procesado 0/3', '2025-05-16 17:46:38', 1, 'Carl Johnson', 'qweqwe', 'no me quiten el perreo3', 'Ayudas técnicas', ''),
(25, 2323, 'IMAGINATE SI QUIERO CORRER', 'En espera del documento físico para ser procesado 0/3', '2025-05-16 17:49:35', 1, 'Carl Johnson', 'qweqwe', 'no me quiten el perreo333222', 'Ayudas técnicas', ''),
(26, 2323, 'SI TIENE DESCRIPCION', 'En espera del documento físico para ser procesado 0/3', '2025-05-30 10:05:59', 1, 'Carl Johnson', 'Jose Gonzalez', 'no me quiten el perreo333', 'Medicamentos', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_ayuda`
--

CREATE TABLE `tipo_ayuda` (
  `id_doc` int(11) NOT NULL,
  `tip_ayuda` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `tipo_ayuda`
--

INSERT INTO `tipo_ayuda` (`id_doc`, `tip_ayuda`) VALUES
(20, 'Silla de Ruedas(Niño)'),
(21, 'Silla de Ruedas'),
(22, 'Silla de Ruedas'),
(23, 'Silla de Ruedas'),
(25, 'Silla de Ruedas'),
(26, 'Silla de Ruedas');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `trabajo`
--

CREATE TABLE `trabajo` (
  `id_doc` int(11) NOT NULL,
  `trabaja_public` varchar(10) NOT NULL,
  `trabajo` varchar(15) NOT NULL,
  `direc_trabajo` varchar(25) NOT NULL,
  `nombre_insti` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `trabajo`
--

INSERT INTO `trabajo` (`id_doc`, `trabaja_public`, `trabajo`, `direc_trabajo`, `nombre_insti`) VALUES
(20, 'Si', 'Developer', 'USA', 'Alcaldia de peña'),
(21, 'No', 'No tiene', 'N/A', 'N/A'),
(22, 'No', 'No tiene', 'N/A', 'N/A'),
(23, 'No', 'No tiene', 'N/A', 'N/A'),
(25, 'No', 'No tiene', 'N/A', 'N/A'),
(26, 'No', 'No tiene', 'N/A', 'N/A');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `user`
--

CREATE TABLE `user` (
  `ci` int(11) NOT NULL,
  `contraseña` varchar(50) NOT NULL,
  `rango` int(11) NOT NULL,
  `sesion` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `user`
--

INSERT INTO `user` (`ci`, `contraseña`, `rango`, `sesion`) VALUES
(10, '10', 1, 'False'),
(23, '23', 0, 'False'),
(123, '123', 3, 'False'),
(456, '456', 2, 'False');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `user_info`
--

CREATE TABLE `user_info` (
  `ci` int(11) NOT NULL,
  `nombre` varchar(20) NOT NULL,
  `apellido` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `user_info`
--

INSERT INTO `user_info` (`ci`, `nombre`, `apellido`) VALUES
(123, 'Carl', 'Johnson'),
(10, 'despachador', 'despachado'),
(23, 'secretario', 'gonzalez'),
(456, 'felipe', 'nose');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `datos_ambiental`
--
ALTER TABLE `datos_ambiental`
  ADD KEY `id_doc` (`id_doc`);

--
-- Indices de la tabla `datos_economicos`
--
ALTER TABLE `datos_economicos`
  ADD KEY `id_doc` (`id_doc`);

--
-- Indices de la tabla `datos_extra`
--
ALTER TABLE `datos_extra`
  ADD KEY `id_doc` (`id_doc`);

--
-- Indices de la tabla `datos_import`
--
ALTER TABLE `datos_import`
  ADD KEY `id_doc` (`id_doc`);

--
-- Indices de la tabla `datos_medicos`
--
ALTER TABLE `datos_medicos`
  ADD KEY `id_doc` (`id_doc`);

--
-- Indices de la tabla `datos_personales`
--
ALTER TABLE `datos_personales`
  ADD KEY `id_doc` (`id_doc`);

--
-- Indices de la tabla `registro_docs`
--
ALTER TABLE `registro_docs`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `reportes_entradas`
--
ALTER TABLE `reportes_entradas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `ci` (`ci`);

--
-- Indices de la tabla `reportes_solicitudes`
--
ALTER TABLE `reportes_solicitudes`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `system_despacho`
--
ALTER TABLE `system_despacho`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `system_help`
--
ALTER TABLE `system_help`
  ADD PRIMARY KEY (`id_doc`);

--
-- Indices de la tabla `tipo_ayuda`
--
ALTER TABLE `tipo_ayuda`
  ADD KEY `id_doc` (`id_doc`);

--
-- Indices de la tabla `trabajo`
--
ALTER TABLE `trabajo`
  ADD KEY `id_doc` (`id_doc`);

--
-- Indices de la tabla `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`ci`);

--
-- Indices de la tabla `user_info`
--
ALTER TABLE `user_info`
  ADD KEY `ci` (`ci`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `registro_docs`
--
ALTER TABLE `registro_docs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `reportes_entradas`
--
ALTER TABLE `reportes_entradas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT de la tabla `reportes_solicitudes`
--
ALTER TABLE `reportes_solicitudes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT de la tabla `system_despacho`
--
ALTER TABLE `system_despacho`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `system_help`
--
ALTER TABLE `system_help`
  MODIFY `id_doc` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `datos_ambiental`
--
ALTER TABLE `datos_ambiental`
  ADD CONSTRAINT `datos_ambiental_ibfk_1` FOREIGN KEY (`id_doc`) REFERENCES `system_help` (`id_doc`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `datos_economicos`
--
ALTER TABLE `datos_economicos`
  ADD CONSTRAINT `datos_economicos_ibfk_1` FOREIGN KEY (`id_doc`) REFERENCES `system_help` (`id_doc`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `datos_extra`
--
ALTER TABLE `datos_extra`
  ADD CONSTRAINT `datos_extra_ibfk_1` FOREIGN KEY (`id_doc`) REFERENCES `system_help` (`id_doc`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `datos_import`
--
ALTER TABLE `datos_import`
  ADD CONSTRAINT `datos_import_ibfk_1` FOREIGN KEY (`id_doc`) REFERENCES `system_help` (`id_doc`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `datos_medicos`
--
ALTER TABLE `datos_medicos`
  ADD CONSTRAINT `datos_medicos_ibfk_1` FOREIGN KEY (`id_doc`) REFERENCES `system_help` (`id_doc`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `datos_personales`
--
ALTER TABLE `datos_personales`
  ADD CONSTRAINT `datos_personales_ibfk_1` FOREIGN KEY (`id_doc`) REFERENCES `system_help` (`id_doc`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `tipo_ayuda`
--
ALTER TABLE `tipo_ayuda`
  ADD CONSTRAINT `tipo_ayuda_ibfk_1` FOREIGN KEY (`id_doc`) REFERENCES `system_help` (`id_doc`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `trabajo`
--
ALTER TABLE `trabajo`
  ADD CONSTRAINT `trabajo_ibfk_1` FOREIGN KEY (`id_doc`) REFERENCES `system_help` (`id_doc`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `user_info`
--
ALTER TABLE `user_info`
  ADD CONSTRAINT `user_info_ibfk_1` FOREIGN KEY (`ci`) REFERENCES `user` (`ci`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
